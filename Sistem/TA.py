import cv2
import pytesseract
import re
import mysql.connector
from picamera.array import PiRGBArray
from picamera import PiCamera
import numpy as np
from PIL import Image

class KTP:
  def __init__(self):
    self.nik = ""
    self.nama = ""
    self.tempat_tanggal_lahir = ""
    self.jenis_kelamin = ""
    self.gol_darah = ""
    self.alamat = ""
    self.rt_rw = ""
    self.kel_desa = ""
    self.kecamatan = ""
    self.agama = ""
    self.status_perkawinan = ""
    self.pekerjaan = ""
    self.kewarganegaraan = ""
    self.berlaku_hingga = "SEUMUR HIDUP"

def nik(word):
  word_dict = {
  "L" : "1",
  'l' : "1",
  'O' : "0",
  'o' : "0",
  '?' : "7"
  }
  res = ""
  for letter in word:
    if letter in word_dict:
      res += word_dict[letter]
    else:
      res += letter
  return res

# main
camera = PiCamera()
camera.resolution = (640, 480)
camera.framerate = 30

rawCapture = PiRGBArray(camera, size=(640,480))

for frame in camera.capture_continuous(rawCapture, format="bgr", use_video_port=True):
    image = frame.array
    cv2.imshow("frame", image)
    key = cv2.waitKey(1) & 0XFF

    rawCapture.truncate(0)

    if key == ord("a"):
        result = pytesseract.image_to_string(image)
        print(result)
        cv2.imshow ("frame", image)
        cv2.waitKey(0)
        break
cv2.destroyAllWindows ()

mydb = mysql.connector.connect(
  host="localhost",
  user="admin",
  password="your_password",
  database="e_ktp_scanner"
)

mycursor = mydb.cursor()

# get ktp data
ktp = KTP()
arr_result = result.splitlines()
for word in result.splitlines():
  if not word.strip():
    continue

  word_lowered = word.lower()
  if "nik" in word_lowered:
    idx = re.search("nik", word_lowered).end()
    temp = word[idx:]
    temp = re.sub("[^0-9]+", "", temp)
    ktp.nik = nik(temp)

  if "nama" in word_lowered:
    idx = re.search("nama", word_lowered).end()
    temp = word[idx:]
    temp = re.sub("[^a-zA-Z\s\.\,]+", "", temp)
    ktp.nama = temp.strip()

  if "lahir" in word_lowered:
    idx = re.search("lahir", word_lowered).end()
    temp = word[idx:]
    temp = re.sub("[^a-zA-Z\s,\-0-9]+", "", temp)
    ktp.tempat_tanggal_lahir = temp.strip()

  if "kelamin" in word_lowered:
    if "laki-laki" or "lelaki" or "laki" in word_lowered:
      ktp.jenis_kelamin = "LAKI-LAKI"
    elif "perempuan" in word_lowered:
      ktp.jenis_kelamin = "PEREMPUAN"

  if 'darah' in word_lowered:
    idx = re.search("darah", word_lowered).end()
    temp = word[idx:]
    temp = re.sub("[^A-Z\-]+", "", temp)
    ktp.gol_darah = temp.strip()

  if "alamat" in word_lowered:
    idx = re.search("alamat", word_lowered).end()
    temp = word[idx:]
    if not re.search("rw", arr_result[i+1].lower()):
      temp = temp + " " + arr_result[i+1]
    temp = re.sub("[^a-zA-Z\s\-\.\,0-9]+", "", temp)
    ktp.alamat = temp.strip()

  if "rw" in word_lowered:
    idx = re.search("rw", word_lowered).end()
    temp = word[idx:]
    temp = re.sub("[^0-9]+", " ", temp).strip()
    ktp.rt_rw = re.sub("[^0-9]+", "/", temp)

  if "desa" in word_lowered:
    idx = re.search("desa", word_lowered).end()
    temp = word[idx:]
    temp = re.sub("[^a-zA-Z\s\-\.\,0-9]+", "", temp)
    ktp.kel_desa = temp.strip()

  if "kecamatan" in word_lowered:
    idx = re.search("kecamatan", word_lowered).end()
    temp = word[idx:]
    temp = re.sub("[^a-zA-Z\s\-\.\,0-9]+", "", temp)
    ktp.kecamatan = temp.strip()

  if "agama" in word_lowered:
    idx = re.search("agama", word_lowered).end()
    temp = word[idx:]
    temp = re.sub("[^a-zA-Z\s]+", "", temp)
    ktp.agama = temp.strip()

  if "perkawinan" in word_lowered:
    idx = re.search("perkawinan", word_lowered).end()
    temp = word[idx:].lower()
    if "hidup" in temp:
      ktp.status_perkawinan = "CERAI HIDUP"
    elif "mati" in temp:
      ktp.status_perkawinan = "CERAI MATI"
    elif "belum" in temp:
      ktp.status_perkawinan = "BELUM KAWIN"
    elif "kawin" in temp:
      ktp.status_perkawinan = "KAWIN"

  if "pekerjaan" in word_lowered:
    idx = re.search("pekerjaan", word_lowered).end()
    idxKTPDateReg = re.search("([0-9]{2}-[0-9]{2}-[0-9]{4})", word)
    if not idxKTPDateReg:
      temp = word[idx:]
      temp = re.sub("[^a-zA-Z\s\/]+", "", temp)
      ktp.pekerjaan = temp.strip()
    else:
      temp = word[idx:idxKTPDateReg.start()]
      temp = re.sub("[^a-zA-Z\s\/]+", "", temp)
      ktp.pekerjaan = temp.strip()

  if "kewarganegaraan" in word_lowered:
    idx = re.search("kewarganegaraan", word_lowered).end()
    temp = word[idx:]
    temp = re.sub("[^A-Z]+", "", temp)
    if "WNI" in temp:
      ktp.kewarganegaraan = "WNI"
    elif "WNA" in temp:
      ktp.kewarganegaraan = "WNA"

# insert to db
sql = "INSERT INTO ktp (nik, nama, ttl, jkl, gol_darah, alamat, rt, kel, kec, agama, status, pekerjaan, kewarganegaraan, masa_berlaku, gambar) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
val = (ktp.nik, ktp.nama, ktp.tempat_tanggal_lahir, ktp.jenis_kelamin, ktp.gol_darah, ktp.alamat, ktp.rt_rw, ktp.kel_desa, ktp.kecamatan, 
  ktp.agama, ktp.status_perkawinan, ktp.pekerjaan, ktp.kewarganegaraan, ktp.berlaku_hingga );
mycursor.execute(sql, val)

mydb.commit()

print(mycursor.rowcount, "record inserted.")
<?php
session_start();
include_once("functions.php");

$con = mysqli_connect("127.0.0.1", "root", "", "e_ktp_scanner");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST["submit"])) {
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $ttl = $_POST["ttl"];
    $jkl = $_POST["jkl"];
    $alamat = $_POST["alamat"];
    $rt = $_POST["rt"];
    $kel = $_POST["kel"];
    $kec = $_POST["kec"];
    $agama = $_POST["agama"];
    $status_user = $_POST["status_user"];
    $pekerjaan = $_POST["pekerjaan"];
    $kewarganegaraan = $_POST["kewarganegaraan"];
    $masa = $_POST["masa"];
    $upload_ktp = $_FILES["upload_ktp"]["name"];
    move_uploaded_file($_FILES["upload_ktp"]["tmp_name"], "../images/" . $upload_ktp);

    $query = "INSERT INTO ktp(`nik`, `nama`, `ttl`, `jkl`, `alamat`, `rt`, `kel`, `kec`, `agama`, `status_user`, `pekerjaan`, `kewarganegaraan`, `masa`, `gambar`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $statement = $con->prepare($query);
    $statement->bind_param("ssssssssssssss", $nik, $nama, $ttl, $jkl, $alamat, $rt, $kel, $kec, $agama, $status_user, $pekerjaan, $kewarganegaraan, $masa, $upload_ktp);
    $statement->execute();

     redirect("../data-penduduk.php");
}
	
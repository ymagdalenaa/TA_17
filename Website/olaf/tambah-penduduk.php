<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <link href="css2/bootstrap.min.css" rel="stylesheet">
    <link href="css2/metisMenu.min.css" rel="stylesheet">
    <link href="css2/timeline.css" rel="stylesheet">
    <link href="css2/startmin.css" rel="stylesheet">
    <link href="css2/morris.css" rel="stylesheet">
    <link href="css2/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script type="text/javascript" src="show.js"></script>
    <style>
         body {
            background-color: #e6e6ff;
        }
    </style>
</head>
<body>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">E-KTP </a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> admin <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li class="divider"></li>
                    <li><a href="proses/logout_proses.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="data-penduduk.php" class="active"><i class="fa fa-book" aria-hidden="true"></i> Dashboard</a>
                    </li>
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="penduduk.php" class="active"><i class="fa fa-book" aria-hidden="true"></i> Data-->
<!--                            Penduduk2 </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="penduduklg.php" class="active"><i class="fa fa-book" aria-hidden="true"></i> Data-->
<!--                            Penduduk3 </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="oke.php" class="active"><i class="fa fa-book" aria-hidden="true"></i> Data Penduduk4-->
<!--                        </a>-->
<!--                    </li>-->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="page-header">Welcome, admin </h1>
                </div>
                <div class="col-lg-2">
                    <a href="data-penduduk.php">
                        <button class="page-header btn btn-primary" style="background: #005580">Kembali</button>
                    </a>
                </div>
            </div>
            <!-- Ini untuk form tambah data penduduk -->
            <form action="proses/tambah_penduduk_proses.php" method="POST" enctype="multipart/form-data">
                <div class="row" style="column-gap: 10px">
                    <div class="col-lg-5">
                        <input type="file" name="upload_ktp" id="upload-ktp" onchange="callOCR();" multiple/>
                    </div>
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-2">
                        <input type="submit" name="submit" class="btn btn-md" value="Process OCR" style="background: #ccccff">
                    </div>
                </div>
                <div class="row" style="margin-top: 10px column-gap: 10px">
                    <div class="col-lg-5">
                        <img id="showImageHere" style="margin-top: 20px; margin-right: 10px; margin-bottom: 10px"
                             src="images/upload-ktp.png" height="200px" width="300px">
                    </div>
                    <div class="col-lg-7">
                        <div class="row" style="margin-top: 7.5px">
                            <div class="col-lg-4">NIK</div>
                            <div class="col-lg-1">:</div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="nik" id="nik">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 7.5px">
                            <div class="col-lg-4">Nama</div>
                            <div class="col-lg-1">:</div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="nama" id="nama">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 7.5px">
                            <div class="col-lg-4">TTL</div>
                            <div class="col-lg-1">:</div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="ttl" id="ttl">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 7.5px">
                            <div class="col-lg-4">Jenis Kelamin</div>
                            <div class="col-lg-1">:</div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="jkl" id="jkl">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 7.5px">
                            <div class="col-lg-4">Alamat</div>
                            <div class="col-lg-1">:</div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="alamat" id="alamat">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 7.5px">
                            <div class="col-lg-4">RT</div>
                            <div class="col-lg-1">:</div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="rt" id="rt">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 7.5px">
                            <div class="col-lg-4">Kelurahan</div>
                            <div class="col-lg-1">:</div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="kel" id="kel">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 7.5px">
                            <div class="col-lg-4">Kecamatan</div>
                            <div class="col-lg-1">:</div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="kec" id="kec">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 7.5px">
                            <div class="col-lg-4">Agama</div>
                            <div class="col-lg-1">:</div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="agama" id="agama">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 7.5px">
                            <div class="col-lg-4">Status Perkawinan</div>
                            <div class="col-lg-1">:</div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="status_user" id="status_user">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 7.5px">
                            <div class="col-lg-4">Pekerjaan</div>
                            <div class="col-lg-1">:</div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 7.5px">
                            <div class="col-lg-4">Kewarganegaraan</div>
                            <div class="col-lg-1">:</div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="kewarganegaraan" id="kewarganegaraan">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 7.5px">
                            <div class="col-lg-4">Berlaku Hingga</div>
                            <div class="col-lg-1">:</div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="masa" id="masa">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--Akhir Content-->
</div>

<!-- jQuery -->
<script src="js2/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js2/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js2/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js2/startmin.js"></script>

<script>
    function callOCR() {
        document.getElementById("showImageHere").src = URL.createObjectURL(event.target.files[0]);

        // Nanti upload file ke IOT-nya di sini.

        // Setelah selesai OCR, IOT bakal kembaliin data penduduk sesuai KTP. Untuk saat ini, pakai dummy data dulu.
        document.getElementById("nik").value = "test";
        document.getElementById("nama").value = "test";
        document.getElementById("ttl").value = "test";
        document.getElementById("jkl").value = "test";
        document.getElementById("alamat").value = "test";
        document.getElementById("rt").value = "test";
        document.getElementById("kel").value = "test";
        document.getElementById("kec").value = "test";
        document.getElementById("agama").value = "test";
        document.getElementById("status_user").value = "test";
        document.getElementById("pekerjaan").value = "test";
        document.getElementById("kewarganegaraan").value = "test";
        document.getElementById("masa").value = "test";
    }
</script>

</body>
</html>

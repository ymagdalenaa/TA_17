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

    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr:nth-child(even){background-color:#e6e6ff;}

        table tr:hover {background-color: #ddd;}

        table th {
            padding-top: 12px; 
            padding-bottom: 12px;
            text-align: left;
            background-color: #005580;
            color: white;
        }
        table tr {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
        }

        body {
            background-color: #e6e6ff;
        }
        input[type=text] {
            width: 130px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-position: 10px 10px; 
            background-repeat: no-repeat;
            padding: 10px 9px 10px 20px;
            transition: width 0.4s ease-in-out;
        }

        input[type=text]:focus {
            width: 100%;
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

        <!-- Top Navigation: Left Menu -->

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
                    <!-- <li>
                   <a href="penduduk.php" class="active"><i class="fa fa-book" aria-hidden="true"></i>  Data Penduduk2 </a>
               </li>
               <li>
                   <a href="penduduklg.php" class="active"><i class="fa fa-book" aria-hidden="true"></i>  Data Penduduk3 </a>
               </li> -->
                </ul>

            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-9">
                    <h1 class="page-header">Welcome, admin </h1>

                    <form action="data-penduduk.php" method="get">
                        <input type="text" name="cari" ; placeholder="&#127859;Search..." >
                        <!-- <input type="submit" value="Search"> -->
                    </form>
            <br>
                </div>
                    
                <div class="col-lg-3">
                    <a href="tambah-penduduk.php">
                        <button class="page-header btn btn-primary" style="background: #005580">Tambah Data Penduduk</button>
                    </a>
                </div>
            </div>

            <!-- ini untuk conncect ke database untuk menampilkan data -->
            <?php
            
            // Check connection
            $con = mysqli_connect('127.0.0.1', 'root', '', 'e_ktp_scanner');
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            
            if(isset($_GET['cari'])){
                $cari = $_GET['cari']; 
            }
            
// ini untuk buat table utk menampilkan data
            echo "<table>
<tr>
<th>Nomor</th>
<th>Foto</th>   
<th>Info</th>
</tr>";
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $result = mysqli_query($con, "SELECT * FROM ktp WHERE nama LIKE '%".$cari."%'"); //Menampilkan Data Sesuai pencarian
            } else{
                $result = mysqli_query($con, "SELECT * FROM ktp"); //Menampilkan data dari database
            }

            // ini untuk memasukkan data yang ada di database ke table
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['num'] . "</td>";
                echo '<td><img src="images/' . $row['gambar'] . '" width="300" height="250"></td>';
                echo "<td>  Nik&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:" . $row['nik'] ."
                    <br> Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ". $row['nama'] ."
                    <br> Tempat/Tanggal Lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ". $row['ttl'] ."
                    <br> Jenis Kelamin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ". $row['jkl'] ."
                    <br> Gol. Darah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ". $row['gol_darah'] ."
                    <br> Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ". $row['alamat'] ."
                    <br> RT/RW&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ". $row['rt'] ."
                    <br> Kel/Desa &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ". $row['kel'] ."
                    <br> Kecamatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ". $row['kec'] ."
                    <br> Agama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ". $row['agama'] ."
                    <br> Status Perkawinan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ". $row['status'] ."
                    <br> Pekerjaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ". $row['pekerjaan'] ."
                    <br> Kewarganegaraan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ". $row['kewarganegaraan'] ."
                    <br> Berlaku Hingga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ". $row['masa_berlaku'] ."</td>";
                echo "</tr>";
            }
            echo "</table>";

            mysqli_close($con);

            ?>

            <div>

            </div>
            <!--Akhir Content-->

        </div>
    </div>

</div>

<!-- jQuery -->
<script src="js2/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js2/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js2/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js2/startmin.js"></script>

</body>

</html>
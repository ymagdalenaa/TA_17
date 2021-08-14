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
                    </li>
                    <li>
                        <a href="oke.php" class="active"><i class="fa fa-book" aria-hidden="true"></i>  Data Penduduk4 </a>
                    </li> -->
                </ul>

            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome, admin </h1>
                </div>
            </div>
            <h2>Silakan gunakan web ini untuk</h2>
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

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
		<title>Aplikasi Daftar Hadir Peserta Seminar</title>
		<meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
		<meta name="author" content="Pike Web Development - https://www.pikephp.com">

		<!-- Favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        
        <!-- Switchery css -->
		<link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />

		<!-- Bootstrap CSS -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- Font Awesome CSS -->
		<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		
		<!-- Custom CSS -->
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
		
		<!-- BEGIN CSS for this page -->
        <link href="assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/> -->
        <!-- END CSS for this page -->
		
</head>

<body class="adminbody">
<?php
	error_reporting(0);
	session_start();
    $a=$_SESSION['username'];
    include "limited.php";
	include "../koneksi.php";

    $query="SELECT COUNT(*) FROM data_peserta";
    $sql=mysqli_fetch_array(mysqli_query($con,$query));
    $query1="SELECT COUNT(*) FROM data_peserta WHERE kehadiran = 'hadir'";
    $sql1=mysqli_fetch_array(mysqli_query($con, $query1));
    $query2="SELECT COUNT(*) FROM admin";
    $sql2=mysqli_fetch_array(mysqli_query($con, $query2));
    $query3="SELECT COUNT(*) FROM lo";
    $sql3=mysqli_fetch_array(mysqli_query($con, $query3));
?>

<div id="main">

	<!-- top bar navigation -->
	<div class="headerbar">

		<!-- LOGO -->
        <div class="headerbar-left">
			<a href="index.php" class="logo">
                <img alt="Logo" src="wimnus.png" /> 
                <span>Wimnus</span></a>
        </div>

        <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">

                        <li class="list-inline-item dropdown notif">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/avatars/admin.png" alt="Profile image" class="avatar-rounded">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>Hello, <?= $a;?></small> </h5>
                                </div>

                                <!-- item-->
                                <a href="logout.php" class="dropdown-item notify-item">
                                    <i class="fa fa-power-off"></i> <span>Logout</span>
                                </a>
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left">
								<i class="fa fa-fw fa-bars"></i>
                            </button>
                        </li>                        
                    </ul>

        </nav>

	</div>
	<!-- End Navigation -->
	
 
	<!-- Left Sidebar -->
	<div class="left main-sidebar">
	
		<div class="sidebar-inner leftscroll">

			<div id="sidebar-menu">
        
			<ul>
                <li class="submenu">
                    <a id="box1" class="" href="index.php"><i class="fa fa-fw fa-dashboard bigfonts"></i><span> Dashboard </span> </a>
				</li>
				<!-- <li class="submenu">
                    <a class="" href="daftar_hadir.php"><i class="fa fa-fw fa-table"></i><span> Daftar Hadir </span> </a>
                </li> -->
                <li class="submenu">
                    <a id="box2" class=""><i class="fa fa-fw fa-table"></i> <span> Daftar Hadir </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li id="box2-1" class=""><a href="daftar_hadir.php">Reguler</a></li>
                        <li id="box2-2" class=""><a href="daftar_hadir_vip.php">VIP</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a id="box3" class=""><i class="fa fa-fw fa-file-text-o"></i> <span> Form </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li id="box3-1" class=""><a href="form_peserta.php">Peserta</a></li>
                        <li id="box3-2" class=""><a href="form_lo.php">LO</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-file-text-o"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="forms-general.html">General Elements</a></li>
                            <li><a href="forms-select2.html">Select2</a></li>
                            <li><a href="forms-validation.html">Form Validation</a></li>
                            <li><a href="forms-text-editor.html">Text Editors</a></li>
                            <li><a href="forms-upload.html">Multiple File Upload</a></li>
                            <li><a href="forms-datetime-picker.html">Date and Time Picker</a></li>
                            <li><a href="forms-color-picker.html">Color Picker</a></li>
                        </ul>
                </li>
					
            </ul>

            <div class="clearfix"></div>

			</div>
        
			<div class="clearfix"></div>

		</div>

	</div>
	<!-- End Sidebar -->
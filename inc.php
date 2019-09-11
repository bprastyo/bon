<?php
@session_start();
	@include "session.php";
	include 'dist/koneksi.php';
?>
<html>
	<head>
		<title>Aplikasi Kasir Budi 2.0 </title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<?php 
		include"dist/javascript.php";?>
		<link href="dist/style.css" rel="stylesheet" type="text/css">
		<link href="dist/bootstrap.css" rel="stylesheet" type="text/css">
		<style type="text/css">
		<!--
		.style4 {font-weight: bold; font-family:"Arial Black";}
		.style5 {font-weight: bold}
		-->
		</style>
	</head>

<form id="form1" method="post" >
<body class="body">
<br>

<div class="container">
	<div class="row">
		<div class="col-lg-5">
			&nbsp;&nbsp;Aplikasi Hitung Bon
		</div>
		<div class="col-lg-7">
			 Login as : <?php echo @$_SESSION['user_session'];?> | <a href="logout.php">Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
	</div>

	<div class="row">
		<div class="col-md-5">
			<?php include "INC/tombolkiri2.php";?>
		</div>
		<div class="col-md-7">
			 <?php @include"INC/hasilhitung.php";?>
		</div>
	</div>
</div>
</form> 
<!-- End ImageReady Slices -->
</body>

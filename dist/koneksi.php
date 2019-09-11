<?php
$host	= "localhost";
$user 	= "root";
$password = "";
$db  	= "bonn";
$connect = mysqli_connect(
		$host,
		$user,
		$password,
		$db
);
if(!$connect){
	die('Koneksi Database Gagal :'.mysqli_connect_error());
}
?>
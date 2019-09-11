<?php 
include "../dist/koneksi.php";
@$nama=$_POST['nama'];
mysqli_query($connect,"DELETE FROM `tbsimpansementara` WHERE  `tbsimpansementara`.`namaItem` = '$nama' ")or die($connect);

	header('location:../index.php');
?>
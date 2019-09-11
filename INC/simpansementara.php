<?php 
include"../dist/koneksi.php";
@$namaWarung	=$_POST['namaWarung'];
@$alamat		=$_POST['alamat'];
@$nomeja		=$_POST['nomeja'];
@$namaItem 		=$_POST['namaItem'];
@$harga 		=$_POST['itemharga'];
@$jumlah 		=$_POST['itemjumlah'];
@$total 		=$harga*$jumlah;
@$tanggalpembelian = date('Y-m-d');


@$querysimpan=mysqli_query($connect, "INSERT INTO `tbsimpansementara` 
	(`urut`, `namaWarung`, `alamat`, `noMeja`, `namaItem`, `harga`, `jumlahPembelian`, `total`, `tanggalPembelian`) 

	VALUES (NULL, 
		'$namaWarung', '$alamat', '$nomeja', '$namaItem', '$harga', '$jumlah', '$total', '$tanggalpembelian')")
or die(mysqli_error($connect));
header('location:../index.php');
?>
<?php
session_start();
date_default_timezone_get('Asia/Jakarta');
include '../dist/koneksi.php';
$totalitem	= $_POST['totalitem']; //totalpembelian
$uangbayar	= $_POST['jumlahuang']; //uangbayar
$hasil	= $_POST['hasil']; 
$nomeja =$_POST['nomeja']; //no meja
$uangkembali = $uangbayar - $totalitem; //uang kembali
$jampembelian =date('h:i:s'); //jampembelian
//query check data tbsimpansementara
$iddetailtransaksi= date('YmdHis'); //sbg no nota dan iddetailtransaksi
$tanggalpembelian = date('Y-m-d'); //tgl
$user = $_SESSION['user_session'];

$query = mysqli_query($connect,"insert into tb_detail_transaksi (urut, namaWarung, alamat, nomeja, iddetailtransaksi, namaitem, harga, diskon, jumlahpembelian, total, tanggalpembelian, keterangan) 					select 'urut', namaWarung, alamat, '$nomeja', '$iddetailtransaksi', namaitem, harga, diskon, jumlahpembelian, total, '$tanggalpembelian', '1' from tbsimpansementara")or die(mysqli_error($connect));

$query2 =mysqli_query($connect,"INSERT INTO `tb_transaksi` 
		(`idtransaksi`, `nonota`, `nomeja`, `iddetailtransaksi`, `totalpembelian`, `uangbayar`, `uangkembali`, `tglpembelian`, `jampembelian`, `jenispembelian`, `keterangan`, `ket`, `idlogin`) 
VALUES (NULL, '$iddetailtransaksi', '$nomeja', '$iddetailtransaksi', '$totalitem', '$uangbayar', '$uangkembali', '$tanggalpembelian', '$jampembelian', '0', '', '1', '$user');")or die(mysqli_error($connect));
	if($query){
		mysqli_query($connect,"TRUNCATE tbsimpansementara")or die($connect);?>
		<meta http-equiv="refresh" content="1; url=index.php">
		<?php }
?>
<?php
session_start();
include '../dist/koneksi.php';

@$queryambil = mysqli_query($connect,"select *  from tb_detail_transaksi order by urut DESC limit 1") or die(mysql_error());
$valueid=mysqli_fetch_array($queryambil);
$id = $valueid['iddetailtransaksi'];
$meja = $valueid['nomeja'];
include_once '../html2pdf/html2pdf.class.php';
	$no=1;
	$queryambil2 =mysqli_query($connect,"select * from tb_detail_transaksi where iddetailtransaksi='$id'")or die(mysql_error());
	$value=mysqli_fetch_array($queryambil2);
		$namaWarung	= $value['namaWarung'];
		$alamat		= $value['alamat'];
		$namaitem 	= substr($value['namaitem'], 0, 18);
		$harga		= $value['harga'];
		$jumlahpembelian		= $value['jumlahpembelian'];
		$total		= $value['total'];
	$content = "
	<table>
		<tr>
			<td align=center colspan=4>$namaWarung</td>
		</tr>
		<tr>
			<td align=center colspan=4>$alamat</td>
		</tr>
		<tr>
			<td align=center colspan=4><hr></td>
		</tr>
		<tr>
			<td align=left>No Nota :</td><td colspan=3 >$id</td>
		</tr>
		<tr>
			<td align=left>Meja :</td><td colspan=3>$meja</td>
		</tr>
		<tr>
			<td colspan=4><hr>
			</td>
		</tr>
		<tr>
			<th width=10px>Item</th>
			<th width=15px>Harga</th>
			<th width=5px>Jml</th>
			<th width=15px>Total</th>
		</tr>
	";$no=1;
	$queryambil3 =mysqli_query($connect,"select * from tb_detail_transaksi where iddetailtransaksi='$id'")or die(mysql_error());
	while($value=mysqli_fetch_array($queryambil3)){
		$namaitem 	= substr($value['namaitem'], 0, 18);
		$harga		= $value['harga'];
		$jumlahpembelian		= $value['jumlahpembelian'];
		$total		= $value['total'];
	$content .= "
		<tr>
			<td>$namaitem</td>
			<td>$harga</td>
			<td>$jumlahpembelian</td>
			<td>$total</td>
		</tr>
	";		
	}
	$content .=" <tr><td colspan=4><hr></td></tr>";
	$queryambil3=mysqli_query($connect,"select * from tb_transaksi where iddetailtransaksi = '$id'")or die($connect);
		while($queryTampil=mysqli_fetch_array($queryambil3)){
		
			$content .=
			"
				<tr>
					<td>Total Belanja</td><td colspan=3> : ".number_format($queryTampil['totalpembelian'])."</td>
				</tr>
				<tr>
					<td>Jumlah Uang Bayar  </td><td colspan=3> : ".number_format($queryTampil['uangbayar'])."</td>
				</tr>
				<tr>
					<td>Kembalian</td><td colspan=3> : ".number_format($queryTampil['uangkembali'])."</td>
				</tr>
			</table>
			<hr>Terima Kasih, Selamat Datang Kembali";
}
        $html2pdf = new HTML2PDF('P', array(216,75), 'en');

        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content);
        $html2pdf->Output('report.pdf');

    ?>
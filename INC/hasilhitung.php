<?php include '../dist/koneksi.php';?>
<script src="dist/javascript.php"></script>
<table width="100%" border="1" style="border-radius: 15px; border-right: none; border-left: none; border-bottom: none; border-top: none;" >
      <tr>
        <td colspan="2"><div class="scroll2">

        	<!-- Menampilkan Hasil Hitung -->

	  <table width="100%" border="1" bordercolor="#00CCFF" cellpadding="0" cellspacing="0" align="left">
		  <tr>
			<td height="30"><div align="center"><strong>Item</strong></div></td>
			<td ><div align="center"><strong>Harga</strong></div></td>
			<td ><div align="center"><strong>QTY</strong></div></td>
			<td ><div align="center"><strong>Total</strong></div></td>
			<td ><div align="center"></div></td>
		  </tr>

		  	<!-- Menampilkan Hasil Simpan Sementara -->
			<?php 
			@$queryAmbil=mysqli_query(@$connect,"select * from tbsimpansementara order by urut asc")or die(@$connect);
			while($queryTampil=mysqli_fetch_array($queryAmbil)){
			?>

		  <tr>
			<td height="44"><div align="left" class="aitem2">&nbsp;<?php echo $queryTampil['namaItem'];?></div></td>
			<td ><div align="right" class="aitem2"><?php echo number_format($queryTampil['harga']);?> &nbsp;</div></td>
			<td ><div align="center" class="aitem2"><?php echo $queryTampil['jumlahPembelian'];?></div></td>
			<td><div align="center" class="aitem2"><?php echo number_format($queryTampil['total']);?>	&nbsp;</div>
			</div></td>
			<td><div align="center" class="aitem2"><a href="javascript:void()" onclick="hapusItemTerpilih('<?php echo $queryTampil['namaItem'];?>')"><img src="images/x.png" height="30" width="30"></a>			</div></td>
		  </tr>
		  <?php }?>
		  <!-- Selesai Menampilkan Hasil Simpan Sementara -->

	</table>
	</div></td>
  </tr>
      <tr>
        <td>
	      <table width="100%" align="right" class="table" style="border-radius: 15px; border-right: none; border-left: none; border-bottom: none; border-top: none;">
			  <tr>
				<td width="45%"><u>Total Item</u></td>
				<td width="55%">
				<?php
					$queryAmbil=mysqli_query($connect,"select *,sum(total) as subtotal from tbsimpansementara")or die($connect);
						while($queryTampil=mysqli_fetch_array($queryAmbil)){
					?>
					<input type="text" class="tombol" style="font-weight:bold; color:#000000" readonly="readonly"
						value="<?= number_format($queryTampil['subtotal']); ?>"><?php }?>
					<?php
					$queryAmbil=mysqli_query($connect,"select *,sum(total) as subtotal from tbsimpansementara")or die($connect);
					while($queryTampil=mysqli_fetch_array($queryAmbil)){
					?>
					<input type="text" id="totalitem" class="ilang" size="14" style="font-weight:bold; color:#000000" 
					value="<?php echo $queryTampil['subtotal']; ?>"><?php }?>
				</td>
			  </tr>
			  <tr>
					<td><u>Uang Bayar</u></td>
					<td><input type="text" id="jumlahuang" name="jumlahuang" class="tombol" maxlength="10" placeholder="Ketik Langsung" size="14" style="font-weight:bold; color:#000000" onkeyup="nyarikembalian()" onkeypress="return hanyaAngka(event)"></td>
			  </tr>
			  <tr>
					<td><u>Kembalian</u></td>
					<td><div id="kembalian">
					  <input name="text" type="text" class="ilang" id="kembalian" size="14"  >
					  <input name="text" type="text" class="tombol" id="kembalian size="14"  style="font-weight:bold; color:#000000" readonly="readonly"/>
			   </div></td>
			  </tr>
			  <tr>
				<td>
				  <div align="center"><a href="javascript:void()" onclick="simpancetak()">
				<br />
				  Simpan Dan Print </a></div></td>
			  </tr>
		</table>
	</td>
  </tr>
</table>
<link href="dist/bootstrap.css" rel="stylesheet" />
<script src="dist/javascript.php"></script>
<table class="table">
  <?php
    include "dist/koneksi.php";
    @$queryAmbil=mysqli_query($connect,"select * from tbsimpansementara order by namaItem asc limit 1") or die($connect);
    @$queryTampil=mysqli_fetch_array($queryAmbil);
    ?>
  <tr>
    <td>Nama Warung : </td><td>
      <input type="text" maxlength="30" id="namaWarung" name="namaWarung" size="20" placeholder="Nama Warung" value="<?php echo @$queryTampil['namaWarung'];?>"/>
    </td>
  </tr>
  <tr>
    <td>Alamat : </td><td>
      <textarea id="alamat" name="alamat" placeholder="Alamat" rows="4" cols="23"/><?php echo @$queryTampil['alamat'];?></textarea>
    </td>
  </tr>
  <tr>
    <td>No Meja : </td><td>
  <input type="text" maxlength="30" id="noMeja" name="noMeja" size="20" placeholder="No Meja" value="<?php echo @$queryTampil['noMeja'];?>"/>
    </td>
  </tr>
  <tr>
    <td>Nama Item : </td><td>
  <input type="text" maxlength="30" autofocus="autofocus" id="namaItem" name="namaItem" size="20" placeholder="Nama Item"/>

    </td>
  </tr>
  <tr>
    <td>Harga : </td><td>
  <input type="text" maxlength="30" autofocus="autofocus" id="harga" name="harga" size="20" placeholder="Harga" onkeypress="return hanyaAngka(event)"/>

    </td>
  </tr>
  <tr>
    <td>QTY : </td><td>
  <input type="text" maxlength="30" autofocus="autofocus" id="qty" name="qty" size="20" placeholder="QTY" onkeypress="return hanyaAngka(event)"/>

    </td>
  </tr>
  <tr>
      <td colspan="2" align="center">
        <input name="hitung" id="hitung" type="button" value="&nbsp;Hitung&nbsp;" onclick="periksaMenghitung()">
      </td>
  </tr>
</div>
</table>
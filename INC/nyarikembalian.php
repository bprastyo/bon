<?php
@$totalitem =$_POST['totalitem'];
@$jumlahuang=$_POST['jumlahuang'];

$kembalian	=  $jumlahuang - $totalitem;
?>
<input type="text" class="tombol" value="<?=  number_format($kembalian);?>" disabled="disabled"/>
<input type="text" id="kembalian" class="ilang" value="<?=  number_format($kembalian);?>"/>
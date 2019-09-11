<script>
// JavaScript Document
<!-- FUNGSI INPUT DENGAN TOMBOL -->
function checkName(){
    var x = document.myForm;
    var input = x.name.value;
    var errMsgHolder = document.getElementById('kategori_nama');
    if (input.length < 3) {
        alert("pajang kurang dari 3");
        return false;
    } else if (!(/^\S{3,}$/.test(input))) {
        alert("Tidak boleh ada spasi");
        return false;
    } else {
        return undefined;
    }
}


function addChar(input, character) {
	var target=document.getElementById("jml"); //memanggil form input jml
	if(target.value.length>=3 || input.value == null || input.value == "") 
		input.value = character 
			else
				input.value += character
				}
function deleteChar(input) {
	input.value = input.value.substring(0, input.value.length - 1)
}
var xmlhttp;

function hanyaAngka(evt){
	var charCode	=(evt.which)?evt.which:event.keycode
		if(charCode	>31&&(charCode<48||charCode>57))
		return false;
		return true;
	}

<!-- FUNGSI PROSES -->

function hitung(kode){
	var url="INC/atas.php?rand="+Math.random();
	var post='kode='+kode;
	ajax(url,post,"hitung");
	}

function periksaMenghitung(){
	var namawarung=document.getElementById("namaWarung").value;
	var alamat=document.getElementById("alamat").value;
	var nomeja=document.getElementById("noMeja").value;
	var namaItem=document.getElementById("namaItem").value;
	var itemharga=document.getElementById("harga").value;
	var itemjumlah=document.getElementById("qty").value;
		
	if (nomeja==""){
		alert('Input No Meja Dahulu.');
	}else if (namaItem=="" || itemjumlah=="") {
		alert('Pilih Item Dan Isi Jumlah Pesanan.')
	}else{
	var url="INC/simpansementara.php";
	var post="namaWarung="+namawarung+"&alamat="+alamat+"&namaItem="+namaItem+"&itemharga="+itemharga+"&itemjumlah="+itemjumlah+"&nomeja="+nomeja;
	ajax(url,post,"proses");
	return true;}
}

function hapusItemTerpilih(nama){
	var url='INC/hapusitemterpilih.php';
	var post='nama='+nama;
	ajax(url,post,"proses");
	}

function nyarikembalian(){
	var totalitem	=document.getElementById("totalitem").value;
	var jumlahuang	=document.getElementById("jumlahuang").value;
	var cari		=jumlahuang-totalitem;
	var url='INC/nyarikembalian.php';
	var post='totalitem='+totalitem+"&jumlahuang="+jumlahuang;
	ajax(url,post,"kembalian");
	}

function cobanyarikembalian(){
	var totalitem	=document.getElementById("totalitem").value;
	var jumlahuang	=document.getElementById("jumlahuang").value;
	var cari		=jumlahuang-totalitem;
	document.getElementById("kembalian").innerHTML = cari;
}

function simpancetak(){
	var totalitem	=document.getElementById("totalitem").value;
	var jumlahuang	=document.getElementById("jumlahuang").value;
	var kembalian	=document.getElementById("kembalian").value;
	var nomeja 		= document.getElementById("noMeja").value;
	var hasil 	= jumlahuang-totalitem;

	if(nomeja==""){
		alert ("No Meja Tidak Boleh Kosong.");
	}else if (totalitem=="") {

	}else if(hasil<0){
			alert('Uang Pembayaran Kurang');
			return true;
		}else if(hasil =>0){
			window.open('INC/none.php','_blank');
			var url = 'INC/simpanprint.php?'
			var post ='totalitem='+totalitem+"&jumlahuang="+jumlahuang+"&hasil="+hasil+"&nomeja="+nomeja;
			ajax(url,post,"proses");
		}
	}
	

<!-- END TOMBOL MENU -->	
/* proses js */
function out_response(response){
	if(response=="tampiltotal"){
		document.getElementById("tampiltotal").innerHTML=xmlhttp.responseText;
		}
	if(response=="hitung"){
		document.getElementById("hitung").innerHTML=xmlhttp.responseText;
		}
	if(response=="proses"){
		document.getElementById("proses").innerHTML=xmlhttp.responseText;
		}
	if(response=="tampilperingatan"){
		document.getElementById("tampilperingatan").innerHTML=xmlhttp.responseText;
		}
	if(response=="kembalian"){
		document.getElementById("kembalian").innerHTML=xmlhttp.responseText;
		}
	if(response=="periksahitung"){
		document.getElementById("periksahitung").innerHTML=xmlhttp.responseText;
		}
	if(response=="peringatan"){
		document.getElementById("peringatan").innerHTML=xmlhttp.responseText;
		}
}

function ajax(url,post,response){
	xmlhttp=GetXmlHttpObject();
	xmlhttp.onreadystatechange=function(){
	if(xmlhttp.readyState==4){
		if(xmlhttp.status==200){
		out_response(response);
			}else{
				ajax_fail();
				}
	}
	}
	xmlhttp.open("POST",url,true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(post);
  }
function ajax_fail(){
	slert('maaf ada gangguan penerimaan data, silahkan coba lagi atau refresh web browser anda');
	return false;
	}
function GetXmlHttpObject(){
	if(window.XMLHttpRequest){
		return new XMLHttpRequest();
		}
	if(window.ActiveXObject){
		return new ActiveXObject("Microsoft.XMLHTTP");
		}else{
			alert('Browser anda tidak mendukung JavaScript.');}
			return false;
	}
</script>
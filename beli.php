<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Produk</title>
<?php
	include "header.php";
	include "include/koneksi.php"; 
	session_start();
?>
</head>

<body>

<div id="wrap">
	<?php 
		atas();
		menu_hori();
	?>
		<div id="isi">
	<?php
		  if (isset($_SESSION["idanggota"])){
	?>
		<br/>
		<table border="0" width="50%">
          <tr><td style="font-size:22px">Data Pengiriman<hr/></td>
          </tr><tr><td>
			<form name="kirim" action="simpan_beli.php" method="post" onSubmit="return validasikirim()">
			    <b>Total Pemesanan : Rp. <?php echo $_SESSION['total'] ?> <br/>
				Ongkos Kirim : Gratis <br/>
				Pengiriman via : JNE </b> <br/>
				<hr/>
				Nama :<br/>
				<input type="text" name="nama" onBlur="return krok()" ><span id="nama" class="hijau"></span><br/>
			<fieldset>
			<legend>Alamat </legend>
				Jalan :<br/>
				<input type="text" name="jl" onBlur="return krok()"><span id="jl" class="hijau"></span><br/>
				kota :<br/>
				<input type="text" name="kota" onBlur="return krok()"><span id="kota" class="hijau"></span><br/>
				Provinsi :<br/>
				<select name="provinsi">
					<option value="Yogyakarta">Yogyakarta</option>
					<option value="Jawa Barat">Jawa Barat</option>
					<option value="Jawa Tengah">Jawa Tengah</option>
					<option value="Jawa Timur">Jawa Timur</option>
				  </select> <br/>
			</fieldset>
				Telepon/HP :<br/>
				<input type="text" name="telp" onBlur="return krok()" maxlength="13"><span id="telp" class="hijau"></span><br/>
				<input type="submit" value="Lanjutkan">
                <input type="reset" value="Batal">
            </form>
			</td></tr></table>
	<?php }else{ ?>
			<h2>Mohon Login Terlebih Dahulu Untuk Melanjutkan Transaksi<h2>
			<h2>Atau Silahkan Daftar <a href="daftar.php">Disini</a><h2>
	<?php } ?> 
		</div>
		
		<div id="kanan">
        	<?php
				
				if (isset($_SESSION["idanggota"]))
					userinfo();
				else
					login();
				tambahan();
			?>
        </div>
    <?php    
		footer()
	?>
</div>
</body>
</html>


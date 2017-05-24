<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Input makanan</title>
<script language="JavaScript" type="text/javascript" src="validasi/validasiform.js"></script>
<link rel="stylesheet" href="css/form.css">	
</head>
<body>
<?php
  include "header.php";
  include "include/koneksi.php";
  mysqli_select_db($konek,$nmdb);
  $lihatkode = "select max(kode_makanan) as mkn from makanan";
  $kode = mysqli_query($konek, $lihatkode);
  $tampilkode = mysqli_fetch_assoc($kode); 
  $kode_mk = $tampilkode['mkn']+1;
?>

<div id="wrap">
	<?php
	atas();
	menu_hori();
	session_start();
	if (!isset($_SESSION["idadmin"])){
		belumlogin();
		exit;
	} 
	?>
	<div id="isi" align="center">
		<p>
		<form name="makanan" action="proses/simpanmakanan.php" method="post" enctype="multipart/form-data" onSubmit="return validasimakanan()">
		<table cellpadding="10">
			<tr>
				<td> Kode Makanan </td>
				<td><input name="kode" type="text" disabled value="<?php echo $kode_mk ?> "></td>
			</tr>
			<tr>
				<td>Nama Makanan </td>
				<td><input type="text" name="nama_makanan" onBlur="return mkok()"><span id="nama" class="hijau"></span></td>
			</tr>
			<tr>
				<td>Harga (rupiah)</td>
				<td><input type="text" name="harga" onBlur="return mkok()"><span id="harga" class="hijau"></span></td>
			</tr>
			<tr>
				<td>Stock </td>
				<td><input type="text" name="stock" onBlur="return mkok()"><span id="stock" class="hijau"></span></td>
			</tr>
			<tr>
				<td> Foto </td>
				<td><input type="file" name="foto"></td>
			</tr>
		</table>
		  <input type="submit" value="Simpan">
		  <input type="reset" value="Batal">
		</form>
		</p>
	</div>
    <div id="footer" align="center">
		<br/><b>
    	Admin : <?php echo "".$_SESSION["nama_admin"].""; ?> | </b>
		<a href="proses/proseslogout.php">Logout</a>
    </div>
</div>
</body>
</html>
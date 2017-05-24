<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tentang</title>
<?php
	include "header.php"
?>
</head>

<body>
<div id="wrap">
	<?php 
		atas();
		menu_hori();
	?>
	<div id="isi"  style="font-size : 16pt">
	PT. SUKA ABON SEJAHTERA merupakan produsen abon yang telah berdiri sejak 2011, dalam produksi kami menyediakan abon ayam dalam 2 rasa orijinal dan pedas dalam beberapa kemasan. <br/><br/>

Abon kami:<br/>
1. menggunakan daging ayam segar<br/>
2. resep bumbu tradisional, tanpa bahan pengawet<br/>
3. diolah dengan alat yang sudah modern<br/>
4. telah mendapatkan sertifikat Halal Majelis Ulama Indonesia (MUI) <br/>
	</div>
		<div id="kanan">
        	<?php
				session_start();
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
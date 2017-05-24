<?php
	session_start();
	include "header.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>

</head>

<body>
<div id="wrap">
	<?php 
		atas();
		menu_hori();
	?>
	<div id="isi" style="font-size : 16pt">
	<p>Abon adalah salah satu variasi dalam proses pengolahan makanan terutama daging untuk menambah citarasa dan memperpanjang umur simpan.<br/><br/>
			PT. SUKA ABON SEJAHTERA berkomitmen untuk memberikan produk abon sehat dengan citarasa yg lezat
			Terbuat dari bahan baku pilihan, diolah secara bersih dan benar, sehingga menghasilkan produk abon yang berkualitas
			Halal, Tanpa MSG, tanpa pengawet, tanpa pemanis & pewarna buatan.
</p>
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

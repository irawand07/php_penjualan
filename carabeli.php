<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cara pembelian</title>
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
		<div id="isi">
		
		<img src="image/cara_beli/pembelian.png" width="735px"	height="490px" />
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

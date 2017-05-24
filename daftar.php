<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Daftar</title>
<?php
	include "header.php"
?>
</head>

<body>
<div id="wrap">
	<?php 
		atas();
		menu_hori();
		daftar();
	?>
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

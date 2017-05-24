<head>
	<link rel="stylesheet" href="css/utama.css"/>
	<link rel="stylesheet" href="css/form.css">
	<script language="JavaScript" type="text/javascript" src="validasi/validasiform.js"></script>

</head>
<?php function atas(){ ?>
		<div id="header" align="center">
		<br/>
    	<img src="../image/judul.png" /><br/>
		<p align="right" style="font-size:14px;color:white;"><b>Toko Abon terlengkap dan terpercaya &nbsp; </b> </p>
    </div>
<?php } ?>
<?php function menu_hori(){ ?>
	<div id="menu_hori">
    	<ul>
        	<li><a href="halamanadmin.php">Home</a></li>
            <li><a href="makanan.php">Input Makanan</a></li>
            <li><a href="stock.php">Tambah Stock</a></li>
            <li><a href="konfirmasi.php">Konfirmasi Pembayaran</a></li>
            <li><a href="laporan.php">Laporan</a></li>
        </ul>
    </div>
<?php } ?>
<?php function belumlogin(){ ?>
<div="isi">
		Silahkan Login dahulu<br/>
		<a href="index.php">Disini</a>
</div>
<?php } ?>
<?php
	include "../include/koneksi.php";
	$kode = $_POST['kode'];
	$tambahstock = $_POST['tambahstock'];
	$stock = $_POST['stock'];
	$jumstock = $stock + $tambahstock;
	$sql = "update makanan set stock = ".$jumstock." where kode_makanan = ".$kode;
	mysqli_select_db($konek,$nmdb);
	$hasil=mysqli_query($konek,$sql);
	if ($hasil){
		echo "Stock telah ditambahkan <br/>";
	}else{
		echo "Gagal menambahkan stock <br/>";
	}
?>
	<a href="../halamanadmin.php">Home</a>
<?php
	include "../include/koneksi.php";
	$no = $_POST['no'];
	$sql = "update pesan set status_bayar = 'L' where no_pesan = ".$no;
	mysqli_select_db($konek,$nmdb);
	$hasil=mysqli_query($konek,$sql);
	if ($hasil){
		echo "Status Bayar : Lunas<br/>";
	}else{
		echo "Gagal... Status Bayar : Belum Lunas<br/>";
	}
?>
	<a href="../halamanadmin.php">Home</a>
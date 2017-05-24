<?php
session_start();
$max=count($_SESSION['keranjang']);
if (isset($_GET['hapus'])){
	$hapus = $_GET['hapus'];
	for($i=0;$i<$max;$i++){
		if($hapus==$_SESSION['keranjang'][$i]['productid']){
			unset($_SESSION['keranjang'][$i]);
			echo "Makanan Telah Dihapus Dari keranjang";
			break;
		}	
	}
	$_SESSION['keranjang']=array_values($_SESSION['keranjang']);
	header("location:../keranjang.php");
}
?>

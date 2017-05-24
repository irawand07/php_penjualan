<?php
	$kode = $_GET['kode'];
	$banyak = $_POST['banyak'];
	session_start();
	function addtokeranjang($kode,$banyak){
		if(isset($_SESSION['keranjang'])){
			$max=count($_SESSION['keranjang']);
			$_SESSION['keranjang'][$max]['productid']=$kode;
			$_SESSION['keranjang'][$max]['qty']=$banyak;
		}
		else{
			$_SESSION['keranjang']=array();
			$_SESSION['keranjang'][0]['productid']=$kode;
			$_SESSION['keranjang'][0]['qty']=$banyak;
		}
	}
	if(isset($kode) && $banyak>0){
		addtokeranjang($kode,$banyak);
		header("location:keranjang.php");
	}
?>
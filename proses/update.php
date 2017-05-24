<?php
session_start();
$max=count($_SESSION['keranjang']);
for($i=0;$i<$max;$i++){
			$kode=$_SESSION['keranjang'][$i]['productid'];
			$banyak=$_POST['makanan'.$kode];
			if($banyak>0 && $banyak<=99){
				$_SESSION['keranjang'][$i]['qty']=$banyak;
			}
		}
header("location:../keranjang.php");
?>
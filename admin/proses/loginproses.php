<?php
	include "../include/koneksi.php";
	session_start();
	$idadmin = $_POST['username'];
	$password = md5($_POST['password']);
	mysqli_select_db($konek,$nmdb);
	$sql = "select * from admin where
			idadmin ='".$idadmin."' and password ='".$password."' limit 1";
	$hasil = mysqli_query($konek,$sql) OR die('Gagal Akses <br/>');
	$jumlah = mysqli_num_rows($hasil);
	if($jumlah > 0){
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["idadmin"] = $row["idadmin"];
		$_SESSION["nama_admin"] = $row["nama_admin"];
		header("location: ../halamanadmin.php");
	}
	else{
		echo "User atau password salah <br/>";
		echo "<input type='button' value='kembali'
				onClick='self.history.back()'>";
	}
?>
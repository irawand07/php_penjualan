<?php
	include "../include/koneksi.php";
	session_start();
	$idanggota = $_POST['username'];
	$password = md5($_POST['password']);
	$datavalid="ya";
	if (strlen(trim($idanggota))==0){
		$datavalid="tidak";
	}
	if (strlen(trim($password))==0){
		$datavalid="tidak";
	}
	if ($datavalid=="tidak"){
		echo "Username atau password belum diisi<br/>";
		echo "<input type='button' value='kembali'
					onClick='self.history.back()'>";
		exit;
	}
	mysqli_select_db($konek,$nmdb);
	$sql = "select * from anggota where
			idanggota ='".$idanggota."' and password ='".$password."' limit 1";
	$hasil = mysqli_query($konek,$sql) OR die('Gagal Akses <br/>');
	$jumlah = mysqli_num_rows($hasil);
	if($jumlah > 0){
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["idanggota"] = $row["idanggota"];
		$_SESSION["nama_anggota"] = $row["nama_anggota"];
		header("location: ../index.php");
	}
	else{
		echo "User atau password salah <br/>";
		echo "<input type='button' value='kembali'
				onClick='self.history.back()'>";
	}
?>
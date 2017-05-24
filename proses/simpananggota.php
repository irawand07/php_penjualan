<?php
include "../include/koneksi.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$jl = $_POST['jl'];
$kota = $_POST['kota'];
$provinsi = $_POST['provinsi'];
$telp = $_POST['telp'];
$alamat = $jl.", ".$kota.", ".$provinsi;

mysqli_select_db($konek,$nmdb);
$sql = "select count(idanggota) as jumlah from anggota where idanggota = '{$username}' ";
$cekusername = mysqli_query($konek, $sql);
$hituser = mysqli_fetch_assoc($cekusername);
if($hituser['jumlah'] == 0){
	$sintak = "insert into anggota values('$username',md5('$password'),'$nama','$alamat','$telp','$email',default) ";
	$simpan = mysqli_query($konek, $sintak);
	if(!$simpan)
		die("Gagal menyimpan");
	else
		echo "Data telah disimpan <br/>";
}else{
	echo "Username sudah digunakan <br/>";
	echo "<input type='button' value='kembali'
				onClick='self.history.back()'>";
	exit;
}
?>
<a href="../index.php">Silahkan Login Disini</a>
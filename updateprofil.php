<?php
session_start();
$nama = $_SESSION['idanggota'];
$tmpname = $_FILES['foto']['tmp_name'];
$size = $_FILES['foto']['size'];
$type = $_FILES['foto']['type'];

$maxsize = 1500000;
$typeygboleh = array("image/jpeg","image/png","image/pjpeg");
$extensi = ".png";
for($i=0; $i<3; $i++){
	if ($typeygboleh[0]== $type)
		$extensi=str_replace("image/",".",$type);
}
$foto =$nama . $extensi;
$dirfoto = "dp";
if(!is_dir($dirfoto))
	mkdir($dirfoto);
$filetujuanfoto = $dirfoto."/".$foto;

$dirthumb = "thum";
if(!is_dir($dirthumb))
	mkdir($dirthumb);
$filetujuanthumb = $dirthumb."/t_".$foto;


if($size > 0){
	if($size > $maxsize){
		echo "Ukuran File Terlalu Besar <br/>";
		$datavalid = "Tidak";
	}
	if(!in_array($type, $typeygboleh)){
		echo "Type File Tidak Dikenal <br/>";
		$datavalid = "Tidak";
	}
}

if ($datavalid == "Tidak"){
	echo "Masih ada kesalahan, Silahkan perbaiki!<br/>";
	echo "<input type='button' value='kembali'
			onClick='self.history.back()'>";
	exit;
}

include "include/koneksi.php";
$sql = "update anggota set dp='$foto' where 
		idanggota = '".$_SESSION["idanggota"]."'";
mysqli_select_db($konek,$nmdb);
$hasil = mysqli_query($konek, $sql);

if (!$hasil){
	echo "Gagal simpan, silahkan diulang! <br/>";
	echo mysqli_error($konek);
	echo "<br/><input type='button' value='kembali'
	onClick='self.history.back()'>";
	exit;
}else{
	echo "Simpan data berhasil";
}
if($size > 0){
	if(!move_uploaded_file($tmpname,$filetujuanfoto)){
		echo "Gagal Upload Gambar... <br/>";
		echo "<a href='barang_tampil.php'>Daftar Barang</a>";
		exit;
	}else{
		buat_thumbnail($filetujuanfoto,$filetujuanthumb);
	}
}
function buat_thumbnail($file_src,$file_dst){
	list($w_src,$h_src,$type) = getImageSize($file_src);
	switch ($type){
		case 1 : //gif -> jpg
			$img_src = imagecreatefromgif($file_src);
			break;
		case 2 : //jpeg -> jpg
			$img_src = imagecreatefromjpeg($file_src);
			break;
		case 3 : //png -> jpg
			$img_src = imagecreatefrompng($file_src);
			break;
	}
	$thumb = 100; //max. size untuk thumb
	if($w_src > $h_src){
		$w_dst = $thumb; //landscape
		$h_dst = round($thumb / $w_src * $h_src);
	}else{
		$h_dst = round($thumb / $h_src * $w_src);
		$w_dst = $thumb; // protrait
	}
	$img_dst = imagecreatetruecolor($w_dst,$h_dst); // resample
	imagecopyresampled($img_dst, $img_src, 0,0,0,0,
			$w_dst, $h_dst, $w_src, $h_src);
	imagejpeg($img_dst, $file_dst);//Simpan thumbnail
	//Bersihkan memori
	imagedestroy($img_src);
	imagedestroy($img_dst);
}
header("location:ubahprofil.php");
?>

<?php
 $nama = $_POST['nama'];
 $jl = $_POST['jl'];
 $kota = $_POST['kota'];
 $provinsi = $_POST['provinsi'];
 $telp = $_POST['telp'];
 $alamat = $jl.", ".$kota.", ".$provinsi;
 $tanggal = date("Y-m-d");
 $barang_pilih = '';
 
 session_start();
	 $datavalid="Ya";
 if(isset($_SESSION['keranjang'])){
	 $max = count($_SESSION['keranjang']);
	 echo $max;
 }else{
	 echo "Keranjang belanja kosong<br/>";
	 $datavalid="Tidak";
 }
 if($datavalid=="Tidak"){
	 echo "Masih ada kesalahan<br/>";
	 echo "<input type='button' value='kembali'
			onClick='self.history.back()'>";
	 exit;
 }
 include "include/koneksi.php";
 $simpan= true;
 mysqli_select_db($konek,$nmdb);
 $mulai_transaksi = mysqli_begin_transaction($konek);
 
 $sql = "insert into pesan (idanggota,nama,telp,tgl_pesan,alamat_kirim,total_harga)
		values
		('{$_SESSION["idanggota"]}','$nama','$telp','$tanggal','$alamat',{$_SESSION['total']})";
 $hasil = mysqli_query($konek,$sql);
 if(!$hasil){
	 echo mysqli_error($konek);
	 echo "Data gagal simpan<br/>";
	 $simpan = false;
 }
 $nopesan = mysqli_insert_id($konek);
 if($nopesan==0){
	 echo "Data anggota tidak ada<br/>";
	 $simpan = false;
 }
 if($max<1){
	 echo "Tidak ada Makanan yang dipilih<br/>";
	 $simpan = false;
 }else{
	for($i=0;$i<$max;$i++){
		$kode=$_SESSION['keranjang'][$i]['productid'];
		$banyak=$_SESSION['keranjang'][$i]['qty'];
		$sql = "select * from makanan where kode_makanan = $kode";
		$hasil = mysqli_query($konek,$sql);
		if(!$hasil){
			echo "Makanan tidak ada <br/>";
			$simpan = false;
			break;
		}else{
			$row = mysqli_fetch_assoc($hasil);
			$stock = $row['stock'] - $banyak ;
			if($stock < 0){
				echo " Stock Makanan ".$row['nama_makanan']." kosong<br/>";
				$simpan = false;
				break;
			}
			$harga = $row['harga'];
		}
		$sql = "insert into detail_pesan 
				(kode_makanan,qty,harga,no_pesan)
				values
				('$kode',$banyak,$harga,$nopesan)";
		$hasil = mysqli_query($konek,$sql);
		if (!$hasil){
			echo mysqli_error($konek);
			echo "Detail pesan gagal simpan<br/>";
			$simpan = false;
			break;
		}
		$sql = "update makanan set stock = $stock
				where kode_makanan = $kode";
		$hasil = mysqli_query($konek,$sql);
		if(!$hasil){
			echo mysqli_error($konek);
			echo "Update stock barang gagal <br/>";
			$simpan = false;
			break;
		}
	 }
 }
 if($simpan){
	 $komit = mysqli_commit($konek);
 }else{
	 $rollback = mysqli_rollback($konek);
	 echo "Pembelian Gagal <br/>
				<a href='keranjang.php' />Kembali Ke Keranjang</a> ";
	 exit;
 }
 header("Location: bukti_beli.php");
?>
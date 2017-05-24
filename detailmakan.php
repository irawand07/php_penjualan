<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>Produk</title>
<script>
	function hitung(){
		var banyak = hit.banyak.value;
		if (banyak < 1 ){
			alert ("Minimal 1");
			hit.banyak.value = 1;
			banyak = 1;
		}
		if (banyak > 99 ){
			alert ("Maksimal 99");
			hit.banyak.value = 99;
			banyak = 99;
		}
		hit.total.value = parseInt(hit.harga.value) * parseInt(banyak);
	}
</script>
<?php
	include "header.php";
	include "include/koneksi.php"; 
?>
</head>

<body>
<div id="wrap">
	<?php 
		atas();
		menu_hori();
	?>
		<div id="isi" align="center">
		<?php
			$barang_pilih = 0;
			if (isset($_GET['kode'])){
				$kode = $_GET['kode'];
			}else{
				echo "Barang yang dipilih tidak tersedia";
				exit;
			}
			$sql = "select * from makanan where kode_makanan = $kode";
			mysqli_select_db($konek,$nmdb);
			$hasil = mysqli_query($konek, $sql);
			if (!$hasil)
				die ("Gagal melihat produk".mysqli_error($konek));
			$lihat=mysqli_fetch_assoc($hasil);
		?>
		  
			<form name="hit" action="tambahmakan.php?kode=<?php echo $kode; ?>" method="post">
			<table border="0" width="50%">
			<tr>
				<td align="center" colspan="2">
					<?php echo "<a href='admin/ftmakan/".$lihat['foto']."'>
					<img src='admin/thum/t_".$lihat['foto']. "' width='200px' height='200px'/></a>"; ?>
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>: <?php echo $lihat['nama_makanan']; ?></td>
			</tr>
			<tr>
				<td>Tersedia</td>
				<td>: <?php echo $lihat['stock']." pcs"; ?></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>: Rp. <input type="text" name="harga" value="<?php echo $lihat['harga']; ?>" disabled/></td>
			</tr>
			<tr>
				<td>Banyak</td>
				<td>: <input type="number" name="banyak" value="1" onChange="hitung()"/></td>
			</tr>
			<tr>
				<td>Total </td>
				<td>: Rp. <input type="text" name="total" value="<?php echo $lihat['harga']; ?>" disabled/></td>
			</tr>
			</table>
			
				<input type="submit" value="Tambah ke keranjang"/>
			</form>
		</div>
		<div id="kanan">
        	<?php
				session_start();
				if (isset($_SESSION["idanggota"]))
					userinfo();
				else
					login();
				tambahan();
			?>
        </div>
    <?php    
		footer()
	?>
</div>
</body>
</html>
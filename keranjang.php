<?php
	session_start();
	include "header.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Keranjang</title>

</head>

<body>
<div id="wrap">
	<?php 
		atas();
		menu_hori();
	?>
	<div id="isi" align="center"> 
		<h3>Keranjang Belanja</h3>
<?php
		$max=0;
		if (isset($_SESSION['keranjang'])){
			$max=count($_SESSION['keranjang']);
			if ($max>=1){ 
				echo "Banyak item = ".$max."<br/>";
				$makanpilih = 0;
				for($i=0;$i<$max;$i++){
					$kode=$_SESSION['keranjang'][$i]['productid'];
					$makanpilih = $makanpilih.",".$kode;
				}
?>
		<form action="proses/update.php" method="post"> 
			<table border="0" width="75%">
				<tr align="left" bgcolor="orange">
					<th >No</th>
					<th>Nama</th>
					<th>Harga</th>
					<th>Banyak</th>
					<th>Subtotal</th>
					<th>Pilihan</th>
				</tr>
<?php
				include "include/koneksi.php";
				$sql = "select * from makanan where kode_makanan in (".$makanpilih.")
						order by kode_makanan desc ";
				mysqli_select_db($konek,$nmdb);
				$hasil=mysqli_query($konek,$sql);
				$no=0;
				$banyak =0;
				$total = 0;
				while($lihat = mysqli_fetch_assoc($hasil)){
					echo "<tr>";
					echo "  <td>".($no+1)."</td>";
					echo "  <td>".$lihat['nama_makanan']."</td>";
					echo "  <td>Rp. ".$lihat['harga']."</td>";
					$banyak = $_SESSION['keranjang'][$no]['qty'];
					$subtotal = $lihat['harga'] * $banyak;
					$total = $total + $subtotal;
					echo "  <td><input type='text' name='makanan".$lihat['kode_makanan']."' value='".$banyak."' maxlength='2' size='2'/> ";
					echo "	    Pcs</td>";
					echo "  <td>Rp. ".$subtotal."</td>";
					echo "  <td> <a href='proses/hapus.php?hapus=".$lihat['kode_makanan']."' >Hapus</a></td>";
					echo "</tr>";
					$no++;
				}
				$_SESSION['total']=$total;
				?>
				<tr align="left" bgcolor="orange">
					<td align="right" colspan="4">Total : </td>
					<td>Rp. <?php echo $_SESSION['total']; ?></td>
					<td></td>
				</tr>
			</table>
			<input type="submit" value="Update Keranjang"/> &nbsp; &nbsp;
			<a href="produk.php"/>Lanjutkan Belanja</a> &nbsp; &nbsp;
			<a href="beli.php"/>Pesan Sekarang</a>
		</form>
<?php 
			}else
			echo "Keranjang Kosong";
		}else
			echo "Keranjang Kosong";
		
	?>
	</div>
	<div id="kanan">
        	<?php
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
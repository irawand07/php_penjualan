<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
<?php
	include "header.php";
	session_start();
?>
</head>

<body>
<div id="wrap">
	<?php 
		atas();
		menu_hori();
	?>
	<div id="isi">
		<?php
		include "include/koneksi.php";
		echo "Pembelian berhasil <br/>";
		echo "Silahkan Transfer ke rekening sesuai dengan total bayar<br/>";
		echo "Jangan lupa konfirmasi melalui sms ke no=0856969696969 <br/>";
		echo "Dengan Format : #no_pesan #bank #norekening #totaltransfer<br/>";
		echo "Contoh :<br/> #69 #bca #05352628 #69000<br/>";
		echo "Agar Pesanan Anda Segera Dikirim";
		 unset($_SESSION['keranjang']);
		 unset($_SESSION['total']);
		 
		 mysqli_select_db($konek,$nmdb);
		 $sql = "select * from pesan where idanggota='{$_SESSION['idanggota']}'
					order by tgl_pesan desc ,no_pesan desc limit 1";
		$hasil = mysqli_query($konek,$sql);
		$row = mysqli_fetch_assoc($hasil);	

		?>
		<h2>Bukti Pembelian</h2>
		<table border="0" width="60%">
			<tr>
				<td>No pesan</td>
				<td>: <?php echo $row['no_pesan']; ?> </td>
			</tr>
			<tr>
				<td>Tanggal </td>
				<td>: <?php echo $row['tgl_pesan']; ?> </td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>: <?php echo $row['nama']; ?> </td>
			</tr>
			<tr>
				<td>Alamat Pengiriman</td>
				<td>: <?php echo $row['alamat_kirim']; ?> </td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td>: <?php echo $row['telp']; ?> </td>
			</tr>
			<tr>
				<td>Status Pembayaran</td>
				<td>: 
				<?php
					if ($row['status_bayar']=="L")
						echo "Lunas";
					else
						echo "Belum Lunas"; 
				?> </td>
			</tr>
		</table>
		<table border="1" width="70%">
			<tr>
				<th>No</th>
				<th>Nama Makanan</th>
				<th>Harga</th>
				<th>Banyak</th>
				<th>Subtotal</th>
			</tr>
		<?php
		$sqlmakanan =" select makanan.nama_makanan, detail_pesan.harga, detail_pesan.qty,
									(detail_pesan.harga * detail_pesan.qty) as subtotal
									from detail_pesan inner join makanan
									on detail_pesan.kode_makanan = makanan.kode_makanan
									where detail_pesan.no_pesan = {$row['no_pesan'] }";
		$hasilmakanan = mysqli_query($konek,$sqlmakanan);
		$no=1;
		$total=0;
		while ($rowmakanan = mysqli_fetch_assoc($hasilmakanan)){
			echo "<tr>";
			echo  " <td>".($no)."</td>";
			echo "  <td>".$rowmakanan['nama_makanan']."</td>";
			echo "  <td>Rp.".$rowmakanan['harga']."</td>";
			echo "  <td>".$rowmakanan['qty']." pcs</td>";
			echo "  <td>Rp. ".$rowmakanan['subtotal']."</td>";
			echo "</tr>";
			$no++;
			$total= $total + $rowmakanan['subtotal'];
		}
		?>
		<tr>
				<td align="right" colspan="4">Total Bayar :</td>
				<td>Rp. <?php echo $total; ?> </td>
		</table><br/>
		<input type="button" value="Cetak" onClick="window.print()">&nbsp; &nbsp;
		<input type="button" value="Belanja Lagi" onClick="window.location.assign('produk.php')">
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




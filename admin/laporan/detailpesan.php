<?php
	include "../include/koneksi.php";
	session_start();
	if (!isset($_SESSION["idadmin"])){
		belumlogin();
		exit;
	}
	$no_pesan = $_GET['no_pesan'];
	mysqli_select_db($konek,$nmdb);
	
		 $sql = "select * from pesan where no_pesan= $no_pesan
					order by tgl_pesan desc ,no_pesan desc limit 1";
		$hasil = mysqli_query($konek,$sql);
		$row = mysqli_fetch_assoc($hasil);	
		?>
		<h2>Detail Pesanan</h2>
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
									where detail_pesan.no_pesan = {$no_pesan}";
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
		<input type="button" value="Cetak" onClick="window.print()">
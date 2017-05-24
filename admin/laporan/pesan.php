<?php
	include "../include/koneksi.php";
	session_start();
	if (!isset($_SESSION["idadmin"])){
		belumlogin();
		exit;
	} 
	$status = $_GET['status'];
	if($status=="lunas"){
		$sql = "select * from pesan where status_bayar = 'L' 
					order by tgl_pesan";
	}
	if($status=="belum"){
		$sql = "select * from pesan where status_bayar = 'B' 
					order by tgl_pesan";
	}
?>
<h2>Data Pesanan</h2>
<table border="1" width="70%">
	<tr>
		<th>No pesan</th>
		<th>Idanggota</th>
		<th>Nama</th>
		<th>Alamat Kirim</th>
		<th>Tanggal pesan</th>
		<th>Total harga</th>
		<th>Status bayar</th>
		<th></th>
	</tr>
<?php
	mysqli_select_db($konek,$nmdb);
	$hasil=mysqli_query($konek,$sql);
	while($data=mysqli_fetch_assoc($hasil)){
		echo "<tr>";
		echo "   <td>".$data['no_pesan']."</td>";
		echo "   <td>".$data['idanggota']."</td>";
		echo "   <td>".$data['nama']."</td>";
		echo "   <td>".$data['alamat_kirim']."</td>";
		echo "   <td>".$data['tgl_pesan']."</td>";
		echo "   <td>".$data['total_harga']."</td>";
		echo "   <td>".$data['status_bayar']."</td>";
		echo "   <td><a href='detailpesan.php?no_pesan=".$data['no_pesan']."'>Detail</a></td>";
		echo "</tr>";
	}
?>
</table>
<input type="button" value="Cetak" onClick="window.print()">
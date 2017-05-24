<?php
	include "../include/koneksi.php";
	session_start();
	if (!isset($_SESSION["idadmin"])){
		belumlogin();
		exit;
	} 
	
?>
<h2>Data Makanan</h2>
<table border="1" width="40%">
	<tr>
		<th>Kode_makanan</th>
		<th>Nama</th>
		<th>Harga</th>
		<th>Stock</th>
	</tr>
<?php
	$sql = "select * from makanan order by kode_makanan";
	mysqli_select_db($konek,$nmdb);
	$hasil=mysqli_query($konek,$sql);
	while($data=mysqli_fetch_assoc($hasil)){
		echo "<tr>";
		echo "   <td>".$data['kode_makanan']."</td>";
		echo "   <td>".$data['nama_makanan']."</td>";
		echo "   <td>".$data['harga']."</td>";
		echo "   <td>".$data['stock']."</td>";
		echo "</tr>";
	}
?>
</table>
<input type="button" value="Cetak" onClick="window.print()">
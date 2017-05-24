<?php
	include "../include/koneksi.php";
	session_start();
	if (!isset($_SESSION["idadmin"])){
		belumlogin();
		exit;
	} 
	
?>
<h2>Data Anggota</h2>
<table border="1" width="40%">
	<tr>
		<th>Idanggota</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Telepon</th>
		<th>Email</th>
	</tr>
<?php
	$sql = "select * from anggota order by idanggota";
	mysqli_select_db($konek,$nmdb);
	$hasil=mysqli_query($konek,$sql);
	while($data=mysqli_fetch_assoc($hasil)){
		echo "<tr>";
		echo "   <td>".$data['idanggota']."</td>";
		echo "   <td>".$data['nama_anggota']."</td>";
		echo "   <td>".$data['alamat_anggota']."</td>";
		echo "   <td>".$data['no_telepon']."</td>";
		echo "   <td>".$data['email']."</td>";
		echo "</tr>";
	}
?>
</table>
<input type="button" value="Cetak" onClick="window.print()">

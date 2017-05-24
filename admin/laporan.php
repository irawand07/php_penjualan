
<?php
include "include/koneksi.php";
include "header.php";
?>
<div id="wrap">
	<?php
	atas();
	menu_hori();
	session_start();
	if (!isset($_SESSION["idadmin"])){
		belumlogin();
		exit;
	} 
	?>
	<div id="isi" align="center">
	<br/><br/><br/>
		<div id="sub">
			<ul>
				<li><a href="laporan/anggota.php" target="_blank">Daftar Anggota</a></li>
				<li><a href="laporan/makanan.php" target="_blank">Daftar Makanan</a></li>
				<li><a href="laporan/pesan.php?status=lunas" target="_blank">Pesanan Terkonfirmasi (Lunas)</a></li>
				<li><a href="laporan/pesan.php?status=belum" target="_blank">Pesanan Belum Terkonfirmasi (belum Lunas)</a></li>
			</ul>
		</div>
	</div>
    <div id="footer" align="center">
		<br/><b>
    	Admin : <?php echo "".$_SESSION["nama_admin"].""; ?> | </b>
		<a href="proses/proseslogout.php">Logout</a>
    </div>
</div>

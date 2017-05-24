
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
		<h2>Tambah Stock Makanan</h2>
		<form action="tambahstock.php" method="post">
		Kode Makanan : 
		<input type="text" name="kode"> <br/><br/>
		<input type="submit" value="Cari"/>
		</form>
	</div>
    <div id="footer" align="center">
		<br/><b>
    	Admin : <?php echo "".$_SESSION["nama_admin"].""; ?> | </b>
		<a href="proses/proseslogout.php">Logout</a>
    </div>
</div>

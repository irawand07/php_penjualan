
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
			<h2>Konfirmasi Pembayaran</h2>
			<form action="ubahstatus.php" method="post">
			No pesan : 
			<input type="text" name="no"> <br/><br/>
			<input type="submit" value="Cari" name="cari"/>
			</form>
	</div>
    <div id="footer" align="center">
		<br/><b>
    	Admin : <?php echo "".$_SESSION["nama_admin"].""; ?> | </b>
		<a href="proses/proseslogout.php">Logout</a>
    </div>
</div>

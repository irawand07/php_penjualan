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
		<div id="isi"  align="center" >
		<br/><br/><br/>
			<table border="0" align="center">
				<tr >
					<td> Selamat Datang</td> 
				</tr>
				<tr>
					<td><?php 
					echo "".$_SESSION["nama_admin"].""; ?>  <br/>&nbsp;</td> 
				</tr>
			</table>
		</div>
    <div id="footer" align="center">
		<br/><b>
    	Admin : <?php echo "".$_SESSION["nama_admin"].""; ?> | </b>
		<a href="proses/proseslogout.php">Logout</a>
    </div>
</div>
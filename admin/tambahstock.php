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
	} ?>
	
<div id="isi" align="center">
	<?php
		if(isset($_POST['kode']) && !empty($_POST['kode']) ){
			$kode = $_POST['kode'];
			$sql = "select * from makanan where kode_makanan = "
					.$kode. " limit 1";
			mysqli_select_db($konek,$nmdb);
			$hasil=mysqli_query($konek,$sql);
			$baris = mysqli_num_rows($hasil);
			if($baris==0){ ?>
				Data Tidak Ditemukan <br/>
				</div>
				<div id="footer" align="center">
					<br/><b>
					Admin : <?php echo "".$_SESSION["nama_admin"].""; ?> | </b>
					<a href="proses/proseslogout.php">Logout</a>
				</div>
			<?php
				exit;
			}
			$data= mysqli_fetch_assoc($hasil);
		?>
			<h2>Tambah Stock</h2>
			<form action="proses/tambahstock.php" method="post">
			<input type="hidden" name="stock" value="<?php echo $data['stock'] ?>"/>
			<input type="hidden" name="kode" value="<?php echo $data['kode_makanan'] ?>"/>
			<table border="1" width="50%">
				<tr>
					<td>Kode Makanan</td>
					<td>: <?php echo $data['kode_makanan'] ?></td>
				</tr>
				<tr>
					<td>Nama Makanan</td>
					<td>: <?php echo $data['nama_makanan'] ?></td>
				</tr>
				<tr>
					<td>Stock Makanan</td>
					<td>: <?php echo $data['stock'] ?></td>
				</tr>
				<tr>
					<td>Tambahan Stock</td>
					<td>: <input type="text" name="tambahstock" /></td>
				</tr>
				<tr align="center">
					<td colspan="2"><input type="submit" value="Simpan"/>
											<input type="reset" value="Batal"/>
					</td>
				</tr>
			</table>
			</form>
	<?php
		}else{
			echo "Data Tidak Ditemukan <br/>";
		}
		?>
	</div>
    <div id="footer" align="center">
		<br/><b>
    	Admin : <?php echo "".$_SESSION["nama_admin"].""; ?> | </b>
		<a href="proses/proseslogout.php">Logout</a>
    </div>
</div>
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
	
		if(isset($_POST['no']) && !empty($_POST['no']) ){
			$no = $_POST['no'];
			$sql = "select * from pesan where no_pesan = "
					.$no. " limit 1";
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
			if($data['status_bayar']=="B"){
				$status = "Belum Lunas";
			}else{
				$status ="Lunas";
			}
		?>

		<h2>Ubah status pembayaran</h2>
			<form action="proses/setlunas.php" method="post" >
			<input type="hidden" name="no" value="<?php echo $data['no_pesan'] ?>"/>
			<table border="1" width="50%">
				<tr>
					<td>No Pesan</td>
					<td>: <?php echo $data['no_pesan'] ?></td>
				</tr>
				<tr>
					<td>Nama Pemesan</td>
					<td>: <?php echo $data['nama'] ?></td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>: <?php echo $data['telp'] ?></td>
				</tr>
				<tr>
					<td>Total Bayar</td>
					<td>: <?php echo $data['total_harga'] ?></td>
				</tr>
				<tr>
					<td>Status Bayar</td>
					<td>: <?php echo $status ?></td>
				</tr>
				<tr>
					<td colspan="2" align="center" cellpadding="2" ><input type="submit" value="Set Lunas"/>
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
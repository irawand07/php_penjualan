<?php
	session_start();
	include "header.php";
	include "include/koneksi.php"; 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Produk</title>
</head>

<body>
<div id="wrap">
	<?php 
		atas();
		menu_hori();
	?>
		<div id="isi">
		<?php
			$makanpilih = 0;
			if (isset($_SESSION['keranjang'])){
				$max=count($_SESSION['keranjang']);
				for($i=0;$i<$max;$i++){
					$kode=$_SESSION['keranjang'][$i]['productid'];
					$makanpilih = $makanpilih.",".$kode;
			}
			}
			$sql = "select * from makanan where kode_makanan 
					not in (".$makanpilih.") and stock > 0
					order by kode_makanan desc";
			mysqli_select_db($konek,$nmdb);
			$hasil = mysqli_query($konek, $sql);
			if (!$hasil)
				die ("Gagal melihat produk".mysqli_error($konek));
		?>
			<table border="0" width="100%" >
			<tr align='center'>
    	<?php
			$no = 1;
			while ($row=mysqli_fetch_assoc($hasil)){
				echo "  <td style='padding:23px 0px'>";
				echo "<label class='judul'>".$row['nama_makanan']."</label><br/>";
				echo "<img src='admin/thum/t_".$row['foto']. "'width='100px' height='100px'/><br/>";
				echo "Rp.".$row['harga']." ,-<br/>";
				echo "Tersedia : ".$row['stock']." pcs<br/>";
				echo "<a href='detailmakan.php?kode=".
						$row['kode_makanan']."' class='detail'>Detail</a>";
				echo "</td>";
				if($no==4){
					echo "</tr><tr align='center'>";
					$no=0;
				}
				$no++;
			}
		?>	
			</tr>
			</table>
		</div>
		<div id="kanan">
        	<?php
				if (isset($_SESSION["idanggota"]))
					userinfo();
				else
					login();
				tambahan();
			?>
        </div>
    <?php    
		footer()
	?>
</div>
</body>
</html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ubah profil</title>
<?php
	include "header.php"
?>
</head>

<body>
<div id="wrap">
	<?php 
		atas();
		menu_hori();
	?>
    <div id="isi" align="center">
	<form action="updateprofil.php" method="post" enctype="multipart/form-data">
        <table border="0">
          <tr>
              <th align="left" colspan="2">Profil Anda</th>
          </tr>
            <?php
			include "include/koneksi.php"; 
			session_start();
            $sql = "select * from anggota where idanggota = '".$_SESSION["idanggota"]."'";
			mysqli_select_db($konek,$nmdb);
			$hasil = mysqli_query($konek, $sql);
			if (!$hasil)
				die ("Gagal melihat profil".mysqli_error($konek));
			$lihat = mysqli_fetch_assoc($hasil);
			?>
            <tr>
              <td><a href="<?php echo "dp/".$lihat['dp'] ?>">
			  <img src='<?php echo "thum/t_".$lihat['dp'] ?>' width="100px" height="100px"/></a></td>
              <td valign="top">Ubah Foto <br/>
              <input type="file" name="foto"><br/>
              <input type="submit" value="Simpan">
              </td>
            </tr>
            <tr>
          	  <td>Username </td>
              <td>: <?php echo $lihat['idanggota'] ?></td>
            </tr>
            <tr>
          	  <td>Nama Lengkap </td>
              <td>: <?php echo $lihat['nama_anggota'] ?></td>
            </tr>
            <tr>
          	  <td>Alamat </td>
              <td>: <?php echo $lihat['alamat_anggota'] ?></td>
            </tr>
            <tr>
          	  <td>Telepon </td>
              <td>: <?php echo $lihat['no_telepon'] ?></td>
            </tr>
            <tr>
          	  <td>Email </td>
              <td>: <?php echo $lihat['email'] ?></td>
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

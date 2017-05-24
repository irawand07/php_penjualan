<head>
	<link rel="stylesheet" href="css/utama.css"/>
	<link rel="stylesheet" href="css/form.css">
	<script language="JavaScript" type="text/javascript" src="validasi/validasiform.js"></script>

</head>
<?php function atas(){ ?>
	<div id="header">
		<br/>
    	<img src="image/judul.png" /><br/>
		<p align="right" style="font-size:14px;color:white;"><b>Toko Abon terlengkap dan terpercaya &nbsp; </b> </p>
    </div>
<?php } ?>
	
<?php function menu_hori(){ ?>
	<div id="menu_hori">
    	<ul>
        	<li><a href="index.php">Home</a></li>
            <li><a href="produk.php">Produk</a></li>
            <li><a href="keranjang.php">Keranjang</a></li>
            <li><a href="carabeli.php">Cara pembelian</a></li>
            <li><a href="tentang.php">Tentang Toko</a></li>
        </ul>
    </div>
<?php } ?>


<?php function login(){ ?>
    	<div id="login" align="center">
          <table border="0">          
    	  	<tr>
            <td style="font-size:22px">Silahkan Login<hr/></td>
            </tr>
            <tr>
            <td><form name="login" action="proses/loginproses.php" method="post" >
              		Username :<br/>
            		<input type="text" name="username" onBlur="return ">
              		<br/>Password :<br/>
              		<input type="password" name="password" onBlur="return ">
              		<br/><br/>
              		<input type="submit" value="Login">
              </form>
          	  Belum Terdaftar ? <a href="daftar.php">Sign Up</a>
          </td></tr>
          </table></div>
<?php } ?>

<?php function userinfo(){ 
	include "include/koneksi.php"; 
    $sql = "select dp from anggota where idanggota = '".$_SESSION["idanggota"]."'";
	mysqli_select_db($konek,$nmdb);
	$hasil = mysqli_query($konek, $sql);
	$lihat = mysqli_fetch_assoc($hasil);
	?>
	<div id="userinfo" align="center">
	<table border="0">
    	<tr>
        	<td><a href="<?php echo 'dp/'.$lihat['dp'] ?>">
			<img src="<?php echo 'thum/t_'.$lihat['dp'] ?>" width="100px" height="100px" /></a></td>
        </tr>
        <tr>
        	<td> Selamat Datang</td> 
		</tr>
        <tr>
        	<td><?php 
			echo "".$_SESSION["nama_anggota"].""; ?>  <br/>&nbsp;</td> 
        </tr>
        <tr>
        	<td><a href="ubahprofil.php">Profil</a> | <a href="proses/proseslogout.php">Logout</a></td> 
        </tr>
    </table>
    </div>
<?php } ?>

<?php function tambahan(){ ?>
	<div id="tambahan">
		<table border="0" width="100%" >
		<tr align="center">
			<th colspan="2"><h3>No Rekening</h3></th>
		</tr>
		<tr bgcolor="white">
			<td align="center"><img src="image/bca.jpg" width="80px"/></td>
			<td>4534446455</td>
		</tr>
		<tr bgcolor="white">
			<td align="center"><img src="image/bri.png" width="80px"/></td>
			<td>6754443435</td>
		</tr>
		<tr bgcolor="white">
			<td align="center"><img src="image/bni.png" width="80px"/></td>
			<td>3554997555</td>
		</tr>
		<tr bgcolor="white">
			<td align="center"><img src="image/mandiri.png" width="80px"/></td>
			<td>2443323242</td>
		</tr>
		<tr bgcolor="white" align="center">
			<td colspan="2">Atas Nama </td>
		</tr>
		<tr bgcolor="white">
			<td colspan="2" align="center"><b>PT. SUKA ABON SEJAHTERA</b></td>
		</tr>
		
		</table>
	</div>
<?php } ?>

<?php function footer(){ ?>
    <div id="footer" align="center">
		<br/>
    	<b>&copy; 2015 Subon - PT Suka Abon Sejahtera</b>
    </div>
<?php } ?>

<?php function daftar(){ ?>
	<div id="isi" >
    	<table border="0">
          <tr><td style="font-size:22px">Mohon Lengkapi Data Berikut<hr/></td>
          </tr><tr><td>
            <form name="daftar" action="proses/simpananggota.php" method="post" onSubmit="return validasidaftar();">
              Nama Lengkap :<br/>
              <input type="text" name="nama" onBlur="return dfok()" ><span id="nama" class="hijau"></span><br/>
              Email :<br/>
              <input type="email" name="email"onBlur="return dfok()" ><span id="email" class="hijau"></span><br/>
              Username :<br/>
              <input type="text" name="username" onBlur="return dfok()"><span id="username" class="hijau"></span><br/>
              Password :<br/>
              <input type="password" name="password" onBlur="return dfok()"><span id="password" class="hijau"></span><br/>
              <fieldset>
                <legend>Alamat </legend>
              Jalan :<br/>
              <input type="text" name="jl" onBlur="return dfok()"><span id="jl" class="hijau"></span>
              <br/>
              kota :<br/>
              <input type="text" name="kota" onBlur="return dfok()"><span id="kota" class="hijau"></span>
              <br/>
              Provinsi :<br/>
          	  <select name="provinsi">
                <option value="Yogyakarta">Yogyakarta</option>
                <option value="Jawa Barat">Jawa Barat</option>
                <option value="Jawa Tengah">Jawa Tengah</option>
                <option value="Jawa Timur">Jawa Timur</option>
              </select>
              </fieldset>
              Telepon/HP :<br/>
              <input type="text" name="telp" onBlur="return dfok()" maxlength="13"><span id="telp" class="hijau"></span>
              <br/><br/>
              <input type="checkbox" name="setuju" value="setuju" >
              Saya setuju <br/><br/>
              <input type="submit" value="Daftar">
              <input type="reset" value="Batal">
            </form>
         </td></tr>
         </table>
    </div>
<?php } ?>





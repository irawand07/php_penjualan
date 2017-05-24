<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
	<link rel="stylesheet" href="css/login.css"/>
	<link rel="stylesheet" href="css/form.css">
<?php
	session_start(); 
?>
</head>
<div id="wrap">
	<div id="isi" align="center" >
	<?php
	if (isset($_SESSION["idadmin"])){ 
		header("location:halamanadmin.php");
	} 
	else{ ?>
    	<div id="login" align="center">
		  <table border="0">   
			
			<tr>
				<td style="font-size:22px">Login Admin</td>
				
			</tr>
				<td style="font-size:16px">SUKA ABON<hr/></td>
			<tr>
				<td><form name="login" action="proses/loginproses.php" method="post" >
						Username :<br/>
						<input type="text" name="username" onBlur="return ">
						<br/>Password :<br/>
						<input type="password" name="password" onBlur="return ">
						<br/><br/>
						<input type="submit" value="Login">
					  </form>
					  </td></tr>
			</table></div>
		<?php	}
	?>
	</div>
</div>
</body>
</html>

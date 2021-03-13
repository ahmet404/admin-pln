<?php
require "kdb.php";
session_start();
if(isset($_SESSION['user'])){
	header('location:user/home.php');
}
if(isset($_POST['user']) && isset($_POST['pass'])){
$user=$_POST["user"];
$pass=$_POST["pass"];
$res=$kdb->query("SELECT * FROM pelanggan WHERE username='$user' AND password='$pass'");
$row = $res->fetch_assoc();
	if($res->num_rows > 0){
		$_SESSION['user']=$row['nama_pelanggan'];
		$_SESSION['id'] = $row['id_pelanggan'];
		header("location:user/home.php");
	} else {
		header('location:login.php?error');
	}
}
?>
<html>
	<head>
		<title>AKP PLN INDONESIA</title>
		<link rel="stylesheet" type="text/css" href="admin/css/style.css">
	</head>
	<body>
		<div id="login">
		  <h3>LOGIN AKP PLN</h3>
			<form method="POST">
			<table width="100%">
				<tr>
					<?php 
					if(isset($_GET['error'])){
						$display = "block";
						$pemberitahuan = "Username atau Password salah";
					}elseif(isset($_GET['msg'])){
						$display = "block";
						$pemberitahuan = "Anda harus login dulu!";
					}else if(isset($_GET['success'])){
						$display = "block";
						$pemberitahuan = "Registrasi berhasil!";
					}else{
						$display = "none";
						$pemberitahuan = "";
					}
					?>
						<td><div class="info" style="display:<?php echo $display;?>"><?php echo $pemberitahuan;?></div></td>
				</tr>
				<tr>
					<td><input type="text" name="user" placeholder="Username" required/></td>
				</tr>
				<tr>
					<td><input type="password" name="pass" placeholder="Password" required/></td>
				</tr>
				<tr>
					<td><input type="submit" value="Masuk"></td>
				</tr>
			</table>
			</form>
		</div>
	</body>
</html>
<?php
require('../kdb.php');
session_start();
if(!isset($_SESSION['user'])){
	header('location:../login.php?msg');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin - Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../admin/css/style.css">
</head>
<body>
<div class="container">
<header>
	<h2><span style="color:#333;">AKP</span> PLN</h2>
	<h3><?php echo $_SESSION['user']. ' '. $_SESSION['id'];?></h3>
		<ul>
			<p>MAIN NAVIGATION</p>
			<li><a href="home.php">Home</a></li>
			<li><a href="home.php?hal=tagihan">Tagihan</a></li>
			<li><a onclick="return confirm('Apakah anda yakin ingin keluar?');" href="logout.php">Logout</a></li> 
		</ul> 
</header>
<content>
	<div class="garis"></div>
	<?php 
			if(@$_GET["hal"] == "tagihan"){
				if(@$_GET["aksi"]=="bayar"){
					require_once "pembayaran.php";
				}else{
					require_once "tagihan.php";
				}
			}else{
				require "welcome.php";
			}
		?>
</content>
</div>
</body>
</html>
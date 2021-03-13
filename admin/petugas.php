<?php
require('../kdb.php');
session_start();
if(!isset($_SESSION['level2'])){
	header('location:../index.php?msg');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin - Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
<header>
	<h2><span style="color:#333;">AKP</span> PLN</h2>
	<h3><?php echo $_SESSION['nama2']. ' - '. $_SESSION['level2']; ?></h3>
		<ul>
			<p>MAIN NAVIGATION</p>
			<li><a href="petugas.php">Home</a></li>
			<li><a href="petugas.php?hal=tagihan">Tagihan</a></li>
			<li><a href="petugas.php?hal=history">History</a></li>
			<li><a onclick="return confirm('Apakah anda yakin ingin keluar?');" href="logout.php">Logout</a></li> 
		</ul> 
</header>
<content>
	<div class="garis"></div>
	<?php 
		if(isset($_GET["hal"])){
			if($_GET["hal"] == "tagihan"){
				if(@$_GET["aksi"]=="bayar"){
					require_once "pembayaran.php";
				} else if(@$_GET['aksi'] == "delete"){
					require_once "tagihan_delete.php";
				}else{
					require_once "tagihan.php";
				}
			}else if($_GET["hal"] == "history"){
				if(@$_GET["aksi"]=="delete"){
					require_once "history_delete.php";
				} else{
					require_once "history.php";
				}
			}else{
				require "welcome_bank.php";
			}
		} else{
				require "welcome_bank.php";
			}
		?>
</content>
</div>
</body>
</html>
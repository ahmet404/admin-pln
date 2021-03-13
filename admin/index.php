<?php
require('../kdb.php');
session_start();
if(!isset($_SESSION['level1'])){
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
	<h3><?php echo $_SESSION['nama1']. ' - '. $_SESSION['level1']; ?></h3>
		<ul>
			<p>MAIN NAVIGATION</p>
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="index.php?hal=user">Petugas</a></li>
			<li><a href="index.php?hal=pelanggan">Pelanggan</a></li>
			<li><a href="index.php?hal=tarif">Tarif</a></li>
			<li><a href="index.php?hal=penggunaan">Penggunaan</a></li>
			<li><a href="index.php?hal=tagihan">Tagihan</a></li>
			<li><a href="index.php?hal=history">History</a></li>
			<li><a onclick="return confirm('Apakah anda yakin ingin keluar?');" href="logout.php">Logout</a></li> 
		</ul> 
</header>
<content>
	<div class="garis"></div>
	<?php 
		if(isset($_GET["hal"])){
			if($_GET['hal'] == "pelanggan"){
				if(@$_GET["aksi"]=="input"){
					require_once "pelanggan_input.php";
				}else if(@$_GET["aksi"]=="edit"){
					require_once "pelanggan_edit.php";
				}else if(@$_GET["aksi"]=="delete"){
					require_once "pelanggan_delete.php";
				}else{
					require_once "pelanggan.php";
				}
			}else if($_GET["hal"] == "tarif"){
				if(@$_GET["aksi"]=="input"){
					require_once "tarif_input.php";
				}else if(@$_GET["aksi"]=="edit"){
					require_once "tarif_edit.php";
				}else if(@$_GET["aksi"]=="delete"){
					require_once "tarif_delete.php";
				}else{
					require_once "tarif.php";
				}
			}else if($_GET["hal"] == "penggunaan"){
				if(@$_GET["aksi"]=="input"){
					require_once "penggunaan_input.php";
				}else if(@$_GET["aksi"]=="delete"){
					require_once "penggunaan_delete.php";
				}else{
					require "penggunaan.php";
				}
			}else if($_GET["hal"] == "tagihan"){
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
			}else if($_GET["hal"] == "user"){	
				if ($_SESSION['level1']=='admin'){
					if(@$_GET["aksi"]=="input"){
						require_once "user_input.php";
					}else if(@$_GET["aksi"]=="edit"){
						require_once "user_edit.php";
					}else if(@$_GET["aksi"] == "delete"){
						require_once "user_delete.php";	
					}else{
						require_once "user.php";
					}
				}else{
					require "welcome.php";
				}
			}else{
				require "welcome.php";
			}
		} else{
				require "welcome.php";
			}
		?>
</content>
</div>
</body>
</html>
<?php
require_once "kdb.php";
session_start();
if(isset($_SESSION['user'])){
	header('location:user/home.php');
}
$str = ('12345678901234567890');
$str = substr($str, 0, 12);
$str = str_shuffle($str);
?>
<html>
	<head>
		<title>AKP PLN INDONESIA</title>
		<link rel="stylesheet" type="text/css" href="admin/css/style.css">
	</head>
	<body>
		<div id="login">
		  <h3>REGISTRASI AKUN AKP PLN</h3>
			<form method="POST">
			<table width="100%">
				<tr>
					<?php 
					if(isset($_GET['error'])){
						$display = "block";
						$pemberitahuan = "Registrasi gagal!";
					}else{
						$display = "none";
						$pemberitahuan = "";
					}
					?>
						<td><div class="info" style="display:<?php echo $display;?>"><?php echo $pemberitahuan;?></div></td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value="<?php echo $str;?>"></td>
				</tr>
				<tr>
					<td><input type="text" name="nama" placeholder="Nama Lengkap" required/></td>
				</tr>
				<tr>
					<td><input type="text" name="user" placeholder="Username" required/></td>
				</tr>
				<tr>
					<td><input type="password" name="pass" placeholder="Password" required/></td>
				</tr>
				<tr>
					<td><input type="text" name="alamat" placeholder="Alamat" required/></td>
				</tr>
				<tr>
					<td><input type="number" name="nomor" placeholder="No. Kwh" required/></td>
				</tr>
				<tr>
					<td>
						<select name="tarif" class="input-field">
					<option selected>Tarif</option>
					<?php 
					$q = $kdb->query("SELECT * FROM tarif");
					while($data = $q->fetch_assoc()){
					?>
					<option value="<?php echo $data['id_tarif']; ?>"><?php echo $data['kode']; ?></option>
				<?php }?>
				</select>
				<p style="color:#444;font-size:11px;">R1 = 450 - 900VA<br>R2 = 1300 - 3000VA<br>R3 = 4500 - 6000VA</p>
					</td>
				</tr>
				<tr>
					<td><input type="submit" value="Register" name="daftar"></td>
				</tr>
			</table>
			</form>
		</div>
	</body>
</html>
<?php

if(isset($_POST['daftar'])){
$id = $_POST['id'];
$nama = $_POST['nama'];
$user=$_POST["user"];
$pass=$_POST["pass"];
$alamat = $_POST['alamat'];
$nomor = $_POST['nomor'];
$tarif = $_POST['tarif'];
$res=$kdb->query("INSERT INTO pelanggan VALUES('$id','$user','$pass','$nomor','$nama','$alamat','$tarif')");
	if($res){
		header('location:login.php?success');
	} else {
		header('location:register.php?error');
	}
}
?>
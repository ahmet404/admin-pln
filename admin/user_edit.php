<?php
$id = $_GET['id'];
$edit = $kdb->query("SELECT * FROM admin WHERE id_admin='$id'");
$row = $edit->fetch_assoc();
?>
<form action="" method="POST">
	<h3>Edit Petugas</h3>
	<table class="tb-create">
		<tr>
			<td>Nama :<br><input type="text" name="nama" value="<?php echo $row['nama_admin']; ?>"class="input-field"></td>
		</tr>
		<tr>
			<td>User :<br><input type="text" name="user" value="<?php echo $row['username']; ?>"class="input-field"></td>
		</tr>
		<tr>
			<td>Password :<br><input type="password" name="pass" value="<?php echo $row['password']; ?>"class="input-field"></td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="create" value="Tambah" class="btn">
				<a href="index.php?hal=user">Kembali</a>
			</td>
		</tr>
	</table>
	</form>
<?php
if(isset($_POST['create'])){
$id = $_GET['id'];
$nama = $_POST['nama'];
$user = $_POST['user'];
$pass = $_POST['pass'];

$res = $kdb->query("UPDATE admin SET username = '$user', password = '$pass', nama_admin = '$nama' WHERE admin.id_admin = '$id'");
	if($res){
		echo "<script>alert('Update data berhasil!');document.location.href='index.php?hal=user';</script>";
	} else{
		echo "<script>alert('Gagal! mengupdate data!');document.location.href='index.php?hal=user';</script>";
	}
}
?>
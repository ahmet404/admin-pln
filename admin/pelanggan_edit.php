<?php
$id = $_GET['id'];
$edit = $kdb->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
$row = $edit->fetch_assoc();
?>
<form action="" method="POST">
	<h3>Edit Pelanggan</h3>
	<table class="tb-create">
		<tr>
			<td>ID Pel:<br><input type="text" name="id" value="<?php echo $row['id_pelanggan']; ?>"class="input-field" disabled/></td>
		</tr>
		<tr>
			<td>Nama :<br><input type="text" name="nama" value="<?php echo $row['nama_pelanggan']; ?>"class="input-field"></td>
		</tr>
		<tr>
			<td>User :<br><input type="text" name="user" value="<?php echo $row['username']; ?>"class="input-field"></td>
		</tr>
		<tr>
			<td>Password :<br><input type="password" name="pass" value="<?php echo $row['password']; ?>"class="input-field"></td>
		</tr>
		<tr>
			<td>No. Kwh :<br><input type="text" name="kwh" value="<?php echo $row['nomor_kwh']; ?>"class="input-field"></td>
		</tr>
		<tr>
			<td>Tarif :<br>
				<select name="tarif" class="input-field">
					<option selected>-- Pilih --</option>
					<?php 
					$q = $kdb->query("SELECT * FROM tarif");
					while($data = $q->fetch_assoc()){
					?>
					<option value="<?php echo $data['id_tarif']; ?>"><?php echo $data['kode']; ?></option>
				<?php }?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Alamat :<br><input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"class="input-field"></td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="create" value="Tambah" class="btn">
				<a href="index.php?hal=pelanggan">Kembali</a>
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
$kwh = $_POST['kwh'];
$tarif = $_POST['tarif'];
$alamat = $_POST['alamat'];

$res = $kdb->query("UPDATE pelanggan SET username = '$user',password='$pass',nomor_kwh='$kwh',nama_pelanggan='$nama',alamat='$alamat',id_tarif='$tarif' WHERE pelanggan.id_pelanggan = '$id'");
	if($res){
		echo "<script>alert('Update data berhasil!');document.location.href='index.php?hal=pelanggan';</script>";
	} else{
		echo "<script>alert('Gagal mengupdate data!');document.location.href='index.php?hal=pelanggan';</script>";
	}
}
?>
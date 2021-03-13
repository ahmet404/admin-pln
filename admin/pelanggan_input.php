
<form action="" method="POST">
	<h3>Tambah Pelanggan</h3>
	<table class="tb-create">
		<tr>
			<td>ID Pel:<br><input type="text" name="id" class="input-field"></td>
		</tr>
		<tr>
			<td>Nama :<br><input type="text" name="nama" class="input-field"></td>
		</tr>
		<tr>
			<td>User :<br><input type="text" name="user" class="input-field"></td>
		</tr>
		<tr>
			<td>Password :<br><input type="password" name="pass" class="input-field"></td>
		</tr>
		<tr>
			<td>No. Kwh :<br><input type="text" name="kwh" class="input-field"></td>
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
			<td>Alamat :<br><input type="text" name="alamat" class="input-field"></td>
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
$id = $_POST['id'];
$nama = $_POST['nama'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$kwh = $_POST['kwh'];
$tarif = $_POST['tarif'];
$alamat = $_POST['alamat'];

$res = $kdb->query("INSERT INTO pelanggan VALUES('$id','$user','$pass','$kwh','$nama','$alamat','$tarif')");
	if($res){
		echo "<script>alert('Data berhasil ditambahkan!');document.location.href='index.php?hal=pelanggan';</script>";
	} else{
		echo "<script>alert('Gagal menambahkan data!');document.location.href='index.php?hal=pelanggan';</script>";
	}
}
?>\
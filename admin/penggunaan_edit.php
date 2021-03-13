<?php
$id = $_GET['id'];
$edit = $kdb->query("SELECT * FROM penggunaan WHERE id_penggunaan='$id'");
$row = $edit->fetch_assoc();
?>
<form action="" method="POST">
	<h3>Edit Petugas</h3>
	<table class="tb-create">
		<tr>
			<td>ID Pelanggan :<br><input type="text" name="id" value="<?php echo $row['id_pelanggan']; ?>"class="input-field" readonly></td>
		</tr>
		<tr>
			<td>Bulan :<br><input type="text" name="bulan" value="<?php echo $row['bulan']; ?>"class="input-field" readonly></td>
		</tr>
		<tr>
			<td>Tahun :<br><input type="text" name="tahun" value="<?php echo $row['tahun']; ?>"class="input-field" readonly></td>
		</tr>
		<tr>
			<td>Meter Awal :<br><input type="text" name="awal" value="<?php echo $row['meter_awal']; ?>"class="input-field"></td>
		</tr>
		<tr>
			<td>Meter Akhir :<br><input type="text" name="akhir" value="<?php echo $row['meter_akhir']; ?>"class="input-field"></td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="create" value="Tambah" class="btn">
				<a href="index.php?hal=penggunaan">Kembali</a>
			</td>
		</tr>
	</table>
	</form>
<?php
if(isset($_POST['create'])){
$id = $_GET['id'];
$ide = $_POST['id'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$awal = $_POST['awal'];
$akhir = $_POST['akhir'];

$res = $kdb->query("UPDATE penggunaan SET id_pelanggan = '$ide', bulan = '$bulan', tahun = '$tahun', meter_awal = '$awal', meter_akhir = '$akhir' WHERE penggunaan.id_penggunaan = '$id'");
	if($res){
		echo "<script>alert('Update data berhasil!');document.location.href='index.php?hal=penggunaan';</script>";
	} else{
		echo "<script>alert('Gagal! mengupdate data!');document.location.href='index.php?hal=penggunaan';</script>";
	}
}
?>
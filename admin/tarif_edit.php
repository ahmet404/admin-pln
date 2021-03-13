<?php
$id = $_GET['id'];
$edit = $kdb->query("SELECT * FROM tarif WHERE id_tarif='$id'");
$row = $edit->fetch_assoc();
?>
<form action="" method="POST">
	<h3>Edit Tarif</h3>
	<table class="tb-create">
		<tr>
			<td>Kode :<br><input type="text" name="kode" value="<?php echo $row['kode']; ?>"class="input-field"></td>
		</tr>
		<tr>
			<td>Daya :<br><input type="text" name="daya" value="<?php echo $row['daya']; ?>"class="input-field"></td>
		</tr>
		<tr>
			<td>Tarif / Kwh :<br><input type="text" name="tarif" value="<?php echo $row['tarifperkwh']; ?>"class="input-field"></td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="create" value="Tambah" class="btn">
				<a href="index.php?hal=tarif">Kembali</a>
			</td>
		</tr>
	</table>
	</form>
<?php
if(isset($_POST['create'])){
$id = $_GET['id'];
$kode = $_POST['kode'];
$daya = $_POST['daya'];
$tarif = $_POST['tarif'];

$res = $kdb->query("UPDATE tarif SET kode='$kode', daya = '$daya', tarifperkwh = '$tarif' WHERE tarif.id_tarif = '$id'");
	if($res){
		echo "<script>alert('Update data berhasil!');document.location.href='index.php?hal=tarif';</script>";
	} else{
		echo "<script>alert('Gagal! mengupdate data!');document.location.href='index.php?hal=tarif';</script>";
	}
}
?>
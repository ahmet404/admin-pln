
<form action="" method="POST">
	<h3>Tambah Tarif</h3>
	<table class="tb-create">
		<tr>
			<td>Kode :<br><input type="text" name="kode" class="input-field"></td>
		</tr>
		<tr>
			<td>Daya :<br><input type="text" name="daya" class="input-field"></td>
		</tr>
		<tr>
			<td>Tarif / Kwh :<br><input type="text" name="tarif" class="input-field"></td>
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
$kode = $_POST['kode'];
$daya = $_POST['daya'];
$tarif = $_POST['tarif'];

$res = $kdb->query("INSERT INTO tarif VALUES ('', '$kode', '$daya', '$tarif')");
	if($res){
		echo 	"<script>alert('Data berhasil ditambahkan!');document.location.href='index.php?hal=tarif';</script>";
	} else{
		echo "<script>alert('Gagal menambahkan data!');document.location.href='index.php?hal=tarif';</script>";
	}
}
?>

<form action="" method="POST">
	<h3>Tambah Penggunaan</h3>
	<table class="tb-create">
		<tr>
			<td>Bulan :<br><input type="text" name="bln" value="<?php echo date('M');?>" class="input-field"></td>
		</tr>
		<tr>
			<td>Tahun :<br><input type="text" name="thn" value="<?php echo date('Y');?>" class="input-field"></td>
		</tr>
		<tr>
			<td>ID PEL :<br>
				<select name="idpel" class="input-field">
					<?php 
					$q = $kdb->query("SELECT * FROM pelanggan");
					while($data = $q->fetch_assoc()){
					?>
					<option value="<?php echo $data['id_pelanggan']; ?>"><?php echo $data['id_pelanggan']; ?></option>
				<?php }?>
				</select>
			</td>
		</tr>
		
		<tr>
			<td>Meter Awal :<br><input type="text" name="awal" class="input-field"></td>
		</tr>
		<tr>
			<td>Meter Akhir :<br><input type="text" name="akhir" class="input-field"></td>
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
$idpel = $_POST['idpel'];
$bln = $_POST['bln'];
$thn = $_POST['thn'];
$awal = $_POST['awal'];
$akhir = $_POST['akhir'];
$total = ($akhir - $awal) / '1000';

$res = $kdb->query("INSERT INTO penggunaan VALUES('','$idpel','$bln','$thn','$awal','$akhir')");
$tes = $kdb->query("INSERT INTO tagihan VALUES ('', '', '$idpel', '$bln', '$thn', '$total', 'Belum Lunas')");
	if($res){
		echo "<script>alert('Data berhasil ditambahkan!');document.location.href='index.php?hal=penggunaan';</script>";
	} else{
		echo "<script>alert('Gagal menambahkan data!');document.location.href='index.php?hal=penggunaan';</script>";
	}
}
?>
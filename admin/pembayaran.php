<?php
$id = $_GET['id'];
$res = $kdb->query("SELECT * FROM tagihan JOIN pelanggan ON tagihan.id_pelanggan = pelanggan.id_pelanggan JOIN tarif ON pelanggan.id_tarif = tarif.id_tarif WHERE id_tagihan = '$id'");
$row = $res->fetch_assoc();
?>
<form action="" method="POST">
	<h3>Pembayaran</h3>
	<table class="tb-create">
		<tr>
			<td>IDPEL</td>
			<td><?php echo ': '.$row['id_pelanggan']; ?>
		</tr>
		<tr>
			<td>Nama</td>
			<td><?php echo ': '.$row['nama_pelanggan']; ?>
		</tr>
		<tr>
			<td>Tarif/Daya</td>
			<td><?php echo ': '.$row['kode']. '/'.$row['daya'] .'VA'; ?>
		</tr>
		<tr>
			<td>Penggunaan</td>
			<td><?php echo ': '.$row['jumlah_meter'] .' Kwh'; ?>
		</tr>
		<tr>
			<td>Rp. Tagihan PLN</td>
			<td><?php echo ': '.$a = $row['jumlah_meter'] * $row['tarifperkwh']; ?></td>
		</tr>
		<tr>
			<td>Biaya Admin</td>
			<td><?php echo ': '.$b = 2500; ?></td>
		</tr>
		<tr>
			<td>Total Bayar</td>

			<td><?php echo ': '.$c = $a + $b; ?></td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="bayar" class="btn" value="Bayar">
				
				<a href="index.php?hal=tagihan">Kembali</a>
			</td>
		</tr>
	</table>
	</form>
	<?php 
	if(isset($_POST['bayar'])){
	$pelanggan = $row['id_pelanggan'];
	$tgl = date('d');
	$bln = $row['bulan'];
	$admin = $b;
	$total = $c;
	$idadmin = 1;
	$sql =  $kdb->query("INSERT INTO pembayaran VALUES('','$id','$pelanggan','$tgl','$bln','$admin','$total','$idadmin')");
	$tag = $kdb->query("UPDATE tagihan SET status = 'Lunas' WHERE tagihan.id_tagihan = '$id'");
	if($sql && $tag){
		echo "<script>alert('Pembayaran berhasil!');window.location.href='cetak_struk.php?id=$id';</script>";
	} else{
		echo "<script>alert('Pembayaran Gagal!');document.location.href='index.php?hal=tagihan';</script>";
	}
}
?>	
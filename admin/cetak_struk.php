<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body onload="window.print();">
<center>
<?php
require_once '../kdb.php';
$id = $_GET['id'];
$res = $kdb->query("SELECT * FROM tagihan JOIN pelanggan ON tagihan.id_pelanggan = pelanggan.id_pelanggan JOIN tarif ON pelanggan.id_tarif = tarif.id_tarif WHERE id_tagihan = '$id'");
$row = $res->fetch_assoc();
?>
<style type="text/css">
	table{width:100%;max-width:600px;margin:auto;}
</style>

<table style="margin:auto;width:100%;font-family:trebuchet MS;font-size:14px;">
		<tr><!--masukan gambar png sesuka hati-->
			<td><img src="img/icon.png" width="50" height="50"></td>
			<td align="center"><strong style="font-size: 20px;">PT. PLN INDONESIA</h3></strong></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="2" style="font-weight: bold;">STRUK PEMBAYARAN TAGIHAN LISTRIK</td>
		</tr>
		<tr>
			<td>IDPEL</td>
			<td><?php echo ': '.$row['id_pelanggan']; ?>
			<td>BL/TH</td>
			<td><?php echo ': '.date('My');?></td>
		</tr>
		<tr>
			<td>NAMA</td>
			<td><?php echo ': '.$row['nama_pelanggan']; ?>
			<td>Penggunaan</td>
			<td><?php echo ': '.$row['jumlah_meter'] .' Kwh'; ?>
		</tr>
		<tr>
			<td>TARIF/DAYA</td>
			<td><?php echo ': '.$row['kode']. '/'.$row['daya'] .'VA'; ?>
		</tr>

		<tr>
			<td>RP. TAG PLN</td>
			<td><?php echo ': '.$a = $row['jumlah_meter'] * $row['tarifperkwh']; ?></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><strong>PLN menyatakan struk ini sebagai bukti pembayaran yang sah.</strong></td>
		</tr>
		<tr>
			<td>ADMIN BANK</td>
			<td><?php echo ': '.$b = 2500; ?></td>
		</tr>
		<tr>
			<td>TOTAL BAYAR</td>
			<td><?php echo ': '.$c = $a + $b; ?></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><strong>TERIMA KASIH!</h3></strong></td>
		</tr>
		<tr>
			<td colspan="4" align="center">Rincian Tagihan dapat diakses di www.pln.co.id atau Agen dan Kantor PLN Terdekat!</td>
		</tr>
		<tr>
			<td colspan="4" align="center"><strong>INFORMASI HUB: 123</strong></td>
		</tr>
	</table>
</center>
</body>
</html>
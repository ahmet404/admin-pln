<section class="content">
<h3>History Pembayaran</h3>
<a class="btn" href="index.php?hal=history&aksi=delete">Hapus seluruh history</a> 
	<table width="100%" border="1">
		<tr>
			<th>No</th>
			<th>ID PEL</th>
			<th>Tanggal</th>
			<th>Bulan</th>
			<th>Biaya Admin</th>
			<th>Total Bayar</th>
			<th>Aksi</th>
		</tr>
			<?php
			$i = 1;
			$q = $kdb->query("SELECT * FROM pembayaran");
			while($row = $q->fetch_assoc()){
			?>
		<tr align="center">
			<td><?php echo $i++; ?></td>
			<td><?php echo $row['id_pelanggan'];?></td>
			<td><?php echo $row['tgl_pmbayaran'];?></td>
			<td><?php echo $row['bln_bayar'];?></td>
			<td><?php echo 'Rp.'.$row['biaya_admin'];?></td>
			<td><?php echo 'Rp.'.$row['total_bayar'];?></td>
			<td><a href="cetak_struk.php?id=<?php echo $row['id_tagihan'];?>" class="btn" style="background-color:green;color:white;border:none;">Cetak Struk</a></td>
		<?php }?>
		</tr>
	</table>
</section>
<section class="content">
<h3>Data Tagihan</h3>
<a class="btn" href="index.php?hal=tagihan&aksi=delete">Kosongkan seluruh data</a>
	<table width="100%" border="1">
		<tr>
			<th>No</th>
			<th>ID PEL</th>
			<th>Bulan</th>
			<th>Tahun</th>
			<th>Jumlah Meter</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
			<?php
			$i = 1;
			$q = $kdb->query("SELECT * FROM tagihan");
			while($row = $q->fetch_assoc()){
			?>
		<tr align="center">
			<td><?php echo $i++; ?></td>
			<td><?php echo $row['id_pelanggan'];?></td>
			<td><?php echo $row['bulan'];?></td>
			<td><?php echo $row['tahun'];?></td>
			<td><?php echo $row['jumlah_meter']. ' Kwh';?></td>
			<td><?php echo $row['status'];?></td>
			<td><a href="index.php?hal=tagihan&aksi=bayar&id=<?php echo $row['id_tagihan'];?>" class="btn" style="background-color:green;color:white;border:none;">Bayar</a></td>
		<?php }?>
		</tr>
	</table>
</section>
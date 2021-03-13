<section class="content">
<h3>Data Penggunaan</h3>
<a class="btn add" href="index.php?hal=penggunaan&aksi=input">Tambah</a>
	<table width="100%" border="1">
		<tr>
			<th>No</th>
			<th>ID Pelanggan</th>
			<th>Bulan</th>
			<th>Tahun</th>
			<th>Meter awal</th>
			<th>Meter akhir</th>
			<th>Opsi</th>
		</tr>
			<?php
			$i = 1;
			$q = $kdb->query("SELECT * FROM penggunaan");
			while($row = $q->fetch_assoc()){
			?>
		<tr align="center">
			<td><?php echo $i++; ?></td>
			<td><?php echo $row['id_pelanggan'];?></td>
			<td><?php echo $row['bulan'];?></td>
			<td><?php echo $row['tahun'];?></td>
			<td><?php echo $row['meter_awal'];?></td>
			<td><?php echo $row['meter_akhir'];?></td>
			<td><a class="btn delete" onclick="return confirm('Yakin untuk menghapus ?')" href="index.php?hal=penggunaan&aksi=delete&id=<?php echo $row['id_penggunaan'];?>">Hapus</a></td>
		<?php }?>
		</tr>
	</table>
</section>
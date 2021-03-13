<section class="content">
<h3>Tarif</h3>
<a class="btn add" href="index.php?hal=tarif&aksi=input">Tambah</a>
	<table width="100%" border="1">
		<tr>
			<th>Kode</th>
			<th>Daya</th>
			<th>Tarif/Kwh</th>
			<th colspan="2">Opsi</th>
		</tr>
			<?php
			$q = $kdb->query("SELECT * FROM tarif ");
			while($row = $q->fetch_assoc()){
			?>
		<tr align="center">
			<td><?php echo $row['kode'];?></td>
			<td><?php echo $row['daya'] ."VA";?></td>
			<td><?php echo "Rp." .$row['tarifperkwh'];?></td>
			<td><a class="btn edit" href="index.php?hal=tarif&aksi=edit&id=<?php echo $row['id_tarif'];?>">Edit</a></td>
			<td><a class="btn delete" onclick="return confirm('Yakin untuk menghapus ?')" href="index.php?hal=tarif&aksi=delete&id=<?php echo $row['id_tarif'];?>">Hapus</a></td>
		<?php }?>
		</tr>
	</table>
</section>
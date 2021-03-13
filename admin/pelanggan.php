<section class="content">
<h3>Data Pelanggan</h3>
<a class="btn add" href="index.php?hal=pelanggan&aksi=input">Tambah</a>
	<table width="100%" border="1">
		<tr>
			<th>No</th>
			<th>ID Pelanggan</th>
			<th>Username</th>
			<th>Password</th>
			<th>No. Kwh</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Tarif</th>
			<th colspan="2">Opsi</th>
		</tr>
			<?php
			$i = 1;
			$q = $kdb->query("SELECT * FROM pelanggan JOIN tarif ON pelanggan.id_tarif = tarif.id_tarif");
			while($row = $q->fetch_assoc()){
			?>
		<tr align="center">
			<td><?php echo $i++; ?></td>
			<td><?php echo $row['id_pelanggan'];?></td>
			<td><?php echo $row['username'];?></td>
			<td><?php echo $row['password'];?></td>
			<td><?php echo $row['nomor_kwh'];?></td>
			<td><?php echo $row['nama_pelanggan'];?></td>
			<td><?php echo $row['alamat'];?></td>
			<td><?php echo $row['kode'];?></td>
			<td><a class="btn edit" href="index.php?hal=pelanggan&aksi=edit&id=<?php echo $row['id_pelanggan'];?>">Edit</a></td>
			<td><a class="btn delete" onclick="return confirm('Yakin untuk menghapus ?')" href="index.php?hal=pelanggan&aksi=delete&id=<?php echo $row['id_pelanggan'];?>">Hapus</a></td>
		<?php }?>
		</tr>
	</table>
</section>
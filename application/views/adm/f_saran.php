<h2>Data Saran</h2>
<hr>

<!--
<a href="<?php echo base_url(); ?>adm/download_data_ptk" class="btn btn-info">Download Data</a>
<a href="<?php echo base_url(); ?>adm/data_ptk/lebih_17" class="btn btn-danger">Lebih dari 17 tahun</a>
<a href="<?php echo base_url(); ?>adm/data_ptk/kurang_17" class="btn btn-success">Kurang dari 17 tahun</a>
-->
<br><br>


<table style="width: 100%" class="table table-bordered">
	<tr>
		<th width="5%">No</th>
		<th width="25%">Nama</th>
		<th width="15%">Email</th>
		<th width="15%">No tlp</th>
		<th width="15%">alamat</th>
		<th width="40%">Pesan</th>
		<th width="20%">Tanggal post</th>
		<th width="10%">Aksi</th>
	</tr>
</thead>
<tbody>
<?php 
if (empty($data)) {
	echo "<tr><td colspan='7'>-- belum ada data --</td></tr>"; 
} else {
	$no = 1;
	foreach($data as $d) {
?>
	<tr>
		<td class="ctr"><?php echo $no++; ?></td>
		<td><?php echo $d->nama.""; ?></td>
		<td><?php echo $d->email.""; ?></td>
		
		
		<td><?php echo $d->telp_hp.""; ?>
		</td>
		<td>
		<?php echo $d->alamat.""; ?></td>
		<td><?php echo $d->pesan.""; ?></td>
		<td><?php echo $d->tgl_post.""; ?></td>
		
		<td>
	
			<a href="<?php echo base_url(); ?>adm/saran/hapus/<?php echo $d->id; ?>" class="label label-danger" onclick="return confirm('Anda yakin..?');">Hapus</a>
		</td>
	</tr>
<?php 
	}
}
?>
</tbody>
</table>
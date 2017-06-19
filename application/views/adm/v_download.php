<h2>Download Content</h2>
<hr>

<input type="button" value="Tambah" onclick="window.open('<?php echo base_url()."adm/download/add"; ?>', '_self');" class="btn btn-success"><br><br>
<?php echo $this->session->flashdata('k'); ?>
<table style="width: 100%" class="table table-bordered">
	<tr>
		<th width="5%">No</th>
		<th width="40%">Nama<br>File</th>
		<th width="35%">Deskripsi</th>
		<th width="20%">Aksi</th>
	</tr>
</thead>
<tbody>
<?php 
if (empty($data)) {
	echo "<tr><td colspan='4'>-- belum ada data --</td></tr>"; 
} else {
	$no = 1;
	foreach($data as $d) {
?>
	<tr>
		<td class="ctr"><?php echo $no++; ?></td>
		<td><?php echo $d->nama."<br><a href='".base_url()."upload/download/".$d->file."' target='_blank'>Download</a>"; ?></td>
		<td><?php echo $d->deskripsi; ?></td>
		<td class="ctr">
			<a href="<?php echo base_url(); ?>adm/download/edit/<?php echo $d->id; ?>" class="label label-success">Edit</a> 
			<a href="<?php echo base_url(); ?>adm/download/hapus/<?php echo $d->id; ?>" class="label label-danger" onclick="return confirm('Anda yakin..?');">Hapus</a> 
		</td>
	</tr>
<?php 
	}
}
?>
</tbody>
</table>
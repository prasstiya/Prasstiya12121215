<h2>Data PTK</h2>
<hr>

<input type="button" value="Tambah Data" onclick="window.open('<?php echo base_url()."adm/data_ptk/add"; ?>', '_self');" class="btn btn-success">
<!--
<a href="<?php echo base_url(); ?>adm/download_data_ptk" class="btn btn-info">Download Data</a>
<a href="<?php echo base_url(); ?>adm/data_ptk/lebih_17" class="btn btn-danger">Lebih dari 17 tahun</a>
<a href="<?php echo base_url(); ?>adm/data_ptk/kurang_17" class="btn btn-success">Kurang dari 17 tahun</a>
-->
<br><br>
<?php echo $this->session->flashdata('k'); ?>
<center><ul class="pagination"><?php echo $pagi; ?></ul></center>
<div class="table-responsive">
  

<table style="width: 100%" class="table table-bordered">
	<tr>
		<th width="5%">No</th>
		<th width="30%">Nama, NIP</th>
		<th width="25%">Tempat, Tgl Lahir</th>
		<th width="15%">Email, blog</th>
		<th width="15%">Tugas</th>
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
		<td>
		<?php echo $d->nama."<br>".$d->nip.""; ?>
		</td>
		<td><?php echo $d->tmp_lahir.", ".tgl_jam_sql($d->tgl_lahir); ?></td>
		<td><?php echo $d->email."<br>".$d->blog; ?></td>
		<td><?php echo $d->tugas.": ".$d->tugas_detil; ?></td>
		<td>
			<a href="<?php echo base_url(); ?>adm/data_ptk/edt/<?php echo $d->id; ?>" class="label label-success">Edit</a> &nbsp;
			<a href="<?php echo base_url(); ?>adm/data_ptk/hapus/<?php echo $d->id; ?>" class="label label-danger" onclick="return confirm('Anda yakin..?');">Hapus</a>
		</td>
		
	</tr>
	
<?php 
	}
}
?>
</div>
</tbody>
</table>
</div>
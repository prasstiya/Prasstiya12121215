<h2>Data Siswa</h2>
<hr>

<input type="button" value="Tambah Data" onclick="window.open('<?php echo base_url()."adm/data_siswa/add"; ?>', '_self');" class="btn btn-success">
<div class="pull-right col-md-3">
	<form class="form-inline" method="post" action="<?php echo base_url(); ?>adm/data_siswa/cari">
	<div class="form-group">
		<input type="text" name="cari" value="<?php echo $this->input->post('cari'); ?>" class="form-control">
		
		<button class="btn btn-success"> Cari</button>
	</div>
	</form>
</div>
<!--
<a href="<?php echo base_url(); ?>adm/download_data_siswa" class="btn btn-info">Download Data</a>
<a href="<?php echo base_url(); ?>adm/data_siswa/lebih_17" class="btn btn-danger">Lebih dari 17 tahun</a>
<a href="<?php echo base_url(); ?>adm/data_siswa/kurang_17" class="btn btn-success">Kurang dari 17 tahun</a>
-->
<br><br>
<?php echo $this->session->flashdata('k'); ?>
<center><ul class="pagination"><?php echo $pagi; ?></ul></center>
<table style="width: 100%" class="table table-bordered">
	<tr>
		<th width="5%">No</th>
		<th width="5%">NIS</th>
		<th width="30%">Nama, Kelas</th>
		<th width="30%">Tempat, Tgl Lahir</th>
		<th width="25%">Jenis Kelamin, Agama</th>
		<th width="10%">Aksi</th>
	</tr>
</thead>
<tbody>
<?php 
if (empty($data)) {
	echo "<tr><td colspan='6'>-- belum ada data --</td></tr>"; 
} else {
	$no = 1;
	foreach($data as $d) {
?>
	<tr>
		<td class="ctr"><?php echo $no++; ?></td>
		<td class="ctr"><?php echo $d->nis; ?></td>
		<td>
		<?php echo $d->nama."<br>Kelas: ".$d->kelas.""; ?>
		</td>
		<td><?php echo $d->tmp_lahir.", ".tgl_jam_sql($d->tgl_lahir); ?></td>
		<td><?php echo $d->jk."<br>".$d->agama; ?></td>
		<td>
			<a href="<?php echo base_url(); ?>adm/data_siswa/edt/<?php echo $d->id; ?>" class="label label-success">Edit</a> &nbsp;
			<a href="<?php echo base_url(); ?>adm/data_siswa/hapus/<?php echo $d->id; ?>" class="label label-danger" onclick="return confirm('Anda yakin..?');">Hapus</a>
		</td>
	</tr>
<?php 
	}
}
?>
</tbody>
</table>
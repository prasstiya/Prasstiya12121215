<h2>Topik Berita</h2>
<hr>


<input type="button" class="btn btn-success" value="Tambah" onclick="window.open('<?php echo base_url()."adm/topik/add"; ?>', '_self');">
<br><br>

<table style="width: 100%" class="table table-bordered">
	<tr><th width="5%">No</th><th width="80%">Nama</th><th width="15%">Aksi</th></tr>
<?php 
if (empty($data)) {
	echo "<tr><td colspan='2'>belum ada data, <a href='".base_url()."adm/agenda/add'>buat baru</a></td></tr>"; 
} else {
	$no = 1;
	foreach($data as $d) {
?>
	<tr>
		<td class="ctr"><?php echo $no; ?></td>
		<td><?php echo $d->nama; ?></td>
		<td class="ctr">
	<a href="<?php echo base_url(); ?>adm/topik/edt/<?php echo $d->id; ?>" class="label label-success">Edit</a>
	<a href="<?php echo base_url(); ?>adm/topik/del/<?php echo $d->id; ?>" class="label label-danger" onclick="return confirm('Anda yakin..?');">Hapus</a>
		</td>
	</tr>
	
<?php 
	$no++;
	}
}
?>
</table>

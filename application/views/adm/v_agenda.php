<h2>Agenda</h2>
<hr>

<input type="button" value="Tambah" class="btn btn-success" onclick="window.open('<?php echo base_url()."adm/agenda/add"; ?>', '_self');"><br><br>
<?php 
if (empty($data)) {
	echo "belum ada data, <a href='".base_url()."adm/agenda/add'>buat baru</a>"; 
} else {
	foreach($data as $d) {
?>
	<div class="well">
	<h4 style="margin-bottom: 10px">Tanggal : <?php echo tgl_jam_sql($d->tgl_mulai)." s.d. ".tgl_jam_sql($d->tgl_selesai); ?> <b>di</b> : <?php echo $d->tempat; ?></h4><hr>
	<?php echo substr(htmlentities($d->acara), 0, 300); ?><br><br>
	<a href="<?php echo base_url(); ?>adm/agenda/edt/<?php echo $d->id; ?>" class="label label-success">Edit</a> &nbsp;
	<a href="<?php echo base_url(); ?>adm/agenda/del/<?php echo $d->id; ?>" class="label label-danger" onclick="return confirm('Anda yakin..?');">Hapus</a>
	
	</div>
<?php 
	}
}
?>

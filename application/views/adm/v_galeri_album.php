	<h2>Galeri</h2>
	<hr>

<input type="button" value="Tambah Album" onclick="window.open('<?php echo base_url()."adm/galeri_album/add"; ?>', '_self');" class="btn btn-success">
<div align="justify">
	<?php 
	if (empty($data)) {
		echo "belum ada data, <a href='".base_url()."adm/galeri_album/add'>buat baru</a>"; 
	} else {
		foreach($data as $d) {
	?>
		<div class="col-lg-3">
		<h4 class="thumbnail polaroid well" style="height: 100px; text-align: center"><?php echo $d->nama; ?></h4>
		
		<center>
		<a href="<?php echo base_url(); ?>adm/galeri_manage/<?php echo $d->id; ?>" class="label label-success">Manage</a>
		<a href="<?php echo base_url(); ?>adm/galeri_album/edt/<?php echo $d->id; ?>" class="label label-warning">Edit</a>
		<a href="<?php echo base_url(); ?>adm/galeri_album/del/<?php echo $d->id; ?>" class="label label-danger" onclick="return confirm('Anda yakin..?');">Hapus</a>
		</center>
		
		<hr style="border: dotted 1px #777">
		</div>
	<?php 
		}
	}
	?>
	
</div>

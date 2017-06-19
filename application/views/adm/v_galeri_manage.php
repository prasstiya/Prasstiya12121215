<?php 
$id_album	= $this->uri->segment(3);
?>

<h2>Galeri Album</h2>
<hr>

<input type="button" value="Tambah" onclick="window.open('<?php echo base_url()."adm/galeri_manage/".$id_album."/add"; ?>', '_self');" class="btn btn-success">
<input type="button" value="Kembali" onclick="window.open('<?php echo base_url()."adm/galeri_album"; ?>', '_self');" class="btn btn-info">

<br><br>
<?php echo $this->session->flashdata("k"); ?>
<div align="justify">
<?php 
if (empty($data)) {
	echo "<div class='alert alert-danger'>belum ada gambar, <a href='".base_url()."adm/galeri_manage/".$id_album."/add'>gambar baru</a></div>"; 
} else {
	foreach($data as $d) {
?>
	<p><h4 style="margin-bottom: 10px"><?php echo $d->ket; ?></h4>
	<?php 
	if ($tipe_glr == "url") {
		echo "<img src='".$d->file_url."' style='width: 100px; height: 80px'>";
	} else if ($tipe_glr == "file") {
		echo "<img src='".base_url()."upload/galeri/".$d->file_url."' style='width: 100px; height: 80px'>";
	}	
	?>
	<br>
	[<a href="<?php echo base_url(); ?>adm/galeri_manage/<?php echo $id_album; ?>/edt/<?php echo $d->id; ?>">Edit</a>] &nbsp; 
	[<a href="<?php echo base_url(); ?>adm/galeri_manage/<?php echo $id_album; ?>/del/<?php echo $d->id; ?>" onclick="return confirm('Anda yakin..?');">Hapus</a>]
	
	<hr style="border: dotted 1px #777">
	
<?php 
	}
}
?>
<!--<center><ul class="pagination"><?php echo $pagi; ?></ul></center>-->
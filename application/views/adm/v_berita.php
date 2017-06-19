<?php 
$tipe		= $this->uri->segment(3);
?>




<h2>Posting</h2>
<hr>

<input type="button" value="Tambah" class="btn btn-success" onclick="window.open('<?php echo base_url()."adm/post/".$tipe."/add"; ?>', '_self');"><br><br>
<center><ul class="pagination"><?php echo $pagi; ?></ul></center>
<?php 
if (empty($data)) {
	echo "belum ada data, <a href='".base_url()."adm/post/".$tipe."/add'>buat baru</a>"; 
} else {
	foreach($data as $d) {
?>
	<div class="well">
	<h4 style="margin-top: -5px"><?php echo $d->judul; ?></h4><hr>
	<?php if (!empty($d->gambar)) { ?>
	<img src="<?php echo base_url()."upload/posting/".$d->gambar.""; ?>" style="display: inline; float: left; width: 100px; height: 100px; margin-right: 20px">
	<p style="min-height: 90px">
	<?php 
	}			
	echo substr(strip_tags($d->isi), 0, 600); ?></p><br>		
	<small>Dipostkan oleh : <b><?php echo $d->nama_admin; ?></b> | Pada : <b><?php echo tgl_jam_sql($d->tgl_post); ?></b> | Dibaca : <b><?php echo $d->hits; ?> kali</b></small><br>
	<b>URL : <i><?php echo base_url(); ?>web/read/<?php echo $d->id; ?>/<?php echo url_title($d->judul, "-", TRUE); ?></i></b><br><br>
	
	<a href="<?php echo base_url(); ?>adm/post/<?php echo $tipe; ?>/edt/<?php echo $d->id; ?>" class="label label-success">Edit</a>
	<a href="<?php echo base_url(); ?>adm/post/<?php echo $tipe; ?>/del/<?php echo $d->id; ?>" class="label label-danger" onclick="return confirm('Anda yakin..?');">Hapus</a>
	</div>
<?php 
	}
}
?>


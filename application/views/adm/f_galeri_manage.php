<?php 
$id_album	= $this->uri->segment(3);
$mode		= $this->uri->segment(4);

if ($mode == "add") {
	$idp1		= "";
	$idp2		= "";
	$file_url	= "";
	$ket		= "";
	$act		= "act_add";
} else if ($mode == "edt") {
	$idp1		= $data_edit->id_album;
	$idp2		= $data_edit->id;
	$file_url	= $data_edit->file_url;
	$ket		= $data_edit->ket;
	$act		= "act_edt";
} 


?>

<h2>Galeri Album</h2>
<hr>

<form action="<?php echo base_url(); ?>adm/galeri_manage/<?php echo $id_album; ?>/<?php echo $act; ?>" method="post" enctype="multipart/form-data" class="well">
	<input type="hidden" name="idp1" value="<?php echo $id_album; ?>">
	<input type="hidden" name="idp2" value="<?php echo $idp2; ?>">
	
	<table border="0" width="100%" class="table table-form">
		<tr><td width="25%">File</td><td>
		<?php 
		if ($tipe_glr == "url") {
			echo '<input type="text" name="url" placeholder="Ex. http://example.com/gambar.jpg" class="form-control" style="width: 300px" value="'.$file_url.'" required><br><span style="color: red">Masukkan alamat URL gambar lengkap..</span>';
		} else if ($tipe_glr == "file") {
			echo '<input type="file" name="gambar_galeri" class="form-control" style="width: 300px" required>';
		}	
		?>
	
		
		
		
		</td></tr>
		<tr><td width="25%">Keterangan</td><td><input type="text" name="ket" value="<?php echo $ket; ?>" class="form-control" style="width: 300px" required></td></tr>
		
		
		<tr><td colspan="2">
		<input type="submit" value="Simpan" class="btn btn-success"> 
		<input type="button" value="Kembali" class="btn btn-danger" onclick="window.open('<?php echo base_url(); ?>adm/galeri_manage/<?php echo $id_album; ?>', '_self')"></td></tr>
	</table>		
</form>		

<?php 
$mode		= $this->uri->segment(3);

if ($mode == "add") {
	$idp					= "";
	$nama					= "";
	$deskripsi				= "";
	$required				= "required";
	$act					= "act_add";
} else if ($mode == "edit") {
	$idp					= $data_edit->id;
	$nama					= $data_edit->nama;
	$deskripsi				= $data_edit->deskripsi;
	$required				= "";
	$act					= "act_edt";
} 
?>

<h2>Download Content</h2>
<hr>

<?php echo form_open_multipart(base_url()."adm/download/".$act); ?>
	<input type="hidden" name="idp" value="<?php echo $idp; ?>">
	<table border="0" width="100%" class="table table-form">
		<tr><td width="25%">Nama</td><td><input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>" style="width: 400px" required></td></tr>
		<tr><td>Deskripsi</td><td><input type="text" name="deskripsi" class="form-control" style="width: 400px" required value="<?php echo $deskripsi; ?>"></td></tr>
		<tr><td>File</td><td><input type="file" name="gambar_galeri" class="form-control" style="width: 400px" <?php echo $required; ?>></td></tr>				
		<tr><td colspan="2">
		<input type="submit" value="Simpan" class="btn btn-success" > 
		<input type="button" value="Kembali" class="btn btn-danger" onclick="window.open('<?php echo base_url(); ?>adm/download', '_self')"></td></tr>
	</table>		
</form>		

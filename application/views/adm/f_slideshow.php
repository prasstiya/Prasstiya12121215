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

<div class="fr w700 content2">
	<div class="title1" style="margin-top: 0px; padding-bottom: 10px">Slideshow Content</div>
	<div align="justify">
		<?php echo form_open_multipart(base_url()."adm/slideshow/".$act); ?>
			<input type="hidden" name="idp" value="<?php echo $idp; ?>">
			<table border="0" width="100%">
				<tr><td width="25%">Nama</td><td><input type="text" name="nama" value="<?php echo $nama; ?>" style="width: 400px" required></td></tr>
				<tr><td>Deskripsi</td><td><input type="text" name="deskripsi" style="width: 400px" required value="<?php echo $deskripsi; ?>"></td></tr>
				<tr><td>File</td><td><input type="file" name="gambar_galeri" style="width: 400px" <?php echo $required; ?>></td></tr><tr><td colspan="2"><span style="font-weight: bold; color: red">Ukuran gambar TERBAIK untuk slide show, adalah 973 piksel x 352 piksel</span></td></tr>
								
				<tr><td colspan="2"><input type="submit" value="Simpan"> <input type="button" value="Kembali" onclick="window.open('<?php echo base_url(); ?>adm/slideshow', '_self')"></td></tr>
			</table>		
		</form>		
	</div>
</div>		
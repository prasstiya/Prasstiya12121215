<?php 
$mode		= $this->uri->segment(3);
//$tampil_	= array("profil", "fasilitas", "ekstra");

if ($mode == "add") {
	$idp		= "";
	$nip		= "";
	$nama		= "";
	$tmp_lahir	= "";
	$tgl_lahir	= "";
	$email		= "";
	$blog		= "";
	$tugas		= "";
	$tugas_detil= "";
	$act		= "act_add";
} else if ($mode == "edt") {
	$idp		= $data_edit->id;
	$nip		= $data_edit->nip;
	$nama		= $data_edit->nama;
	$tmp_lahir	= $data_edit->tmp_lahir;
	$tgl_lahir	= $data_edit->tgl_lahir;
	$email		= $data_edit->email;
	$blog		= $data_edit->blog;
	$tugas		= $data_edit->tugas;
	$tugas_detil= $data_edit->tugas_detil;
	$act		= "act_edt";
} 
?>

<h2>Data PTK</h2>
<hr>

<?php echo form_open_multipart(base_url()."adm/data_ptk/".$act); ?>
	<input type="hidden" name="idp" value="<?php echo $idp; ?>">
	<table border="0" width="100%" class="table table-form">
		<tr><td width="25%">NIP</td><td><input type="text" name="nip" class="form-control" style="width: 400px" value="<?php echo $nip; ?>" required></td></tr>
		<tr><td>Nama</td><td><input type="text" name="nama" class="form-control" style="width: 600px" value="<?php echo $nama; ?>" required></td></tr>
		<tr><td>TTL</td><td>
		<input type="text" name="tmp_lahir" class="form-control" style="width: 300px" value="<?php echo $tmp_lahir; ?>" required>
		<input type="text" name="tgl_lahir" class="form-control tag_tgl" style="width: 200px" value="<?php echo $tgl_lahir; ?>" required>
		</td></tr>
		<tr><td>Email</td><td><input type="text" name="email" class="form-control" style="width: 400px" value="<?php echo $email; ?>" required></td></tr>
		<tr><td>Blog</td><td><input type="text" name="blog" class="form-control" style="width: 400px" value="<?php echo $blog; ?>" required></td></tr>
		<tr><td>Tugas</td><td><input type="text" name="tugas" class="form-control" style="width: 300px" value="<?php echo $tugas; ?>" required></td></tr>
		<tr><td>Tugas Detil</td><td><input type="text" name="tugas_detil" class="form-control" style="width: 300px" value="<?php echo $tugas_detil; ?>" required></td></tr>
		
		
		<tr><td width="25%">Gambar</td><td><input type="file" name="foto_ptk" class="form-control" style="width: 500px"></td></tr>
		
		
		<tr><td colspan="2">
		<input type="submit" value="Simpan" class="btn btn-success"> 
		<input type="button" class="btn btn-danger" value="Kembali" onclick="window.open('<?php echo base_url(); ?>adm/data_ptk/', '_self')"></td></tr>
	</table>		
</form>		

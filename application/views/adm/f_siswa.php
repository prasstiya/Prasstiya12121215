<?php 
$mode		= $this->uri->segment(3);
$jk_		= array("L"=>"Laki-laki", "P"=>"Perempuan");
$agama_		= array("Islam"=>"Islam", "Kristen"=>"Kristen", "Katholik"=>"Katholik", "Hindu"=>"Hindu", "Budha"=>"Budha", "Konghucu"=>"Konghucu");
$kelas_		= array("7a"=>"7a", "7b"=>"7b", "7c"=>"7c", "7d"=>"7d", "7e"=>"7e", "7f"=>"7f", "8a"=>"8a", "8b"=>"8b", "8c"=>"8c", "8d"=>"8d", "8e"=>"8e", "8f"=>"8f", "9a"=>"9a", "9b"=>"9b","9c"=>"9c" ,"9d"=>"9d" ,"9e"=>"9e","9f"=>"9f");

if ($mode == "add") {
	$idp		= "";
	$nis		= "";
	$nama		= "";
	$tmp_lahir	= "";
	$tgl_lahir	= "";
	$jk			= "";
	$agama		= "";
	$kelas		= "";
	$act		= "act_add";
} else if ($mode == "edt") {
	$idp		= $data_edit->id;
	$nis		= $data_edit->nis;
	$nama		= $data_edit->nama;
	$tmp_lahir	= $data_edit->tmp_lahir;
	$tgl_lahir	= $data_edit->tgl_lahir;
	$jk			= $data_edit->jk;
	$agama		= $data_edit->agama;
	$kelas		= $data_edit->kelas;
	$act		= "act_edt";
} 
?>

<h2>Data Siswa</h2>
<hr>

<?php echo form_open_multipart(base_url()."adm/data_siswa/".$act); ?>
	<input type="hidden" name="idp" value="<?php echo $idp; ?>">
	<table border="0" width="100%" class="table table-form">
		<tr><td width="25%">NIS</td><td><input type="text" name="nis" class="form-control" style="width: 400px" value="<?php echo $nis; ?>" required></td></tr>
		<tr><td>Nama</td><td><input type="text" name="nama" class="form-control" style="width: 600px" value="<?php echo $nama; ?>" required></td></tr>
		<tr><td>TTL</td><td>
		<input type="text" name="tmp_lahir" class="form-control" style="width: 300px" value="<?php echo $tmp_lahir; ?>" required>
		<input type="text" name="tgl_lahir" class="form-control tag_tgl" style="width: 200px" value="<?php echo $tgl_lahir; ?>" required>
		<!--<input type="text" name="tgl_lahir" class="form-control tag_tgl" style="width: 200px" value="<?php echo $tgl_lahir; ?>" required>-->
		</td></tr>
		<tr><td>Jenis Kelamin</td><td><?php echo form_dropdown("jk", $jk_, $jk, "class='form-control' style='width: 400px' required"); ?></td></tr>
		<tr><td>Agama</td><td><?php echo form_dropdown("agama", $agama_, $agama, "class='form-control' style='width: 400px' required"); ?></td></tr>
		<tr><td>Kelas</td><td><?php echo form_dropdown("kelas", $kelas_, $kelas, "class='form-control' style='width: 400px' required"); ?></td></tr>
		
		
		<tr><td colspan="2">
		<input type="submit" value="Simpan" class="btn btn-success"> 
		<input type="button" class="btn btn-danger" value="Kembali" onclick="window.open('<?php echo base_url(); ?>adm/data_siswa/', '_self')"></td></tr>
	</table>		
</form>		

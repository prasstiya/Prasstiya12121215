<?php 
$mode		= $this->uri->segment(3);

if ($mode == "add") {
	$idp		= "";
	$nama		= "";
	$act		= "act_add";
} else if ($mode == "edt") {
	$idp		= $data_edit->id;
	$nama		= $data_edit->nama;
	$act	= "act_edt";
} 
?>

<h2>Topik Berita</h2>
<hr>

<form action="<?php echo base_url(); ?>adm/topik/<?php echo $act; ?>" method="post">
	<input type="hidden" name="idp" value="<?php echo $idp; ?>">
	<table border="0" width="100%" class="table table-form">
		<tr><td width="25%">Topik</td><td><input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>" style="width: 400px" required></td></tr>
		
		<tr><td colspan="2"><input type="submit" class="btn btn-success" value="Simpan"> <input type="button" class="btn btn-danger" value="Kembali" onclick="window.open('<?php echo base_url(); ?>adm/topik', '_self')"></td></tr>
	</table>		
</form>		

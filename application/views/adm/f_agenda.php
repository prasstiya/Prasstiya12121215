<?php 
$mode		= $this->uri->segment(3);

if ($mode == "add") {
	$idp		= "";
	$tgl_mulai	= "";
	$tgl_selesai= "";
	$tempat		= "";
	$acara		= "";
	$deskripsi	= "";
	$act	= "act_add";
} else if ($mode == "edt") {
	$idp		= $data_edit->id;
	$tgl_mulai	= $data_edit->tgl_mulai;
	$tgl_selesai= $data_edit->tgl_selesai;
	$tempat		= $data_edit->tempat;
	$acara		= $data_edit->acara;
	$deskripsi	= $data_edit->deskripsi;
	$act	= "act_edt";
} 
?>

<h2>Agenda</h2>
<hr>

<form action="<?php echo base_url(); ?>adm/agenda/<?php echo $act; ?>" method="post">
	<input type="hidden" name="idp" value="<?php echo $idp; ?>">
	<table border="0" width="100%" class="table table-form">
		<tr><td width="25%">Waktu</td><td><input type="text" name="tgl_mulai" class="form-control tag_tgl" value="<?php echo $tgl_mulai; ?>" style="width: 100px" required> s.d. 
		<input type="text" name="tgl_selesai" class="form-control tag_tgl" value="<?php echo $tgl_selesai; ?>" style="width: 100px" required>
		</td></tr>
		<tr><td width="25%">Tempat</td><td><input type="text" name="tempat" class="form-control" value="<?php echo $tempat; ?>" style="width: 400px" required></td></tr>
		<tr><td width="25%">Acara</td><td><input type="text" name="acara" class="form-control" value="<?php echo $acara; ?>" style="width: 400px" required></td></tr>
		<tr><td width="25%">Deskripsi</td><td><textarea name="deskripsi" class="form-control" style="width: 500px; height: 70px"><?php echo $deskripsi; ?></textarea></td></tr>
		
		<tr><td colspan="2">
		<input type="submit" value="Simpan" class="btn btn-success"> 
		<input type="button" value="Kembali" class="btn btn-danger" onclick="window.open('<?php echo base_url(); ?>adm/agenda', '_self')"></td></tr>
	</table>		
</form>		

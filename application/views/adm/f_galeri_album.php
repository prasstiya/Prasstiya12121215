<?php 
$mode		= $this->uri->segment(3);

if ($mode == "add") {
	$idp		= "";
	$nama		= "";
	$jenis		= "";
	$tampil		= "";
	$act		= "act_add";
} else if ($mode == "edt") {
	$idp		= $data_edit->id;
	$nama		= $data_edit->nama;
	$jenis		= $data_edit->jenis;
	$tampil		= $data_edit->tampil;
	$act		= "act_edt";
} 
?>

<h2>Galeri Album</h2>
<hr>

<form action="<?php echo base_url(); ?>adm/galeri_album/<?php echo $act; ?>" method="post" class="well">
	<input type="hidden" name="idp" value="<?php echo $idp; ?>">
	<table border="0" width="100%" class="table table-form">
		<tr><td width="25%">Nama</td><td><input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>" style="width: 300px" required></td></tr>
		<tr><td width="25%">Jenis</td><td><select name="jenis" class="form-control" style="width: 100px" required><option value="">--</option>
		<?php 
		$jenis_op	= array("url", "file");
		for ($i = 0; $i < sizeof($jenis_op); $i++) {
			if ($jenis == $jenis_op[$i]) {
				echo "<option value='".$jenis_op[$i]."' selected>".$jenis_op[$i]."</option>";
			}  else {
				echo "<option value='".$jenis_op[$i]."'>".$jenis_op[$i]."</option>";
			}
		}
		?></select>
		</td></tr>
		<tr><td width="25%">Tampil</td><td><select name="tampil" class="form-control" style="width: 100px" required><option value="">--</option>
		<?php 
		$opsi	= array("Ya", "Tidak");
		for ($j = 0; $j < sizeof($opsi); $j++) {
			if ($tampil == $opsi[$j]) {
				echo "<option value='".$opsi[$j]."' selected>".$opsi[$j]."</option>";
			}  else {
				echo "<option value='".$opsi[$j]."'>".$opsi[$j]."</option>";
			}
		}
		?></select>
		</td></tr>
		
		<tr><td colspan="2">
		<input type="submit" value="Simpan" class="btn btn-success"> 
		<input type="button" value="Kembali" onclick="window.open('<?php echo base_url(); ?>adm/galeri_album/', '_self')" class="btn btn-danger"></td></tr>
	</table>		
</form>		

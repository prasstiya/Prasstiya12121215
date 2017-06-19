<?php 
$tipe		= $this->uri->segment(3);
?>

<h2>Tanya Jawab</h2>
<hr>
<form action="<?php echo base_url(); ?>adm/tanya/act_jawab" method="post">
	<input type="hidden" name="idp" value="<?php echo $data->id; ?>">
	<table border="0" width="100%" class="table table-form">
		<tr><td width="25%">Nama</td><td><b>: <?php echo $data->nama; ?></b></td></tr>
		<tr><td>Email</td><td><b>: <?php echo $data->email; ?></b></td></tr>
		<tr><td>Telepon/HP</td><td><b>: <?php echo $data->telp_hp; ?></b></td></tr>
		<tr><td>Alamat</td><td><b>: <?php echo $data->alamat; ?></b></td></tr>
		<tr><td>Pesan/Pertanyaan</td><td><b>: <?php echo $data->pesan; ?></b></td></tr>
		<tr><td>Jawaban Admin</td><td><input type="text" name="jawaban" class="form-control" value="<?php echo $data->jawaban; ?>"></td></tr>
		
		<tr><td colspan="2">
		<input type="submit" value="Simpan" class="btn btn-success"> 
		<input type="button" value="Kembali" class="btn btn-danger" onclick="window.open('<?php echo base_url(); ?>adm/tanya/', '_self')"></td></tr>
	</table>		
</form>		
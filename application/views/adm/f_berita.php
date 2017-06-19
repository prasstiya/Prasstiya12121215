<?php 
$tipe		= $this->uri->segment(3);
$mode		= $this->uri->segment(4);
$tampil_	= array("profil", "fasilitas", "ekstra");

if ($mode == "add") {
	$idp	= "";
	$judul	= "";
	$topik	= "";
	$isi	= "";
	$komen	= "";
	$tampil	= "";
	$act	= "act_add";
} else if ($mode == "edt") {
	$idp	= $data_edit->id;
	$judul	= $data_edit->judul;
	$topik	= $data_edit->topik;
	$isi	= $data_edit->isi;
	$komen	= $data_edit->komen;
	$tampil	= $data_edit->tampil;
	$act	= "act_edt";
} 
?>

<h2>Topik Berita</h2>
<hr>

<?php echo form_open_multipart(base_url()."adm/post/".$tipe."/".$act); ?>
	<input type="hidden" name="idp" value="<?php echo $idp; ?>">
	<input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
	<table border="0" width="100%" class="table table-form">
		<tr><td width="25%">Judul</td><td><input type="text" name="judul" class="form-control" value="<?php echo $judul; ?>" style="width: 500px" required></td></tr>
		<tr><td width="25%">Gambar</td><td><input type="file" name="gambar_posting" class="form-control" style="width: 500px"></td></tr>
		<?php 
		if (in_array($tipe, $tampil_) == FALSE) {
		?>
		<tr><td width="25%">Topik</td><td>
		<select name="topik" class="form-control" style="width: 300px"><option value=""> - pilih topik - </option>
		
		<?php 
		$q_topik	= $this->db->query("SELECT * FROM ref_topik")->result();
		if (!empty($q_topik)) {
			foreach($q_topik as $g) {
				if ($g->id == $topik) {
					echo "<option value='".$g->id."' selected>".$g->nama."</option>";
				} else {
					echo "<option value='".$g->id."'>".$g->nama."</option>";
				}
			}
		} else {
			echo "topik masih kosong, klik <a href='".base_url()."adm/topik/add'>disini</a> jika ingin menambahkan";
		}
		?>
		</select>
		</td></tr>
		<?php } ?>
		<tr><td width="25%">Isi</td><td><textarea name="isi" id="editornya" style="width: 500px; height: 200px"><?php echo str_replace("\\","",$isi); ?></textarea></td></tr>
		<!-- nonaktifkan izin komentar <tr><td width="25%">Izinkan komentar</td><td><select name="komen" required class="form-control"><option value="">--</option>->
		<?php 
		$opsi	= array("Ya", "Tidak");
		for ($i = 0; $i < sizeof($opsi); $i++) {
			if ($komen == $opsi[$i]) {
				echo "<option value='".$opsi[$i]."' selected>".$opsi[$i]."</option>";
			}  else {
				echo "<option value='".$opsi[$i]."'>".$opsi[$i]."</option>";
			}
		}
		?></select>
		</td></tr>-->
		<tr><td width="25%">Langsung tampil</td><td><select name="tampil" class="form-control" required>
		<?php 
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
		<input type="submit" value="Simpan" class="btn btn-success"> <input type="button" class="btn btn-danger" value="Kembali" onclick="window.open('<?php echo base_url(); ?>adm/post/<?php echo $tipe; ?>', '_self')"></td></tr>
	</table>		
</form>		

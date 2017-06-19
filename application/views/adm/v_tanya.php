<h2>Tanya Jawab</h2>
<hr>

<table style="width: 100%" class="table table-bordered">
<thead>
	<tr>
		<th width="5%">No</th>
		<th width="30%">Pengirim</th>
		<th width="45%">Pertanyaan / Jawaban</th>
		<th width="20%">Aksi</th>
	</tr>
</thead>
<tbody>
<?php 
if (empty($data)) {
	echo "<tr><td colspan='4'>-- belum ada data --</td></tr>"; 
} else {
	$no = 1;
	foreach($data as $d) {
?>
	<tr>
		<td class="ctr"><?php echo $no++; ?></td>
		<td><?php echo $d->nama."<br>Email : ".$d->email."<br>Telp/HP: ".$d->telp_hp."<br>Alamat: ".$d->alamat; ?></td>
		<td><?php echo $d->pesan."<br><b>Jawaban : </b>".$d->jawaban; ?></td>
		<td class="ctr">
			<?php if ($d->is_view == "N") { ?>
			<a href="<?php echo base_url(); ?>adm/tanya/tampilkan/<?php echo $d->id; ?>" class="label label-success">Tampilkan</a>
			<?php } else { ?>
			<a href="<?php echo base_url(); ?>adm/tanya/sembunyikan/<?php echo $d->id; ?>" class="label label-danger">Sembunyikan</a>
			<?php } ?>
			<a href="<?php echo base_url(); ?>adm/tanya/jawab/<?php echo $d->id; ?>" class="label label-info">Jawab</a>
		</td>
	</tr>
<?php 
	}
}
?>
</tbody>
</table>
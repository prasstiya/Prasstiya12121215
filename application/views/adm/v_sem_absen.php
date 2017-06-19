<h2>Data absen</h2>
<hr>

<input type="button" value="Tambah Data" onclick="window.open('<?php echo base_url()."adm/data_absensi/add"; ?>', '_self');" class="btn btn-success">
<input type="button" value="Tampil semua data" onclick="window.open('<?php echo base_url()."adm/tampil_absen/tampil"; ?>', '_self');" class="btn btn-success">
<input type="button" value="Data absensi" onclick="window.open('<?php echo base_url()."adm/data_absensi/"; ?>', '_self');" class="btn btn-success">
<!--
<a href="<?php echo base_url(); ?>adm/download_data_absensi" class="btn btn-info">Download Data</a>
<a href="<?php echo base_url(); ?>adm/data_absensi/lebih_17" class="btn btn-danger">Lebih dari 17 tahun</a>
<a href="<?php echo base_url(); ?>adm/data_absensi/kurang_17" class="btn btn-success">Kurang dari 17 tahun</a>
-->
<br><br>
<?php echo $this->session->flashdata('k'); ?>

<div class="alert alert-info">
	<b> </b>
</div>
<table style="width: 60%" class="table table-bordered">
	<tr>
		<th width="10%">Kelas</th>
		<th width="60%">Nama</th>
		<th width="60%">Tanggal</th>
		
		<th width="20%">Keterangan</th>
		<th width="10%">Aksi</th>
	</tr>
</thead>
<tbody>
<?php 
if (empty($data)) {
	echo "<tr><td colspan='6'>-- belum ada data --</td></tr>"; 
} else {
	$no = 1;
	foreach($data as $d) {
		$ket = "";
		if ($d->ket == "A") {
			$ket = "Tanpa Keterangan";
		} elseif ($d->ket == "S") {
			$ket = "Sakit";
		} 
		elseif ($d->ket == "I") {
			$ket = "Izin";
		}
		elseif ($d->ket == "H") {
			$ket = "Hadir";
		} 		
		else {
			$ket = "-";
		}
?>
	<tr>
		<td class="ctr"><?php echo $d->kelas; ?></td>
		<td><?php echo $d->nmsiswa; ?></td>
		<td class="ctr"><?php echo $d->tgl; ?></td>
		<td class="ctr"><?php echo $ket; ?></td>
		<td class="ctr">
			<a href="<?php echo base_url(); ?>adm/tampil_absen/hapus/<?php echo $d->id; ?>" class="label label-danger" onclick="return confirm('Anda yakin..?');">Hapus</a>
		</td>
	</tr>
<?php 
	}
}
?>

</tbody>

</table>
<center><ul class="pagination"><?php echo $pagi; ?></ul></center>
<!-- Begin Content -->
<div class="col-md-9">
					
	<!-- Magazine News -->
	<div class="panel panel-warning" style="margin-left: -30px">
			<div class="panel-heading" style="background: #0a36f3">
				<h4><i class="fa fa-picture-o"></i> Data Absensi </h4>
			</div>
			<div class="panel-body">
				<div class="col-md-12 panel-body" style="margin: 0px auto">
					<div class="form-group">
					<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>web/data_absensi/cari">
						<div class="col-md-10">
							<input type="text" name="cari" class="form-control" placeholder="Masukkan NIS ..." value="" required>
						</div>
						<div class="col-md-2">
							<button type="submit" class="btn btn-success"><i class="fa fa-search"></i>
							Cari</button>
						</div>
					</form>
					</div>
				</div>
				<div class="alert alert-success">Data yang ditampilkan adalah data absensi hari ini, tanggal  <?php echo tgl_jam_sql(date('Y-m-d')); ?></div>
					
				<div class="magazine-news" style="margin-top: 20px">
					<table style="width: 100%" class="table table-bordered">
						<tr>
							<th width="5%">No</th>
							<th width="50%">Nama</th>
							<th width="20%">Kelas</th>
							<th width="25%">Keterangan</th>
							<th width="30%">Keterangan</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					if (empty($data)) {
						echo "<tr><td colspan='5'><div class='label label-info'>Tidak ada data yang ditampilkan. Silakan masukkan NIS..!</div></td></tr>"; 
					} else {
						$no = 1;
						foreach($data as $d) {
							$ket = "";

							if ($d['ket'] == "A") {
								$ket = '<div class="label label-danger">Tanpa keterangan</div>';
							} else if ($d['ket'] == "S") {
								$ket = '<div class="label label-info">Sakit</div>';
							} else if ($d['ket'] == "I") {
								$ket = '<div class="label label-info">Izin</div>';
							} else if ($d['ket'] == "H") {
								$ket = '<div class="label label-success">Hadir</div>';
							} else {
								$ket = '<div class="label label-danger">Siswa belum di absensi</div>';
							}

					?>
						<tr>
							<td class="ctr"><?php echo $no++; ?></td>
							<td><?php echo $d['nama']; ?></td>
						
							<td class="ctr"><?php echo $d['kelas']; ?></td>
							<td class="ctr"><?php echo $d['tgl']; ?></td>
							<td><?php echo $ket; ?></td>
							
						</tr>
					<?php 
						}
					}
					?>
					</tbody>
					
					</table>
				</div>
				<!-- End Magazine News -->
			</div>
		</div>	
</div>
<!-- End Content -->
			
<!-- Begin Content -->
<div class="col-md-9">
					
	<!-- Magazine News -->
	<div class="panel panel-warning" style="margin-left: -30px">
			<div class="panel-heading" style="background: #0a36f3">
				<h4><i class="fa fa-picture-o"></i> Data Siswa </h4>
			</div>
			<div class="panel-body">
			
				<div class="magazine-news" style="margin-top: 20px">
				<div class="table-responsive">
  

					<table style="width: 100%" class="table table-bordered">
						<tr>
							<th class="success" width="5%">No</th>
							<th class="success" width="30%">Nama, NIS</th>
							<th class="success" width="20%">Tempat, Tgl Lahir</th>
							<th class="success" width="25%">Kelas</th>
							<th class="success" width="25%">Jenis Kelamin, Agama</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					if (empty($data)) {
						echo "<tr><td colspan='5'>-- belum ada data --</td></tr>"; 
					} else {
						$uri4 = $this->uri->segment(4);
						$no = empty($uri4) ? 1 : ($uri4+1);
						foreach($data as $d) {
					?>
						<tr>
							<td class="ctr"><?php echo $no++; ?></td>
							<td><?php echo "<u><b>".$d->nama."</b></u><br>NIS: ".$d->nis; ?></td>
							<td><?php echo $d->tmp_lahir.", <br>".tgl_jam_sql($d->tgl_lahir); ?></td>
							<td><?php echo $d->kelas; ?></td>
							<td><?php echo $d->jk."<br>".$d->agama; ?></td>
						</tr>
					<?php 
						}
					}
					?>
					</tbody>
					</table>
					</div>
				</div>
				<!-- End Magazine News -->
			</div>	
			<center><ul class="pagination"><?php echo $pagi; ?></ul></center>
		</div>	
</div>
<!-- End Content -->
			
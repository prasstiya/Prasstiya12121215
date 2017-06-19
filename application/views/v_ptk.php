<!-- Begin Content -->
<div class="col-md-9">
					
	<!-- Magazine News -->
	<div class="panel panel-warning" style="margin-left: -30px">
			<div class="panel-heading" style="background: #0a36f3">
				<h4><i class="fa fa-picture-o"></i> Data Guru </h4>
			</div>
			<div class="panel-body">
			<div class="table-responsive">
 

				<div class="magazine-news" style="margin-top: 20px">
					<table style="width: 100%" class="table table-bordered ">
						<tr>
							<th width="5%">No</th>
							<th width="20%">*</th>
							<th width="30%">Nama, NIP</th>
							<th width="20%">Tempat, Tgl Lahir</th>
							<th width="25%">Tugas</th>
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
							$file_ada = file_exists('./upload/ptk/'.$d->foto);							
							$foto	= ($d->foto == "" || $file_ada == FALSE) ? "<img class='thumbnail col-lg-12 img-responsive' src='".base_url()."upload/ptk/no_foto.jpg'>" : "<img class='thumbnail col-lg-12 img-responsive' src='".base_url()."upload/ptk/".$d->foto."'>";
					?>
						<tr>
							<td class="ctr"><?php echo $no++; ?></td>
							<td><?php echo $foto; ?></td>
							<td>
							<?php echo "<u><b>".$d->nama."</b></u><br>NIP: ".$d->nip."<br>Email: ".$d->email."<br>Blog: ".$d->blog; ?>
							</td>
							<td><?php echo $d->tmp_lahir.", <br>".tgl_jam_sql($d->tgl_lahir); ?></td>
							<td><?php echo $d->tugas.": <b>".$d->tugas_detil."</b>"; ?></td>
						</tr>
					
					<?php 
						}
					}
					?>
					<!--if (empty($data)) {
						echo "<tr><td colspan='7'>-- belum ada data --</td></tr>"; 
					} else {
						$no = 1;
						foreach($data as $d) {
							$file_ada = file_exists('./upload/ptk/'.$d->foto);							
							$foto	= ($d->foto == "" || $file_ada == FALSE) ? "<img class='thumbnail col-lg-12' src='".base_url()."upload/ptk/no_foto.jpg'>" : "<img class='thumbnail col-lg-12' src='".base_url()."upload/ptk/".$d->foto."'>";
					?>
						<tr>
							<td class="ctr"><?php echo $no++; ?></td>
							<td><?php echo $foto; ?></td>
							<td>
							<?php echo "<u><b>".$d->nama."</b></u><br>NIP: ".$d->nip."<br>Email: ".$d->email."<br>Blog: ".$d->blog; ?>
							</td>
							<td><?php echo $d->tmp_lahir.", <br>".tgl_jam_sql($d->tgl_lahir); ?></td>
							<td><?php echo $d->tugas.": <b>".$d->tugas_detil."</b>"; ?></td>
						</tr>
					<?php
					{

					}
					?>-->
					
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
			
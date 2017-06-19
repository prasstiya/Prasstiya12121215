<!-- Begin Content -->
<div class="col-md-9" style="margin-left: ">
			<!--Info Block-->
			<div class="col-md-12">
			<div class="panel panel-warning" style="margin-left: -30px">
			<div class="panel-heading" style="background: #0a36f3">
				<h4><i class="fa fa-calendar"></i> Agenda Kegiatan</h4>
			</div>
			
				<!--<div  style="margin-bottom: 30px"><h2><i class="fa fa-calendar"></i> Agenda Kegiatan</h2><hr></div>-->	
<div class="magazine-news" style="margin-top: 20px">				
				<?php 
				if (!empty($data)) {
					foreach ($data as $b4) {
				?>
				
				<div class="funny-boxes funny-boxes-top-yellow">
					<div class="row">
						<div class="col-md-4 funny-boxes-img">
							<!--<img class="img-responsive" src="assets/img/new/img11.jpg" alt="">-->
							<ul class="list-unstyled fa-fixed" style="margin:10px">
							   <li><i class="fa fa-calendar"></i> <?php echo tgl_jam_sql($b4->tgl_mulai)." s.d ".tgl_jam_sql($b4->tgl_selesai); ?></li>
							   <li><i class="fa fa-map-marker"></i> <?php echo $b4->tempat; ?></li>
							</ul>
						</div>
						<div class="col-md-8" >
							<h2><?php echo $b4->acara; ?></h2>
							<!--<ul class="list-unstyled funny-boxes-rating">
							   <li><i class="fa fa-star"></i></li>
							   <li><i class="fa fa-star"></i></li>
							   <li><i class="fa fa-star"></i></li>
							   <li><i class="fa fa-star"></i></li>
							   <li><i class="fa fa-star"></i></li>
							</ul>-->
							<p><?php echo substr($b4->deskripsi, 0, 200); ?></p>
						</div>
					</div>                            
				</div>
				<?php 
					}
				} else { 
					echo "<div class='alert alert-danger'>Not found</div>";
				}
				?>
			</div>
			</div>
			</div>
			
			
			
			<!--End Info Block-->
				
				
				
			<center><ul class="pagination"><?php echo $pagi; ?></ul></center>
</div>
<!-- End Content -->
			
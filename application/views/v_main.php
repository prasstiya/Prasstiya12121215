 <!-- Begin Content -->
            <div class="col-md-9" style="margin-left: -30px">
                <!-- Magazine Slider -->
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
					<?php 
					$gambarnya	= "";
					if (!empty($ss)) {
						$no 	= 0;
						foreach ($ss as $s) {
							$active 	= $no == 0 ? "active" : "";
							$gambarnya	.= '	<div class="item '.$active.'">
											<img src="'.base_url().'upload/posting/'.$s->gambar.'" style="width: 973px; height: 352px">
												<div class="container">
													<div class="carousel-caption">
														<h2 class="judul">'.$s->judul.'</h2>
														<p>'.substr(strip_tags($s->isi), 0, 200).'</p>
													</div>
												</div>
											</div>';
							echo '<li data-target="#myCarousel" data-slide-to="'.$no.'" class="'.$active.'"></li>';
							$no++;
						}
					?>
					</ol>
					
					<div class="carousel-inner">
					<?php 
						echo $gambarnya; 
						echo "</div>";
					} else { 
					?>
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
					 <div class="carousel-inner">
						<div class="item active">
                            <img alt="" src="<?php echo base_url(); ?>aset/web_/gambar/2.jpg">
                            <div class="container">
								<div class="carousel-caption">
									<h2 class="judul">Judul Berita</h2>
									<p>Facilisis odio, dapibus ac justo acilisis gestinas.Facilisis odio, dapibus ac justo acilisis gestinas.Facilisis odio, dapibus ac justo acilisis gestinas.</p>
								</div>
							</div>
                        </div>
                        <div class="item">
                            <img alt="" src="<?php echo base_url(); ?>aset/web_/gambar/1.jpg">
                            <div class="container">
								<div class="carousel-caption">
									<h2 class="judul">Judul Berita</h2>
									<p>Cras justo odio, dapibus ac facilisis into egestas. Cras justo odio, dapibus ac facilisis into egestas. Cras justo odio, dapibus ac facilisis into egestas.</p>
								</div>
                            </div>
							</div>
                        <div class="item">
                            <img alt="" src="<?php echo base_url(); ?>aset/web_/gambar/3.jpg">
                            <div class="container">
								<div class="carousel-caption">
									<h2 class="judul">Judul Berita</h2>
									<p>Justo cras odio apibus ac afilisis lingestas de. Justo cras odio apibus ac afilisis lingestas de. Justo cras odio apibus ac afilisis lingestas de.</p>
								</div>
							</div>
                        </div>
					</div>
						<?php } ?>
						<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
 
                    </div>
                  <!-- End Magazine Slider -->
				</br>
                <!-- Magazine News -->
				<div class="panel panel-warning" >
						<div class="panel-heading " style="background: #FF8C00">
							<h4><i class="fa fa-rss "></i> Berita Terbaru </h4>
						</div>
						<div class="panel-body ">
						
							<div class="magazine-news ">
								<div class="row">
									<?php 
									if (!empty($berita1)) {
										foreach ($berita1 as $b1) {
									?>
									<div class="col-md-6">
										<div class="magazine-news-img">
											<?php
											echo $tag = empty($b1->nama) ? "" : '<span class="label label-info"><i class="fa fa-tag"> </i> '.$b1->nama.'</span>';
											?>
										</div>
										<h3><a href="<?php echo base_url(); ?>web/read/<?php echo $b1->id; ?>/<?php echo url_title($b1->judul, "-", TRUE); ?>"><?php echo $b1->judul; ?></a></h3>
										<div class="by-author">
											<strong>By <?php echo $b1->nama_admin; ?></strong>
											<span>/ <?php echo tgl_jam_sql($b1->tgl_post); ?></span>
										</div> 
										<p align="justify"><?php echo substr(strip_tags($b1->isi), 0, 300); ?> ... </p>
									</div>
									<?php 
										}
									} else {
										echo "<div class='alert alert-danger'>Not found</div>";
									} 
									?>
								</div>
							</div>
							<!-- End Magazine News -->
							<a href="<?php echo base_url(); ?>web/berita" class="btn btn-warning pull-right"><i class="fa fa-rss"> </i> Lihat Arsip Berita</a>
						</div>				
					</div>

                <hr>
                
                <!-- Magazine Mini News and Info Block -->
                <div class="row">
					<!--Mini News-->
                    <div class="col-md-5">
						<div class="panel panel-success">
						<div class="panel-heading">
							<h4><i class="fa fa-volume-up"></i> Pengumuman </h4>
						</div>
						<div class="panel-body">
							<?php 
							if (!empty($berita2)) {
								foreach ($berita2 as $b2) {
							?>
							<div class="magazine-mini-news" style="margin-top: -10px; margin-bottom: -10px">
								<h4><a href="<?php echo base_url(); ?>web/read/<?php echo $b2->id; ?>/<?php echo url_title($b2->judul, "-", TRUE); ?>"><?php echo $b2->judul; ?></a></h4>
								<div class="post-author">
									<strong>By : <?php echo $b2->nama_admin; ?> <br><?php echo tgl_jam_sql($b2->tgl_post); ?></strong> 
									<hr>
								</div>
								<p><?php echo substr(strip_tags($b2->isi), 0, 100); ?> ...</p>
							</div>
							<hr>
							<?php 
								}
							} else {
								echo "<div class='alert alert-danger'>Not found</div>";
							}
							?>
							<a href="<?php echo base_url(); ?>web/pengumuman" class="btn btn-success col-lg-12"><i class="fa fa-rss"> </i> Lihat Arsip Pengumuman</a>
						</div>
						</div>
                    </div>
                    <!--End Mini News-->

                    <!--Info Block-->
                    <div class="col-md-7">
	                    <div class="panel panel-info">
		                    <div class="panel-body">
								<div class=""><h2><i class="fa fa-calendar"></i> Agenda Kegiatan</h2><hr></div>
									<?php 
									if (!empty($berita4)) {
										foreach ($berita4 as $b4) {
									?>
									
									<div class="funny-boxes funny-boxes-top-sea">
										<div class="row">
											<div class="col-md-5 funny-boxes-img">
												<!--<img class="img-responsive" src="assets/img/new/img11.jpg" alt="">-->
												<ul class="list-unstyled fa-fixed">
												   <li><i class="fa fa-calendar"></i> Waktu : <br><span style="font-size: 13px"><?php echo tgl_jam_sql($b4->tgl_mulai)." s.d. ".tgl_jam_sql($b4->tgl_selesai); ?></span></li>
												   <li><i class="fa fa-map-marker"></i> Lokasi : <br><span style="font-size: 13px"><?php echo $b4->tempat; ?></span></li>
												</ul>
											</div>
											<div class="col-md-7">
												<h4 style="margin-top: 0px"><a href="#"><?php echo $b4->acara; ?></a></h4>
												<!--<ul class="list-unstyled funny-boxes-rating">
												   <li><i class="fa fa-star"></i></li>
												   <li><i class="fa fa-star"></i></li>
												   <li><i class="fa fa-star"></i></li>
												   <li><i class="fa fa-star"></i></li>
												   <li><i class="fa fa-star"></i></li>
												</ul>-->
												<p><?php echo substr(strip_tags($b4->deskripsi), 0, 300); ?></p>
											</div>
										</div>                            
									</div>
									<?php 
										}
									} else { 
										echo "<div class='alert alert-danger'>Not found</div>";
									}
									?>
									<a href="<?php echo base_url(); ?>web/agenda" class="btn btn-warning col-lg-12"><i class="fa fa-rss"> </i> Lihat Agenda Lainnya</a>
			                </div>
			            </div>
			        </div>
                    <!--End Info Block-->
                </div>
                <!-- End Magazine Mini News and Info Block -->
				
				<!-- Artikel -->
				<!-- Magazine News -->
				<div class="panel panel-info ">
						<div class="panel-heading" style="background: #FF8C00" >
							<h4><i class="fa fa-rss"></i> Artikel Terbaru </h4>
						</div>
						<div class="panel-body">
						
							<div class="magazine-news">
								<div class="row">
									<?php 
									if (!empty($berita3)) {
										foreach ($berita3 as $b3) {
									?>
									<div class="col-md-6">
										<div class="magazine-news-img">
											<?php
											echo $tag = empty($b3->nama) ? "" : '<span class="label label-info"><i class="fa fa-tag"> </i> '.$b3->nama.'</span>';
											?>
										</div>
										<h3><a href="<?php echo base_url(); ?>web/read/<?php echo $b3->id; ?>/<?php echo url_title($b3->judul, "-", TRUE); ?>"><?php echo $b3->judul; ?></a></h3>
										<div class="by-author">
											<strong>By <?php echo $b3->nama_admin; ?></strong>
											<span>/ <?php echo tgl_jam_sql($b3->tgl_post); ?></span>
										</div> 
										<p align="justify"><?php echo substr(strip_tags($b3->isi), 0, 300); ?> ... </p>
									</div>
									<?php 
										}
									} else {
										echo "<div class='alert alert-danger'>Not found</div>";
									} 
									?>
								</div>
							</div>
							<!-- End Magazine News -->
							<a href="<?php echo base_url(); ?>web/artikel" class="btn btn-info pull-right"><i class="fa fa-rss"> </i> Lihat Arsip Artikel</a>
						</div>				
					</div>
					
                <hr>
				<!-- End Artikel -->

            </div>
            <!-- End Content -->
			
<!-- Begin Sidebar -->
<div class="col-md-3">

<div class="panel panel-default" id="panel_kiri">
<div class="panel panel-success">
		<div class="panel-heading " style="background: #">
							<h4><i class="fa fa-user "></i> Kepala Sekolah </h4>
						</div></div>
	<div class="panel-body">
	
                <!-- Social Icons -->
                <div class="magazine-sb-social margin-bottom-35">
				
                   <!-- <div class="headline headline-md"><h2><i class="fa fa-user"></i> Ka. Sekolah </h2><hr class="style2"></div>-->
                    <div class="">
						<!-- DISINI TEMPAT SAMBUTAN KEPALA -->
						<p>
						<p align="center"><strong><em> <img class="thumbnail" src="<?php echo $this->config->item('foto_kepala'); ?>" alt="Siti Rosidah, S.Pd" width="159" height="200" /> </em></strong></p>
						<p align="center" style="text-decoration: underline"><b><?php echo $this->config->item('nama_kepsek'); ?></b></p>
						<p align="justify"><strong><em>Assalamualaikum warah matullahi wabarakatuh.</em></strong></p>
						<p align="justify">Kami ucapkan selamat datang dan terima kasih yang sebesar-besarnya karena Anda telah berkunjung di&nbsp;<strong>www..sch.id</strong>. 
						<a href="<?php echo base_url(); ?>web/read/115/sambutan-kepala-madrasah"> lanjut.. </a>
						</strong></em></p>
						</p>
						<!-- SAMPAI DISINI TEMPAT SAMBUTAN KEPALA  -->
					</div>
                    <div class="clearfix"></div>                
                </div>
                <!-- End Social Icons -->

                <!-- Quick Links -->
				</div>
				
				<div class="panel panel-success">
		<div class="panel-heading " style="background: #">
							<h4><i class="fa fa-link "></i> Tautan </h4>
						</div></div>
						<div class="panel-body">
                <div class="magazine-sb-categories margin-bottom-20">
				
                    <!--<div class="headline headline-md"><h2><i class="fa fa-link"></i> Tautan</h2><hr class="style2"></div>-->
                    <div class="row">
                        <div class="col-lg-12">                            
							<a href='http://disdik.slemankab.go.id/' target="_blank" title="Dinas Pendidikan Kabupaten Sleman">
							<img src="<?php echo base_url(); ?>upload/kelengkapan/Dinas.JPG" style="padding: 2px; border: 1px solid lightGrey;width: 100%; margin-bottom: 10px;"/></a>
							<a href='http://nisn.data.kemdikbud.go.id/page/data' target="_blank" title="Nomor Induk Siswa Nasional">
							<img src="<?php echo base_url(); ?>upload/kelengkapan/nisn.JPG" style="padding: 2px; border: 1px solid lightGrey;width: 100%; margin-bottom: 10px;"/></a>
							<a href='https://sleman.siap-ppdb.com/#!/0200' target="_blank" title="Penerimaan siswa baru Online">
							<img src="<?php echo base_url(); ?>upload/kelengkapan/ppdb.JPG" style="padding: 2px; border: 1px solid lightGrey;width: 100%; margin-bottom: 10px;"/></a>
							
							<a>
							<!--<?php echo $this->calendar->generate(); ?>-->
							<?php echo $this->load->view('widget/kalender');?>
							</a>
                        </div>                       
                    </div>
                </div>
		</div>
	</div>
                <!-- End Quick Links -->

                <!-- Photo Stream -
                <div class="headline"><h2>Photo Stream</h2></div>            
                <ul class="list-unstyled blog-photos margin-bottom-35">
                    <!--<li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/5.jpg"></a></li>
                    <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/6.jpg"></a></li>
                    <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/8.jpg"></a></li>
                    <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/10.jpg"></a></li>
                    <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/11.jpg"></a></li>
                    <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/1.jpg"></a></li>
                    <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/2.jpg"></a></li>
                    <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/7.jpg"></a></li>-->
                </ul>
                <!-- End Photo Stream -->

                <!-- Blog Twitter -
                <div class="blog-twitter">
                    <div class="headline"><h2>Latest Tweets</h2></div>
                    <div class="blog-twitter-inner">
                        <i class="icon-twitter"></i>
                        <a href="#">@htmlstream</a> 
                        At vero seos etodela ccusamus et iusto odio dignissimos. 
                        <a href="#">http://t.co/sBav7dm</a> 
                        <span class="twitter-time">5 hours ago</span>
                    </div>
                    <div class="blog-twitter-inner">
                        <i class="icon-twitter"></i>
                        <a href="#">@htmlstream</a> 
                        At vero eos et accusamus et iusto odio dignissimos. 
                        <a href="#">http://t.co/sBav7dm</a> 
                        <span class="twitter-time">5 hours ago</span>
                    </div>
                    <div class="blog-twitter-inner">
                        <i class="icon-twitter"></i>
                        <a href="#">@htmlstream</a> 
                        At vero eos et accusamus et iusto odio dignissimos. 
                        <a href="#">http://t.co/sBav7dm</a> 
                        <span class="twitter-time">5 hours ago</span>
                    </div>
                    <div class="blog-twitter-inner">
                        <i class="icon-twitter"></i>
                        <a href="#">@htmlstream</a> 
                        At vero eos et accusamus et iusto odio dignissimos. 
                        <a href="#">http://t.co/sBav7dm</a> 
                        <span class="twitter-time">5 hours ago</span>
                    </div>
                </div>
                <!-- End Blog Twitter -->
            </div>
            <!-- End Sidebar -->
			
			

<div class="col-lg-3">
	<!--<div class="panel panel-info">
		<div class="panel-heading">
			<h4><i class="fa fa-tags fa-fw"></i> Foto Terbaru</h4>
		</div>
		<div class="panel-body" style="padding: 3px">
			<ul class="nav nav-pills nav-stacked">
				<?php 
				$q_kategori	= $this->db->query("SELECT * FROM galeri_file WHERE id_album ")->result(); 
				
				if (!empty($q_kategori)) {
					foreach ($q_kategori as $k) {
				?>
					<li><a href="#"><?php echo $k->file_url; ?> <span class="badge pull-right"><?php echo $k->ket; ?></span></a></li>
				<?php 
					}
				}
				?>
			</ul>
		</div>
	</div>-->			
	
	<!-- POLLING start here --
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4><i class="fa fa-pencil-square-o fa-fw"></i> Polling</h4>
		</div>
		<div class="panel-body" style="padding: 3px">
			
		</div>
	</div>		
	
</div>-->
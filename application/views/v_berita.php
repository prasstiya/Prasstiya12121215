<!-- Begin Content -->
<div class="col-md-9">
					
	<!-- Magazine News -->
	<div class="panel panel-warning" style="margin-left: -30px">
			<div class="panel-heading" style="background: #0a36f3">
				<h4><i class="fa fa-plus"></i> Index Berita </h4>
			</div>
			<div class="panel-body">
			
				<div class="magazine-news" style="margin-top: 5px">
					<?php 
					if (!empty($data)) {
						foreach ($data as $b1) {
					?>
					<div class="col-md-12" style="margin-bottom: 30px; background: #efefef">
					
					<h3 style="margin-top: 10px; margin-bottom: 0px"><a href="<?php echo base_url(); ?>web/read/<?php echo $b1->id; ?>/<?php echo url_title($b1->judul, "-", TRUE); ?>"><?php echo $b1->judul; ?></a></h3>
						
						<!--<h3 style="margin-bottom: 10px"><?php echo $b1->judul; ?></h3>-->
						<div class="by-author" style="margin-bottom: 15px">
							By <strong><?php echo $b1->nama_admin; ?></strong>
							<span>/ pada tanggal <b><?php echo tgl_jam_sql($b1->tgl_post); ?></b></span>
						</div> 
						<hr style="margin-top: -5px">
						<p align="justify" style="margin-bottom: 5px; overflow: auto;">
						<?php 
						if (!empty($b1->gambar)) {
						?>
						<img class="thumbnail" src="<?php echo base_url()."upload/posting/".$b1->gambar.""; ?>" style="display: inline; float: left; width: 100px; height: 100px; margin-right: 20px">
						<?php
						}
						?>
						<?php echo substr(strip_tags($b1->isi), 0, 400); ?> ... &nbsp;&nbsp; <a href="<?php echo base_url(); ?>web/read/<?php echo $b1->id; ?>/<?php echo url_title($b1->judul, "-", TRUE); ?>">[read more]</a></p>
						</p>
						
						<div class="" style="margin: 10px 0 20px 0">
							Kategori <span class="label label-warning"><i class="fa fa-tag"> </i>  <?php echo $b1->nama; ?></span>             
						</div>
					</div>
					
					<?php 
						}
					} else {
						echo "<div class='alert alert-danger'>Not found</div>";
					} 
					?>
				</div>
				<!-- End Magazine News -->
			</div>	
			<center><ul class="pagination"><?php echo $pagi; ?></ul></center>
		</div>	
</div>
<!-- End Content -->
			
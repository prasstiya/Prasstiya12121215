<!-- Begin Content -->
<div class="col-md-9">
					
	<!-- Magazine News -->
	<div class="panel panel-warning" style="margin-left: -30px">
			<div class="panel-heading" style="background: #0a36f3">
				<h4><i class="fa fa-rss"></i> Pengumuman Terbaru </h4>
			</div>
			<div class="panel-body">
			
				<div class="magazine-news" style="margin-top: 20px">
					<?php 
					if (!empty($data)) {
						foreach ($data as $b1) {
					?>
					<div class="col-md-12">
						
						<h3 style="margin-top: -20px; margin-bottom: 0px"><a href="<?php echo base_url(); ?>web/read/<?php echo $b1->id; ?>/<?php echo url_title($b1->judul, "-", TRUE); ?>"><?php echo $b1->judul; ?></a></h3>
						<div class="by-author" style="margin-bottom: 10px">
							By <strong><?php echo $b1->nama_admin; ?></strong>
							<span>/ <?php echo tgl_jam_sql($b1->tgl_post); ?></span>
						</div> 
						<p style="margin-bottom: 10px; overflow: auto">
						<?php 
						if (!empty($b1->gambar)) {
						?>
						<img class="thumbnail" src="<?php echo base_url()."upload/posting/".$b1->gambar.""; ?>" style="display: inline; float: left; width: 100px; height: 100px; margin-right: 20px">
						<?php
						}
						?>
						<?php echo substr(strip_tags($b1->isi), 0, 400); ?> ... &nbsp;&nbsp; <a href="<?php echo base_url(); ?>web/read/<?php echo $b1->id; ?>/<?php echo url_title($b1->judul, "-", TRUE); ?>">[read more]</a></p>
						<div class="magazine-news-img">
							Kategori <span class="label label-warning"><i class="fa fa-tag"> </i>  <?php echo $b1->nama; ?></span>                                    
						</div>
						<hr style="border-style: dotted; margin-top: 13px">
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
			
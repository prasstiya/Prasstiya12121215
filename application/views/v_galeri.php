<!-- Begin Content -->
<div class="col-md-9">
					
	<!-- Magazine News -->
	<div class="panel panel-warning" style="margin-left: -30px">
			<div class="panel-heading">
				<h4><i class="fa fa-picture-o"></i> Galeri Foto </h4>
			</div>
			<div class="panel-body">
			
				<div class="magazine-news" style="margin-top: 20px">
					<?php 
					if (!empty($data)) {
						foreach ($data as $b1) {
							$foto_sampul	= $this->db->query("SELECT file_url FROM galeri_file WHERE id_album = '".$b1->id."' LIMIT 1")->row();
							if (!empty($foto_sampul->file_url)) {
								if ($b1->jenis == "file") {
									$url_file = base_url()."upload/galeri/".$foto_sampul->file_url;
								} else {
									$url_file = $foto_sampul->file_url;
								}
							} else {
								$url_file  		= base_url()."upload/galeri/_no_foto_gan"; 
							}
					?>
					<div class="col-lg-4">
						<a href="<?php echo base_url(); ?>web/galeri_lihat/<?php echo $b1->id; ?>">
						<img src="<?php echo $url_file; ?>" class="thumbnail polaroid col-lg-12" style="height: 200px">
						<center><div  class="label label-success"><?php echo $b1->nama; ?></div></center>
						</a>
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
			
<!-- fancy-box -->
<script type="text/javascript" src="<?php echo base_url(); ?>aset/web_/add_in/fancybox/jquery.fancybox.pack.js"></script> 
<link rel="stylesheet" href="<?php echo base_url(); ?>aset/web_/add_in/fancybox/jquery.fancybox.css">

<script type="text/javascript">
$(document).ready(function() {
	$('.fancybox').fancybox();
});
</script>

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
							if ($b1->jenis_ == "file") {
								$url_file = base_url()."upload/galeri/".$b1->file_url;
							} else {
								$url_file = $b1->file_url;
							}
						
					?>
					<div class="col-lg-4">
						<a  class="fancybox" href="<?php echo $url_file; ?>" data-fancybox-group="gallery" title=<?php echo $b1->ket; ?>>
						<img src="<?php echo $url_file; ?>" class="thumbnail polaroid col-lg-12" style="height: 200px">
						<center><div  class="label label-success"><?php echo $b1->ket; ?></div></center>
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
			
<!-- Begin Content -->
<div class="col-md-9">
					
	<!-- Magazine News -->
	<div class="panel panel-warning" style="margin-left: -30px">
			<div class="panel-heading" style="background: #0a36f3">
				<h4><i class="fa fa-picture-o"></i> Download Content </h4>
			</div>
			<div class="panel-body">
			
				<div class="magazine-news" style="margin-top: 20px">
					
					<?php 
					if (!empty($data)) {
						foreach ($data as $b1) {
					?>
					<div class="well"><a href="<?php echo base_url(); ?>upload/download/<?php echo $b1->file; ?>" target="_blank"><?php echo $b1->nama; ?></a><br>
					Deskripsi : <?php echo $b1->deskripsi; ?>
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
			
<div class="col-md-9">

<div class="panel panel-warning" style="margin-left: -30px">
	<div class="panel-heading" style="background: #0a36f3">
		<h4><i class="fa fa-file fa-fw"></i> <?php echo $judul = empty($berita->judul) ? "Not Found" : $berita->judul; ?> </h4>
	</div>
	<div class="panel-body">
	
		<div class="magazine-news">
			<div class="col-md-12">
			
				<?php 
				if (!empty($berita)) {
				?>
				<!--<h3><a href="<?php echo base_url(); ?>web/read/<?php echo $berita->id; ?>/<?php echo url_title($berita->judul, "-", TRUE); ?>"></a></h3>-->
				<div class="by-author" style="margin-bottom: 20px">
					<strong>By <?php echo $berita->nama_admin; ?></strong>
					<span>/ <?php echo tgl_jam_sql($berita->tgl_post); ?></span>
				</div> 
				
				<?php 
				if (!empty($berita->gambar)) {
				?>
				<img class="thumbnail img-responsive" src="<?php echo base_url()."upload/posting/".$berita->gambar.""; ?>" style="height: 300px; margin-right: 20px; margin-top: 20px">
				<?php
				}
				?>
				<!--str_replace(string_yang_akan_diganti, string_pengganti, kalimat);-->
				
				<?php 
					$bt  = str_replace("\\","",$berita->isi);
					
					$bt = str_replace("&lt;","<",$bt);
					$bt = str_replace("&gt;",">",$bt);
					//$bt = str_replace(";","",$bt);
					//$bt = str_replace("/","",$bt);
					//$bt = str_replace("=","",$bt);
					//$bt = str_replace("[","",$bt);
					 
					
				?>

				<div style="text-align: justify; line-height: 30px"><?php echo  $bt; ?>
				</div>
				
				<div class="magazine-news-img">
					Kategori : <span class="badge badge-warning"><i class="fa fa-tag"> </i> <?php echo $berita->nama; ?></span>                     
				</div>
				
				<!-- komentar facebook
				<?php 
					if ($berita->komen == "Ya") {
				?>
				<div class="well" style="margin-top: 30px">
					<legend>Silakan berkomentar</legend>
					<div class="fb-comments" data-href="<?php echo current_url(); ?>" data-width="100%" data-numposts="10" data-colorscheme="light"></div>
				</div>
				<?php 
					}
				} else {
					echo "<div class='alert alert-danger'>Article Not found</div>";
				}
				?>
				-->
			</div>
		</div>
		<!-- End Magazine News -->
		<a href="<?php echo base_url(); ?>web/berita" class="btn btn-success pull-right"><i class="fa fa-rss"> </i> Lihat Arsip Berita</a>
	</div>				
</div>
</div>

<!DOCTYPE html>
<html lang="en"> <!--<![endif]-->  
<head>
    <title>Halaman Admin</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
		
	<!-- JS Global Compulsory -->           
	<script type="text/javascript" src="<?php echo base_url(); ?>aset/web_/js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>aset/web_/js/bootstrap.js"></script> 

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>aset/web_/css/bootstrap_cosmo.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>aset/web_/fonts/sans.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>aset/web_/font-awesome/css/font-awesome.css">
	<link href="<?php echo base_url(); ?>aset/web_/plugin/jquery_ui/jquery-ui.css" rel="stylesheet">

	<script src="<?php echo base_url(); ?>aset/web_/plugin/jquery_ui/jquery-ui.js"></script>
	<script src="<?php echo base_url(); ?>aset/edit/tinymce.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$(function() {
				$( ".tag_tgl" ).datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: 'yy-mm-dd'
				});
				$('.hanya_angka').keypress(function(event) {
					var charCode = (event.which) ? event.which : event.keyCode
					if ((charCode >= 48 && charCode <= 57) || charCode == 46 || charCode == 44)
						return true;
					return false;
				});
			});
		});
	tinymce.init({
		selector: "#editornya",
		plugins: "image table code"
	});
	</script>
	<style type="text/css">
	.table-form, .table-form tr, .table-form tr td { border: none; }
	
	th {text-align: center; background: #eee;}
	.ctr { text-align: center } 
	</style>
	
	<meta name="google-site-verification" content="klzFXvA14VGJ8QB5UafWTO9P2PQyXWfZwc3t2mVvsYY" />
	<meta property="og:image" content="<?php echo base_url(); ?>aset/web_/img/logo.jpg" />
</head> 

<body class=""  style="background: #fff">
<div class="">
    <!--=== Header ===-->    
    <div class="header header-v1">    
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
            <div class="">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-bars"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav pull-left">
                        <!-- Home -->
						<li><a href="<?php echo base_url(); ?>adm"><i class="fa fa-home"> </i> Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-text"> </i> Informasi <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url(); ?>adm/topik">Topik Berita</a></li>
								<li><a href="<?php echo base_url(); ?>adm/agenda">Agenda</a></li>
								<li><a href="<?php echo base_url(); ?>adm/post/berita">Berita</a></li>
								<li><a href="<?php echo base_url(); ?>adm/post/pengumuman">Pengumuman</a></li>
								<li><a href="<?php echo base_url(); ?>adm/post/artikel">Artikel</a></li>
								<li><a href="<?php echo base_url(); ?>adm/post/ekstra">Ekstrakurikuler</a></li>
								<li><a href="<?php echo base_url(); ?>adm/post/fasilitas">Fasilitas</a></li>
							</ul>
						</li>
						
                        
						<li><a href="<?php echo base_url(); ?>adm/post/profil"><i class="fa fa-file-text"> </i> Profil</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-text"> </i> Content <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url(); ?>adm/galeri_album">Galeri</a></li>
								<li><a href="<?php echo base_url(); ?>adm/download">Download Content</a></li>								
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-text"> </i> Data <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url(); ?>adm/data_siswa">Siswa</a></li>
								<li><a href="<?php echo base_url(); ?>adm/data_ptk">PTK</a></li>								
								<li class="devider"><hr/></li>
								<li><a href="<?php echo base_url(); ?>adm/data_absensi">Absensi</a></li>									
								<li><a href="<?php echo base_url(); ?>adm/saran">Saran</a></li>									
							</ul>
						</li>
						
						<!--
						<li><a href="<?php echo base_url(); ?>adm/tanya"><i class="fa fa-file-text"> </i> Tanya Jawab</a></li>
						<li><a href="<?php echo base_url(); ?>adm/data_penduduk"><i class="fa fa-file-text"> </i> Data Penduduk</a></li>
						<li><a href="<?php echo base_url(); ?>adm/surat_keterangan"><i class="fa fa-file-text"> </i> Surat Keterangan</a></li>
						-->
						
						<li><a href="<?php echo base_url(); ?>" target="_blank"><i class="fa fa-file-text"> </i> View Website</a></li>
						<li><a href="<?php echo base_url(); ?>adm/logout" class="pull-right"><i class="fa fa-sign-out" onclick="return confirm('Anda yakin..?');"> Logout</a></li></i>
						
                        <!-- End Home -->

                        <!-- Search Block 
                        <li class="pull-right">
                            <i class="search fa fa-search search-btn"></i>
                            <div class="search-open">
                                <div class="input-group animated fadeInDown">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button class="btn-u" type="button">Go</button>
                                    </span>
                                </div>
                            </div>    
                        </li>-->
                        <!-- End Search Block -->
                    </ul>
                </div><!--/navbar-collapse-->
            </div>    
        </div>            
        <!-- End Navbar -->
    </div>
    <!--=== End Header ===-->    

    <!--=== Content Part ===-->
    <div class="col-lg-12" style="margin-bottom: 40px">
      <?php $this->load->view('adm/'.$page); ?>		
    </div><!--/container-->     
    <!-- End Content Part -->


    <!--=== Copyright ===-->
	<div class="">
		<div class="col-lg-12 well">       
			<div class="col-lg-10">2015 &copy; <?php echo $this->config->item('nama_sekolah'); ?>. All Rights Reserved. </div>		
		</div>
	</div>
    <!--=== End Copyright ===-->
</div><!--/wrapper-->


</body>
</html>	
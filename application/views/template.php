
<!DOCTYPE html>
<html> <!--<![endif]-->  
<head>
    <title><?php echo !empty($titel) ? $titel : $this->config->item('nama_sekolah'); ?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    		
	<!-- JS Global Compulsory -->           
	<script type="text/javascript" src="<?php echo base_url(); ?>aset/web_/js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>aset/web_/js/bootstrap.js"></script> 

    <!-- CSS Global Compulsory -->
	<link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url(); ?>aset/web_/css/bootstrap_cosmo.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>aset/web_/font-awesome/css/font-awesome.css">
	
	
	
	<meta name="google-site-verification" content="klzFXvA14VGJ8QB5UafWTO9P2PQyXWfZwc3t2mVvsYY" />
	<meta property="og:image" content="<?php echo base_url(); ?>aset/web_/img/logo.jpg" />
	<?php echo !empty($meta) ? meta($meta) : ""; ?>
	
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	
	<script type="text/javascript">
	$(document).ready(function() {
		$(".angka").on("keydown", function(e) {
			// Allow: backspace, delete, tab, escape, enter and .
			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
				 // Allow: Ctrl+A
				(e.keyCode == 65 && e.ctrlKey === true) ||
				 // Allow: Ctrl+C
				(e.keyCode == 67 && e.ctrlKey === true) ||
				 // Allow: Ctrl+X
				(e.keyCode == 88 && e.ctrlKey === true) ||
				 // Allow: home, end, left, right
				(e.keyCode >= 35 && e.keyCode <= 39)) {
					 // let it happen, don't do anything
					 return;
			}
			// Ensure that it is a number and stop the keypress
			if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
				e.preventDefault();
			}
		});
	});
	

	</script>
	<script type="text/javascript">
function echeck(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    alert("Invalid E-mail ID")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    alert("Invalid E-mail ID")
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

 		 return true					
	}

function ValidateForm(){
	var emailID=document.frmSample.email
	
	if ((emailID.value==null)||(emailID.value=="")){
		alert("Please Enter your Email ID")
		emailID.focus()
		return false
	}
	if (echeck(emailID.value)==false){
		emailID.value=""
		emailID.focus()
		return false
	}
	return true
 }

</script>
	
	<style type="text/css">
		@media (min-width:100px) {
				#panel_kanan { margin-left: -30px; width: 123%}
		}
		@media (min-width:1281px) {
				#panel_kanan { margin-left: 0px; width: 112%;
				background-color: #}
		}
		
      //body {
        padding-top: 50px;
        padding-bottom: 40px;
       
		
		
      }
	  
	 
	</style>
</head> 

<body class="boxed-layout container"  style="background: #fff">
	
<div class="container well" style="background-color: rgb(189, 189, 136)">
    <!--=== Header ===-->    
    <div class="header header-v1">
        <!-- Topbar -->
        <div class="topbar-v1" style="padding-bottom: 0px; margin-top: -20px; background: url(<?php echo base_url(); ?>upload/kelengkapan/header.jpg1); background-size: 100% ">
            <div class="container" style="">
				<div class="col-lg-2">
					<img src="<?php echo $this->config->item('logo_sekolah'); ?>" class="" style="margin: 20px 0 20px 10px; width: 140px; height: 145px">
				</div>
				<div>
					<h1 style="font-family: Georgia; font-weight: bold; margin-top: 40px"><?php echo $this->config->item('header1'); ?></h2>
					<b><style="font-family: Impact; margin-top: 20px;"><?php echo $this->config->item('header2'); ?></b>
				</div> 
				<br>
				<div class="btn-group pull-right" style="margin-top: -130px; margin-right: 30px">
					<a class="btn btn-success" href="https://www.facebook.com/" target="_blank" title="Akun Facebook resmi SMP negeri 2 moyudan"><i class="fa fa-facebook"></i></a>
					<a class="btn btn-info" href="https://twitter.com/" target="_blank"><i class="fa fa-twitter" title="Akun Twitter resmi Smp N 2 moyudan"></i></a>
					<a class="btn btn-warning" href="https://plus.google.com/" target="_blank" title="Akun Google Plus resmi SMP N 2 Moyudan"><i class="fa fa-google-plus"></i></a> 
					</br>
				</div>
            </div>
			
        </div>
        <!-- End Topbar -->
    
        <!-- Navbar -->
        <div class="navbar navbar-default"  role="navigation " style=" background:#f3b40a">
            <div class="container" >
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header" >
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-bars"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-responsive-collapse ">
                    <ul class="nav navbar-nav pull-left" style=" background-color:#f3b40a">
                        <!-- Home -->
                        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home" > </i> Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-text"> </i> Profil <b class="caret" ></b></a>
                            <ul class="dropdown-menu ">
                                <?php 
									$q_profil = $this->db->query("SELECT * FROM halaman WHERE jenis = 'profil' AND tampil = 'Ya'")->result();
									if (!empty($q_profil)) {
										foreach ($q_profil as $p) {
								?>
								<li><a href="<?php echo base_url(); ?>web/read/<?php echo $p->id; ?>/<?php echo url_title($p->judul, "-", TRUE); ?>"><i class="fa fa-arrow-right"> </i> <?php echo $p->judul; ?></a></li>
								
								<?php 
										}
									}
								?>
                            </ul>

                        </li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-text"> </i> Informasi <b class="caret"></b></a>
                            <ul class="dropdown-menu">
								<li><a href="<?php echo base_url(); ?>web/berita"><i class="fa fa-arrow-right"> </i> Berita</a></li>
								<li><a href="<?php echo base_url(); ?>web/artikel"><i class="fa fa-arrow-right"> </i> Artikel</a></li>
								<li><a href="<?php echo base_url(); ?>web/pengumuman"><i class="fa fa-arrow-right"> </i> Pengumuman</a></li>
								<li><a href="<?php echo base_url(); ?>web/agenda"><i class="fa fa-arrow-right"> </i> Agenda</a></li>
                            </ul>
                        </li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="glyphicon glyphicon-th-large"></i>  Data <b class="caret"></b>
							</a>
							<ul class="dropdown-menu ">
								<li ><a href="<?php echo base_url(); ?>web/data_siswa"><i  class="glyphicon glyphicon-list"> </i> Data Siswa</a></li>
								<li><a href="<?php echo base_url(); ?>web/data_guru"><i class="glyphicon glyphicon-list"> </i> Data Guru</a></li>
								<li><a href="<?php echo base_url(); ?>web/data_tatausaha"><i class="glyphicon glyphicon-list"> </i> Data Tenaga Kependidikan</a></li>
								<li><a href="<?php echo base_url(); ?>web/data_absensi"><i class="glyphicon glyphicon-list"> </i> Data Absensi</a></li>
								<!--<li><a href="<?php echo base_url(); ?>web/data_nilai"><i class="glyphicon glyphicon-list"> </i> Data Nilai</a></li>-->
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="glyphicon glyphicon-flag"></i>  Fasilitas <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<?php 
								$q_fasilitas = $this->db->query("SELECT * FROM halaman WHERE jenis = 'fasilitas' AND tampil = 'Ya'")->result();
								if (!empty($q_fasilitas)) {
								foreach ($q_fasilitas as $f) {
								?>
								<li><a href="<?php echo base_url(); ?>web/read/<?php echo $f->id; ?>/fasilitas/<?php echo url_title($f->judul, "-", TRUE); ?>"><i class="glyphicon glyphicon-arrow-right"> </i> <?php echo $f->judul; ?></a></li>

								<?php 
								}
								}
								?>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="glyphicon glyphicon-picture"></i>  Ekstrakurikuler <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<?php 
								$q_ekstra = $this->db->query("SELECT * FROM halaman WHERE jenis = 'ekstra' AND tampil = 'Ya'")->result();
								if (!empty($q_ekstra)) {
								foreach ($q_ekstra as $e) {
								?>
								<li><a href="<?php echo base_url(); ?>web/read/<?php echo $e->id; ?>/ekstrakurikuler/<?php echo url_title($e->judul, "-", TRUE); ?>"><i class="glyphicon glyphicon-arrow-right"> </i> <?php echo $e->judul; ?></a></li>

								<?php 
								}
								}
								?>
							</ul>
						</li>
						<li><a href="<?php echo base_url(); ?>web/download"><i class="fa fa-download"> </i> Download</a></li>
						<li><a href="<?php echo base_url(); ?>web/galeri"><i class="fa fa-picture-o"> </i> Galeri</a></li>
						
						<li><a href="<?php echo base_url(); ?>web/kritik_saran"><i class="fa fa-comments-o"> </i> kritik dan saran</a></li>
						
                    </ul>
                </div><!--/navbar-collapse-->
            </div>    
        </div>            
        <!-- End Navbar -->
		<!--=== End Header ===-->    
	</div>
	<!--=== Content Part ===-->
	<div class="col-lg-12">
	   <?php 
		$this->load->view($page1);
		
		echo $p1	= empty($page2) ? "" :  $this->load->view($page2);
		?>
		
	</div><!--/container-->     
		<!-- End Content Part -->
	<!--=== Copyright ===-->
	<div class="col-lg-12">    
<hr class="style2">
		<p class="pull-left">2015 &copy; <a href="<?php echo base_url(); ?>"><?php echo $this->config->item('nama_sekolah'); ?></a>. Alamat : <?php echo $this->config->item('alamat_sekolah'); ?> </p>
		
		<div class="pull-right">
			<!-- Histats.com  START  (standard)-->
			<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
			<a href="http://www.histats.com" target="_blank" title="" ><script  type="text/javascript" >
			try {Histats.start(1,2643668,4,111,175,25,"00011111");
			Histats.track_hits();} catch(err){};
			</script></a>
			<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2643668&101" alt="" border="0"></a></noscript>
			<!-- Histats.com  END  -->
		</div>
	
	</div>
    <!--=== End Copyright ===-->
</div><!--/wrapper-->


</body>
</html>	
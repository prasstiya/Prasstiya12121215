
<?php
$isi_otomatis	= $this->session->flashdata('value');
?>
<!-- Begin Content -->
<style type="text/css">
</style>

<div class="col-md-9" style="margin-left: -30px">
			<!--Info Block-->
			<div class="col-md-12">
				<div  style="margin-bottom: 30px"><h2><i class="fa fa-calendar"></i> Kontak</h2></div>		
				
				<div class="well">
					<h3 style="margin: 0 0 -15px 0">Isikan pesan Anda disini ...</h3>
					<hr>
					<form name="frmSample" action="<?php echo base_url(); ?>web/kritik_saran/simpan" method="post" onSubmit="return ValidateForm()">
					<?php echo $this->session->flashdata('error'); ?>
				
					<table class="table table-form">
						<tr><td width="20%">Nama</td><td><input type="text" name="nama" class="form-control col-lg-7" required autofocus value="<?php echo $isi_otomatis[0]; ?>"></td></tr>
						<tr><td>Email</td><td><input type="text" name="email" class="form-control col-lg-8" required value=""></td></tr>
						<tr><td>Telp/HP</td><td><input type="text" name="telp_hp" class="form-control col-lg-6 angka" required value="<?php echo $isi_otomatis[2]; ?>"></td></tr>
						<tr><td>Alamat</td><td><input type="text" name="alamat" class="form-control col-lg-8" required value="<?php echo $isi_otomatis[3]; ?>"></td></tr>
						<tr><td>Pesan</td><td><textarea name="pesan" class="form-control col-lg-8" required><?php echo $isi_otomatis[4]; ?></textarea></td></tr>
						<tr><td>Kode</td><td><div style="float: left; margin-right: 10px; height: 43px; display: inline"><?php echo $img_kaptcha;?></div><input type="text" name="kode" class="form-control" style=" display: inline; float: left; width: 100px" required></td></tr>
						<tr><td colspan="2"><input type="submit" value="Kirim" class="btn btn-success btn-lg"></td></tr>
					</table>
					</form>
				</div>
				<!--
				<hr>
				<?php 
				if (!empty($data)) {
					foreach ($data as $b4) {
				?>
				
				<div class="funny-boxes funny-boxes-top-yellow">
					<div class="row">
						<div class="col-md-4 funny-boxes-img">
							<ul class="list-unstyled fa-fixed">
							   <li><i class="fa fa-calendar"></i> <?php echo tgl_jam_sql($b4->tgl_post); ?></li>
							   <li><i class="fa fa-user"></i> <?php echo $b4->nama; ?></li>
							   <li><i class="fa fa-envelope"></i> <?php echo $b4->email; ?></li>
							   <li><i class="fa fa-phone"></i> <?php echo $b4->telp_hp; ?></li>
							   <li><i class="fa fa-road"></i> <?php echo $b4->alamat; ?></li>
							</ul>
						</div>
						<div class="col-md-8">
							<h4>Tanya : <?php echo $b4->pesan; ?></h4>
							<p>Jawaban : <?php echo $jwb = empty($b4->jawaban) ? "<div class='label label-warning'>Belum Dijawab</div>" : "<div class='alert alert-warning'>".$b4->jawaban."</div>"; ?></p>
						</div>
					</div>                            
				</div>
				<?php 
					}
				} else { 
					echo "<div class='alert alert-danger'>Not found</div>";
				}
				?>
				-->
			</div>
			<!--End Info Block-->
				
				
				
			<center><ul class="pagination"><?php echo $pagi; ?></ul></center>
</div>
<!-- End Content -->
			
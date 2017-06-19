<h2>Data Absensi</h2>
<hr>

<?php echo form_open_multipart(base_url()."adm/data_absensi/simpan"); ?>
	<div class="form-group col-md-12">
		<div class="col-md-1">
			<label>Absen Tanggal</label>
		</div>
		<div class="col-md-2">
			<input type="text" name="tgl_absen" value="<?php echo date('Y-m-d'); ?>" class="form-control tag_tgl" required>
		</div>
	</div>

	<table border="0" style="width: 60%" class="table">
		<thead>
			<tr><th width="5%">No</th><th width="10%">ID Siswa</th><th width="55%">Nama Siswa</th><th width="30%">Keterangan</th></tr>
		</thead>

		<tbody>
			<?php 
			for ($i = 1; $i <= 30; $i++) {
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><input type="text" name="id_siswa_<?php echo $i; ?>" id="id_siswa_<?php echo $i; ?>" class="form-control input-sm" required readonly="true" onfocus="return tampil_cari(<?php echo $i; ?>);"></td>
				<td>
					<div class="col-md-12">
						<input type="text" name="nama_siswa_<?php echo $i; ?>" id="nama_siswa_<?php echo $i; ?>" class="form-control input-sm"="true" onfocus="return tampil_cari(<?php echo $i; ?>);">
					</div>
				</td>
				<td>
					<select name="ket_<?php echo $i; ?>" id="ket_<?php echo $i; ?>" class="form-control input-sm" required>
						<option value="H">Hadir</option>
						<option value="A">Alfa/Tanpa keterangan</option>
						<option value="S">Sakit</option>
						<option value="I">Izin</option>
					</select>
				</td>
			</tr>
			<?php 
			}
			?>

		</tbody>

		<tr><td colspan="4">
		<input type="submit" value="Simpan" class="btn btn-success"> 
		<input type="button" class="btn btn-danger" value="Kembali" onclick="window.open('<?php echo base_url(); ?>adm/data_absensi/', '_self')"></td></tr>
	</table>		
</form>		



<div class="modal" id="modal1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cari Siswa</h4>
            </div>
            <div class="modal-body">
            	<input type="hidden" name="id_baris" id="id_baris" value="">
            	<div class="well" style="overflow: auto">
	            	<div class="col-md-10">
	 	               <input type="text" name="q" id="q" class="form-control" placeholder="Masukkan data, kemudian enter...!" required>
	                </div>

	                <div class="col-md-2">
	                	<button type="submit" class="btn btn-success" onclick="return cari('');"><i class="fa fa-search"></i> Cari</button>
	                </div>
	            </div>

               	<div class="well" style="margin-top: 10px; overflow: hidden">Per Kelas : <br>
                	<?php 
                	foreach ($kelas as $k) {
                		echo '<a href="#" onclick="cari(\''.$k->kelas.'\');" class="btn btn-success btn-sm col-md-1" style="margin-right: 5px; margin-bottom: 5px">'.$k->kelas.'</a> ';
                	}
                	?>
                </div>

        		<table class="table table-bordered">
        			<thead>
        				<tr>
            				<th>ID Siswa</th>
            				<th>Nama</th>
            				<th>Kelas</th>
            				<th>Pilih</th>
            			</tr>
            		</thead>

            		<tbody id="hasil">
            			
            		</tbody>
        		</table>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
var base_url = "<?php echo base_url(); ?>";

function tampil_cari(id) {
	$("#id_baris").val(id);
	$("#modal1").modal('show');
}

function cari(kata_kunci) {
	var cari_teks = $("#q").val();
	var q_ = "";
	var id_baris = $("#id_baris").val();

	if (kata_kunci == "") {
		if (cari_teks == "" || cari_teks.length < 3) {
			$("#hasil").html('<tr><td colspan="4"><div class="label label-danger">Masukkan kata kunci minimal 3 karakter...!</div></td></tr>');
		} else {
			q_ = cari_teks;
		}
	} else {
		q_ = kata_kunci;
	}

	$.ajax({
		beforeSend:function() { 
        	$("#hasil").html('<tr><td colspan="4"><div class="label label-success"><i class="fa fa-spinner fa-spin"></i> Sedang mengecek data...</div></td></tr>');
   		},
   		type: "GET",
        url: base_url+"adm/data_absensi/cari_siswa?q="+q_,
        contentType: 'application/json; charset=utf-8',
        success: function(r) {
           	var hasil 	= "";

			if (r.status == null) {
				hasil 	+= '<tr><td colspan="4"><div class="label label-info">Hasil tidak ditemukan..</div></td></tr>';
			} else {
				var no 			= 0;
				$.each(r.data, function(i, item) {
					hasil += '<tr><td class="ctr">'+item.nis+'</td><td>'+item.nama+'</td><td class="ctr">'+item.kelas+'</td><td class="ctr"><a href="#" onclick="return masukkan(\''+item.id+'\', \''+item.nama+'\');">Pilih</a></td></tr>';
					no++;	
				});	
			}
			$("#hasil").html(hasil);
        }
	});

	return false;
}

function masukkan(id, nama) {
	var id_baris = $("#id_baris").val();

	$("#id_siswa_"+id_baris).val(id);
	$("#nama_siswa_"+id_baris).val(nama);
	$("#modal1").modal('hide');
	return false;
}
</script>
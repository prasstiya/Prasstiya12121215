<div class="fr w700 content2">
	<div class="title1" style="margin-top: 0px; padding-bottom: 10px">Slideshow</div>
	<div align="justify">
		<input type="button" value="Tambah" onclick="window.open('<?php echo base_url()."adm/slideshow/add"; ?>', '_self');"><br>
		<span style="font-weight: bold; color: red">Ukuran gambar TERBAIK untuk slide show, adalah 973 piksel x 352 piksel</span>
		<table style="width: 100%" class="table_data">
			<thead>
				<tr>
					<th width="5%">No</th>
					<th width="40%">Nama<br>File</th>
					<th width="35%">Deskripsi</th>
					<th width="20%">Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			if (empty($data)) {
				echo "<tr><td colspan='4'>-- belum ada data --</td></tr>"; 
			} else {
				$no = 1;
				foreach($data as $d) {
			?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d->nama."<br><a href='".base_url()."upload/ss/".$d->file."' target='_blank'>Download</a>"; ?></td>
					<td><?php echo $d->deskripsi; ?></td>
					<td>
						<a href="<?php echo base_url(); ?>adm/slideshow/edit/<?php echo $d->id; ?>">Edit</a> 
						<a href="<?php echo base_url(); ?>adm/slideshow/hapus/<?php echo $d->id; ?>" onclick="return confirm('Anda yakin..?');">Hapus</a> 
					</td>
				</tr>
			<?php 
				}
			}
			?>
			</tbody>
			</table>
	</div>
</div>		
<p><img alt="" width="50" height="50" src="images/iStock_000005984973XSmall.jpg" style="float: left;" /></p>
        
       <?php foreach ($berita as $row[1]):?>
<h3><?php echo $row[1]->judul;?></h3>
<p style="margin-top: 0px; font-size: 11px">
Posted by : <b><?php echo $row[1]->oleh;?></b>,  pada : <b><?php echo $row[1]->tglpost;?></b>,  Dibaca <b><?php echo $row[1]->hits;?></b> kali</p>
<?php $lagu=$row[1]->isi;
$lagu=character_limiter($lagu,100);?>
<p><?php echo $lagu;?></p>

<?php echo anchor('home/lanjut_berita?id='.$row[1]->id,'baca selanjutnya.....')?><hr>

        
<?php endforeach;?>
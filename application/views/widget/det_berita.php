<div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
					<!--menu sidebar1-->
                        <div class="art-layout-cell art-sidebar1"><div class="art-block clearfix">
        <div class="art-blockheader ">
		
            <h3 class="t">Login Form</h3>
        </div>
       <div class="art-blockcontent">
<?php echo $this->load->view('widget/polling');?>
</div> 

</div>

<div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Link</h3>
        </div>
       <div class="art-blockcontent">
<?php echo $this->load->view('link');?>


</div> 
</div>

<div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Joint with us</h3>
        </div>
        <div class="art-blockcontent">
		<p>&nbsp;&nbsp;&nbsp;<a href="http://www.facebook.com">
		<img alt="" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;" 
		src="images/icon_facebook.png" width="48" height="48"></a>
		<a href="http://www.youtube.com">
		<img alt="" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;" 
		src="images/icon_youtube.png" class=""></a><a href="http://www.twitter.com">
		<img alt="" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;" src="images/icon_twitter.png">
		</a><a href="http://www.flikr.com"><img alt="" 
		style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;" 
		src="images/icon_flikr.png"></a></p></div>
</div>

<div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Agenda</h3>
        </div>
        <div class="art-blockcontent">
<?php echo $this->load->view('widget/kalender');?>
</div>
</div>
<!--menu kritik saran-->
<div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Form kritik dan saran</h3>
        </div>
        <div class="art-blockcontent">
		
		<?php echo $this->load->view('kritk');?>
		</div></div></div>
		<?php echo $this->load->view('det_artikel');?>
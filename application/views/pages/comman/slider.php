<div id="myCarousel" class="carousel slide" data-ride="carousel" style="padding-top: 109px;">



<div class="latest-news">
	<div class="sidebar-header-title"><span class="e-text-news">LATEST</span><span>ANNOUNCEMENTS</span></div>
		<div  class="focus-news">		
			<marquee height="190" onMouseOut="start();" onMouseOver="stop();" direction="up" scrollamount="2">
				<?php if(count($newses)>0){ ?>
				<?php foreach($newses as $news) {
					if($news['lang_id'] == $this->session->userdata['client_language']){
						if(strlen( $news['news_contect']>100))
						{
						?>
						<div class="focus-news-feilds">
							<p><?php echo substr($news['news_contect'],0,100).".."; ?></p>
					<?php 
						}
						else{
						?>	
						<div class="focus-news-feilds">
						<p><?php  echo $news['news_contect'];
						}
					}
					?>
					</div>
				<?php } ?>
			<?php } else { ?>
				no news.
			<?php } ?>
			</marquee>
		</div>
	</div>









    <!-- Wrapper for slides -->
    <div class="carousel-inner">
	<?php 
	$c = 1;
	if($this->session->userdata('client_language') != ''){
		$language = $this->session->userdata('client_language');
	}
	else{
		$language = 1;
	}
	
	foreach ($sliders as $slider){ ?>
		<?php if($slider['lang_id'] == $language){ ?>
		<div class="item <?php if($c== 1){ echo "active";} ?>">
			<img src="<?php echo base_url(); ?>Slider_gallary/<?php  if($this->session->userdata('client_language')){ echo $this->session->userdata('client_language'); } else { echo '1';}?>/<?php echo $slider['slider_image'];?>" alt="img1"/ >
		</div>
	<?php $c++;} } ?>
      
    </div>

    <!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <img src="<?php echo base_url(); ?>assest/images/slider/large_left.png" />
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
     <img src="<?php echo base_url(); ?>assest/images/slider/large_right.png" />
    </a>
</div>
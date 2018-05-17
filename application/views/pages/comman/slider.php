<div id="myCarousel" class="carousel slide" data-ride="carousel" style="padding-top: 116px;">

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
	<?php 
	$c = 1;
	foreach ($sliders as $slider){ ?>
		<div class="item <?php if($c== 1){ echo "active";} ?>">
			<img src="<?php echo base_url(); ?>Slider_gallary/<?php  if($this->session->userdata('client_language')){ echo $this->session->userdata('client_language'); } else { echo '1';}?>/<?php echo $slider['slider_image'];?>" alt="img1" style="width:100%;" />
		</div>
	<?php $c++; }?>
      
    </div>

    <!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <img src="<?php echo base_url(); ?>assest/images/slider/large_left.png" />
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
     <img src="<?php echo base_url(); ?>assest/images/slider/large_right.png" />
    </a>
  </div>
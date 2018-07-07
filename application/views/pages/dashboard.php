<div class="container-fuild" style="float:left;width:100%;">
	<?php print_r($slider); ?>
</div>



<section class="content-section" style="background-color:#fff;padding:20px 0;float:left;width:100%;">
	<div class="container-fuild" style="padding-left:3%;padding-right:3%;">
		<div class="col-sm-6 wow fadeInLeft" data-wow-delay="0.5s" style="margin-top:15px;">
			<div class="sidebar-header-title"><span class="e-text">eNAM</span><span>eLEARNING VIDEOS</span> <span class="pull-right"><a href="">VIEW ALL</a><a href=""><img src="<?php echo base_url();?>assest/images/new-theme/icon/arrow-l.png" /></a><a href=""><img src="<?php echo base_url();?>assest/images/new-theme/icon/arrow-r.png" /></a></span></div>
			<div class="row">
			<?php if(isset($videos) && count($videos)>0){?>
				<?php $c = 1; foreach($videos as $video){ ?>
				<div class="col-md-6">
					<div class="elearn-v-box">
						<?php $v = explode('/embed/',$video['v_url']); ?>
						<img class="rahul_youtube" data-v_id="iframe_v_<?php echo $c;?>" data-v_url="<?php echo $video['v_url']; ?>" src="https://img.youtube.com/vi/<?php echo $v[1];?>/0.jpg">
						<div id="iframe_v_<?php echo $c;?>" style="display:none;"></div>
						<h3><?php echo $video['v_title']; ?></h3>
						<p><?php echo $video['v_content']; ?></p>
					</div>
				</div>
				<?php $c++; } ?>
			<?php } else{ ?>
					No Videos.
			<?php } ?>
			</div>
		</div>
		
		<div class="col-lg-3 col-sm-3 wow fadeInUp" data-wow-delay="0.5s" style="margin-top:15px;">
			<div class="sidebar-header-title"><span class="e-text">eNAM</span><span>NEWS & EVENTS</span></div>
			<?php if((count($events) > 0) && (isset($events))){ ?>
				<?php $c=1; foreach($events as $event){ 
					if($c < 3){
					$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
					?>
					<div style="position:relative;margin-bottom:25px;">
						<div class="register-user-box">
							<b><?php echo $event_title; ?></b>
						</div>
						<img style="width:100%;" alt="<?php echo $event['title']; ?>" src="<?php echo base_url(); ?>/Event_gallary/<?php echo $event['event_image']; ?>" />
					</div>
				<?php $c++; } } ?>
			<?php } else { ?>
				<div class="well text-danger">No events Found.</div>
			<?php }?>
		</div>
		
		<div class="col-lg-3 col-sm-3 home-n wow fadeInRight" data-wow-delay="0.5s">
			<div class="focus-section">
				<?php print_r($quickLinks); ?>
				
				<div class="booklet-section">
					<ul>
						<li><a title="eNAM Booklet" href=""><img alt="Logistic Details" src="<?php echo base_url();?>assest/images/new-theme/icon/booklet.png" /> <span>Download</span><br>eNAM Booklet</a></li>
						<li><a title="Guidelines  Manual" href="guide.html"><img alt="Logistic Details" src="<?php echo base_url();?>assest/images/new-theme/icon/guideline.png" /><span>Registration</span><br>Guidelines  Manual </a></li>
					</ul>
				</div>
</div>
		</div>
	</div>
</section>
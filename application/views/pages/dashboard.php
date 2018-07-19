<div class="container-fuild" style="float:left;width:100%;background-color:#e6e6e6;padding:120px 4% 12px 4%;">
	<?php print_r($slider); ?>
</div>
<section class="content-section" style="background-color:#fff;padding:20px 0;float:left;width:100%;">
	<div class="container-fuild" style="padding-left:4%;padding-right:4%;">
		<div class="row">
			<div class="col-sm-6 wow fadeInLeft" data-wow-delay="0.5s" style="padding-right:0px;">
				<div class="sidebar-header-title"><span class="e-text"><?php echo $this->lang->line('enam');?></span><span><?php echo $this->lang->line('elearningvideos');?></span> <span class="pull-right"><a href=""><?php echo $this->lang->line('viewall');?></a><a href=""><img src="<?php echo base_url();?>assest/images/new-theme/icon/arrow-l.png" /></a><a href=""><img src="<?php echo base_url();?>assest/images/new-theme/icon/arrow-r.png" /></a></span></div>
				<div class="row">
					<?php if(isset($videos) && count($videos)>0){?>
						<?php $c = 1; foreach($videos as $video){ ?>
							<div class="col-md-6">
								<div class="elearn-v-box">
									<?php $v = explode('/embed/',$video['v_url']); ?>
									<div class="rahul_youtube" id="iframe1_v_<?php echo $c;?>" data-id="<?php echo $c;?>" data-v_id="iframe1_v_<?php echo $c;?>" data-v_url="<?php echo $video['v_url']; ?>" style="background:url('http://img.youtube.com/vi/<?php echo $v[1];?>/0.jpg') center no-repeat;cursor:pointer;height:155px;width:294px;"></div>

									<img style="width:64px;"  data-v_id="iframe_v_<?php echo $c;?>" data-v_url="<?php echo $video['v_url']; ?>" data-pid="<?php echo $c;?>" class="play-img" src="<?php echo base_url();?>assest/images/new-theme/icon/play-ico.png" />
									<div id="iframe_v_<?php echo $c;?>" style="display:none;"></div>
									<h3><b><?php echo $video['v_title']; ?></b></h3>
									<p><?php //echo substr($video['v_content'],0,100); ?></p>
									<p>1025 Views - <?php echo $video['created_at']; ?></p>
								</div>
							</div>
						<?php $c++; } ?>
						<?php } else{ ?>
							No Videos.
					<?php } ?>
				</div>
			</div>
		
			<div class="col-lg-3 col-sm-3 wow fadeInUp events-box" data-wow-delay="0.5s" style="padding-left:30px;">
				<div style="width:110%;" class="sidebar-header-title"><span class="e-text"><?php echo $this->lang->line('enam');?></span><span><?php echo $this->lang->line('news&events');?></span></div>
				<?php if((count($events) > 0) && (isset($events))){ ?>
					<?php $c=1; foreach($events as $event){ 
						if($c < 3){
							$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
						?>
						<div class="events-de">
							<div class="register-user-box">
								<b><?php echo $event_title; ?></b>
								<b><?php //echo $event['event_content'];?> </b>
							</div>
							<img style="width:100%;" alt="<?php echo $event['title']; ?>" src="<?php echo base_url(); ?>/Event_gallary/<?php echo $event['event_image']; ?>" />
						</div>
						<?php $c++; } } ?>
				<?php } else { ?>
					<div class="well text-danger">No Events Found.</div>
				<?php }?>
			</div>
		
			<div style="padding-left:43px;" class="col-lg-3 col-sm-3 home-n wow fadeInRight" data-wow-delay="0.5s">           
				<div class="focus-section">
					<div class="sidebar-header-title"><span><?php echo $this->lang->line('important_link');?></span></div>
                    	<?php if($this->session->userdata('client_language') == 1) {?>
                        	<img style="width:100%;border:1px solid #e4dfdf;" src="<?php echo base_url();?>/assest/images/new-theme/map.jpg">
						<?php } else {?>
 		           			<img style="width:100%;border:1px solid #e4dfdf;" src="<?php echo base_url();?>/assest/images/new-theme/hindi-map.jpg">
						<?php } ?>
					<div class="booklet-section">
						<ul>
							<li><a title="eNAM Booklet" href=""><img alt="Logistic Details" src="<?php echo base_url();?>assest/images/new-theme/icon/booklet.png" /> <span><?php echo $this->lang->line('download');?></span><br><?php echo $this->lang->line('eNAM_Booklet');?></a></li>
							<li><a title="Guidelines  Manual" href="guide.html"><img alt="Logistic Details" src="<?php echo base_url();?>assest/images/new-theme/icon/guideline.png" /><span><?php echo $this->lang->line('registration');?></span><br><?php echo $this->lang->line('guidelines_manual');?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
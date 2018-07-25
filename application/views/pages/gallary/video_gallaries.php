<section class="content-section" style="background-color:#fff;padding:20px 0;float:left;width:100%;">
	<div class="container-fuild" style="padding-left:4%;padding-right:4%;">
		<div class="row">
			<div class="col-md-12 video-gallery">
				<h5>
					<?php if($this->uri->segment(2) == ''){	 ?>
						<span>All Videos</span>
					<?php } else { ?>
						<span><?php echo $this->uri->segment(2);?> Videos</span>
					<?php } ?>
					<div class="pull-right search-btn">
						<input id="video_search_learing" placeholder="Search videos..." type="text" /><i class="fa fa-search"></i>	
						<select class="pull-left" id="elearing_cat_selector">
							<option value="All">Select Category</option>
							<?php if(count($video_categories)>0){
								foreach($video_categories as $video_category){ ?>
								<?php if($this->uri->segment(2) != ''){ ?>
									<?php if($this->uri->segment(2) == $video_category['category_name']){ ?>
										<option value="<?php echo $video_category['category_name']; ?>" selected><?php echo $video_category['category_name']; ?></option>
									<?php } else {?>
										<option value="<?php echo $video_category['category_name']; ?>"><?php echo $video_category['category_name']; ?></option>
									<?php } ?>
								<?php } else { ?>
									<option value="<?php echo $video_category['category_name']; ?>"><?php echo $video_category['category_name']; ?></option>
								<?php } ?>
							<?php } } ?>
						</select>
					</div>
				</h5>
			</div>
						
			<div class="row" id="video_lists">
			<?php if(isset($videos) && count($videos)>0){?>
				<?php $c = 1; foreach($videos as $video){ ?>
				<div class="col-md-3">
					<div class="row elearn-v-box">
						<div class="col-md-12">
							<div class="thum"><?php $v = explode('/embed/',$video['v_url']); ?>
								<div data-v_id="iframe1_v_<?php echo $c;?>" data-v_url="<?php echo $video['v_url']; ?>" style="background:url('http://img.youtube.com/vi/<?php echo $v[1];?>/0.jpg') center no-repeat;cursor:pointer;height:172px;width:280px;background-size:cover;"></div>

								<img alt="" style="width:64px;"  data-v_id="iframe_v_<?php echo $c;?>" data-v_url="<?php echo $video['v_url']; ?>" data-pid="<?php echo $c;?>" class="play-img-gallery" src="<?php echo base_url();?>assest/images/new-theme/icon/play-ico.png" />
								<div id="iframe_v_<?php echo $c;?>" style="display:none;"></div>
							</div>
						</div>
						<div class="col-md-12 video-g-details" >
							<h5><b><?php echo $video['v_title']; ?></b></h5>
							<p>1025 Views - <?php echo $video['created_at']; ?></p>
						</div>
					</div>
				</div>
			<?php $c++; } ?>
			<?php } else{ ?>
				No Videos.
			<?php } ?>
			</div>
		</div>
	</div>
</section>
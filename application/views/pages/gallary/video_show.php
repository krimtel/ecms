<section class="content-section" style="background-color:#fff;padding:20px 0;float:left;width:100%;">
	<div class="container-fuild" style="padding-left:4%;padding-right:4%;">
		<div class="row">
			<div class="col-md-12 video-gallery">
			<div class="row">
				<div class="col-md-9 singal-video-details">
					<h4>Video Title</h4>
					<img src="" />
					<p>Video Details </p>
				</div>
			<div class="col-md-3">
				<div class="singal-v-detail-side-v">
				<h4 style="margin-top:0px;margin-bottom:15px;">Availabel Videos</h4>
			<?php if(isset($videos) && count($videos)>0){?>
				<?php $c = 1; foreach($videos as $video){ ?>
				
					<div class="row elearn-v-box" style="margin-bottom:1px;">
						<div style="background-color:#eee;float:left;border-bottom:1px solid #ddd;padding:8px 0;">
						<div class="col-md-6">
<div class="thum"><?php $v = explode('/embed/',$video['v_url']); ?>
						<div class="rahul_youtube" id="iframe1_v_<?php echo $c;?>" data-id="<?php echo $c;?>" data-v_id="iframe1_v_<?php echo $c;?>" data-v_url="<?php echo $video['v_url']; ?>" style="background:url('http://img.youtube.com/vi/<?php echo $v[1];?>/0.jpg') center no-repeat;cursor:pointer;height:74px;width:120px;background-size:cover;"></div>

<div id="iframe_v_<?php echo $c;?>" style="display:none;"></div></div>
</div>
						<div class="col-md-6 video-g-details" style="padding-left:0px;" >
						<h5><b><?php echo $video['v_title']; ?></b></h5>
						<!--<div class="discrip"><?php //echo substr($video['v_content'],0,150); ?></div>-->
						<p>1025 Views - <?php echo $video['created_at']; ?></p></div>
					</div>
					</div>
				
				<?php $c++; } ?>
			<?php } else{ ?>
					No Videos.
			<?php } ?>
			</div>
			</div>
				</div>
			</div>
			
		</div>
	</div>
</section>
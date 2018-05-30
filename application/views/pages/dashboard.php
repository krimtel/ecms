<div class="container-fuild" style="float:left;width:100%;">
	<?php print_r($slider); ?>
</div>
<div class="container-fuild left-right-space" style="float:left;min-height:450px;width:100%;">
	<div class="content-section">
		<div class="col-sm-5 wow fadeInLeft" data-wow-delay="0.5s" style="margin-top:15px;">
			<img alt="Map" src="<?php echo base_url(); ?>assest/images/home/map.jpg" />
		</div>
		<div class="col-lg-3 col-sm-3 wow fadeInUp" data-wow-delay="0.5s">
			<div style="position:relative;margin-top:15px;">
				<iframe style="height:240px;" src="https://www.youtube.com/embed/fMe23afGdKc" frameborder="0" allowfullscreen></iframe>
			</div>
			<div style="position:relative;margin-top:20px;">
				<div class="register-user-box"><b>National Conference</b> on "Agriculture-2022: Doubling Farmer's Incomes" 19th & 20th Feb 2018</div>
				<img style="width:102%;" alt="Event" src="<?php echo base_url(); ?>assest/images/home/event0.jpg" />
			</div>
		</div>
		<div class="col-lg-4 col-sm-4 home-n wow fadeInRight" data-wow-delay="0.5s">
			<?php
				///  news section
				print_r($home_notice); 
			?>
		</div>
	</div>
</div>
<section class="content-section wow fadeInUp" data-wow-delay="0.3s" style="padding:30px 0;background-color:#f6f6f6;float:left;width:100%; ">
	<div class="container-fuild" style="padding-left:2%;padding-right:2%;">
		<h3 class="events-title"><span>eLearning Videos</span></h3>
		<div class="col-md-4 col-sm-6">
			<div class="elearn-v-box">
			<iframe style="width:100%;" height="225" src="https://www.youtube.com/embed/InnoiIQVmsI" frameborder="0" 
			allow="encrypted-media" allowfullscreen></iframe>
			<h3>Farmer Registration</h3>
			<p>Registering in eNAM is simple and easy. View process with this video and know about registration requirements </p></div>
		</div>
		<div class="col-md-4 col-sm-6">
			<div class="elearn-v-box">
			<iframe style="width:100%;" height="225" src="https://www.youtube.com/embed/38KaYYAaARg" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
			<h3>Split & Merge</h3>
			<p>Watch to know about provision of Splitting up and Merging produce/lots in eNAM application</p></div>
		</div>
		<div class="col-md-4 col-sm-6">
			<div class="elearn-v-box">
			<iframe style="width:100%;" height="225" src="https://www.youtube.com/embed/ynbyiRohtA0" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
			<h3>Sampling, Assaying & Approval for trade</h3>
			<p>Watch quality trading aspects – doing sampling, assaying and approving Lots for trade</p></div>
		</div>
		<div class="show-more">
			<a href="elearning.html" title="Show more">Show more</a>
		</div>
	</div>
</section>


<section class="content-section" style="padding:30px 0;background-color:#fff;float:left;width:100%;">
	<div class="container-fuild" style="padding-left:2%;padding-right:2%;">
		<div class="row">
			<div class="col-lg-9 col-sm-9 wow fadeInUp" data-wow-delay="0.5s">
            	<h3 class="events-title"><span>eNAM Events</span></h3>
				
				<?php if((count($events) > 0) && (isset($events))){ ?>
					<?php foreach($events as $event){ ?>
					<div class="col-md-4 enam-events-box">
						<img alt="<?php echo $event['title']; ?>" src="<?php echo base_url(); ?>\Event_gallary/<?php echo $event['event_image']; ?>" />
						<span><?php echo $event['event_category']; ?></span>
						<?php $event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];?>
						<h3><?php echo $event_title; ?></h3>
						<?php $event_content = strlen($event['event_content']) > 200 ? substr($event['title'],0,200)."..." : $event['event_content'];?>
						<div><?php echo $event_content; ?></div>
						<p class="p-date">Published on <?php echo $event['created_at']; ?></p>
					</div>
					<?php } ?>
				<?php } else { ?>
					<div class="well text-danger">No events Found.</div>
				<?php }?>
			</div>
			<div class="col-lg-3 col-sm-3 home-q wow fadeInRight" data-wow-delay="0.5s">
				<?php
					/// quick links
					print_r($quickLinks); 
				?>
			</div>
		</div>
	</div>
</section>
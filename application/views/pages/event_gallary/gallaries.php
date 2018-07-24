<section class="content-section" style="background-color:#fff;padding:20px 0;float:left;width:100%;">
	<div class="container-fuild" style="padding-left:4%;padding-right:4%;">
		<div class="row">
			<div class="col-md-12 video-gallery">
				<h5><span>All Events</span>
					<div class="pull-right search-btn">
						<input placeholder="Search videos..." type="text" /><i class="fa fa-search"></i>
						<select class="pull-left">
							<option>Select Events Category</option>
							<option>National Events</option>
							<option>State Events</option>
							<option>Others Events</option>
						</select>
					</div>
				</h5>
				
				<div class="row">
					<?php if((count($events) > 0) && (isset($events))){ ?>
				<?php $c=1; foreach($events as $event){ 
					if($c < 3){
					$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
					?>
					<div class="col-md-3 events-de">
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
			</div>
			<!--National Events -->
			<div class="col-md-12 video-gallery">
				<h5><span>National Events</span></h5>
				<div class="row">
					<?php if((count($events) > 0) && (isset($events))){ ?>
				<?php $c=1; foreach($events as $event){ 
					if($c < 3){
					$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
					?>
					<div class="col-md-3 events-de">
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
			</div>
			<!--State Events -->
			<div class="col-md-12 video-gallery">
				<h5><span>National Events</span></h5>
				<div class="row">
					<?php if((count($events) > 0) && (isset($events))){ ?>
				<?php $c=1; foreach($events as $event){ 
					if($c < 3){
					$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
					?>
					<div class="col-md-3 events-de">
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
			</div>
			
			<!--Others Events -->
			<div class="col-md-12 video-gallery">
				<h5><span>Others Events</span></h5>
				<div class="row">
					<?php if((count($events) > 0) && (isset($events))){ ?>
				<?php $c=1; foreach($events as $event){ 
					if($c < 3){
					$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
					?>
					<div class="col-md-3 events-de">
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
			</div>
		</div>
	</div>
</section>
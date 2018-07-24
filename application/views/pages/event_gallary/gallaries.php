<section class="content-section" style="background-color:#fff;padding:20px 0;float:left;width:100%;">
	<div class="container-fuild" style="padding-left:4%;padding-right:4%;">
		<div class="row">
			<div class="col-md-12 video-gallery events-list">
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
				<div id="myCarousel" class="carousel slide" data-ride="carousel">

				<div class="carousel-inner">
				  <div class="item active">
					<?php if((count($events) > 0) && (isset($events))){ ?>
				<?php $c=1; foreach($events as $event){ 
					if($c < 5){
					$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
					?>
					<div class="col-md-3 events-de">
						<img style="width:100%;" alt="<?php echo $event['title']; ?>" src="<?php echo base_url(); ?>/Event_gallary/<?php echo $event['event_image']; ?>" />
						<div class="register-user-box">
							<h5><?php echo $event_title; ?></h5>
							<?php echo $event['event_content'];?>
						</div>
					</div>
				<?php $c++; } } ?>
			<?php } else { ?>
				<div class="well text-danger">No Events Found.</div>
			<?php }?>
				  </div>

				  <div class="item">
					<?php if((count($events) > 0) && (isset($events))){ ?>
				<?php $c=1; foreach($events as $event){ 
					if($c < 5){
					$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
					?>
					<div class="col-md-3 events-de">
						<img style="width:100%;" alt="<?php echo $event['title']; ?>" src="<?php echo base_url(); ?>/Event_gallary/<?php echo $event['event_image']; ?>" />
						<div class="register-user-box">
							<h5><?php echo $event_title; ?></h5>
							<?php echo $event['event_content'];?>
						</div>
					</div>
				<?php $c++; } } ?>
			<?php } else { ?>
				<div class="well text-danger">No Events Found.</div>
			<?php }?>
				  </div>
				
				  <div class="item">
					<?php if((count($events) > 0) && (isset($events))){ ?>
				<?php $c=1; foreach($events as $event){ 
					if($c < 5){
					$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
					?>
					<div class="col-md-3 events-de">
						<img style="width:100%;" alt="<?php echo $event['title']; ?>" src="<?php echo base_url(); ?>/Event_gallary/<?php echo $event['event_image']; ?>" />
						<div class="register-user-box">
							<h5><?php echo $event_title; ?></h5>
							<?php echo $event['event_content'];?>
						</div>
					</div>
				<?php $c++; } } ?>
			<?php } else { ?>
				<div class="well text-danger">No Events Found.</div>
			<?php }?>
				  </div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				  <i class="fa fa-angle-left"></i>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
				  <i class="fa fa-angle-right"></i>
				  <span class="sr-only">Next</span>
				</a>
			  </div>
				
				
			</div>
			<!--National Events -->
			<div class="col-md-12 video-gallery events-list">
				<h5><span>National Events</span></h5>
				<div id="myCarousel1" class="carousel slide" data-ride="carousel">

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
				  <div class="item active">
					<?php if((count($events) > 0) && (isset($events))){ ?>
				<?php $c=1; foreach($events as $event){ 
					if($c < 5){
					$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
					?>
					<div class="col-md-3 events-de">
						<img style="width:100%;" alt="<?php echo $event['title']; ?>" src="<?php echo base_url(); ?>/Event_gallary/<?php echo $event['event_image']; ?>" />
						<div class="register-user-box">
							<h5><?php echo $event_title; ?></h5>
							<?php echo $event['event_content'];?>
						</div>
					</div>
				<?php $c++; } } ?>
			<?php } else { ?>
				<div class="well text-danger">No Events Found.</div>
			<?php }?>
				  </div>

				  <div class="item">
					<?php if((count($events) > 0) && (isset($events))){ ?>
				<?php $c=1; foreach($events as $event){ 
					if($c < 5){
					$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
					?>
					<div class="col-md-3 events-de">
						<img style="width:100%;" alt="<?php echo $event['title']; ?>" src="<?php echo base_url(); ?>/Event_gallary/<?php echo $event['event_image']; ?>" />
						<div class="register-user-box">
							<h5><?php echo $event_title; ?></h5>
							<?php echo $event['event_content'];?>
						</div>
					</div>
				<?php $c++; } } ?>
			<?php } else { ?>
				<div class="well text-danger">No Events Found.</div>
			<?php }?>
				  </div>
				
				  <div class="item">
					<?php if((count($events) > 0) && (isset($events))){ ?>
				<?php $c=1; foreach($events as $event){ 
					if($c < 5){
					$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
					?>
					<div class="col-md-3 events-de">
						<img style="width:100%;" alt="<?php echo $event['title']; ?>" src="<?php echo base_url(); ?>/Event_gallary/<?php echo $event['event_image']; ?>" />
						<div class="register-user-box">
							<h5><?php echo $event_title; ?></h5>
							<?php echo $event['event_content'];?>
						</div>
					</div>
				<?php $c++; } } ?>
			<?php } else { ?>
				<div class="well text-danger">No Events Found.</div>
			<?php }?>
				  </div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel1" data-slide="prev">
				  <i class="fa fa-angle-left"></i>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel1" data-slide="next">
				  <i class="fa fa-angle-right"></i>
				  <span class="sr-only">Next</span>
				</a>
			  </div>
			</div>
			<!--State Events -->
			<div class="col-md-12 video-gallery events-list">
				<h5><span>State Events</span></h5>
				<div id="myCarousel2" class="carousel slide" data-ride="carousel">
				
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
				  <div class="item active">
					<?php if((count($events) > 0) && (isset($events))){ ?>
				<?php $c=1; foreach($events as $event){ 
					if($c < 5){
					$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
					?>
					<div class="col-md-3 events-de">
						<img style="width:100%;" alt="<?php echo $event['title']; ?>" src="<?php echo base_url(); ?>/Event_gallary/<?php echo $event['event_image']; ?>" />
						<div class="register-user-box">
							<h5><?php echo $event_title; ?></h5>
							<?php echo $event['event_content'];?>
						</div>
					</div>
				<?php $c++; } } ?>
			<?php } else { ?>
				<div class="well text-danger">No Events Found.</div>
			<?php }?>
				  </div>

				  <div class="item">
					<?php if((count($events) > 0) && (isset($events))){ ?>
				<?php $c=1; foreach($events as $event){ 
					if($c < 5){
					$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
					?>
					<div class="col-md-3 events-de">
						<img style="width:100%;" alt="<?php echo $event['title']; ?>" src="<?php echo base_url(); ?>/Event_gallary/<?php echo $event['event_image']; ?>" />
						<div class="register-user-box">
							<h5><?php echo $event_title; ?></h5>
							<?php echo $event['event_content'];?>
						</div>
					</div>
				<?php $c++; } } ?>
			<?php } else { ?>
				<div class="well text-danger">No Events Found.</div>
			<?php }?>
				  </div>
				
				  <div class="item">
					<?php if((count($events) > 0) && (isset($events))){ ?>
				<?php $c=1; foreach($events as $event){ 
					if($c < 5){
					$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
					?>
					<div class="col-md-3 events-de">
						<img style="width:100%;" alt="<?php echo $event['title']; ?>" src="<?php echo base_url(); ?>/Event_gallary/<?php echo $event['event_image']; ?>" />
						<div class="register-user-box">
							<h5><?php echo $event_title; ?></h5>
							<?php echo $event['event_content'];?>
						</div>
					</div>
				<?php $c++; } } ?>
			<?php } else { ?>
				<div class="well text-danger">No Events Found.</div>
			<?php }?>
				  </div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel2" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel2" data-slide="next">
				  <i class="fa fa-angle-right"></i>
				  <span class="sr-only">Next</span>
				</a>
			  </div>
			</div>
			
			<!--Others Events -->
			<div class="col-md-12 video-gallery events-list">
				<h5><span>Others Events</span></h5>
				<div id="myCarousel3" class="carousel slide" data-ride="carousel">
				
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
				  <div class="item active">
					<?php if((count($events) > 0) && (isset($events))){ ?>
				<?php $c=1; foreach($events as $event){ 
					if($c < 5){
					$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
					?>
					<div class="col-md-3 events-de">
						<img style="width:100%;" alt="<?php echo $event['title']; ?>" src="<?php echo base_url(); ?>/Event_gallary/<?php echo $event['event_image']; ?>" />
						<div class="register-user-box">
							<h5><?php echo $event_title; ?></h5>
							<?php echo $event['event_content'];?>
						</div>
					</div>
				<?php $c++; } } ?>
			<?php } else { ?>
				<div class="well text-danger">No Events Found.</div>
			<?php }?>
				  </div>

				  <div class="item">
					<?php if((count($events) > 0) && (isset($events))){ ?>
				<?php $c=1; foreach($events as $event){ 
					if($c < 5){
					$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
					?>
					<div class="col-md-3 events-de">
						<img style="width:100%;" alt="<?php echo $event['title']; ?>" src="<?php echo base_url(); ?>/Event_gallary/<?php echo $event['event_image']; ?>" />
						<div class="register-user-box">
							<h5><?php echo $event_title; ?></h5>
							<?php echo $event['event_content'];?>
						</div>
					</div>
				<?php $c++; } } ?>
			<?php } else { ?>
				<div class="well text-danger">No Events Found.</div>
			<?php }?>
				  </div>
				
				  <div class="item">
					<?php if((count($events) > 0) && (isset($events))){ ?>
				<?php $c=1; foreach($events as $event){ 
					if($c < 5){
					$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
					?>
					<div class="col-md-3 events-de">
						<img style="width:100%;" alt="<?php echo $event['title']; ?>" src="<?php echo base_url(); ?>/Event_gallary/<?php echo $event['event_image']; ?>" />
						<div class="register-user-box">
							<h5><?php echo $event_title; ?></h5>
							<?php echo $event['event_content'];?>
						</div>
					</div>
				<?php $c++; } } ?>
			<?php } else { ?>
				<div class="well text-danger">No Events Found.</div>
			<?php }?>
				  </div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel3" data-slide="prev">
				  <i class="fa fa-angle-left"></i>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel3" data-slide="next">
				  <i class="fa fa-angle-right"></i>
				  <span class="sr-only">Next</span>
				</a>
			  </div>
			</div>
		</div>
	</div>
</section>
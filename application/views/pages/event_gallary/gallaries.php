<style>
#myImg {

    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
	top:-10%;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
<section class="content-section" style="background-color:#fff;padding:20px 0;float:left;width:100%;">
	<div class="container-fuild" style="padding-left:4%;padding-right:4%;">
		<div class="row">
			<div class="col-md-12 video-gallery events-list">
				<h5><span>All Events</span>
					<div class="pull-right search-btn">
						<input placeholder="Search videos..." type="text" id="event_search_gallery" /><i class="fa fa-search"></i>
						<select class="pull-left" id="event_category_selector">
							<option value="All">Select Events Category</option>
							<?php if(count($events_categories)>0){ ?>
								<?php foreach($events_categories as $events_category){
									if($events_category['event_category'] != ''){ ?>
									<option value="<?php echo $events_category['event_category'];?>"><?php echo $events_category['event_category'];?></option>
								<?php } } ?>
							<?php } ?>
						</select>
					</div>
				</h5>
				
				<!--<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="item active">
							<?php //if((count($events) > 0) && (isset($events))){ ?>
							<?php //$c=1; foreach($events as $event){
							//if($c < 5){
								//$event_title = strlen($event['title']) > 50 ? substr($event['title'],0,50)."..." : $event['title'];
							?>
							<div class="col-md-3 events-de">
								<img id="myImg" style="width:100%;" alt="<?php //echo $event['title']; ?>" src="<?php //echo base_url(); ?>/Event_gallary/<?php //echo $event['event_image']; ?>" />
								<div class="register-user-box">
									<h5><?php //echo $event_title; ?></h5>
									<?php //echo $event['event_content'];?>
								</div>
							</div>
						<?php //$c++; } } ?>
						<?php //} else { ?>
							<div class="well text-danger">No Events Found.</div>
						<?php //}?>
				  	</div>
				</div> -->
				
			
			
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<?php
						$c = count($events);
						$counter = 1;
						for($i = $counter; $i<$c; $i++){
							if($i == 1){
								echo '<div class="item active">';
							}
							else{
								echo '<div class="item">';
							}
						
							for($j=$i;$j<$i+4;$j++){
							if($c > $j){
							?>
							<div class="col-md-3 events-de">
								<img id="myImg" style="width:100%;" alt="<?php echo $events[$j]['title']; ?>" src="<?php echo base_url(); ?>/Event_gallary/<?php echo $events[$j]['event_image']; ?>" />
								<div class="register-user-box">
									<h5><?php echo 'event_title'; ?></h5>
									<?php echo $events[$j]['event_content'];?>
								</div>
							</div>		
					  <?php $counter++; } }
					  	echo '</div>';		
						}
						?>
				</div>

				
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				  <i class="fa fa-angle-left"></i>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
				  <i class="fa fa-angle-right"></i>
				  <span class="sr-only">Next</span>
				</a>
			  </div>
			
			
					
			
			<div id="myModal" class="modal">
  				<span class="close">&times;</span>
  				<img class="modal-content" id="img01">
  				<div id="caption">ghg ghgfg gtjb jh hgj h h</div>
			</div>
			
				<script>
					var modal = document.getElementById('myModal');
					var img = document.getElementById('myImg');
					var modalImg = document.getElementById("img01");
					var captionText = document.getElementById("caption");
					img.onclick = function(){
				    	modal.style.display = "block";
				    	modalImg.src = this.src;
				    	captionText.innerHTML = this.alt;
					}
					var span = document.getElementsByClassName("close")[0];
					span.onclick = function() { 
				    modal.style.display = "none";
					}
				</script>				
			</div>
		</div>
	</div>
</section>
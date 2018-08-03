 <section class="title-header-bg">
	<div class="text-center">
		<h3><?php echo $title; ?></h3>
		<div class="bredcrum-list">
			<ul>
				<li><a href="<?php echo base_url(); ?>" title=""><img style="margin-top:-6px;" alt="" src="<?php echo base_url(); ?>assest/images/home-ico.png" /></a> / </li>
				<li><a href="" title="">NAM</a> / </li>
				<li><a href="" title=""><?php echo $title; ?></a></li>
			</ul>
		</div>
	</div>
</section>
<section class="content-section" style="min-height:300px;">
	<div class="container-fuild" style="padding-left:4%;padding-right:4%;">
		<div class="row">
			<div class="col-md-4">
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also 
			</div>
			<div class="col-md-4">
				Small Farmers' Agri-Business Consortium<br>

Head Office: <br>
NCUI Auditorium Building, 5th Floor, 3, Siri Institutional Area, <br>
August Kranti Marg, Hauz Khas, New Delhi - 110016. <br>
(T) 1800 270 0224 <br>
(F) +91-11- 26862367 <br>
(E) nam@sfac.in<br>
			</div>
			<div class="col-md-4">
			<form>
				<div class="form-group">
    <input placeholder="Type Name" type="text" class="form-control" id="email">
  </div>
  <div class="form-group">
    <input placeholder="Email Id" type="email" class="form-control" id="email">
  </div>
<div class="form-group">
    <input placeholder="Conatct No." type="email" class="form-control" id="email">
  </div>
<div class="form-group">
    <input placeholder="Conatct No." type="email" class="form-control" id="email">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
  </form>
			</div>
			
		</div>
	</div>
</section>
<div class="container-fluid" id="map" style="height:430px;">
		</div>
<script>
function initMap() {
var uluru = {lat:28.5494499, lng: 77.2001398};
var map = new google.maps.Map(document.getElementById('map'), {
zoom: 12,
center: uluru
});
var marker = new google.maps.Marker({
position: uluru,
map: map
});
}
</script><script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPRk1qEWhM_3OdW4WfHbe9Do58LR8qv2k&callback=initMap">
</script>
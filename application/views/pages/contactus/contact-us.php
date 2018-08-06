<section class="title-header-bg">
	<div class="text-center">
		<h3><?php echo $page_title; ?></h3>
		<div style="margin-top:12px;" class="text-center"><a href="<?php echo base_url(); ?>" title=""><img style="margin-top:-6px;" alt="" src="<?php echo base_url(); ?>assest/images/home-ico.png" /></a> / <span id="bredcrum"></span></div>
	</div>
</section>
 

<section class="content-section" style="min-height:300px;float:left;width:100%;padding:30px 0;">
	<div class="container-fuild" style="padding-left:4%;padding-right:4%;">
		<div class="row">
			<div class="col-md-4">
				<div class="contect-text-msg">orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also </div>
			</div>
			<div class="col-md-4">
				
				<div class="address-sec"><h4>Small Farmers' Agri-Business Consortium</h4>
<p><b>NCUI Auditorium Building, 5th Floor, 3, <br>Siri Institutional Area, <br>
August Kranti Marg, Hauz Khas, <br>New Delhi - 110016. <br></b></p>
<span style="margin-top:10px;"><img alt="Phone" src="<?php echo base_url(); ?>assest/images/icon1.png" /> 1800 270 0224 </span><br>
<span><img alt="Fax" src="<?php echo base_url(); ?>assest/images/icon2.png" /> +91-11- 26862367 </span><br>
<span><img alt="Email" src="<?php echo base_url(); ?>assest/images/icon3.png" /> nam@sfac.in<br></span>
			</div>
			</div>
			<div class="col-md-4">
			<form class="contact-form">
			<div class="form-group">
				<label for="usr">Purpose to Contact Us</label>
				<div class="radio">
				  <label><input type="radio" name="optradio" checked>Generals</label>&nbsp;&nbsp;&nbsp;<label><input type="radio" name="optradio">Grievance</label>
				</div>
			</div>
				<div class="form-group">
    <input placeholder="Name" type="text" class="form-control" id="email">
  </div>
  <div class="form-group">
    <input placeholder="Conatct No." type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <textarea placeholder="Tyle your Address" class="form-control" rows="5" ></textarea>
  </div>
  <div class="form-group">
  <select class="form-control" id="sel1">
<option>Select Stakeholders</option>
<option>Farmer</option>
    <option>Traders</option>
  </select>
</div>
   <div class="form-group">
    <textarea placeholder="Discription..." class="form-control" rows="5" ></textarea>
  </div>
  <div class="form-group">
    <input placeholder="Email Id" type="email" class="form-control" id="email">
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
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
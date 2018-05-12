<div class="main-content-sec container-fluid">
<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      
      <div class="offset-3 col-6 card card-body">
      	<p class="text-danger"><?php echo $this->session->flashdata('message'); ?></p>
      	<form name="login_form" method="POST" action="<?php echo base_url();?>admin/Auth/login"> 
		  <div class="form-group">
		    <label for="formGroupExampleInput">Identity</label>
		    <input type="text" name="identity" class="form-control" id="formGroupExampleInput" placeholder="Example input">
		  </div>
		  <div class="form-group">
		    <label for="formGroupExampleInput2">Password</label>
		    <input type="password" name="password" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
		  </div>
		  <div class="form-group">
		    <input type="submit" class="btn btn-lg btn-light" value="login">
		    <input type="reset" class="btn btn-lg btn-light" value="Cancel">
		  </div>
		</form>
      
      </div>
</div>
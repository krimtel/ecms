<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<ol class="breadcrumb">
        <li><a title="Home" href="<?php echo base_url();?>admin/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New Language</li>
    </ol>   
   <section class="content-header">
      <h1>Cache Management</h1>
    </section>
	<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
			<div class="box box-primary">
				<div class="box-header with-border">
				  <h3 class="box-title">Select All Files</h3>
				  <div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					  <i class="fa fa-minus"></i></button>
				  </div>
				</div>
					<div class="box-body">
						<div class="form-group">
						<?php 
						if(isset($files) && count($files) > 0 ){
						    foreach($files as $file){	
						        echo "<input type='checkbox' class='soft_files' name='soft_files' data-file='$file'>". $file."<br/>"; 
						    }
						}
						
						?>
						
						</div>
					</div>
			</div>
		</section>
		<section class="col-lg-3 connectedSortable">
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">Clear Files</h3>
			  <div class="box-tools pull-right">
			  <button type="button" id="clr_file" class="btn btn-danger pull-right btn-space" name="clr_file">Clear</button>
			  </div>
			</div>
			<div class="box-body table-responsive no-padding">
              
            </div>
		</div>
		</section>
		</div>
		</section>
</div>

	<link rel="stylesheet" href="<?php echo base_url();?>assest/admin/ckeditor/neo.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<ol class="breadcrumb">
        <li><a title="Home" href="<?php echo base_url();?>admin/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Menus</li>
    </ol>   
	<section class="content-header">
      <h1 class="pull-left">Menus</h1>
    </section>
	<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- Left col -->
		<section class="col-lg-6 connectedSortable">
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">Add Menu</h3>
			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
			  </div>
			</div>
			<form role="form" class="form-horizontal">
			<div class="box-body">
				<div class="form-group">
					<label class="col-sm-3 control-label">Title</label>
					<div class="col-sm-9"><input type="text" class="form-control" placeholder="Enter new title"></div>
					<div class="col-sm-12"><input type="hidden" class="form-control" value=""></div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Select Parent link</label>
					<div class="col-sm-9">
						<select class="form-control" name="" id="">
							<option value="0" selected>Please select Parent</option>
							<option value="1" >About us</option>
							<option value="2" >NAM</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="editor">
						</div>
					</div>
				</div>
            </div>
			</form>
			<div class="box-footer">
				<button id="class_create" type="button" class="btn pull-right btn-info">Save</button>
				<button type="reset" class="btn btn-default pull-right btn-space">Cancel</button>
			</div>
		</div>
		</section>
		
		<section class="col-lg-6 connectedSortable">
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">All Menus</h3>
			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
			  </div>
			</div>

			<div class="box-body">
				
            </div>

			
		</div>
		</section>
		</div>
		</section>
</div>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<ol class="breadcrumb">
        <li><a title="Home" href="<?php echo base_url();?>admin/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">News</li>
    </ol>   
	<section class="content-header">
      <h1 class="pull-left">News</h1>
    </section>
	<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- Left col -->
		<section class="col-lg-4 connectedSortable">
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">Add new news</h3>
			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
			  </div>
			</div>
			<form role="form" class="form-horizontal">
			<div class="box-body">
				<div class="form-group">
					<label class="col-sm-3 control-label">News Discriptions</label>
					<div class="col-sm-9"><textarea class="form-control"></textarea></div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Read More link</label>
					<div class="col-sm-9"><input type="text" class="form-control" placeholder="Enter read more link" /></div>
					<div class="col-sm-12"><input type="hidden" class="form-control" value=""></div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Sort Order</label>
					<div class="col-sm-9"><input type="text" class="form-control" placeholder="Enter sort order" /></div>
					<div class="col-sm-12"><input type="hidden" class="form-control" value=""></div>
				</div>
				
			</div>
			</form>
			<div class="box-footer">
				<button id="class_create" type="button" class="btn pull-right btn-info">Save</button>
				<button type="reset" class="btn btn-default pull-right btn-space">Cancel</button>
			</div>
		</div>
		</section>
		
		<section class="col-lg-4 connectedSortable">
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">All News</h3>
			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
			  </div>
			</div>

			<div class="box-body">
				
            </div>

			
		</div>
		</section>
		<section class="col-lg-4 connectedSortable">
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">All Menus (Hindi)</h3>
			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
			  </div>
			</div>

			<div class="box-body">
				<ul>
					<li>Home</li>
					<li>NAM
						<ul>
							<li>About us</li>
							<li>Key stakeholders</li>
							<li>Implementation Progress</li>
							<li>Usefull Links</li>
						</ul>
					</li>
					<li>Farmer
						<ul>
							<li>Approved Commodities</li>
							<li>Commodity Quality Parameter</li>
							<li>Enrolled mandis</li>
						</ul>
					</li>
					<li>Trader</li>
					<li>Statistics</li>
				</ul>
            </div>

			
		</div>
		</section>
		</div>
		</section>
</div>

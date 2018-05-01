<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<ol class="breadcrumb">
        <li><a title="Home" href="<?php echo base_url();?>admin/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New Language</li>
    </ol>   
   <section class="content-header">
      <h1>Languages</h1>
    </section>
	<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
			<div class="box box-primary">
				<div class="box-header with-border">
				  <h3 class="box-title">Add New Language</h3>
				  <div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					  <i class="fa fa-minus"></i></button>
				  </div>
				</div>
				<form role="form" class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
						  <label class="col-sm-3 control-label">New Language</label>
						  <div class="col-sm-9"><input type="text" id="" class="form-control" placeholder="Enter new language"></div>
						  <div class="col-sm-9"><input type="hidden" id="" class="form-control" value=""></div>
						</div>
					</div>
					<div class="box-footer">
						<button id="class_edit" type="button" class="btn pull-right btn-info" style="display:none;">Update</button>
						<button id="class_create" type="button" class="btn pull-right btn-info">Submit</button>
						<button type="reset" class="btn btn-default pull-right btn-space">Cancel</button>
					</div>
				</form>
			</div>
		</section>
		<section class="col-lg-6 connectedSortable">
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">All Language List</h3>
			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
			  </div>
			</div>
			<div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>S.No.</th>
                  <th>Language</th>
                  <th>Edit/Delete</th>
                </tr>
                <tbody id="class_display">

                		<tr>
                  			<td>01</td>
                  			<td>Hindi</td>
                  			<td>
                  				<a class="class_edit btn btn-info btn-flat"><i class="fa fa-pencil"></i></a>
                  				<a class="class_delete btn btn-info btn-flat"><i class="fa fa-trash"></i></a>
                  			</td>
                		</tr>
						<tr>
                  			<td>02</td>
                  			<td>Marathi</td>
                  			<td>
                  				<a class="class_edit btn btn-info btn-flat"><i class="fa fa-pencil"></i></a>
                  				<a class="class_delete btn btn-info btn-flat"><i class="fa fa-trash"></i></a>
                  			</td>
                		</tr>

            	</tbody>
              </table>
            </div>
		</div>
		</section>
		</div>
		</section>
</div>
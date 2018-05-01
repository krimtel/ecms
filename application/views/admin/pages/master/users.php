<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<ol class="breadcrumb">
        <li><a title="Home" href="<?php echo base_url();?>admin/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add User</li>
     </ol>   
	<section class="content-header">
      <h1>Users</h1>
    </section>
	
	<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Add New User</h3>
					<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					  <i class="fa fa-minus"></i></button>
					</div>
				</div>
				<form role="form" class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
						  <label class="col-sm-3 control-label">Name</label>
						  <div class="col-sm-9"><input type="text" id="" class="form-control" placeholder="Enter name"></div>
						  <div class="col-sm-9"><input type="hidden" id="" class="form-control" value=""></div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Select Language</label>
							<div class="col-sm-9">
								<select class="form-control" name="Language" id="">
									<option value="0" selected>Please select language</option>
									<option value="1" selected>Hindi</option>
									<option value="2" selected>Marathi</option>
								</select>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<button id="class_edit" type="button" class="btn pull-right btn-info" style="display:none;">Update</button>
						<button id="class_create" type="button" class="btn pull-right btn-success">Submit</button>
						<button type="reset" class="btn btn-default pull-right btn-space">Cancel</button>
					</div>
				</form>
			</div>
		</section>
		<section class="col-lg-6 connectedSortable">
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">All User List</h3>
			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
			  </div>
			</div>
			<div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>S.No.</th>
                  <th>Users</th>
                  <th>Language</th>
                  <th>Edit/Delete</th>
                </tr>
                <tbody id="class_display">

                		<tr>
                  			<td>01</td>
                  			<td>Rahul</td>
                  			<td>Hindi</td>
                  			<td>
                  				<a class="class_edit btn btn-info btn-flat"><i class="fa fa-pencil"></i></a>
                  				<a class="class_delete btn btn-info btn-flat"><i class="fa fa-trash"></i></a>
                  			</td>
                		</tr>
						<tr>
                  			<td>02</td>
                  			<td>Narayan</td>
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
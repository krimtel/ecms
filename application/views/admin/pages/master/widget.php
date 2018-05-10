<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<ol class="breadcrumb">
        <li><a title="Home" href="<?php echo base_url();?>admin/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Widget</li>
     </ol>   
	<section class="content-header">
      <h1>Widget</h1>
    </section>
	
	<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Add New Widget</h3>
					<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					  <i class="fa fa-minus"></i></button>
					</div>
				</div>
				<form name="f1" id="widget_form" role="form" class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>admin/Widget_ctrl/widget_create">
					<div class="box-body">
						<div class="form-group">
						  <label class="col-sm-3 control-label">Name</label>
						  <div class="col-sm-9">
						  	<input type="text" class="form-control" name="widget_name" id="widget_name">
						  </div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Content</label>
							<div class="col-sm-9">
								<textarea id="widget_content" name="widget_content" class="form-control" rows="10"></textarea>
								<input id="widget_id" name="widget_id" type="hidden" class="form-control" value="">
			            		<script>
			                		CKEDITOR.replace('widget_content');
			            		</script>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<button id="widget_update" type="submit" class="btn pull-right btn-info" style="display:none;">Update</button>
						<button id="widget_create" type="button" class="btn pull-right btn-success">Submit</button>
						<button id="widget_reset" type="reset" class="btn btn-default pull-right btn-space">Cancel</button>
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
                <tbody id="language_users_display">
					<?php if(isset($users_lang) && (count($users_lang)>0)){
						$c = 1;
						foreach($users_lang as $user_lang){ ?> 
							<tr>
	                  			<td><?php echo $c; ?></td>
	                  			<td><?php echo $user_lang['username']; ?></td>
	                  			<td><?php echo $user_lang['l_name']; ?></td>
	                  			<td>
	                  				<a class="class_edit btn btn-info btn-flat user_edit" data-u_id="<?php echo $user_lang['id']; ?>" data-lang_id="<?php echo $user_lang['l_id']; ?>"><i class="fa fa-pencil"></i></a>
	                  				<a class="class_delete btn btn-info btn-flat user_delete" data-u_id="<?php echo $user_lang['id']; ?>"><i class="fa fa-trash"></i></a>
	                  			</td>
                			</tr>	
					<?php }
					}?>
            	</tbody>
              </table>
            </div>
		</div>
		</section>
		</div>
	</section>
</div>
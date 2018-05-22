<?php 
	$wiget_drop_Down = '';
	foreach($widgets as $widget){
		$wiget_drop_Down .= '<option value="'.$widget['w_id'].'">'.$widget['name'].'</option>'; 
	}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<ol class="breadcrumb">
        <li><a title="Home" href="<?php echo base_url();?>admin/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pages</li>
    </ol>   
	<section class="content-header">
      <h1 class="pull-left">New Page</h1>
    </section>
	<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- Left col -->
		<section class="col-lg-12 connectedSortable">
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">New Page</h3>
			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
			  </div>
			</div>
			<form id="page_add_form" name="f1" method="POST" role="form" class="form-horizontal" action="<?php echo base_url();?>admin/Page_ctrl/page_create">
			<div class="box-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">Page Name</label>
					<div class="col-sm-9"><input id="page_name" name="page_name" type="text" class="form-control" placeholder="Enter new language"></div>
					<div class="col-sm-12"><input type="hidden" class="form-control" value=""></div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Select Layout</label>
					<div class="col-sm-9">
						<select class="form-control" name="page_layout" id="page_layout">
							<option value="0" selected>Please select layout</option>
							<option value="1" >1 column (No Sidebar)</option>
							<option value="2" >2 columns (Left Sidebar)</option>
							<option value="3" >3 columns (Both Sidebar)</option>
						</select>
					</div>
				</div>
				<!--  -->
				<div class="form-group" id="1coumn" style="display: none;">
					<label class="col-sm-2 control-label">Select Layout</label>
					<div class="col-sm-9">
							<table class="table table-bordered">
							<tr><th>Main</th></tr>
							<tr>
								<td>
									<select class="form-control col-sm-6" name="one_col_maincontent[]" id="">
										<option value="0">Select widget</option>
										<?php print_r($wiget_drop_Down); ?>
									</select>
									<div id="one_col_maincontent_box"></div>
									<input type="button" id="one_col_main_addmore" value="Add more" class="btn btn-default">
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="form-group" id="2coumn" style="display: none;">
					<label class="col-sm-2 control-label">Select Layout</label>
					<div class="col-sm-9">
						<table class="table table-bordered">
							<tr><th>Left</th><th>Main</th></tr>
							<tr>
								<td>
									<select class="form-control col-sm-6" class="two_col_leftcontent" name="two_col_leftcontent[]" id="">
										<option value="0">Select widget</option>
										<?php print_r($wiget_drop_Down); ?>
									</select>
									<div id="two_col_leftcontent_box"></div>
									<input type="button" id="two_col_leftcontent_addmore" value="Add more" class="btn btn-default">
								</td>
								<td>
									<select class="form-control col-sm-6" class="two_col_maincontent" name="two_col_maincontent[]" id="">
										<option value="0">Select widget</option>
										<?php print_r($wiget_drop_Down); ?>
									</select>
									<div id="two_col_maincontent_box"></div>
									<input type="button" id="two_col_maincontent_addmore" value="Add more" class="btn btn-default">
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="form-group" id="3coumn" style="display: none;">
					<label class="col-sm-2 control-label">Select Layout</label>
					<div class="col-sm-9">
						<table class="table table-bordered">
							<tr><th>Left</th><th>Main</th><th>Right</th></tr>
							<tr>
								<td>
									<select class="form-control col-sm-6" class="three_col_leftcontent" name="three_col_leftcontent[]" id="">
										<option value="0">Select widget</option>
										<?php print_r($wiget_drop_Down); ?>
									</select>
									<div id="three_col_leftcontent_box"></div>
									<input type="button" id="three_col_leftcontent_addmore" value="Add more" class="btn btn-default">
								</td>
								<td>
									<select class="form-control col-sm-6" class="three_col_maincontent" name="three_col_maincontent[]" id="">
										<option value="0">Select widget</option>
										<?php print_r($wiget_drop_Down); ?>
									</select>
									<div id="three_col_maincontent_box"></div>
									<input type="button" id="three_col_maincontent_addmore" value="Add more" class="btn btn-default">
								</td>
								<td>
									<select class="form-control col-sm-6" class="three_col_rightcontent" name="three_col_rightcontent[]" id="">
										<option value="0">Select widget</option>
										<?php print_r($wiget_drop_Down); ?>
									</select>
									<div id="three_col_rightcontent_box"></div>
									<input type="button" id="three_col_rightcontent_addmore" value="Add more" class="btn btn-default">
								</td>
							</tr>
						</table>
					</div>
				</div>
				<!--  -->
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Meta tags</label>
					<div class="col-sm-9">
						<textarea name="meta_tag" id="meta_tag" rows="5" cols="" class="form-control"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Key words</label>
					<div class="col-sm-9">
						<textarea rows="5" name="keyword" id="keyword" cols="" class="form-control"></textarea>
					</div>
				</div>
            </div>
			</form>
			<div class="box-footer">
				<button id="page_update" type="submit" class="btn pull-right btn-info" style="display:none;">Update</button>
				<button id="page_create" type="submit" class="btn pull-right btn-info">Save</button>
				<button type="reset" class="btn btn-default pull-right btn-space">Cancel</button>
			</div>
		</div>
		</section>
		</div>
		</section>
</div>
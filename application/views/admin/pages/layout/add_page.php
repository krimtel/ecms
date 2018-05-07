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
			<form role="form" class="form-horizontal">
			<div class="box-body">
				<div class="form-group">
					<label class="col-sm-3 control-label">Page Name</label>
					<div class="col-sm-9"><input id="page_name" name="page_name" type="text" class="form-control" placeholder="Enter new language"></div>
					<div class="col-sm-12"><input type="hidden" class="form-control" value=""></div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Select Layout</label>
					<div class="col-sm-9">
						<select class="form-control" name="page_layout" id="page_layout">
							<option value="0" selected>Please select layout</option>
							<option value="1" >1 column</option>
							<option value="2" >2 columns</option>
							<option value="3" >3 columns</option>
						</select>
					</div>
				</div>
				<!--  -->
				<div class="form-group" id="1coumn" style="display: none;">
					<label class="col-sm-3 control-label">Select Layout</label>
					<div class="col-sm-9">
						<label class="col-sm-2 control-label">Main content</label>
							<select class="form-control col-sm-6" name="Language" id="">
								<option value="0">select widget</option>
							</select>
					</div>
				</div>
				<div class="form-group" id="2coumn" style="display: none;">
					<label class="col-sm-3 control-label">Select Layout</label>
					<div class="col-sm-9">
						<div class="row">
							<label class="col-sm-2 control-label">Left content</label>
							<select class="form-control col-sm-6" name="page_layout_dropdown" id="page_layout_dropdown">
								<option value="0">select widget</option>
							</select>
							
							<label class="col-sm-2 control-label">Main content</label>
							<select class="form-control col-sm-6" name="Language" id="">
								<option value="0">select widget</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group" id="3coumn" style="display: none;">
					<label class="col-sm-3 control-label">Select Layout</label>
					<div class="col-sm-9">
						<div class="row">
							<label class="col-sm-2 control-label">Left content</label>
							<select class="form-control col-sm-6" name="Language" id="">
								<option value="0">select widget</option>
							</select>
							
							<label class="col-sm-2 control-label">Main content</label>
							<select class="form-control col-sm-6" name="Language" id="">
								<option value="0">select widget</option>
							</select>
							
							<label class="col-sm-2 control-label">Right content</label>
							<select class="form-control col-sm-6" name="Language" id="">
								<option value="0">select widget</option>
							</select>
						</div>
					</div>
				</div>
				<!--  -->
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Meta tags</label>
					<div class="col-sm-9">
						<textarea name="meta_tag" id="meta_tag" rows="5" cols="" class="form-control"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Key words</label>
					<div class="col-sm-9">
						<textarea rows="5" name="keyword" id="keyword" cols="" class="form-control"></textarea>
					</div>
				</div>
            </div>
			</form>
			<div class="box-footer">
				<button id="page_update" type="submit" class="btn pull-right btn-info">Update</button>
				<button id="page_create" type="submit" class="btn pull-right btn-info">Save</button>
				<button type="reset" class="btn btn-default pull-right btn-space">Cancel</button>
			</div>
		</div>
		</section>
		</div>
		</section>
</div>
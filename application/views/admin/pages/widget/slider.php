<?php $group = $this->session->userdata('group_name'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<ol class="breadcrumb">
        <li><a title="Home" href="<?php echo base_url();?>admin/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Events</li>
    </ol>   
	<section class="content-header">
      <h1 class="pull-left">Sliders</h1>
    </section>
	<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- Left col -->
        
        <?php if($group == 'subadmin'){ ?>
			<section class="col-lg-4 connectedSortable">
		<?php } else { ?>
			<section class="col-lg-6 connectedSortable">
		<?php } ?>
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">Add new Slider</h3>
			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
			  </div>
			</div>
			<form name="slider_form" id="slider_form" role="form" class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>admin/Slider_ctrl/slider_create">
			<div class="box-body">
			<?php if($group != 'subadmin'){ ?>
				<div class="form-group">
					<label class="col-sm-3 control-label">Slider Photo</label>
					<div class="col-sm-9">
						<input type="file" name="userFiles" id="userFiles" class="form-control">
						<div class="text-danger" id="userfile_error" style="display:none;"></div>
					</div>
				</div>
			<?php } ?>
				
			  	<div class="form-group">
					<label class="col-sm-3 control-label">Alt Tag</label>
					<div class="col-sm-9">
						<input type="text" name="slider_alt" id="slider_alt" class="form-control">
						<div class="text-danger" id="alt_error" style="display:none;"></div>
					</div>
				</div>
				
			<!--	<div class="form-group">
					<label class="col-sm-3 control-label">Event description</label>
					<div class="col-sm-9">
						<textarea id="event_desc" name="event_desc" class="form-control" rows="10"></textarea>
						<div class="text-danger" id="event_desc_error" style="display:none;"></div>
						<input id="event_id" name="event_id" type="hidden" class="form-control" value="">
			            <script>
			                CKEDITOR.replace('event_desc');
			            </script>
					</div>
				</div>   
				                !-->
				  <input id="slider_id" name="slider_id" type="hidden" class="form-control" value="">
				<?php if($group != 'subadmin'){ ?>
				<div class="form-group">
					<label class="col-sm-3 control-label">Sort Order</label>
					<div class="col-sm-9">
						<input type="text" id="slider_order" name="slider_order" class="form-control" placeholder="Enter sort order" value="999"/>
						<div class="text-danger" id="slider_order_error" style="display:none;"></div>
					</div>
				</div>
				<?php } ?>
			</div>
				<div class="box-footer">
					<button id="slider_create" type="button" class="btn pull-right btn-info">Save</button>
					<button id="slider_update" type="button" class="btn pull-right btn-info" style="display: none;">Update</button>
					<button type="reset" class="btn btn-default pull-right btn-space">Cancel</button>
				</div>
			</form>
		</div>
		</section>
		
		<?php if($group == 'subadmin'){ ?>
			
		<?php }else { ?>
			<section class="col-lg-6 connectedSortable">
		<?php } ?>
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">All Sliders</h3>
			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
			  </div>
			</div>

			<div class="box-body">
				<table class="table">
					<tr>
						<th>Image</th>
						<th>Alt Tag</th>
						<?php if($group != 'subadmin') { ?>
							<th>Sort</th>
							<th>Publish</th>
						<?php } ?>
						<th> operations </th>
					</tr>
						<tbody>
							<?php //if(isset($slider) && count(($slider) > 0)){
									foreach($slider as $slider){?>
									<?php if($slider['lang_id'] == 1)?>
									<tr>
										<td> <?php echo $slider['alt_tag']?></td>
									</tr>
				<?php	
									 }
				
				?>
						</tbody>
				</table>
            </div>

			
		</div>
		</section>
		</div>
		</section>
</div>

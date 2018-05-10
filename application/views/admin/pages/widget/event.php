<?php $group = $this->session->userdata('group_name'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<ol class="breadcrumb">
        <li><a title="Home" href="<?php echo base_url();?>admin/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Events</li>
    </ol>   
	<section class="content-header">
      <h1 class="pull-left">Events</h1>
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
			  <h3 class="box-title">Add new Events</h3>
			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
			  </div>
			</div>
			<form name="f1" id="news_form" role="form" class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>admin/News_ctrl/news_create">
			<div class="box-body">
				<div class="form-group">
					<label class="col-sm-3 control-label">Event Photo</label>
					<div class="col-sm-9">
						<input type="file" name="userfile" class="form-control">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Event Title</label>
					<div class="col-sm-9">
						<input type="text" name="event_title" id="event_title" class="form-control">
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-sm-3 control-label">Event description</label>
					<div class="col-sm-9">
						<textarea id="event_desc" name="event_desc" class="form-control" rows="10"></textarea>
						<input id="event_id" name="event_id" type="hidden" class="form-control" value="">
			            <script>
			                CKEDITOR.replace('event_desc');
			            </script>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Sort Order</label>
					<div class="col-sm-9">
						<input type="text" id="event_order" name="event_order" class="form-control" placeholder="Enter sort order" />
					</div>
				</div>
				
			</div>
			</form>
			<div class="box-footer">
				<button id="news_create" type="submit" class="btn pull-right btn-info">Save</button>
				<button id="news_update" type="submit" class="btn pull-right btn-info" style="display: none;">Update</button>
				<button type="reset" class="btn btn-default pull-right btn-space">Cancel</button>
			</div>
		</div>
		</section>
		
		<?php if($group == 'subadmin'){ ?>
			<section class="col-lg-4 connectedSortable">
		<?php }else { ?>
			<section class="col-lg-6 connectedSortable">
		<?php } ?>
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">All Events</h3>
			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
			  </div>
			</div>

			<div class="box-body">
				<table class="table">
					<tr>
						<th>Event</th>
						<?php if($group != 'subadmin') { ?>
							<th>Sort</th>
							<th>Publish</th>
						<?php } ?>
						<th> operations </th>
					</tr>
					<tbody>
						<?php if(isset($newses) && (count($newses) > 0)){ 
								foreach($newses as $news) { ?>
								<?php if($news['lang_id'] == 1) { ?>
								<tr>
									<td><?php echo $news['news_contect']; ?></td>
									<?php if($group != 'subadmin'){ ?>
										<td><?php echo $news['sort']; ?></td>
										<td>
											<?php if($news['publish']){ ?>
												<input class="news_published" data-news_id="<?php echo $news['news_id']?>" type="checkbox" checked>										
											<?php } else { ?>
												<input class="news_published" data-news_id="<?php echo $news['news_id']?>" type="checkbox">
											<?php } ?>
										</td>
									<?php } ?>
									<td>
										<?php if($group == 'subadmin'){ ?>
											<a class="news_tranlate" data-news_id="<?php echo $news['news_id']?>"><i class="fa fa-heartbeat"></i></a>
										<?php } else { ?>
											<a class="news_edit" data-news_id="<?php echo $news['news_id']?>"><i class="fa fa-pencil"></i></a> 
									    	<a class="news_delete" data-news_id="<?php echo $news['news_id']?>"><i class="fa fa-trash"></i></a>
										<?php } ?>
									</td>
								</tr>
						<?php } } }?>
					</tbody>
				</table>
            </div>

			
		</div>
		</section>
		
		<?php if($group == 'subadmin'){ ?>
			<section class="col-lg-4 connectedSortable" style="display: block;">
		<?php } else { ?>
			<section class="col-lg-4 connectedSortable" style="display: none;">
		<?php } ?>
		<div class="box box-primary">
			<div class="box-header with-border">
			<?php if(isset($language)){ ?>
			  	<h3 class="box-title">All Menus (<?php echo $language['l_name']; ?>)</h3>
			<?php } ?>
			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
			  </div>
			</div>

			<div class="box-body">
				<table class="table">
					<tr>
						<th>News</th>
						<?php if($group != 'subadmin'){ ?>
							<th>Sort</th>
							<th>Publish</th>
						<?php } ?>
						<th>operations</th>
					</tr>
					<tbody>
						<?php if(isset($newses) && (count($newses) > 0)){ 
								foreach($newses as $news) { ?>
								<?php if($news['lang_id'] == $this->session->userdata('language')) { ?>
								<tr>
									<td><?php echo $news['news_contect']; ?></td>
									<?php if($group != 'subadmin'){ ?>
										<td><?php echo $news['sort']; ?></td>
										<td>
											<?php if($news['publish']){ ?>
												<input class="news_published" data-news_id="<?php echo $news['news_id']?>" type="checkbox" checked>										
											<?php } else { ?>
												<input class="news_published" data-news_id="<?php echo $news['news_id']?>" type="checkbox">
											<?php } ?>
										</td>
									<?php } ?>
									<td>
										<?php if($group == 'subadmin'){ ?>
											<a class="news_tranlate" data-news_id="<?php echo $news['news_id']?>"><i class="fa fa-heartbeat"></i></a>
										<?php } else { ?>
											<a class="news_edit" data-news_id="<?php echo $news['news_id']?>"><i class="fa fa-pencil"></i></a> 
									    	<a class="news_delete" data-news_id="<?php echo $news['news_id']?>"><i class="fa fa-trash"></i></a>
										<?php } ?>
									</td>
								</tr>
						<?php } } }?>
					</tbody>
				</table>
            </div>

			
		</div>
		</section>
		</div>
		</section>
</div>

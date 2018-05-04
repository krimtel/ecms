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
		<section class="col-lg-6 connectedSortable">
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">Add new news</h3>
			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
			  </div>
			</div>
			<form name="f1" id="news_form" role="form" class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>admin/News_ctrl/news_create">
			<div class="box-body">
				<div class="form-group">
					<label class="col-sm-3 control-label">News Discriptions</label>
					<div class="col-sm-9">
						<textarea id="news_desc" name="news_desc" class="form-control" rows="10"></textarea>
						<input id="news_id" name="news_id" type="text" class="form-control" value="">
			            <script>
			                CKEDITOR.replace('news_desc');
			            </script>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Sort Order</label>
					<div class="col-sm-9">
						<input type="text" id="news_order" name="news_order" class="form-control" placeholder="Enter sort order" />
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
		
		<section class="col-lg-6 connectedSortable">
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">All News</h3>
			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
			  </div>
			</div>

			<div class="box-body">
				<table class="table">
					<tr>
						<th>News</th>
						<th>Sort</th>
						<th>Publish</th>
						<th>operations</th>
					</tr>
					<tbody>
						<?php if(isset($newses) && (count($newses)>0)){ 
								foreach($newses as $news) { ?>
								<tr>
									<td><?php echo $news['news_contect']; ?></td>
									<td><?php echo $news['sort']; ?></td>
									<td>
										<?php if($news['publish']){ ?>
											<input class="news_published" data-news_id="<?php echo $news['news_id']?>" type="checkbox" checked>										
										<?php } else { ?>
											<input class="news_published" data-news_id="<?php echo $news['news_id']?>" type="checkbox">
										<?php } ?>
									</td>
									<td><a class="news_edit" data-news_id="<?php echo $news['news_id']?>"><i class="fa fa-pencil"></i></a> 
									    <a class="news_delete" data-news_id="<?php echo $news['news_id']?>"><i class="fa fa-trash"></i></a></td>
								</tr>
								
						<?php } }?>
					</tbody>
				</table>
            </div>

			
		</div>
		</section>
		<section class="col-lg-4 connectedSortable" style="display: none;">
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

<?php $language = $this->session->userdata('language'); ?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<ol class="breadcrumb">
		<li><a title="Home" href="<?php echo base_url();?>admin/admin"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Language File Management</li>
	</ol>
	<section class="content-header">
		<h1>Language File Management</h1>
	</section>
	<!-- Main content -->

	<section class="col-lg-6 connectedSortable">
		<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Open and Edit Language file</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
				<input type="hidden" name="user_lang" id="user_lang" value="<?php echo $language; ?>">
				<span class="pull-right"><a class="btn btn-primary btn-flat" id="upd_lang_file">Open/Edit File</a></span>
			</div>
	</div>
</div>
</section>
</div>
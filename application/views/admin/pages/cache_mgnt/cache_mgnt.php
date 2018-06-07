<?php
//  $data = '';
// if(isset($_REQUEST['file_clr'])){
// 	$data = $_REQUEST['file'];
// 	echo $data; die;
// }

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<ol class="breadcrumb">
         <li><a title="Home" href="<?php echo base_url();?>admin/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Cache Management</li>
    </ol>   
   <section class="content-header">
      <h1>Cache Management</h1>
    </section>
	<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
			<div class="box box-primary">
				<div class="box-header with-border">
				  <h3 class="box-title">Select All Files</h3>
				  <div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					  <i class="fa fa-minus"></i></button>
				  </div>
				</div>
					<div class="box-body">
						<div class="form-group">
						<?php 
						if(isset($files) && count($files) > 0 ){
						   // foreach($files as $file){
						    	//echo "<input type='checkbox' name='action' value=$file>".$file."<br/>";
							foreach($files as $file)
							{
								if (pathinfo($file, PATHINFO_EXTENSION) === 'txt'){
						        echo "<a class='file_clr' name='file_clr'  data-file= $file><i class='fa fa-trash'></i> </a>". $file."<br/>"; 
						    }}
						}
						?>
						
						</div>
					</div>
			</div>
		</section>
		</div>
		</section>
</div>
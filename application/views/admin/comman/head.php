<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>
	<?php if(isset($title)){ 
		echo 'eNAM Admin|'.$title;
	}else {
		echo 'eNAM Admin';
	}
	?>
	
</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assest/admin/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assest/admin/bootstrap/css/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assest/admin/dist/css/AdminLTE.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assest/admin/dist/css/skins/_all-skins.min.css" />

<!--<link rel="stylesheet" type="text/css" href="<?php //echo base_url(); ?>assest/admin/css/sb-admin.css"/>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assest/admin/css/admin-custom-style.css"/>
</head>

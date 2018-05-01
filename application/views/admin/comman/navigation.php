<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
	<a class="navbar-brand" title="Government of India" href="<?php echo base_url(); ?>"> <img style="width:45px;" alt="India" src="<?php echo base_url(); ?>assest/admin/logo.png" /></a>
					
    <!--<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>-->
    <div class="collapse navbar-collapse" id="navbarResponsive" >

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="display:none;">
		<a data-target="#navbarCollapse"  data-toggle="collapse" class="nav-menu-col desktop-hide">Menu</a>
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse" data-hover="dropdown" data-animations="fadeIn fadeInLeft fadeInUp fadeInRight" style="float:left;margin-top:5px;margin-bottom:5px;">
<ul class="nav navbar-nav menu-section1">
	<li>
		<a title="Home" class="" href="<?php echo base_url(); ?>dashboard"><i class="fa fa-home" aria-hidden="true"></i> HOME </a>
	</li>
	<li class="dropdown">
			<a title="Master" href="#" data-toggle="dropdown" > <i class="fa fa-files-o"></i> MASTER <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a title="Users" href="<?php echo base_url(); ?>admin/admin/users" >Users</a></li>
				<li><a title="Language" href="<?php echo base_url(); ?>admin/admin/language">Language</a></li>
			</ul>
	</li>
	<li class="dropdown">
			<a title="Layout" href="#" data-toggle="dropdown" > <i class="fa fa-files-o"></i> Layout <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a title="Pages" href="<?php echo base_url(); ?>admin/admin/all_pages">Pages </a></li>
				<li><a title="Menu" href="<?php echo base_url(); ?>admin/admin/nav_menu">Menu </a></li>
				<li><a title="Home-Page" href="<?php echo base_url(); ?>admin/admin/home_page">Home Page</a></li>
			</ul>
	</li>
	<li class="dropdown">
			<a title="Widget" href="#" data-toggle="dropdown" > <i class="fa fa-files-o"></i> Widget <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a title="News/Notice" href="<?php echo base_url(); ?>admin/admin/news">News/Notice </a></li>
				<li><a title="Events" href="<?php echo base_url(); ?>admin/admin/users">Events </a></li>
			</ul>
	</li>
	</ul>
	</div>

	
      <ul class="navbar-nav ml-auto" style="list-style:none;padding:0px;float:right;margin-top:13px;">
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for..." style="width:180px;">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button" style="padding:9px;margin-right:10px;">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item" style="margin-top:5px;">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>

<nav class="menu-section">
	<div class="container-fuild" style="position: fixed;margin-top:75px;
    width: 100%;
    height: 40px;
    z-index: 99;">
		 <nav class="navbar navbar-default navbar-static-top gcolor" role="navigation" style="padding:0px 3%;margin:0;">
            <div class="navbar-header navbar-toggle" style="height:40px;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              <a class="navbar-brand" href="#"></a>
            </div>
            
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav navigation">
                	<?php foreach($menus as $menu){
                			$f = 0;
                			if($menu['p_id'] == 0){
	                			foreach($menus as $submenu){
	                				if($menu['id'] == $submenu['p_id']){
	                					$f = 1;
	                				}
	                			}
	                			if($f){
	                				echo '<li class="dropdown">';
	                				echo '<a href="'.$menu['cms_url'].'" class="dropdown-toggle" data-toggle="dropdown" title="'.$menu['title'].'">'.$menu['menu_name'].'<b class="caret"></b></a>';
	                				echo '<ul class="dropdown-menu">';
	                					foreach($menus as $innermenu){ 
	                						if($innermenu['p_id'] == $menu['id']){
	                							echo '<li><a href="'.$innermenu['cms_url'].'" title="'.$innermenu['title'].'"> '.$innermenu['menu_name'].'</a></li>';
	                						}
	                					}
	                				echo '</ul>';
	                				echo '</li>';
	                			}
	                			else{
	                				echo '<li><a class="" title="'.$menu['title'].'" href="'.$menu['cms_url'].'">'.$menu['menu_name'].'</a></li>';
	                			}
                			}
                	 } ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
	</div>
</nav>
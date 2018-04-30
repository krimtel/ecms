<nav class="menu-section">
	<div class="container-fuild" style="position: fixed;margin-top:75px;
    width: 100%;
    height: 50px;
    z-index: 99;">
		 <nav class="navbar navbar-default navbar-static-top gcolor" role="navigation" style="padding:0px 2%;margin:0;">
            <div class="navbar-header" style="height:40px;">
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
                  <li><a class="active" title="HOME" href="<?php echo base_url(); ?>"> HOME</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="NATIONAL AGRICULTURE MARKET">NATIONAL AGRICULTURE MARKET<b class="caret"></b></a> 
                        <ul class="dropdown-menu">
							<li><a href="<?php echo $this->config->item('nam_url'); ?>/about_us" title="ABOUT NAM"> ABOUT NAM</a></li>
							<li><a href="<?php echo $this->config->item('nam_url'); ?>/key_stakeholders" title="KEY STAKEHOLDERS">KEY STAKEHOLDERS</a></li>
							<li><a href="<?php echo $this->config->item('nam_url'); ?>/implementation_progress" title="IMPLEMENTATION PROGRESS">IMPLEMENTATION PROGRESS</a></li> 
							<li><a href="<?php echo $this->config->item('nam_url'); ?>/usefull_links" title="USEFUL LINKS">USEFUL LINKS</a></li>
                        </ul>
                    </li>
					
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" title="FARMER">FARMER <b class="caret"></b></a>
						<ul class="dropdown-menu">
                            <li><a href="<?php echo $this->config->item('farmer_url'); ?>/approved_commodities" title="APPROVED COMMODITIES">APPROVED COMMODITIES</a></li>
                            <li><a href="<?php echo $this->config->item('farmer_url'); ?>/commodity_quality_parameters" title="COMMODITY QUALITY PARAMETERS">COMMODITY QUALITY PARAMETERS</a></li>
                            <li><a href="<?php echo $this->config->item('farmer_url'); ?>/enrolled_mandis" title="ENROLLED MANDIS">ENROLLED MANDIS</a></li>
                        </ul>
					</li>
					
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" title="TRADER">TRADER <b class="caret"></b></a>
						<ul class="dropdown-menu">
                            <li><a href="<?php echo $this->config->item('trader_url'); ?>/commodity_price" title="COMMODITY PRICE">COMMODITY PRICE</a></li>
                            <li><a href="<?php echo $this->config->item('trader_url'); ?>/approved_commodities" title="APPROVED COMMODITIES">APPROVED COMMODITIES</a></li>
							<li><a href="<?php echo $this->config->item('trader_url'); ?>/commodity_quality_parameters" title="COMMODITY QUALITY PARAMETERS">COMMODITY QUALITY PARAMETERS</a></li>
                            <li><a href="<?php echo $this->config->item('trader_url'); ?>/enrolled_mandis" title="ENROLLED MANDIS">ENROLLED MANDIS</a></li>
                            <li><a href="<?php echo $this->config->item('trader_url'); ?>/unified_license_guidelines" title="UNIFIED LICENSE GUIDELINES">UNIFIED LICENSE GUIDELINES</a></li>
                            <li><a href="<?php echo $this->config->item('trader_url'); ?>/manuals_guides" title="MANUALS/ OTHER GUIDES">MANUALS/ OTHER GUIDES</a></li>
                        </ul>
					</li>
                  
                    
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" title="STATISTICS">STATISTICS<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a target="_blank" href="http://enam.gov.in/elegantjbi/login" title="MANAGEMENT INFOMATION SYSTEM (MIS)">MANAGEMENT INFOMATION SYSTEM (MIS)</a></li>
                            <li><a target="_blank" href="http://enam.gov.in/NAMREPORT" title="REPORTS">REPORTS</a></li>
                        </ul>
                    </li>
                     
                     <li><a href="<?php echo $this->config->item('elarning_url'); ?>/elearning" title="eLEARNING">eLEARNING</a></li>
					<li>
						<a title="CONTACT US" href="<?php echo base_url(); ?>Enam_ctrl/contact_us" class="dropdown-toggle" >CONTACT US <b class="caret"></b></a>
						<ul class="dropdown-menu">
						<li><a href="<?php echo $this->config->item('contact_url'); ?>/feedback" title="FEEDBACK">FEEDBACK</a></li>
						<li><a href="<?php echo $this->config->item('contact_url'); ?>/faq" title="FAQ">FAQ</a></li>                    
					   </ul>
					</li>
					<li class="blink" id="blink"><a title="REGISTRATION GUIDELINE" data-toggle="modal" data-target="#details" href="#">REGISTRATION GUIDELINES</a></li>
						
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
	</div>
</nav>
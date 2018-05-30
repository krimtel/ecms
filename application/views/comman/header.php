<header class="header-section" style="position: fixed;width: 100%;    z-index: 99;">
	<div class="container-fuild" style="padding-left:2%;padding-right:2%;">
			<div class="col-lg-5 col-sm-5">
				<div class="india-logo">
					<a title="Government of India" href="<?php echo base_url(); ?>"> <img alt="India" src="<?php echo base_url(); ?>assest/images/india-logo.png" /></a>
				</div>
			</div>
			<div class="col-lg-7 col-sm-7">
				<div class="header-right-section">
					<div class="header-right-list help-line">
						<img style="width:43px;" alt="Help No" src="<?php echo base_url(); ?>assest/images/help-no.png" />
						<div class="help-line-box">
							<span style="margin-left:-5px;"><b>Talk to us at this number</b></span><br/>
							<span class="number">1800 270 0224</span>
						</div>
					</div>
					<div class="header-right-list">
						<a href="<?php echo base_url(); ?>Enam_ctrl/register" title="Register"><span class="register-icon">&nbsp;</span> <br/>
						<span><b>New Registration</b></span></a>
					</div>
					<div class="header-right-list login-btns">
						<a target="_blank" class="border" href="http://www.enam.gov.in/NAM/faces/infrastructure/SLogin.jsf" title="Login"><span class="login-icon">&nbsp;</span><br/>
						<span><b>Login</b></span></a>
					</div>
					
					<div class="header-right-list">
						<div class="font-size-change">
							<a class="font-A--btn" href="javascript:void()">A-</a>
							<a class="font-A-btn" href="javascript:void()">A</a>
							<a class="font-A-plus-btn" href="javascript:void()">A+</a>
						</div>
                       
						<div class="color-theme">
							<div  class="red-theme-btn" style="float:left;cursor:pointer;"><span class="red-box">&nbsp;&nbsp;&nbsp;</span></div>
							<div class="green-theme-btn" style="float:left;cursor:pointer;"><span class="green-box">&nbsp;&nbsp;&nbsp;</span></div>
							<div class="blue-theme-btn" style="float:left;cursor:pointer;"><span class="blue-box">&nbsp;&nbsp;&nbsp;</span></div>
							<div class="orange-theme-btn" style="float:left;cursor:pointer;"><span class="orange-box">&nbsp;&nbsp;&nbsp;</span></div>
						</div>
					</div>
					<div class="header-right-list lang-box">
						<span>LANGUAGES</span><br/>
						<select id="language_selector">
							<?php if($this->session->userdata('client_language') != ''){ 
								$session_lang = $this->session->userdata('client_language'); 
							} else { $session_lang = ''; }?>
							<?php foreach($languages as $language){ 
								if($session_lang != ''){ ?>
									<?php if($language['l_id'] == $session_lang){ ?>
										<option value="<?php echo $language['l_id']; ?>" selected><?php echo $language['l_name']; ?></option>
									<?php } else {?>
									<option value="<?php echo $language['l_id']; ?>"><?php echo $language['l_name']; ?></option>
									<?php } ?>
								<?php } else { ?>
									<option value="<?php echo $language['l_id']; ?>"><?php echo $language['l_name']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>

	</div>
</header>

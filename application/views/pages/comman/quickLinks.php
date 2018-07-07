<div class="sidebar-header-title"><span>IMPORTANT LINKS</span></div>
<div class="quick-link-list">
	<ul>
		<?php if(count($links) > 0) { 
			foreach($links as $link){ ?> 
				<li>
					<a href="<?php echo $this->config->item('logistic_url'); ?>/logistic_details" title="Logistic Details">
					<span class="quick-img10"></span>
						<?php echo $link['link_contect']; ?>
					</a>
				</li>			
		<?php } } ?>
	</ul>
</div>
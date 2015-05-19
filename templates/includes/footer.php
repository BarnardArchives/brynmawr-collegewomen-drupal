<?php
	global $base_path;
	
	$footer_menu = menu_load_links('menu-footer-menu-links');
?>

<div class="schools">
    <div class="container">
        <div class="homepage-college-info">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline college-list text-center">
                    	<li><a href="https://barnard.edu/" target="_blank"><img alt="Barnard College logo" class="img-responsive" src="<?php echo $base_path; ?>themes/sisters/resources/assets/logo_barnard.jpg" style="height:88px; width:230px" /></a></li>
                    	<li><a href="https://www.brynmawr.edu/" target="_blank"><img alt="Bryn Mawr College logo" class="img-responsive" src="<?php echo $base_path; ?>themes/sisters/resources/assets/logo_brynmawr.jpg" style="height:88px; width:230px" /></a></li>
                    	<li><a href="https://www.mtholyoke.edu/" target="_blank"><img alt="Mount Holyoke College logo" class="img-responsive" src="<?php echo $base_path; ?>themes/sisters/resources/assets/logo_mtholyoke.jpg" style="height:88px; width:230px" /></a></li>
                    	<li><a href="http://www.radcliffe.harvard.edu/" target="_blank"><img alt="Radcliffe Institute logo" class="img-responsive" src="<?php echo $base_path; ?>themes/sisters/resources/assets/logo_radcliffe.jpg" style="height:88px; width:230px" /></a></li>
                    	<li><a href="http://www.smith.edu/" target="_blank"><img alt="Smith College logo" class="img-responsive" src="<?php echo $base_path; ?>themes/sisters/resources/assets/logo_smith.jpg" style="height:88px; width:230px" /></a></li>
                    	<li><a href="http://www.vassar.edu/" target="_blank"><img alt="Vassar College logo" class="img-responsive" src="<?php echo $base_path; ?>themes/sisters/resources/assets/logo_vassar.jpg" style="height:88px; width:230px" /></a></li>
                    	<li><a href="http://www.wellesley.edu/" target="_blank"><img alt="Lorem" class="img-responsive" src="<?php echo $base_path; ?>themes/sisters/resources/assets/logo_wellesley.jpg" style="height:88px; width:230px" /></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="feedbacker" class="hidden-sm hidden-xs">
    <a href="javascript: void(0);"><img src="<?php print $base_path; ?>themes/sisters/resources/images/feedback-badge.svg" alt="Beta" /></a>
</div>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-3">
            	<div><img alt="National Endowment for the Humanities logo" class="img-responsive" src="<?php echo $base_path; ?>themes/sisters/resources/assets/logo_neh.svg" /></div>
            </div>
        	<div class="col-sm-8 col-md-9">
            	<p>Copyright © 2014 Seven Sister Colleges.</p>
            	<ul class="list-inline">
            		<?php foreach($footer_menu as $menu): ?>
            			<?php $path = drupal_get_path_alias($menu['link_path']); ?>
            			
            			<?php if(strpos($path,'http') !== false): ?>
            	    		<li><a href="<?php print $menu['link_path']; ?>" target="_blank"><?php print $menu['link_title'] ?></a></li>
            	    	<?php else: ?>
            	    		<li><a href="<?php print $base_path; ?><?php print drupal_get_path_alias($menu['link_path']) ?>"><?php print $menu['link_title'] ?></a></li>
            	    	<?php endif; ?>
            		<?php endforeach; ?>
            		
            	</ul>
        	</div>
        </div>
    </div>
</div>

<?php
	 global $base_path; 
	 $main_menu = menu_load_links('main-menu');

?>

<div class="navbar" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://staging.interactivemechanics.com/7sisters/">College Women 
          <small>Documenting the History of Women in Higher Education</small></a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav nav-links">
      
      	<?php foreach($main_menu as $menu): ?>
			<?php $path = drupal_get_path_alias($menu['link_path']); ?>
			
			<?php if(strpos($path,'http') !== false): ?>
	    		<li><a href="<?php print $menu['link_path']; ?>" target="_blank"><?php print $menu['link_title'] ?></a></li>
	    		
	    	<?php else: ?>
	    		<li>
	    			<a href="<?php print $base_path; ?><?php print drupal_get_path_alias($menu['link_path']) ?>"><?php print $menu['link_title'] ?></a>
	    		</li>
	    	<?php endif; ?>
		<?php endforeach; ?>
		
        <li class="divider-vertical"></li>
        <li>
        	<a  href="<?php print $base_path; ?>/browse"><span style="margin-right: 10px;" class="glyphicon glyphicon-list" aria-hidden="true"></span>BROWSE</a>
        </li>
        <li class="advance-search-li advance-search-link" data-toggle="modal">
        	<span class="glyphicon glyphicon-search" aria-hidden="true"></span>SEARCH
        </li>
        
        <!--<li class='search-li'>
        	
            <span data-toggle="modal" class="glyphicon search-icon">
                &nbsp;
            </span> 
        </li>-->
        <!--<li class='search-li'>-->
            <!--<?php print drupal_render(drupal_get_form('search_block_form')); ?>-->
            <!--<input type="text" class="search-textbox" placeholder="Search collection" />-->
        <!--</li>-->
        
        <!--<li class="mobile-search visible-xs ">
    		<?php print drupal_render(drupal_get_form('search_block_form')); ?>
        </li>-->
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>
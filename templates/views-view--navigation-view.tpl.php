<div class="navbar" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://staging.interactivemechanics.com/7sisters/">Open Access Portal</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav nav-links">
        <li><a href="http://staging.interactivemechanics.com/7sisters/browse">Browse</a></li>
        <li><a href="http://staging.interactivemechanics.com/7sisters/about">About</a></li>
        <li><a href="http://staging.interactivemechanics.com/7sisters/links-and-resources">Links & Resources</a></li>
        <li><a href="http://staging.interactivemechanics.com/7sisters/news">News & Events</a></li>
        <li class="divider-vertical"></li>
        <li class='search-li'>
        	
            <span data-toggle="modal" data-target="#myModal" class="glyphicon search-icon">
                &nbsp;
            </span> 
        </li>
        <li class='search-li'>
            <?php print drupal_render(drupal_get_form('search_block_form')); ?>
            <!--<input type="text" class="search-textbox" placeholder="Search collection" />-->
        </li>
        
        <li class="mobile-search visible-xs ">
    		<?php print drupal_render(drupal_get_form('search_block_form')); ?>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>
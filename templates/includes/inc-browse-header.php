<?php
	global $base_url;
	$vocabulary = taxonomy_vocabulary_machine_name_load('Themes');
	$terms = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid));
	
	$theme_id = $_GET['theme_id'];
	$theme = '';
    $theme_name = '';

	if($theme_id && $theme_id != 'All') {
		$theme = taxonomy_term_load($theme_id);
        $theme_name = $theme->name;
	} else {
        $theme_name = 'All themes';
    }
?>
            <div class="browse-top-details">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
								<?php
									$contentType = 'browse_item';
									$current_view = views_get_current_view();
								?>
								
                                <div class="pull-left">
                                    <h1 class="lead">Browsing <strong><?php echo $view->total_rows; ?></strong> items</h1>
                                </div>

                                <div class="pull-right">

                                    <div class="browse-filters">
                                        <ul class="filter-options">
                                        	<li class="filter hidden-xs" data-contentwrapper=".theme-popover" rel="popover">

                                                    <h3>
                                                        Themes <span class="glyphicon glyphicon-triangle-bottom"></span>
                                                    </h3>

                                            </li>
                                            <li class="filter advance-search-link" data-toggle="modal" style="border: none; padding-left: 10px; padding-right:10px;">

                                                    <h3>
                                                        Search <span class="glyphicon glyphicon-triangle-bottom"></span>
                                                    </h3>
                                            </li>
                                            <li class="divider-vertical"></li>

                                            <li class="filter-icon <?php if($current_view->name == 'browse'){ echo "faded-icon"; } ?>" data-urlPath="browse-photos">
                                            	<a href="javascript:void(0);"  onclick="BrowsePhotosClicked();">
	                                                <span class="gallery-icon glyphicon glyphicon-th-large"></span>
                                            	</a>
                                            </li>
                                            <li class="filter-icon <?php if($current_view->name == 'browse_photos'){ echo "faded-icon"; } ?>">
                                            	<a href="javascript:void(0);" onclick="BrowseClicked();">
                                               		<span class="row-icon active-icon glyphicon glyphicon-align-justify"></span>
                                               	</a>
                                            </li>
                                        </ul>
                                    </div>
                            
                                </div>

                                <br style="clear:both;" />
                            </div> <!-- ./heading close -->
                        </div>
                    </div>
                </div> <!-- end of browse heading section -->
            </div>
            
            <div class="search-crumbs">
            	<div class="container">
            		<div class="row">
            			<div class="col-md-12">
            				<ul class="list-inline pull-left">
            					<li class="keywords">
	            					Theme: 
	            					<span>
	            						<?php echo $theme_name; ?>
	            					</span>
            					</li>
            					<li class="subjects hidden">
	            					Subjects:
	            					<span>
	            					
	            					</span>
            					</li>
            					<li class="format hidden">
	            					Format:
	            					<span>
	            						
	            					</span>
            					</li>
            				</ul>
                            <a href="<?php print $base_url; ?>/browse" class="reset pull-right">Reset</a>
            			</div>
            		</div>
            	</div>
            </div>
            
            <div class="theme-popover hidden">
	    		<div class="container">
	    			<div class="row">
	    				<div class="col-md-12">
	    					<ul class="list-inline">
	    						<li>
		    						<a onclick="ThemeClicked('All');" href="javascript: void(0);" data-theme-id="All">All themes</a>
	    						</li>
	    						
	    						<?php foreach($terms as $term): ?>
	    							<li>
			    						<a onclick="ThemeClicked(<?php print $term->tid; ?>);" href="javascript: void(0);" data-theme-id="<?php print $term->tid; ?>"><?php print $term->name ?></a>
		    						</li>
	    						<?php endforeach; ?>
	    					</ul>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
          
			<script type="text/javascript" src="<?php print $base_url; ?>/themes/sisters/resources/js/browse.js"></script>
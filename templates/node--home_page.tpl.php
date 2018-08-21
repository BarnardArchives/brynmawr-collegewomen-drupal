<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
 global $base_path;


	$node_wrapper = entity_metadata_wrapper('node', $node);
	$slideshowdata = entity_load('node', array($node->nid) );
	$node_data = $slideshowdata[ $node->nid ];
	 
	$wrapper = entity_metadata_wrapper('node', $node_data);
	$slideshow = field_get_items('node', $node_data, 'field_themes_slideshow');
	$slideitems = array();
	if( $slideshow ) {
		foreach( $slideshow as $index => $collection ) {
			$temp = array();
			$term = $wrapper->field_themes_slideshow[$index]->field_themes->value();
			$image = $wrapper->field_themes_slideshow[$index]->field_image->value();
			
			$temp['term'] = $term[0]->name;
			$temp['tid'] = $term[0]->tid;
			$temp['image'] = file_create_url($image['uri']);
			
			array_push($slideitems, $temp);
		}
	}
?>
<article class="node-<?php print $node->nid; ?>"<?php print $attributes; ?>>
    <?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        //print render($content);
    ?>
  
    <div class="hero-image">

        <?php if(drupal_is_front_page()): ?>
        	<?php
                $nav = 'navigation_view';
                print views_embed_view($nav);
            ?>
		<?php endif ?>

        <div class="container">
            <div class="homepage-slider">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1><?php print $node->field_welcome_message['und'][0]['value'];?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 col-centered">
                		<div class="search">
                			<input type="text" onkeypress="HomepageSearch(event);" class="form-control homepage-search" placeholder="Search the collection..." />
                		</div>
                		<div class="advance-search-link" style="float: right; margin-top: 4px; margin-right: 10px; cursor: pointer;" data-toggle="modal">
                			<p style="font-family: Montserrat; color: white; opacity: .7; font-weight: 100; font-size: 14px;">
                				<span class="glyphicon glyphicon-search" style="margin-right:10px;"></span>Advanced Search
                			</p>
                		</div>
                	</div>
                </div>

                <div class="row hidden-xs">
                    <div class="col-md-6 col-centered">        
                        <div class="flex-nav-container">
                            <div class="flexslider">
                                <ul class="slides">
                                	<?php if($slideitems): ?>
                                	
	                                	<?php foreach($slideitems as $item): ?>
	                                		<li>
		                                        <a href="<?php echo $base_path ?>browse?searchterm=&start_year=&end_year=&theme_id=<?php echo $item['tid'];?>">
		                                        	<img src="<?php print $item['image'];?>" alt="<?php print $item['term'];?>" 
		        									/>
		                                        </a>
		                                        <div class="flex-caption">
		                                            <p>THEMES</p>
		                                            <h2 class="lead"><?php print $item['term'];?></h2>
		                                        </div>
		                                    </li>
	                                	<?php endforeach; ?>
	                                    
                                    <?php endif; ?>
                                </ul>
                                <a href="<?php echo $base_path ?>browse" class="view-all-themes">View all items &raquo;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
    	<div class="homepage-about-info">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="heading-line">
    				    <span class="heading-text">ABOUT THE COLLECTION</span>
    				</div>
    			</div>
    		</div>
    
    		<div class="about-info">
    			<p class="center-content col-md-8 col-lg-6">
    				<?php print $node->field_about_the_collection['und'][0]['value'];?>
    				<a class="blue-link" href="<?php print $base_path; ?>about">Read more &rarr; </a>
    			</p>
    		</div>
    	</div> <!-- .homepage-about-info -->
    </div>
    <!-- Recent Articles View -->
            
    <?php
        $recentArticlesView = 'new_articles';
        print views_embed_view($recentArticlesView);
    ?>

</article>

<script type="text/javascript">
	$(document).ready(function(){
		$("#site-wrapper").removeClass('non-homepage');
	});
	
	function HomepageSearch(e) {
		if (e.keyCode == 13){
    	 	performHomepageSearch();
    	}
	}
    	
	function performHomepageSearch() {
		var path = '<?php echo $base_path; ?>';
		path += 'browse';
    	var term = $('.homepage-search').val();
    	
    	window.location.href = path + '?searchterm=' + term;
	}
</script>

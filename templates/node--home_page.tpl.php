<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
 global $base_path;
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
                		<div class="advance-search-link" style="float: right; margin-top: 12px; cursor: pointer;" data-toggle="modal">
                			<p style="font-family: Montserrat; color: white; opacity: .7; font-weight: 100; font-size: 14px;">
                				<span class="glyphicon glyphicon-search" style="margin-right:10px;"></span>Advanced Search
                			</p>
                		</div>
                	</div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-centered">        
                        <div class="flex-nav-container">
                            <div class="flexslider">
                                <ul class="slides">
                                    <?php $i = 0; foreach ($node->field_slide_links['und'] as $slide): ?>
                                    <li>
                                        <a href="<?php print $slide['value'];?>">
                                        	<img src="<?php print file_create_url($node->field_slide_image['und'][$i]['uri']); ?>" 
                                        		 alt="<?php print $node->field_slide_description_text['und'][$i]['value'];?>" 
        									/>
                                        </a>
                                        <div class="flex-caption">
                                            <p><?php print $node->field_slide_school_text['und'][$i]['value'];?></p>
                                            <h2 class="lead"><?php print $node->field_slide_description_text['und'][$i]['value'];?></h2>
                                        </div>
                                    </li>
                                    <?php $i++; endforeach; ?>
                                </ul>
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
    			<p class="center-content col-md-6">
    				<?php print $node->field_about_the_collection['und'][0]['value'];?>
    				<a class="blue-link" href="<?php print $base_path; ?>/about">Read more &rarr; </a>
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
	
		var path = window.location.origin + '/7sisters/browse';
    	var term = $('.homepage-search').val();
    	
    	window.location.href = path + '?searchterm=' + term;
	}
</script>

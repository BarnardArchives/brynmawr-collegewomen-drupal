<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
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
                <h1>
                	<?php print $node->field_welcome_message['und'][0]['value'];?>
                </h1>
            </div>
        
        </div>

        <div class="row">
            <div class="col-md-6 col-centered">

                <div style="">

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
                                    <p><?php print $node->field_slide_school_text['und'][$i]['value'];?><p>
                                    <h2 class="lead">
                                        <?php print $node->field_slide_description_text['und'][$i]['value'];?>
                                    </h2>
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

</div>


<div class="container">

	<div class="homepage-about-info">
		
		<div class="row">
			<div class="col-md-12">

				<div class="heading-line">
						<span class="heading-text">
						ABOUT THE COLLECTION
						</span>
				</div>
				
			</div>
		</div>

		<div class="about-info">
			<p class="center-content col-md-6">
				<?php print $node->field_about_the_collection['und'][0]['value'];?>
				<a class="blue-link" href="http://staging.interactivemechanics.com/7sisters/about">Read more &rarr; </a>
			</p>
		</div>

	</div> <!-- .homepage-about-info -->

</div>
            
            
            <!-- Embed View -->
            
            <?php
				  $exploreView = 'explore_collection_view';
				  print views_embed_view($exploreView);
			?>
			
			
			<!-- Recent Articles View -->
            
            <?php
				  $recentArticlesView = 'new_articles';
				  print views_embed_view($recentArticlesView);
			?>


  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</article>

<script type="text/javascript">
	$(document).ready(function(){
		$("#site-wrapper").removeClass('non-homepage');
	});
</script>

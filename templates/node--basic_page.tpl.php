<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
?>

<div class="blog-page">
  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    //print render($content);
  ?>
	
	<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="blog-top-details">
            
                    <div class="heading">
                        <h1 class="lead"><?php print $node->title; ?></h1>
                    </div> <!-- ./heading close -->
                    
                </div>
                <div class="content-area">
                	<p><?php print render($content['body']); ?></p>
                </div>
                
            </div>
        </div>
	</div>
	
    <?php print render($content['links']); ?>
    <?php print render($content['comments']); ?>

</div>

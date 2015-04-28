<?php
	global $base_url;
?>
<article class="node-<?php print $node->nid; ?>"<?php print $attributes; ?>>
    <?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        //print render($content);
    ?>
  
    <div class="blog-page">
    	<div class="container">
    		<div class="blog-article">
                <div class="blog-top-details">
    
                    <div class="heading">
                        <p class="posted-date">Posted on <?php print format_date($node->created, 'custom', 'F j Y');?></p>
                        <h1 class="lead"><?php print $node->title; ?></h1>
                    </div> <!-- ./heading close -->
                    
                </div>
                <div class="row">  
                    <div class="col-md-9">
                        <div class="blog-content">
                        	 <?php print render($content['body']); ?>
                        </div>
                    </div>
                </div>
    
    		</div> <!-- .blog-article close -->
    	</div> <!-- end of blog pagesection -->
    
    	<div class="gray-area">
    		<div class="browse-paging  text-center">
    
    			<ul class="pagination container">
    				<li class="pull-left"><?php print pn_node($node, 'p'); ?></li>
    				<li class="pull-right"><?php print pn_node($node, 'n'); ?></li>
    			</ul>
    
    		</div> <!-- ./browse-paging -->
    	</div> <!-- browse paging -->
    </div>

    <?php print render($content['links']); ?>
    <?php print render($content['comments']); ?>

</article>

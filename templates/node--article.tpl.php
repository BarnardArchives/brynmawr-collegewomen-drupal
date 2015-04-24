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

                <div class="blog-article-top-details">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 center-content">
                                <div class="heading">
                                    <a href="<?php echo $base_url; ?>/news">&larr; Return to articles</a>
                                </div> <!-- ./heading close -->

                                <hr />
                            </div>
                        </div>
                    </div> <!-- end of browse heading section -->
                </div>

    			<div class="blog-article">

                    <div class="container">

                        <div class="row">  
                            <div class="col-md-8 center-content">
                                
                                <p class="posted-date">
                                    Posted on <?php print format_date($node->created, 'custom', 'F j Y');?>
                                </p>

								<h2><?php print $node->title;?></h2>

                                <div class="blog-content">
                                	 <?php print render($content['body']); ?>
                                </div>
                            </div>
                        </div>

                    </div>

    			</div> <!-- .blog-article close -->

    		</div> <!-- end of blog pagesection -->

    		<div class="gray-area">

    			<div class="browse-paging  text-center">

    				<ul class="pagination container">
  						<li class="faded pull-left"><a href="#">&laquo; Previous Article</a></li>
  						<li class="pull-right"><a href="#">Next article &raquo;</a></li>
					</ul>

    			</div> <!-- ./browse-paging -->

    		</div> <!-- browse paging -->

    	</div>

  <?php print render($content['links']); ?>
  <?php print render($content['comments']); ?>

</article>

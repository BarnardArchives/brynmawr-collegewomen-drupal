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
  ?>
	
	<div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9">

                <div class="blog-top-details">
                    <div class="heading">
                        <h1 class="lead"><?php print $node->title; ?></h1>
                    </div> <!-- ./heading close -->
                </div>
                <div class="content-area">
                	<p><?php print render($content['body']); ?></p>
                </div>
                
            </div>
            <div class="col-md-3 hidden-sm hidden-xs">
                <aside id="sidebar"></aside>

                <script>
                    $(function(){
                        if( $('.content-area h3') ){
                            $('.content-area h3').each(function() {
                                var title  = $(this).text();
                                var itemID = title.replace(/[|&;$%@"'?<>()+,]/g, '');
                                    itemID = itemID.replace(/([^a-z0-9]+)/gi, '-');
                                $(this).attr('id', itemID);

                                var html = '<a href="#' + itemID + '">' + title + '</a>';
                                
                                $('#sidebar').append(html);
                            });
                        }

                        $('a[href*=#]:not([href=#])').click(function() {
                            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                              var target = $(this.hash);
                              target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                              if (target.length) {
                                $('html,body').animate({
                                  scrollTop: target.offset().top
                                }, 1000);
                                return false;
                              }
                            }
                        });
                    });
                </script>
            </div>
        </div>
	</div>
	
    <?php print render($content['links']); ?>
    <?php print render($content['comments']); ?>

</div>

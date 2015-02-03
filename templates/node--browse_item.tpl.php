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
  
  <div class="browse-item-page">
        
        
            <div class="container">
           
                <div class="browse-content">

                    <div class="row">

                        <div class="col-md-5">

                            <div class="browse-photo">
                                <img src="<?php print $node->field_browse_image['und'][0]['value']; ?>" alt="<?php print $node->title;?>" class="img-responsive" />
                            </div>
                            
                            <div class="share-item">
                            	<p>Share this item</p>
                            	<ul class="list-inline">
                                	<li><a 
                                        href="mailto:?subject=<?php print $node->title; ?> on <?php print variable_get('site_name'); ?>&body=Check out <?php print $node->title; ?> on <?php print variable_get('site_name'); ?>.%0D%0A%0D%0A<?php print $GLOBALS['base_url'] . '/node/' . $node->nid; ?>"
                                        target="_blank"
                                        class="social-icon mail">Email</a></li>
                                    <li><a 
                                        href="http://www.facebook.com/sharer/sharer.php?u=<?php print $GLOBALS['base_url'] . '/node/' . $node->nid; ?>"
                                        onclick="return !window.open(this.href, 'Facebook', 'width=500,height=500')"
                                        class="social-icon facebook">Facebook</a></li>
                                    <li><a 
                                        href="https://twitter.com/intent/tweet?text=<?php print $node->title; ?> on <?php print variable_get('site_name'); ?>, <?php print $GLOBALS['base_url'] . '/node/' . $node->nid; ?>"
                                        onclick="return !window.open(this.href, 'Twitter', 'width=500,height=500')"
                                        class="social-icon twitter">Twitter</a></li>
								</ul>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <div class="content-information">

                                <ul class="list-unstyled">
                                    <li>
                                        <div class="content-detail">
                                            <span class="heading">Title</span>
                                            <p><?php print $node->title;?></p>
                                        </div>
                                    </li>

                                    <li>
                                    	<?php if($node->field_institution['und'][0]['value']): ?>
                                        	<div class="content-detail">
                                            	<span class="heading">Institution</span>
												<p><?php print $node->field_institution['und'][0]['value'];?></p>
											</div>
										<?php endif ?>
                                    </li>

                                    <li>
                                    	<?php if($node->field_description['und'][0]['value']): ?>
                                        	<div class="content-detail">
                                            	<span class="heading">Description</span>
												<p><?php print $node->field_description['und'][0]['value'];?></p>
											</div>
										<?php endif ?>     
									</li>

                                    <li>
                                    	<?php if($node->field_subject['und'][0]['value']): ?>
                                        	<div class="content-detail">
                                            	<span class="heading">Subject</span>
                        	
                    	<?php
                    		$subjects = $node->field_subject['und'][0]['value'];
                    		$subjects_str = "";
							$items = explode(' | ', $subjects);
							foreach($items as $item) {
								if($item) {
									$subjects_str .= '<p><a href="http://staging.interactivemechanics.com/7sisters/browse?subject=' . $item . '">'. $item .'</a></p>';
								}
							}
                    	?>
												<p><a href="#"><?php print $subjects_str;?></a></p>
											</div>
										<?php endif ?>
                                    </li>

                                    <li>
                                    	<?php if($node->field_creator['und'][0]['value']): ?>
                                        	<div class="content-detail">
                                            	<span class="heading">Creator</span>
												<p><?php print $node->field_creator['und'][0]['value'];?></p>
											</div>
										<?php endif ?>
                                    </li>

                                    <li>
                                    	<?php if($node->field_contributor['und'][0]['value']): ?>
                                        	<div class="content-detail">
                                            	<span class="heading">Contributor</span>
												<p><a href="#"><?php print $node->field_contributor['und'][0]['value'];?></a></p>
											</div>
										<?php endif ?>
                                    </li>

                                    <li>
                                        <?php if($node->field_date['und'][0]['value']): ?>
                                        	<div class="content-detail">
                                            	<span class="heading">Date</span>
												<p><a href="http://staging.interactivemechanics.com/7sisters/browse?start_year=<?php print $node->field_article_year['und'][0]['value'];?>&end_year=<?php print $node->field_article_end_year['und'][0]['value'];?>"><?php print $node->field_date['und'][0]['value'];?></a></p>
											</div>
										<?php endif ?>
                                    </li>

                                    <li>
                                        <?php if($node->field_location['und'][0]['value']): ?>
                                        	<div class="content-detail">
                                            	<span class="heading">Location</span>
												<p><?php print $node->field_location['und'][0]['value'];?></p>
											</div>
										<?php endif ?>
                                    </li>

                                    <li class="detail-divider"></li>

                                    <li>
                                        <?php if($node->field_format['und'][0]['value']): ?>
                                        	<div class="content-detail">
                                            	<span class="heading">Format</span>
												<p><?php print $node->field_format['und'][0]['value'];?></p>
											</div>
										<?php endif ?>
                                    </li>

                                    <li>
                                       <?php if($node->field_physicaldescription['und'][0]['value']): ?>
                                        	<div class="content-detail">
                                            	<span class="heading">Physical Description</span>
												<p><?php print $node->field_physicaldescription['und'][0]['value'];?></p>
											</div>
										<?php endif ?>
                                    </li>

                                    <li>
                                        <?php if($node->field_type['und'][0]['value']): ?>
                                        	<div class="content-detail">
                                            	<span class="heading">Type</span>
												<p><?php print $node->field_type['und'][0]['value'];?></p>
											</div>
										<?php endif ?>
                                    </li>

                                    <li class="detail-divider"></li>

                                    <li>
                                        <?php if($node->field_copyright['und'][0]['value']): ?>
                                        	<div class="content-detail">
                                            	<span class="heading">Copyright and Use</span>
												<p><?php print $node->field_copyright['und'][0]['value'];?></p>
											</div>
										<?php endif ?>
                                    </li>

                                    <li>
                                    	<?php if($node->field_set_title['und'][0]['value']): ?>
                                            <?php 
                                                $value = $node->field_set_title['und'][0]['value'];
                                                list($type, $url, $id) = explode(":", $value);
                                                list($collection, $record) = explode("/", $id);
                                            ?>
                                            
                                        	<div class="content-detail">
                                            	<span class="heading">Original Url</span>
												<p><a href="http://<?php print $url; ?>/cdm/ref/collection/<?php print $collection; ?>/id/<?php print $record; ?>" target="_blank">
                                                    http://<?php print $url; ?>/cdm/ref/collection/<?php print $collection; ?>/id/<?php print $record; ?>
                                                </a></p>
											</div>
										<?php endif ?>
                                    </li>

                                    <li>
                                        <div class="content-detail cite-detail">
                                            <span class="heading">Cite this Item</span>
                                            <p><?php 
                                                    if($node->field_creator['und'][0]['value']){
                                                        print $node->field_creator['und'][0]['value'] . '. ';
                                                    }
                                                    print '"' . $node->title . '".';
                                                    if($node->field_date['und'][0]['value']){
                                                        print $node->field_date['und'][0]['value'] . ' ';
                                                    }
                                                    if($node->field_institution['und'][0]['value']){
                                                        print $node->field_institution['und'][0]['value'];
                                                    }
                                                    if($node->field_location['und'][0]['value'] && $node->field_institution['und'][0]['value']){
                                                        print  ', ';
                                                    }
                                                    if($node->field_location['und'][0]['value']){
                                                        print $node->field_location['und'][0]['value'] . '. ';
                                                    }
                                                    if($node->field_set_title['und'][0]['value']): ?>
                                                        <?php 
                                                            $value = $node->field_set_title['und'][0]['value'];
                                                            list($type, $url, $id) = explode(":", $value);
                                                            list($collection, $record) = explode("/", $id);
                                                        ?>
                                                            http://<?php print $url; ?>/cdm/ref/collection/<?php print $collection; ?>/id/<?php print $record; ?>
                                                    <?php endif ?>
                                            </p>
                                        </div>
                                    </li>

                                    <li>
                                        <div>
                                            <p>
                                                <?php if($node->field_institution['und'][0]['value'] === 'Bryn Mawr College'):
                                                    $contact_url = 'rappel@brynmawr.edu ';
                                                endif; ?>
                                                <a style="text-decoration:none; color:#00aeef;" href="mailto:<?php print $contact_url; ?>">Contact this Institution &rarr;</a>
                                            </p>
                                        </div>
                                    </li>
                                    
                                </ul>

                            </div>
                        </div>
                    </div>



                </div>

            </div>
            
            
            <?php include('related-browse-item-view.php'); ?>
            
  
  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</article>

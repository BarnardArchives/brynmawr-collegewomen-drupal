<?php
	global $base_path;
?>

<div class="gray-area blog-area">
    		<div class="container">

	    		<div class="homepage-blog-info">
	    			
	    			<div class="homepage-blog-articles">
	    				
                        <div class="row">
                            <?php $count = 0; ?>
                        	<?php foreach ($view->result as $delta => $item): ?>
                        	
                                <?php $count++; ?>
                        		<div class="col-sm-6 col-md-4 <?php if(count($view->result) == $count){ echo 'hidden-sm'; } ?>">

    	    						<div class="blog-article">
                                    	<p class="posted-date">
                                    	    Posted on 
                                    	    <?php print format_date($view->result[$delta]->_field_data['nid']['entity']->created, 'custom', 'F j Y');?> 
                                            <?php if ($view->result[$delta]->_field_data['nid']['entity']->field_byline['und'][0]['value']): ?> by 
                                            <?php print $view->result[$delta]->_field_data['nid']['entity']->field_byline['und'][0]['value']; ?><?php endif; ?>
										</p>
										
										<h3>
											<a href="<?php print   url(drupal_get_path_alias('node/'.$view->result[$delta]->_field_data['nid']['entity']->nid), array('options' => array('absolute' => TRUE))); ?>">
												<?php print $view->result[$delta]->_field_data['nid']['entity']->title; ?>
											</a>
										</h3>

										<hr class="blog-hr" />
										<br style="clear:left;" />
										<p>
											<?php print $view->result[$delta]->_field_data['nid']['entity']->body['und'][0]['summary']; ?>
    	    							</p>
    	    					</div>

    	    				</div>
                        	
                        	<?php endforeach; ?>
    	    				
                        </div>

	    			</div>

                    <br />

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="<?php echo $base_path; ?>blog" class="btn btn-blog">Read more articles</a>                          
                        </div>
                    </div>

	    		</div> <!-- .homepage-blog-info -->

	    	</div>
    	</div>
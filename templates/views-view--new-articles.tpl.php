<?php
	global $base_url;
?>

<div class="gray-area blog-area">
    		<div class="container">

	    		<div class="homepage-blog-info">
	    			
	    			<div class="homepage-blog-articles">
	    				
                        <div class="row">
                        	<?php foreach ($view->result as $delta => $item): ?>
                        	
                        		<div class="col-md-4">

    	    						<div class="blog-article">
                                    	<p class="posted-date">
                                    	    Posted on 
                                    	    <?php print format_date($view->result[$delta]->_field_data['nid']['entity']->created, 'custom', 'F j Y');?>
										</p>
										
										<h3>
											<a href="<?php print   url(drupal_get_path_alias('node/'.$view->result[$delta]->_field_data['nid']['entity']->nid), array('options' => array('absolute' => TRUE))); ?>">
												<?php print $view->result[$delta]->_field_data['nid']['entity']->title; ?>
											</a>
										</h3>

										<hr class="blog-hr" />
										<br style="clear:left;" />
										<p>
											<?php 
												print trim(substr($view->result[$delta]->_field_data['nid']['entity']->body['und'][0]['value'], 0, 135)) . "..."; 
											?>
    	    							</p>
    	    					</div>

    	    				</div>
                        	
                        	<?php endforeach; ?>
    	    				
                        </div>

	    			</div>

                    <br />

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="<?php echo $base_url; ?>/news" class="btn btn-blog">Read more articles</a>                          
                        </div>
                    </div>

	    		</div> <!-- .homepage-blog-info -->

	    	</div>
    	</div>
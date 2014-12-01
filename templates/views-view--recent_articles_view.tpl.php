<div class="gray-area blog-area">
    		<div class="container">

	    		<div class="homepage-blog-info">
	    			
	    			<div class="homepage-blog-articles">
	    				
                        <div class="row">
                        	<?php foreach ($view->result as $delta => $item): ?>
                        	
                        		<div class="col-md-4">

    	    						<div class="blog-article">
                                    	<p class="posted-date">
                                    	    Posted on August 4th, 2014
										</p>


										<h3>
											<?php print $view->result[$delta]->_field_data['nid']['entity']->title['und'][0]['value']; ?>
										</h3>

										<hr class="blog-hr" />
										<br style="clear:left;" />
										<p>
    	    								<?php print $view->result[$delta]->_field_data['nid']['entity']->body['und'][0]['value']; ?>
    	    							</p>
    	    					</div>

    	    				</div>
                        	
                        	<?php endforeach; ?>
    	    				
                        </div>

	    			</div>

                    <br />

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="javascript: void(0);" class="btn btn-blog">Read more articles</a>                          
                        </div>
                    </div>

	    		</div> <!-- .homepage-blog-info -->

	    	</div>
    	</div>

<div class="browse-page">

			<?php include('includes/inc-browse-header.php'); ?>
			
            <div class="container">
				
    			<div class="browse-items">
    				<div class="row">
    					
    					<?php foreach ($view->result as $delta => $item): ?>
    						<div class="browse-item col-xs-6 col-sm-4 col-md-3 col-lg-2">
    							<div class="item">
    								<a href="<?php print   url(drupal_get_path_alias('node/'.$view->result[$delta]->_field_data['nid']['entity']->nid), array('options' => array('absolute' => TRUE))); ?>">
                                        <img src="<?php print $view->result[$delta]->_field_data['nid']['entity']->field_browse_thumbnail['und'][0]['value']; ?>" alt="<?php print $view->result[$delta]->_field_data['nid']['entity']->title; ?>" class="img-responsive" />
    								</a>
    								
    								<p>
    									<a href="<?php print   url(drupal_get_path_alias('node/'.$view->result[$delta]->_field_data['nid']['entity']->nid), array('options' => array('absolute' => TRUE))); ?>">
    									<?php print $view->result[$delta]->_field_data['nid']['entity']->title; ?>
    								</a>
    								</p>
    							</div>
    						</div>
    					<?php endforeach; ?>
					</div>

    			</div> <!-- .browse-items close -->

    		</div> <!-- end of browse item section -->

    	</div>
    	
    	
    	
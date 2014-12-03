<div class="container">

	<div class="homepage-explore-info">
		
		<div class="row">
			<div class="col-md-12">

				<div class="heading-line">
						<span class="heading-text heading-text-explore">
						EXPLORE THE COLLECTION
						</span>
				</div>
				
			</div>
		</div>

		<div class="explore-items">
			<div class="row">
				<div class="col-md-12">

					<ul class="list-inline text-center">
						<?php $i = 0; foreach ($view->result as $delta => $item): if (++$i == 7) break; ?>
						<li>
							<a href="<?php print   url(drupal_get_path_alias('node/'.$view->result[$delta]->_field_data['nid']['entity']->nid), array('options' => array('absolute' => TRUE))); ?>">
								<?php if($view->result[$delta]->_field_data['nid']['entity']->field_set_title['und'][0]['value']): ?>
                                    <?php 
                                        $value = $view->result[$delta]->_field_data['nid']['entity']->field_set_title['und'][0]['value'];
                                        list($type, $url, $id) = explode(":", $value);
                                        list($collection, $record) = explode("/", $id);
                                    ?>
                                    
                                	<img src="http://<?php print $url; ?>/utils/getthumbnail/collection/<?php print $collection; ?>/id/<?php print $record; ?>/filename/thumb.jpg" alt="<?php print $view->result[$delta]->_field_data['nid']['entity']->title; ?>" class="img-responsive" />
                                <?php endif ?>
							</a>
						</li>
						
						<?php endforeach; ?>
					</ul>

				</div>
			</div>
		</div>

	</div> <!-- .homepage-explore-info -->

</div>
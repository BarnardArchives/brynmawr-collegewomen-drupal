<div class="container">

	<div class="homepage-explore-info">
		
		<div class="row">
			<div class="col-md-12">

				<div class="heading-line">
						<span class="heading-text heading-text-explore">
						EXPORE THE COLLECTION
						</span>
				</div>
				
			</div>
		</div>

		<div class="explore-items">
			<div class="row">
				<div class="col-md-12">

					<ul class="list-inline text-center">
						<?php foreach ($view->result as $delta => $item): ?>
						<li>
							<a href="<?php print   url(drupal_get_path_alias('node/'.$view->result[$delta]->_field_data['nid']['entity']->nid), array('options' => array('absolute' => TRUE))); ?>">
								<img class="img-responsive" src="<?php print $view->result[$delta]->_field_data['nid']['entity']->field_browse_thumbnail['und'][0]['value']; ?>" alt="<?php print $view->result[$delta]->_field_data['nid']['entity']->title; ?>" title="<?php print $view->result[$delta]->_field_data['nid']['entity']->title; ?>" />
							</a>
						</li>
						
						<?php endforeach; ?>
					</ul>

				</div>
			</div>
		</div>

	</div> <!-- .homepage-explore-info -->

</div>
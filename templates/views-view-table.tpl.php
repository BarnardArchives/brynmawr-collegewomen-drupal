<div class="browse-page">

    		<div class="container">

    			<div class="browse-items">

    				<table class="table">

    					<thead>
    						<tr>
    							<td></td>
    							<td>Title</td>
    							<td>Date</td>
    							<td>Subject</td>
                                <td>Creator</td>
    						</tr>
    					</thead>

    					<tbody>
    						<?php foreach ($view->result as $delta => $item): ?>
    						<tr>
    							<td style="text-align:center">
    								<a href="<?php print   url(drupal_get_path_alias('node/'.$view->result[$delta]->_field_data['nid']['entity']->nid), array('options' => array('absolute' => TRUE))); ?>">
    									<img height="88px" src="<?php print $view->result[$delta]->_field_data['nid']['entity']->field_browse_thumbnail['und'][0]['value']; ?>" alt="<?php print $view->result[$delta]->_field_data['nid']['entity']->title; ?>" title="<?php print $view->result[$delta]->_field_data['nid']['entity']->title; ?>" />

    								</a>
    							</td>
    							<td class="browse-title">
    								<a href="<?php print   url(drupal_get_path_alias('node/'.$view->result[$delta]->_field_data['nid']['entity']->nid), array('options' => array('absolute' => TRUE))); ?>">
    									<?php print $view->result[$delta]->_field_data['nid']['entity']->title; ?>
    								</a>
    							</td>
    							<td class="browse-date">
    								<?php print $view->result[$delta]->_field_data['nid']['entity']->field_date['und'][0]['value']; ?>
    							</td>
    							<td class="browse-subject">
    								<?php print $view->result[$delta]->_field_data['nid']['entity']->field_subject['und'][0]['value']; ?>
    							</td>
                                <td class="browse-creator">
                                    <?php print $view->result[$delta]->_field_data['nid']['entity']->field_creator['und'][0]['value']; ?>
                                </td>
    						</tr>
							<?php endforeach; ?>
    					</tbody>
    				</table>

    			</div> <!-- .browse-items close -->

    		</div> <!-- end of browse item section -->

    	</div>
    	
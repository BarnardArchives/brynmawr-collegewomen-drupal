<div class="browse-page">

            <div class="browse-top-details">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
								<?php
									$contentType = 'browse_item';
								?>
                                <div class="pull-left">
                                    <h1 class="lead">Browsing <strong><?php echo sisters_get_node_count($contentType); ?></strong> items</h1>
                                </div>

                                <div class="pull-right">

                                    <div class="browse-filters">
                                        <ul class="filter-options">
                                            <li class="filter">

                                                    <p>
                                                        Institution
                                                    </p>
                                                    <h4>
                                                        All Institution <span class="institution-caret glyphicon glyphicon-chevron-down"></span>
                                                    </h4>

                                            </li>
                                            <li class="filter">
                                                    <p>
                                                        Subjects
                                                    </p>
                                                    <h4>
                                                        All Subjects <span class="subjects-caret glyphicon glyphicon-chevron-down"></span>
                                                    </h4>
                                            </li>
                                            <li class="divider-vertical"></li>

                                            <li class="filter-icon">
                                                <span class="gallery-icon glyphicon glyphicon-th-large"></span>
                                            </li>
                                            <li class="filter-icon">
                                                <span class="row-icon glyphicon glyphicon-align-justify"></span>
                                            </li>
                                        </ul>
                                    </div>
                            
                                </div>

                                <br style="clear:both;" />
                            </div> <!-- ./heading close -->
                        </div>
                    </div>
                </div> <!-- end of browse heading section -->
            </div>

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

                                        <?php if($view->result[$delta]->_field_data['nid']['entity']->field_set_title['und'][0]['value']): ?>
                                            <?php 
                                                $value = $view->result[$delta]->_field_data['nid']['entity']->field_set_title['und'][0]['value'];
                                                list($type, $url, $id) = explode(":", $value);
                                                list($collection, $record) = explode("/", $id);
                                            ?>
                                            
                                        	<img src="http://<?php print $url; ?>/utils/getthumbnail/collection/<?php print $collection; ?>/id/<?php print $record; ?>/filename/thumb.jpg" alt="<?php print $view->result[$delta]->_field_data['nid']['entity']->title; ?>" class="img-responsive" />
                                        <?php endif ?>

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
    	
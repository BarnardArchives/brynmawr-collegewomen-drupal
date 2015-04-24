<?php
	global $base_url;
	
?>

<div class="browse-page">


            <?php include('includes/inc-browse-header.php'); ?>
            

    		<div class="container">

    			<div class="browse-items">

    				<table class="table">

    					<thead>
    						<tr>
    							<td style="width:120px;"></td>
    							<td>
    								<a href="javascrip: void(0);" data-sorttype="title" class="sort-by">
    									Title <span style="font-size: 12px;" class="title-sort glyphicon glyphicon-resize-vertical"></span>
    								</a>
    								</td>
    							<td style="width:70px;">
	    							<a href="javascrip: void(0);" data-sorttype="field_date_value" class="sort-by">
    									Date <span style="font-size: 12px;" class="date-sort glyphicon glyphicon-resize-vertical"></span>
    								</a>
    							</td>
    							<td style="width:340px;">
	    							Subjects
    							</td>
                                <td style="width:120px;">
	                                <a href="javascrip: void(0);" data-sorttype="field_institution_value" class="sort-by">
    									Institution <span style="font-size: 12px;" class="school-sort glyphicon glyphicon-resize-vertical"></span>
    								</a>
                                </td>
    						</tr>
    					</thead>

    					<tbody>
    						<?php foreach ($view->result as $delta => $item): ?>
    						<tr>
    							<td class="browse-image">
    								<a href="<?php print   url(drupal_get_path_alias('node/'.$view->result[$delta]->_field_data['nid_1']['entity']->nid), array('options' => array('absolute' => TRUE))); ?>">
                                            
                                        <img src="<?php print $view->result[$delta]->_field_data['nid_1']['entity']->field_browse_thumbnail['und'][0]['value']; ?>" alt="<?php print $view->result[$delta]->_field_data['nid_1']['entity']->title; ?>" class="img-responsive" />
    								</a>
    							</td>
    							<td class="browse-title">
    								<a href="<?php print   url(drupal_get_path_alias('node/'.$view->result[$delta]->_field_data['nid_1']['entity']->nid), array('options' => array('absolute' => TRUE))); ?>">
    									<?php print $view->result[$delta]->_field_data['nid_1']['entity']->title; ?>
    								</a>
    							</td>
    							<td class="browse-date">
    								<a href="<?php $base_url; ?>/browse?start_year=<?php print $view->result[$delta]->_field_data['nid_1']['entity']->field_article_year['und'][0]['value'];?>&end_year=<?php print $view->result[$delta]->_field_data['nid_1']['entity']->field_article_end_year['und'][0]['value'];?>">
    									<?php print $view->result[$delta]->_field_data['nid_1']['entity']->field_date['und'][0]['value']; ?>
    								</a>
    							</td>
    							<td class="browse-subject">
                                    <?php
                                		$subjects = $view->result[$delta]->_field_data['nid_1']['entity']->field_subject['und'];
                                		$subjects_str = "";
            							$numItems = count($subjects);
                                        $i = 0;
            							foreach($subjects as $item) {
            								if($item) {
            									$subjects_str .= '<a href="' . $base_url . '/browse?subject=' . htmlentities(trim($item['value'])) . '">'. $item['value'] .'</a>';

                                                if(++$i !== $numItems) {
                                                    $subjects_str .= ', ';
                                                }
            								}
            							}
            							
            							print $subjects_str;
                                	?>
    							</td>
                                <td class="browse-creator">
                                    <?php print $view->result[$delta]->_field_data['nid_1']['entity']->field_institution['und'][0]['value']; ?>
                                </td>
    						</tr>
							<?php endforeach; ?>
    					</tbody>
    				</table>

    			</div> <!-- .browse-items close -->

    		</div> <!-- end of browse item section -->

    	</div>
    	
    	
    	
    	
    	<script>
    		
    	</script>
    	
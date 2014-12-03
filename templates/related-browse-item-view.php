<?php
$nodeID = arg(1); //node id
$node = menu_get_object('node');
$subject = trim($node->field_subject['und'][0]['value']);
$institution = trim($node->field_institution['und'][0]['value']);

$query = new EntityFieldQuery();

$query->entityCondition('entity_type', 'node')
	->entityCondition('bundle', 'browse_item')
	->propertyCondition('status', NODE_PUBLISHED)
	->fieldCondition('field_subject', 'value', $subject, '=')
	->fieldCondition('field_institution', 'value', $institution, '<>');
$result = $query->execute();

if (!empty($result)):
?>
<div class="gray-area">
            	<div class="container">

            		<div class="similar-items-detail">
            			
            			<div class="row">
            				<div class="col-md-12">

            					<div class="heading-line">
          							<span class="heading-text">
            							SIMILAR ITEMS
          							</span>
        						</div>
            					
            				</div>
            			</div>

            			<div class="similar-items">
            				<div class="row">
            					<div class="col-md-12">

            						<ul class="list-inline text-center">
						<?php 
							while (list($key, $value) = each($result['node'])):
								$node = node_load($key);
						?>
						<li>
							<a href="<?php print   url(drupal_get_path_alias('node/'.$node->nid, array('options' => array('absolute' => TRUE)) )); ?>">
								<?php if($node->field_set_title['und'][0]['value']): ?>
                                    <?php 
                                        $value = $node->field_set_title['und'][0]['value'];
                                        list($type, $url, $id) = explode(":", $value);
                                        list($collection, $record) = explode("/", $id);
                                    ?>
                                    
                                	<img src="http://<?php print $url; ?>/utils/getthumbnail/collection/<?php print $collection; ?>/id/<?php print $record; ?>/filename/thumb.jpg" alt="<?php print $node->title;?>" class="img-responsive" />
                                <?php endif ?>
							</a>
						</li>
						
						<?php endwhile; ?>
					</ul>
            					</div>
            				</div>
            			</div>

            		</div> <!-- .similar-items-detail -->

            	</div>
            </div>

        </div>
<?php endif;
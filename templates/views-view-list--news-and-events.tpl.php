<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>


<div class="blog-page">
	
	<div class="container">

        <div class="blog-top-details">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h1 class="lead">News &amp; updates</h1>
                    </div> <!-- ./heading close -->
                </div>
            </div>
        </div>

		<div class="blog-items">

            	<div class="row blog-row">
	            	<?php foreach ($view->result as $delta => $item): ?>
						
						<div class="col-md-4 blog-item">
							<div class="blog-article">
								<p class="posted-date">
									Posted on <?php print format_date($view->result[$delta]->_field_data['nid']['entity']->created, 'custom', 'F j Y');?>
								</p>

								<h3>
									<a href="<?php print   url(drupal_get_path_alias('node/'.$view->result[$delta]->_field_data['nid']['entity']->nid), array('options' => array('absolute' => TRUE))); ?>">
										<?php print $view->result[$delta]->_field_data['nid']['entity']->title; ?>
									</a>
								</h3>

								<p>
									<?php 
										print trim(substr($view->result[$delta]->_field_data['nid']['entity']->body['und'][0]['value'], 0, 135)) . "..."; 
									?>
								</p>
							</div>
						</div>

                    <?php endforeach; ?>
            </div>
	    </div> <!-- end of container section -->
    </div>
</div>
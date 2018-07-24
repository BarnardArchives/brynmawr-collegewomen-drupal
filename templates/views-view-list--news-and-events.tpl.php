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
                        <h1 class="lead">Blog & Updates</h1>
                    </div> <!-- ./heading close -->
                </div>
            </div>
        </div>

		<div class="blog-items">

            <?php foreach ($view->result as $delta => $item): ?>
            	<div class="row blog-row">
				    <div class="col-md-4 blog-image" style="max-height: 250px; overflow: hidden;">
                        <img src="<?php print file_create_url($view->result[$delta]->_field_data['nid']['entity']->field_image['und'][0]['uri']); ?>" style="max-width: 100%;" />
                    </div>
                    <div class="col-md-8 blog-item">
                        <div class="blog-article">
                            <p class="posted-date">
                                Posted on 
                                <?php print format_date($view->result[$delta]->_field_data['nid']['entity']->created, 'custom', 'F j Y');?>
                                <?php if ($view->result[$delta]->_field_data['nid']['entity']->field_byline['und'][0]['value']): ?> 
                                by 
                                    <?php print $view->result[$delta]->_field_data['nid']['entity']->field_byline['und'][0]['value']; ?>
                                <?php endif; ?>
				            </p>
                            <h3>
								<a href="<?php print url(drupal_get_path_alias('node/'.$view->result[$delta]->_field_data['nid']['entity']->nid), array('options' => array('absolute' => TRUE))); ?>"><?php print $view->result[$delta]->_field_data['nid']['entity']->title; ?></a>
								</h3>
								<p><?php print $view->result[$delta]->_field_data['nid']['entity']->body['und'][0]['summary']; ?></p>
                                <a href="<?php print url(drupal_get_path_alias('node/'.$view->result[$delta]->_field_data['nid']['entity']->nid), array('options' => array('absolute' => TRUE))); ?>">Read the full post</a>
							</div>
				    </div>
            	</div>
            <?php endforeach; ?>
	    </div> <!-- end of container section -->
    </div>
</div>
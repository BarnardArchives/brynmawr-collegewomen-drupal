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
                                                <span class="gallery-icon glyphicon active-icon glyphicon-th-large"></span>
                                            </li>
                                            <li class="filter-icon faded-icon">
                                                <a href="http://staging.interactivemechanics.com/7sisters/browse">
                                                	<span class="row-icon glyphicon glyphicon-align-justify"></span>
                                                </a>
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
    				<div class="row">
    					<div class="col-12-md">
    					
		    				<ul class="list-inline">
		    					<?php foreach ($view->result as $delta => $item): ?>
		    						<li class="browse-item">
		    							<div class="item">
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
		    								
		    								<p>
		    									<a href="<?php print   url(drupal_get_path_alias('node/'.$view->result[$delta]->_field_data['nid']['entity']->nid), array('options' => array('absolute' => TRUE))); ?>">
		    									<?php print $view->result[$delta]->_field_data['nid']['entity']->title; ?>
		    								</a>
		    								</p>
		    							</div>
		    						</li>
		    					<?php endforeach; ?>
		    				</ul>
    				
						</div>
					</div>

    			</div> <!-- .browse-items close -->

    		</div> <!-- end of browse item section -->

    	</div>
    	
    	
    	<script type="text/javascript">
    		$(document).ready(function(){
	    		var title = getParameterByName('title');
	    		var start_year = getParameterByName('start_year');
	    		var end_year = getParameterByName('end_year');
	    		var subjects = getParameterByName('subject');
	    		var colleges = getParameterByName('institution');
	    		
	    		if(title) {
		    		$('input#title-textbox').val(title);
	    		}
	    		
	    		if(start_year) {
		    		$('input#start_year').val(start_year);
	    		}
	    		
	    		if(end_year) {
		    		$('input#end_year').val(end_year);
	    		}
	    		
	    		if(colleges) {
	    			console.log(colleges);
	    			var arr = colleges.split(' ');
	    			
	    			for(var i = 0; i < arr.length; i++) {
	    				if(arr[i]) {
				    		$("input:checkbox[value=" + arr[i] + "]").attr("checked", true);
						}
					}
					
					for(var i = 0; i < arr.length; i++) {
	    				if(arr[i]) {
				    		$("form.institution input:checkbox[value=" + arr[i] + "]").attr("checked", true);
						}
					}	
	    		}
	    		
	    		if(subjects) {
		    		$('input#subject-textbox').val(subjects);
		    		$("input.input-subject-textbox").val(subjects);

	    		}
    		});
    		
    		function getParameterByName(name) {
			    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
			    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
			        results = regex.exec(location.search);
			    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
			}
    	</script>
    	
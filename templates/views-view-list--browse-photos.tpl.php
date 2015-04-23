
<div class="browse-page">

            <div class="browse-top-details">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
								<?php
									$contentType = 'browse_item';
									$current_view = views_get_current_view();
								?>
								
                                <div class="pull-left">
                                    <h1 class="lead">Browsing <strong><?php echo $view->total_rows; ?></strong> items</h1>
                                </div>

                                <div class="pull-right">

                                    <div class="browse-filters">
                                        <ul class="filter-options">
                                        	<li class="filter">

                                                    <p>
                                                        Search
                                                    </p>
                                                    <h4>
                                                    	Search Term <span class="searchterm-caret glyphicon glyphicon-chevron-down"></span>
                                                    </h4>

                                            </li>
                                            <li class="filter">

                                                    <p>
                                                        Institution
                                                    </p>
                                                    <h4>
                                                        <span class="school-count">All</span> Institution(s) <span class="institution-caret glyphicon glyphicon-chevron-down"></span>
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
                                                <a href="javascript: void(0);" onclick="BrowseClicked();">
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
    	
    	
    	<script type="text/javascript">
    		$(document).ready(function(){
	    		var title = getParameterByName('searchterm');
	    		var start_year = getParameterByName('start_year');
	    		var end_year = getParameterByName('end_year');
	    		var subjects = getParameterByName('subject');
	    		var colleges = getParameterByName('institution');
	    		var type = getParameterByName('type');
	    		
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
	    			$('form.institution input:checkbox').removeAttr('checked');
	    			console.log(colleges);
	    			var arr = colleges.split(' ');
	    			arr = arr.filter(function(str) {
						return /\S/.test(str);
					});
	    			
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
					
					if( arr.length > 0 && arr.length != 7) {
						$('.school-count').text(arr.length);
					} 
					else if( arr.length === 7) {
						$('.school-count').text("All");
					}
	    		}
	    		
	    		if(subjects) {
		    		$('input#subject-textbox').val(subjects);
		    		$("input.input-subject-textbox").val(subjects);
		    		$('form.subjects .input-subject-textbox').val(subjects);
	    		}
	    		
	    		if(type) {
	    			$('input#itemtype-textbox').val(type);
		    		$("input.itemtype-text").val(type);
	    		}
	    		
	    		setTimeout(function(){
					var subjects = getParameterByName('subject');
					if(subjects) {
						$('input#subject-textbox').val(subjects);
						$('form.subjects .input-subject-textbox').val(subjects);
					}
				}, 5000);
    		});
    		
    		function BrowseClicked() {
				window.location.href = window.location.origin + "/7sisters/browse" + window.location.search;
			}
    	</script>
    	
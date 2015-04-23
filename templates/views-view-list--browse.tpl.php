<?php
	global $base_url;
	
	$vocabulary = taxonomy_vocabulary_machine_name_load('Themes');
	$terms = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid));
	
?>

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
                                        	<li class="filter" data-contentwrapper=".theme-popover"  rel="popover">

                                                    <h3>
                                                        Themes <span class="glyphicon glyphicon-triangle-bottom"></span>
                                                    </h3>

                                            </li>
                                            <li class="filter advance-search-link" data-toggle="modal" style="border: none; padding-left: 10px; padding-right:10px;">

                                                    <h3>
                                                        Search <span class="glyphicon glyphicon-triangle-bottom"></span>
                                                    </h3>
                                            </li>
                                            <li class="divider-vertical"></li>

                                            <li class="filter-icon faded-icon" data-urlPath="browse-photos">
                                            	<a href="javascript: void(0);" onclick="BrowsePhotosClicked();">
	                                                <span class="gallery-icon glyphicon glyphicon-th-large"></span>
                                            	</a>
                                            </li>
                                            <li class="filter-icon">
                                                <span class="row-icon active-icon glyphicon glyphicon-align-justify"></span>
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
            
            <div class="search-crumbs">
            	<div class="container">
            		<div class="row">
            			<div class="col-md-12">
            				<ul class="list-inline">
            					<li class="keywords">
	            					Keywords: 
	            					<span>
	            						<a href=""></a>
	            					</span>
            					</li>
            					<li class="subjects">
	            					Subjects:
	            					<span>
	            						<a href=""></a>
	            					</span>
            					</li>
            					<li class="format">
	            					Format:
	            					<span>
	            						<a href=""></a>
	            					</span>
            					</li>
            				</ul>
            			</div>
            		</div>
            	</div>
            </div>

    		<div class="container">

    			<div class="browse-items">

    				<table class="table">

    					<thead>
    						<tr>
    							<td></td>
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
    							<td>
	    							Subjects
    							</td>
                                <td style="width:120px;">
                                	<p>
	                                <a href="javascrip: void(0);" data-sorttype="field_institution_value" class="sort-by">
    									Institution <span style="font-size: 12px;" class="school-sort glyphicon glyphicon-resize-vertical"></span>
    								</a>
                                	</p>
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
    								<a href="http://staging.interactivemechanics.com/7sisters/browse?start_year=<?php print $view->result[$delta]->_field_data['nid_1']['entity']->field_article_year['und'][0]['value'];?>&end_year=<?php print $view->result[$delta]->_field_data['nid_1']['entity']->field_article_end_year['und'][0]['value'];?>">
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
            									$subjects_str .= '<a href="http://staging.interactivemechanics.com/7sisters/browse?subject=' . htmlentities(trim($item['value'])) . '">'. $item['value'] .'</a>';

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
    	
    	<div class="theme-popover hidden">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-12">
    					<ul class="list-inline">
    						<li>
	    						All themes
    						</li>
    						
    						<?php foreach($terms as $term): ?>
    						
    							<li>
		    						<a href="<?php print $base_url;?>/browse?theme_id=<?php print $term->tid; ?>"><?php print $term->name ?></a>
	    						</li>
    						<?php endforeach; ?>
    					</ul>
    				</div>
    			</div>
    		</div>
    	</div>
    	
    	
    	<script type="text/javascript">
    		$(document).ready(function(){
    			$('[rel=popover]').popover({
    html:true,
    placement:'bottom',
     container: 'body',
     class: 'saaas',
    content:function(){
        return $($(this).data('contentwrapper')).html();
    }
});

	    		var title = getParameterByName('searchterm');
	    		var start_year = getParameterByName('start_year');
	    		var end_year = getParameterByName('end_year');
	    		var subjects = getParameterByName('subject');
	    		var colleges = getParameterByName('institution');
	    		var type = getParameterByName('type');
	    		
	    		var sorttype = getParameterByName('sort_by');
	    		var order_by = getParameterByName('sort_order') ? getParameterByName('sort_order') : "ASC";
	    		
	    		setCrumbs(title, subjects, type);
	    		
	    		if(sorttype == 'field_date_value') {
					if(order_by == 'ASC') {
						$('.date-sort').removeClass('glyphicon-resize-vertical');
						$('.date-sort').addClass('glyphicon-arrow-up');
					} else {
						$('.date-sort').removeClass('glyphicon-resize-vertical');
						$('.date-sort').addClass('glyphicon-arrow-down');	
					}
				}
				
				if(sorttype == 'title') {
					if(order_by == 'ASC') {
						$('.title-sort').removeClass('glyphicon-resize-vertical');
						$('.title-sort').addClass('glyphicon-arrow-up');
					} else {
						$('.title-sort').removeClass('glyphicon-resize-vertical');
						$('.title-sort').addClass('glyphicon-arrow-down');	
					}
				}
				
				if(sorttype == 'field_institution_value') {
					if(order_by == 'ASC') {
						$('.school-sort').removeClass('glyphicon-resize-vertical');
						$('.school-sort').addClass('glyphicon-arrow-up');
					} else {
						$('.school-sort').removeClass('glyphicon-resize-vertical');
						$('.school-sort').addClass('glyphicon-arrow-down');	
					}
				}
	    		
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
		    		$('form.subjects .input-subject-textbox');
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
    		
    		function setCrumbs(title, subjects, type) {
	    		var arr = title.split(" ");
	    		var keywordStr = "";
	    		for (var i = 0; i < arr.length; i++) {
					keywordStr += createLink(arr[i]);
				}
				
				console.log(keywordStr);
				
				$('li.keywords span').html(keywordStr);
				
				$('li.format span').html(createLink(type));
    		}
    		
    		function createLink(text) {
	    		return "<a href='javascript:void(0);'>" + text + "</a> "
    		}
    		
    		function BrowsePhotosClicked() {
				window.location.href = window.location.origin + "/7sisters/browse-photos" + window.location.search;
			}
			
			$('.sort-by').click(function(e){
				e.preventDefault();
				e.stopPropagation();
				
				var type = $(this).data('sorttype');
				var param_type = getParameterByName('sort_by');
				var order_by = getParameterByName('sort_order');
				
				if(type == 'field_date_value') {
					$('#edit-sort-by option[value="field_date_value"]').attr("selected", "selected");
				}
				
				if(type == 'title') {
					$('#edit-sort-by option[value="title"]').attr("selected", "selected");
				}
				
				if(type == 'field_institution_value') {
					$('#edit-sort-by option[value="field_institution_value"]').attr("selected", "selected");
				}
				
				/** ASC or DESC **/
				
				if(!order_by) {
					$('#edit-sort-order option[value="DESC"]').attr("selected", "selected");
				}
								
				if(order_by == "ASC") {
					$('#edit-sort-order option[value="DESC"]').attr("selected", "selected");
				} else {
					$('#edit-sort-order option[value="ASC"]').attr("selected", "selected");
				}	
				
				$('#views-exposed-form-browse-page').submit();
			});
    	</script>
    	
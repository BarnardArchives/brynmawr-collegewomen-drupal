<?php
	global $base_path;
	$vocabulary = taxonomy_vocabulary_machine_name_load('Themes');
	$terms = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid));

	$theme_id = $_GET['theme_id'];
    $theme_name_array = [];

	if($theme_id) {
		foreach ($theme_id as $t){
			$theme = taxonomy_term_load($t);
			$theme_obj = array($theme->name, $t);
			array_push($theme_name_array, $theme_obj);
		}
	}

$institution = $_GET['institution'];

?>
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

								<?php if (!isset($_GET['searchterm'])){ ?>
									<h1 class="lead"><strong><?php echo 'Viewing all' . ' ' . $view->total_rows; ?></strong> items</h1>

								<?php } else { ?>
									<?php if ($view->total_rows == 0) { ?>
										<h1><strong>0 items found</h1></strong>
									<?php } else { ?>
										<h1 class="lead"><strong><?php echo $view->total_rows. ' items found'; ?></h1></strong>
									<?php } ?>
								<?php }?>
							</div>


                                <div class="pull-right">

                                    <div class="browse-filters">
                                        <ul class="filter-options">

                                            <li class="filter advance-search-link" data-toggle="modal">

                                                    <h3>
                                                      Advanced Search
                                                    </h3>
                                            </li>
                                            <li class="divider-vertical"></li>

                                            <li class="filter-icon <?php if($current_view->name == 'browse'){ echo "faded-icon"; } ?>" data-urlPath="browse-photos">
                                            	<a href="javascript:void(0);"  onclick="BrowsePhotosClicked();">
	                                                <span class="gallery-icon glyphicon glyphicon-th-large"></span>
                                            	</a>
                                            </li>
                                            <li class="filter-icon <?php if($current_view->name == 'browse_photos'){ echo "faded-icon"; } ?>">
                                            	<a href="javascript:void(0);" onclick="BrowseClicked();">
                                               		<span class="row-icon active-icon glyphicon glyphicon-align-justify"></span>
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

            <div class="search-crumbs">
            	<div class="container">
            		<div class="row">
            			<div class="col-md-12">
            				<ul class="list-inline pull-left">
            					<li class="theme">
	            					Theme:
	            					<span class="themes">

	            						<?php
										if (!$theme_name_array){
											echo 'All';
										} else {
											if (count($theme_name_array) >= 4){
												echo ' ' . '<i class="glyphicon glyphicon-remove-sign" onclick="removeThemeFilter();"></i>' . ' ' . count($theme_name_array) .' selected';
											} else {
												foreach ($theme_name_array as $n){
													echo ' ' . '<i class="glyphicon glyphicon-remove-sign" onclick="removeThemeFilter(' . $n[1]. ');"></i>' . ' ' . $n[0];
												}
											}
										}
										?>
	            					</span>
            					</li>
            					<li class="format hidden">
	            					Format:
	            					<span>

	            					</span>
            					</li>
								<li class="institution">
	            					Institution:
									<span>
										<?php
										$institutions = array_filter(explode(" ", $institution),'strlen'); // ['Byrn', 'Banard']

										if ($institutions[0] == 'All' || empty($institutions)){
											echo 'All';
										} else {
											if (count($institutions) >= 4){
												echo ' ' . '<i class="glyphicon glyphicon-remove-sign" onclick="removeInstitutionFilter();"></i>' . ' ' . count($institutions) .' selected';
											} else {
												foreach ($institutions as $institution){
													echo ' ' . '<i class="glyphicon glyphicon-remove-sign" onclick="removeInstitutionFilter(\'' . $institution . '\');"></i>' . ' ';

													if ($institution == 'Bryn'){ $institution = 'Bryn Mawr'; }
													if ($institution == 'Holyoke'){ $institution = 'Mt. Holyoke'; }
													echo $institution . '';
												}
											}
										}
										?>
									</span>
            					</li>
            				</ul>
                            <a href="<?php print $base_path; ?>browse" class="reset pull-right">Reset</a>
            			</div>
            		</div>
            	</div>
            </div>

<script type="text/javascript" src="<?php print $base_path; ?>themes/sisters/resources/js/browse.js"></script>

			<script type="text/javascript" src="<?php print $base_path; ?>themes/sisters/resources/js/browse.js"></script>

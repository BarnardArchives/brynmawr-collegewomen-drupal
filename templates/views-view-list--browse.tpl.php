<?php
global $base_path;

?>

<div class="browse-page">


	<?php include('includes/inc-browse-header.php'); ?>


	<div class="container">

		<div class="browse-items">

			<table class="table">

				<thead>
					<tr>
						<td></td>
						<td>
							<a href="javascrip: void(0);" data-sorttype="title" class="sort-by">
								Title <span style="font-size: 12px;" class="title-sort glyphicon glyphicon-resize-vertical">
								</span></a><i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" placement="top" data-html="true" title="<p>Sort results alphabetically<br>by item title</p>"></i>

							</td>

							<td class="hidden-xs">
								<a href="javascrip: void(0);" data-sorttype="field_date_value" class="sort-by">
									Date <span style="font-size: 12px;" class="date-sort glyphicon glyphicon-resize-vertical"></span>
								</a>
								<i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" placement="top" data-html="true" title="<p>Sort results alphabetically by date. <span>N</span>ote: date formats are not standardized across the collections</p>"></i>
							</td>
							<!-- <td class="hidden-sm hidden-xs">
							Subjects
						</td> -->

						<!-- <td class="hidden-sm hidden-xs">

					</td>
					<! -->
					<td class="hidden-sm hidden-xs">
						<a href="javascrip: void(0);" data-sorttype="field_themes_value" class="sort-by">
							Themes <span style="font-size: 12px;" class="school-sort glyphicon glyphicon-resize-vertical"></span>
						</a>
						<i class="glyphicon glyphicon-info-sign search" data-toggle="tooltip" placement="top" data-html="true"
							title="<p>Sort results alphabetically by theme, or click hyperlinked theme names to view all items in the collections with that theme applied. <span>T</span>o learn more about themes, see <br></p>
							 <p>'Using the <span>C</span>ollections'</p>">
						 </i>
					</td>
					<td class="hidden-xs">
						<a href="javascrip: void(0);" data-sorttype="field_institution_value" class="sort-by">
							Institution <span style="font-size: 12px;" class="school-sort glyphicon glyphicon-resize-vertical"></span>
						</a>
						<i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" placement="top" data-html="true" title="<p>Sort results alphabetically<br>by institution name</p>"></i>
					</td>
					<td class="hidden-xs">
						<a href="javascrip: void(0);" data-sorttype="field_format_value" class="sort-by">
							Format <span style="font-size: 12px;" class="format-sort glyphicon glyphicon-resize-vertical"></span>
						</a>
						<i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" placement="top" data-html="true" title="<p>Sort results alphabetically<br>by item format</p>"></i>
					</td>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($view->result as $delta => $item): ?>
					<tr>
						<td class="browse-image">
							<a href="<?php print   url(drupal_get_path_alias('node/'.$view->result[$delta]->_field_data['nid_1']['entity']->nid), array('options' => array('absolute' => true))); ?>">

								<img src="<?php print $view->result[$delta]->_field_data['nid_1']['entity']->field_browse_thumbnail['und'][0]['value']; ?>" alt="<?php print $view->result[$delta]->_field_data['nid_1']['entity']->title; ?>" class="img-responsive" />
							</a>
						</td>
						<td class="browse-title">
							<h6><?php print $view->result[$delta]->_field_data['nid_1']['entity']->field_format['und'][0]['value']; ?></h6>
							<a href="<?php print   url(drupal_get_path_alias('node/'.$view->result[$delta]->_field_data['nid_1']['entity']->nid), array('options' => array('absolute' => true))); ?>">
								<?php print $view->result[$delta]->_field_data['nid_1']['entity']->title; ?></a>


								<?php   $desc = $view->result[$delta]->_field_data['nid_1']['entity']->field_description['und'][0]['value'];
								$width = 140;
								$desc_trimmed = substr($desc, 0, $width);
								$entity_field[0]['value'] =  $desc_trimmed;
								echo '<p class="excerpt">'. strip_tags($desc_trimmed) . '...</p>';?>

								<td class="browse-date hidden-xs">
									<a href="<?php $base_path; ?>browse?start_year=<?php print $view->result[$delta]->_field_data['nid_1']['entity']->field_article_year['und'][0]['value'];?>&end_year=<?php print $view->result[$delta]->_field_data['nid_1']['entity']->field_article_end_year['und'][0]['value'];?>">
										<?php print $view->result[$delta]->_field_data['nid_1']['entity']->field_date['und'][0]['value']; ?>
									</a>
								</td>
								<!-- <td class="browse-subject hidden-sm hidden-xs">
								<!?php
								$subjects = $view->result[$delta]->_field_data['nid_1']['entity']->field_subject['und'];
								$subjects_str = "";
								$numItems = count($subjects);
								$i = 0;
								foreach($subjects as $item) {
								if($item) {
								$subjects_str .= '<a href="' . $base_path . 'browse?subject=' . htmlentities(trim($item['value'])) . '">'. $item['value'] .'</a>';

								if(++$i !== $numItems) {
								$subjects_str .= ', ';
							}
						}
					}

					print $subjects_str;
					?>
				</td> -->


				<td class="browse-themes hidden-sm hidden-xs">
					<?php
					$tags = $view->result[$delta]->_field_data['nid_1']['entity']->field_themes['und'];
					$tagstr = "";

					foreach ($tags as $item) {
						if ($item) {
							$tagstr .= '<p><a href="' . $base_path . 'browse?searchterm='.'&start_year=&end_year=&type=&institution=All&'.'theme_id[]='. trim($item['tid']) . '">'. taxonomy_term_load($item['tid'])->name .'</a></p>';
						}
					}
					?>
					<?php print $tagstr;?>
				</td>

			</div>


			<td class="browse-creator hidden-xs">
				<?php print $view->result[$delta]->_field_data['nid_1']['entity']->field_institution['und'][0]['value']; ?>
			</td>

			<td class="browse-format hidden-xs">
				<?php print $view->result[$delta]->_field_data['nid_1']['entity']->field_format['und'][0]['value']; ?>
			</td>
		</tr>
	<?php endforeach; ?>


</tbody>
</table>

</div> <!-- .browse-items close -->

</div> <!-- end of browse item section -->

</div>


<script>

$(function () {
	$('[data-toggle="tooltip"]').tooltip()
})
</script>

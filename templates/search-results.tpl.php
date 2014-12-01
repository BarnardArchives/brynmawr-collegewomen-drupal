
<div class="browse-page">

            <div class="browse-top-details">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
							    <h1 class="lead">Search Results</h1>
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
    						<?php foreach($variables['results'] as $delta => $item): ?>
    						<tr>
    							<td style="text-align:center">
    								<a href="<?php print $item['link']; ?>">
    									<img height="88px" src="<?php print $item['node']->field_browse_thumbnail['und'][0]['value'] ?>" alt="<?php print $item['node']->title ?>" title="<?php print $item['node']->title ?>" />

    								</a>
    							</td>
    							<td class="browse-title">
    								<a href="<?php print $item['link']; ?>">
    									<?php print $item['node']->title; ?>
    								</a>
    							</td>
    							<td class="browse-date">
    								<?php print $item['node']->field_date['und'][0]['value']; ?>
    							</td>
    							<td class="browse-subject">
    								<?php print $item['node']->field_subject['und'][0]['value']; ?>
    							</td>
                                <td class="browse-creator">
                                    <?php echo $item['node']->field_creator['und'][0]['value']; ?>
                                    
                                </td>
    						</tr>
    						
							<?php endforeach; ?>

</tbody>
    				</table>

    			</div> <!-- .browse-items close -->

    		</div> <!-- end of browse item section -->

    	</div>

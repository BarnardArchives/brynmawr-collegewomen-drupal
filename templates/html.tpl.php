<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */
 global $base_path;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<?php print $head; ?>
	<title><?php print $head_title; ?></title>
	<?php print $styles; ?>

    <!-- Favicon -->
    <link rel="shortcut icon" sizes="32x32 64x64" href="<?php print $base_path; ?>themes/sisters/resources/images/icons/64_favicon.png">
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" href="<?php print $base_path; ?>themes/sisters/resources/images/icons/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="<?php print $base_path; ?>themes/sisters/resources/images/icons/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php print $base_path; ?>themes/sisters/resources/images/icons/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php print $base_path; ?>themes/sisters/resources/images/icons/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php print $base_path; ?>themes/sisters/resources/images/icons/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php print $base_path; ?>themes/sisters/resources/images/icons/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php print $base_path; ?>themes/sisters/resources/images/icons/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php print $base_path; ?>themes/sisters/resources/images/icons/apple-touch-icon-152x152.png" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?php print $base_path; ?>themes/sisters/resources/images/icons/apple-touch-icon-180x180.png" />

    <meta name="author" content="<?php print $head_title_array['name']; ?>">

    <!-- Facebook: OpenGraph -->
    <meta property="og:title" content="<?php print $head_title_array['title']; ?>" />
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php print $GLOBALS['base_url'] . request_uri(); ?>">
    <meta property="og:site_name" content="<?php print $head_title_array['name']; ?>"/>


    <script type="text/javascript" src="<?php print $base_path; ?>themes/sisters/resources/js/jquery-1.11.2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.min.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
</head>
<body class="<?php print $classes; ?>">


    <div id="site-wrapper" class="non-homepage">

    	<?php if(!drupal_is_front_page()): ?>

    		<?php
				  $navigation = 'navigation_view';
				  print views_embed_view($navigation);
			?>

		<?php endif ?>

    	<?php print $page_top; ?>
		<?php print $page; ?>

		<?php include('includes/footer.php'); ?>


        <!-- Modal -->

        <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="search-modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="custom_search_modal" method="get" accept-charset="UTF-8">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                            </button>

    						<h2>Advanced Search</h2>
                        </div>
                        <div class="modal-body search-modal-body">
                            <div class="search-filter">
                                <p>Keyword Search <a href="javascript: void(0);" style="float:right;" data-resettype="keywords" class="search-reset">Clear All</a><i class="glyphicon glyphicon-info-sign search" data-toggle="tooltip" placement="top"  data-html="true" title="<p>Keyword search looks for matching terms in any metadata field of the record</p>"></i></p>
                                <input autocomplete="off" type="text" name="searchterm" id="title-textbox" size="15" maxlength="128" class="form-text form-control" placeholder="Search the collection" onfocus="this.placeholder=''" onblur="this.placeholder='Search the collection'" />
                            </div>
                            <div class="search-filter">
                                <p>Date(s)<i class="glyphicon glyphicon-info-sign search" data-toggle="tooltip" placement="top" data-html="true" title="<p>Search for records by year or within a range of years; note that date formats are not standardized across the collections</p>"></i></p>

                                <div class="dates-filter">
    								<input autocomplete="off"  class="date-date form-text form-control date-control start-date" type="text" name="start_year" id="start_year" size="60" maxlength="128" placeholder="e.g., 1800" onfocus="this.placeholder=''" onblur="this.placeholder='e.g., 1800'">
                                    <span class="dates-separator">&ndash;</span>
    								<input autocomplete="off"  class="date-date form-text form-control date-control end-date" type="text" name="end_year" id="end_year" size="60" maxlength="128" placeholder="e.g., 2015" onfocus="this.placeholder=''" onblur="this.placeholder='e.g., 2015'">
                                </div>
                             </div>
                             <!-- removing subjects field from advanced search pop-up window -->
                            <!-- <div class="search-filter">
                                <p>Subjects</p>

                                <div class="subjects-filter">
<input type="text" id="subject-textbox" name="subject" size="30" maxlength="128" class="form-text form-control subject-text ui-autocomplete-input" placeholder="Student activities, Chemistry" autocomplete="off" -->
                                <!--/div>
                            </div> -->


                            <div class="search-filter">
                                <p>Format<i class="glyphicon glyphicon-info-sign search" data-toggle="tooltip" placement="top" data-html="true"
                                  title="<p>Narrow your search<br>by format type</p>"></i></p>
                                  <div class="itemtype-filter">
                                    <!--<input type="text" autocomplete="off" id="itemtype-textbox" name="type" size="30" maxlength="128" class="form-text form-control itemtype-text" placeholder="Scrapbook">-->
                                    <select enabled="true" id="typeSelectList" name="type" class="form-control">
                                      <option value="">None Selected</option>
                                      <option value="Diaries">Diaries</option>
                                      <option value="Correspondence">Correspondence</option>
                                      <option value="Photograph Albums">Photograph Albums</option>
                                      <option value="Photographs">Photographs</option>
                                        <option value="Scrapbooks">Scrapbooks</option>
                                     </select>
                                </div>
                            </div>
                            <div class="search-filter">
                                <p>Institutions 
                                    <span style="float:right;">
                                        <a href="javascript: void(0);" class="search-institution-select-all">Select All</a> 
                                        <a href="javascript: void(0);" class="search-institution-deselect-all">Deselect All</a>
                                    </span>
                                    <i class="glyphicon glyphicon-info-sign search" data-toggle="tooltip" data-html="true" placement="top" title="<p>Restrict your search to one or more institutions, or search across all collections</p>"></i></p>

                                <div class="institutions-filter">
    								<input type="hidden" name="institution" id="institution-textbox" value="" >
                                    <ul class="institution">
                                        <?php
                                        $institutions = array(
                                            'Barnard College' => 'Barnard',
                                            'Smith College' => 'Smith',
                                            'Bryn Mawr College' => 'Bryn',
                                            'Vassar College' => 'Vassar',
                                            'Mt. Holyoke College' => 'Holyoke',
                                            'Wellesley College' => 'Wellesley',
                                            'Radcliffe College' => 'Radcliffe'
                                        );
                                        while(list($key, $value) = each($institutions)): ?>

                                        <li>
                                        	<label>
                                        		<input type="checkbox" name="institution_name" class="institutions-filter institution_name" value="<?php echo $value; ?>">
                                        			<?php echo $key; ?>
                                        	</label>
                                        </li>

                                        <?php endwhile; ?>
                                    </ul>
                                </div>

                            </div>

                            <div class="search-filter">
                                <p>Themes
                                    <span style="float:right;">
                                        <a href="javascript: void(0);" class="search-theme-select-all">Select All</a> 
                                        <a href="javascript: void(0);" class="search-theme-deselect-all">Deselect All</a>
                                    </span>
                                    <i class="glyphicon glyphicon-info-sign search" data-toggle="tooltip" placement="top" data-html="true" title="<p>Narrow your search to items with one or more themes applied, or search across all. <span>T</span>o learn more about themes, see</p><p>'Using the <span>C</span>ollections'</p>">
                                 </i></p>

                                <div class="themes-filter">
                    <input type="hidden" name="theme" id="theme-textbox" value="" >
                                    <ul class="theme">
                                        <?php
                                        $theme_id= array(
                                          'Academics' => '540',
                                          'Alum Activities' => '566',
                                          'Arts, Theater and Music' => '541',
                                          'Athletics and Physical Education' =>'558',
                                          'Buildings and Grounds' => '563',
                                          'Dress' =>'547',
                                          'Faculty, Staff and Administrators' => '549',
                                          'Home and Family' => '567',
                                         'Personal Relationships' => '550',
                                         'Political and Social Activism' => '565',
                                         'Religion and Spirituality' => '554',
                                         'Special Events' => '548',
                                         'Student Life' => '584',
                                         'Tradition and Ritual' => '548'
                                        );
                                        while(list($key, $value) = each($theme_id)): ?>
                                        <li>
                                          <label>
                                            <input type="checkbox" name="theme_name" class="themes-filter theme_name" value="<?php echo $value; ?>">
                                              <?php echo $key; ?>
                                          </label>
                                        </li>

                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link">Search the collections &rarr;</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->



    </div> <!-- /#site-wrapper -->

    <?php print $scripts; ?>

	<div id="hidden_forms" style="display:none;">
    	<form class="institution">
    		  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="school" class="school-checkbox" value="Barnard" checked/> Barnard College
			    </label>
			  </div>

			  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="school" class="school-checkbox" value="Bryn" checked/> Bryn Mawr College
			    </label>
			  </div>

			  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="school" class="school-checkbox" value="Holyoke" checked/> Mt. Holyoke College
			    </label>
			  </div>

			  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="school" class="school-checkbox" value="Radcliffe" checked/> Radcliffe College
			    </label>
			  </div>

			  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="school" class="school-checkbox" value="Smith" checked/> Smith College
			    </label>
			  </div>

			  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="school" class="school-checkbox" value="Vassar" checked/> Vassar College
			    </label>
			  </div>

			  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="school" class="school-checkbox" value="Wellesley" checked/> Wellesley College
			    </label>
			  </div>

			  <div class="hidden-form-submit">
			  	<button class="btn btn-link pull-right form-institution-btn" type="submit">Search &rarr;</button>
			  </div>
    	</form>

    	<form class="subjects">
    		 <div class="form-group">
			   <input type="text" autocomplete="off" name="subject" class="form-control input-subject-textbox" placeholder="Subjects" />
			 </div>

			 <div class="hidden-form-submit">
			   <button class="btn btn-link pull-right form-subject-btn" type="submit">Search &rarr;</button>
			 </div>
    	</form>

    	<form class="searchterm">
    		 <div class="form-group">
			   <input type="text" autocomplete="off" name="searchterm" class="form-control input-searchterm-textbox" placeholder="Search Collection" />
			 </div>

			 <div class="hidden-form-submit">
			   <button class="btn btn-link pull-right form-subject-btn" type="submit">Search &rarr;</button>
			 </div>
    	</form>

    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/qtip2/2.2.1/basic/jquery.qtip.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

         	$("form#custom_search_modal").submit(function (e) {
         		 e.preventDefault();
         		var path = '<?php echo $base_path ?>';

         		path += 'browse?searchterm='+ getTerm() +'&start_year='+ getStartDate() +'&end_year='+ getEndDate() +'&type='+ getType() +'&institution=' + getSchools() + getThemes()

         		 window.location = path;
                //console.log(path);
    
                $('input[type="text||password"]').addClass('form-control');
                $('input[type="submit"]').addClass('btn btn-block');
    
                var headlineArray = $('.node-type-basic-page .content-area h3');
    
            	$('#custom_search_modal').submit(function(e){
    				var institutions = '';
    				$('input[type=checkbox].institution_name').each(function() {
    					if(this.checked) {
    						institutions = this.value + ' ';
    					}
    				});
    				$('#institution-textbox').val(institutions);
    				return true;
    
    			});
    
            });
            //end of form function

            $('.advance-search-link').click(function(){
                $('#search-modal').modal()
            });

            $('a.search-reset').click(function(){

                $('.subjects-filter').find('input').val("");
                $('.itemtype-filter').find('input').val("");
                $('#title-textbox').val("");
                $('.themes-filter').find('input[type=checkbox]').prop('checked', false);
                $('.institutions-filter').find('input[type=checkbox]').prop('checked', false);
                $('.dates-filter input').val("");
                $('#typeSelectList').val("");

            });

            $('a.search-institution-select-all').click(function(){
                $('.institutions-filter').find('input[type=checkbox]').prop('checked', true);
            });
            $('a.search-institution-deselect-all').click(function(){
                $('.institutions-filter').find('input[type=checkbox]').prop('checked', false);
            });

            $('a.search-theme-select-all').click(function(){
                $('.themes-filter').find('input[type=checkbox]').prop('checked', true);
            });
            $('a.search-theme-deselect-all').click(function(){
                $('.themes-filter').find('input[type=checkbox]').prop('checked', false);
            });

            $('.flexslider').flexslider({
                animation: "slide"
            });
    	});

    	function getParameterByName(name) {
		    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		        results = regex.exec(location.search);
		    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
		}

    	function performSearch(e) {
	    	 if (e.keyCode == 13){
	    	 	PerformBrowseSearch();
	    	 }
    	}

    	function getSchools() {

	    	var institution = '';

		    $('form#custom_search_modal .institutions-filter input[type=checkbox]').each(function() {

        	if($(this).is(':checked')) {

		        	institution += ' ' + this.value;

		        }

           });

if ($('.institutions-filter :checkbox:checked').length === 7 ) {
institution = 'All';
}else if ($('.institutions-filter :checkbox:checked').length === 0){
institution = 'All';
}


return institution;


}

      function getThemes() {
        var theme_id = '';
        $('form#custom_search_modal .themes-filter input[type=checkbox]').each(function() {
          if($(this).is(':checked')) {
              theme_id += '&theme_id[]=' + this.value;
            }
        });

        if ($('.themes-filter :checkbox:checked').length === 14) {
         theme_id = '&theme_id=All';
        }else if ($('.themes-filter :checkbox:checked').length === 0){
        theme_id = '&theme_id=All';
       }

        return theme_id;

      }

    	function getTerm() {
    		var term = $('#title-textbox').val();
	    	return term;
    	}

    	function getStartDate() {
	    	return 	$('input#start_year').val();
    	}

    	function getEndDate() {
	    	return 	$('input#end_year').val();
    	}

    	function getSubject() {
	    	return $('input#subject-textbox').val();
    	}

    	function getType() {
	    	return $('#typeSelectList').val();
    	}

    	function PerformBrowseSearch() {
	    	var institution = '';
		    $('.qtip-form input[type=checkbox]').each(function() {
		    	if($(this).is(':checked')) {
		        	institution = 'All';
		        }
   });

            var theme_id = '';
    		    $('.qtip-form input[type=checkbox]').each(function() {
    		    	if($(this).is(':checked')) {
    		        	theme_id += ' ' + this.value;
    		        }

		    });

		    $('input#edit-institution').val(institutions);
		    $('input#edit-subject').val($('.qtip-content .input-subject-textbox').val());

		    $('input#edit-searchterm').val($('.qtip-content .input-searchterm-textbox').val());
		    $('#edit-submit-browse').click();
    	}

    </script>

    <script type="text/javascript" src="<?php print $base_path; ?>themes/sisters/resources/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php print $base_path; ?>themes/sisters/resources/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php print $base_path; ?>themes/sisters/resources/js/autocomplete.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-62436914-1', 'auto');
      ga('send', 'pageview');
    </script>

<script>
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
</script>
</body>
</html>

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
?>


<!DOCTYPE html>
<html>
<head>
	<?php print $head; ?>
	<title><?php print $head_title; ?></title>
	<?php print $styles; ?>
	<script type="text/javascript" src="//code.jquery.com/jquery.js"></script>

	<!--<link rel="stylesheet" type="text/css" href="./resources/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="./resources/flex-slider/flexslider.css" />
    <link rel="stylesheet" type="text/css" href="./resources/css/style.css" />-->
    
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.min.css" type="text/css" />
    
    <meta name="viewport" content="width=device-width, user-scalable=no" />
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
		<?php print $page_bottom; ?>


        <!-- Modal -->

        <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="mySearchModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form id="custom_search_modal" action="<?php global $base_url; echo $base_url; ?>/?q=advance_search" method="get" accept-charset="UTF-8">
                    <input type="hidden" name="q" value="advance_search">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>

						<input autocomplete="off"  title="Enter the terms you wish to search for." type="text" id="edit-keys" name="keys" value="" size="15" maxlength="128" class="form-text form-control search-control" placeholder="Search the Collection">

                        <div class="advance-search pull-right">
                            <a href="javascript: void(0);">Advanced Search</a>
                        </div>

                        <br style="clear:right;" />
                    </div>

                    <div class="modal-body search-modal-body">
                        
                        <div class="search-filter">
                            <p>
                                Date(s) <a href="javascript: (0);" data-resettype="dates"  class="search-reset">Reset</a>
                            </p>

                            <div class="dates-filter">
								<input autocomplete="off"  class="date-date form-text form-control date-control start-date" type="text" id="edit-field-article-date-value-value-date" name="field_article_date_value[value][date]" value="" size="60" maxlength="128" placeholder="">
                                -
								<input autocomplete="off"  class="date-date form-text form-control date-control end-date" type="text" id="edit-field-article-date-value-1-value-date" name="field_article_date_value_1[value][date]" value="" size="60" maxlength="128" placeholder="">
                            </div>
                        </div>

                        <div class="search-filter">
                            <p>
                                Institutions <a href="javascript: (0);" data-resettype="institutions" class="search-reset">Reset</a>
                            </p>

                            <div class="institutions-filter">
								<input type="hidden" name="field_institution_value" id="field_institution_value" value="" >

<ul class="institution">
<?php
$institutions = array(
'Barnard College' => 'Barnard',
'Smith College' => 'Smith',
'Bryn Mawr College' => 'Bryn Mawr',
'Vassar College' => 'Vassar',
'Mt. Holyoke College' => 'Holyoke',
'Wellesley College' => 'Wellesley',
'Radcliffe College' => 'Radcliffe',
);

while(list($key, $value) = each($institutions)): ?>

<li><label><input type="checkbox" name="institution_name" class="institutions-filter institution_name" value="<?php echo $value; ?>"/><?php echo $key; ?></label></li>

<?php
endwhile;
?>
</ul>


                            </div>
                        </div>

                        <div class="search-filter">
                            <p>
                                Subjects <a href="javascript: (0);" data-resettype="subjects" class="search-reset">Reset</a>
                            </p>

                            <div class="subjects-filter">
								<input type="text" autocomplete="off" id="edit-field-subject-value" name="field_subject_value" value="" size="30" maxlength="128" class="form-text form-control subject-text" placeholder="">
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link">Search the collection &rarr;</button>
                    </div>

                    </form>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


    </div> <!-- /#site-wrapper -->
    
    <?php print $scripts; ?>
    
    <!--<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
    <script type="text/javascript" src="./resources/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="./resources/flex-slider/jquery.flexslider-min.js"></script>-->     
	
	<div id="hidden_forms" style="display:none;">
    	<form class="institution" action="">
    		  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="school" class="school-checkbox" value="Barnard"/> Barnard College
			    </label>
			  </div>
			  
			  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="school" class="school-checkbox" value="Bryn" /> Bryn Mawr College
			    </label>
			  </div>
			  
			  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="school" class="school-checkbox" value="Holyoke" /> Mt. Holyoke College
			    </label>
			  </div>
			  
			  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="school" class="school-checkbox" value="Radcliffe" /> Radcliffe College
			    </label>
			  </div>
			  
			  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="school" class="school-checkbox" value="Smith" /> Smith College
			    </label>
			  </div>
			  
			  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="school" class="school-checkbox" value="Vassar" /> Vassar College
			    </label>
			  </div>
			  
			  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="school" class="school-checkbox" value="Wellesley" /> Wellesley College
			    </label>
			  </div>
			  
			  <div class="hidden-form-submit">
			  	<button class="btn btn-primary form-institution-btn">SEARCH</button>
			  </div>
    	</form>
    	
    	<form class="subjects" action="">
    		 <div class="form-group">
			   <input type="text" class="form-control" class="inputSubject" placeholder="Subjects" />
			 </div>
			  
			 <div class="hidden-form-submit">
			  <button class="btn btn-primary">SEARCH</button>
			 </div>
    	</form>

    </div>
    
        <script type="text/javascript" src="http://cdn.jsdelivr.net/qtip2/2.2.1/basic/jquery.qtip.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        
        	$('#custom_search_modal').submit(function(e){
				var institution = '';
				$('input[type=checkbox].institution_name').each(function() {
					if(this.checked) {
						institution += this.value + ' ';
					}
				});
				$('#field_institution_value').val(institution);
				return true;
			});

            $('.search-modal-body').hide();

            $('.search-icon').click(function(){
                $('#search-modal').modal()  
            });

            $('.advance-search a').click(function(){
                $('.search-modal-body').slideToggle();
            });

            $('a.search-reset').click(function(){
                var resetType = $(this).data('resettype');

                if (resetType == "subjects") {
                    $('.subjects-filter').find('input').val("");
                }

                if (resetType == "institutions") {
                    $('.institutions-filter').find('input[type=checkbox]:checked').removeAttr('checked');

                }

                if (resetType == "dates") {
                    $('.dates-filter input').val("");
                }

            });

            $(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});
        });
    </script>
    
     <script type="text/javascript">
    	$(document).ready(function(){
	    	$('.institution-caret').qtip({
			    content: {
			        text: $('#hidden_forms form.institution').html()
			    },
			    position: {
			        at: 'bottom center',
			        my: 'center bottom',
			        effect: false,
			        viewport: $(window),
			        adjust: {
			            method: 'none shift'
			        }
			    },
			    hide: {
			        delay: 200,
			        fixed: true, // <--- add this
			        effect: function() { $(this).fadeOut(250); }
			    },
			    style: {
			    	classes: 'qtip-bootstrap qtip-form',
			    	width: 300
			    },
			    show: 'click'
			});
			
			$('.subjects-caret').qtip({
			    content: {
			        text: $('#hidden_forms form.subjects').html()
			    },
			    position: {
			        at: 'bottom center',
			        my: 'center bottom',
			        effect: false,
			        viewport: $(window),
			        adjust: {
			            method: 'none shift'
			        }
			    },
			    hide: {
			        delay: 200,
			        fixed: true, // <--- add this
			        effect: function() { $(this).fadeOut(250); }
			    },
			    style: 'qtip-bootstrap',
			    show: 'click'
			});
			 
			$(document).on("click", ".form-institution-btn", function(){
		
		      var institutions = '';
		      $('.qtip-form input[type=checkbox]').each(function() {
		      	if($(this).is(':checked')) {
		        	institutions += ' ' + this.value;
		        }
		      });
		      //$form = $('.view-id-browse .views-exposed-form');
		      $('input#edit-institution').val(institutions);
		      $('inout#edit-subject').val($('.qtip-form .inputSubject').val());
		      $('#edit-submit-browse').click();
		      
		      return false;
		    });

    	});
    </script>
</body>
</html>
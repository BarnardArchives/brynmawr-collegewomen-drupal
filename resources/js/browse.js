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
	    		var theme_id = getParameterByName('theme_id');
	    		
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
	    		
	    		if(theme_id) {
		    		$('#edit-theme-id option[value=' + theme_id + ' ]').attr("selected", "selected");
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
	    		$('li.format span').text(type);
	    		$('li.subjects span').text(subjects);
    		}
    		
    		function createLink(text) {
	    		return "<a href='javascript:void(0);'>" + text + "</a> "
    		}
    		
    		
			
			$(document).ready(function() {
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
    		});
    		
    		function BrowsePhotosClicked() {
				window.location.href = window.location.origin + "/7sisters/browse-photos" + window.location.search;
			}
			
			function BrowseClicked() {
				window.location.href = window.location.origin + "/7sisters/browse" + window.location.search;
			}
			
			function ThemeClicked(theme_id) {
				$('#edit-theme-id option[value=' + theme_id + ' ]').attr("selected", "selected");
				$('#views-exposed-form-browse-page').submit();
			}
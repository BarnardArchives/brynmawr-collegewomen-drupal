$(document).ready(function(){
	

//$(function() {
	
	function split( val ) {
	  //return val.split( /,\s*/ );
	 return val.split( / \s*/ );
	}
	function extractLast( term ) {
	  return split( term ).pop();
	}
	
	$.getJSON("http://staging.interactivemechanics.com/7sisters/json/browse-data", function (json) {
    	
    	$("#subject-textbox").bind( "keydown", function( event ) {
	    	if ( event.keyCode === $.ui.keyCode.TAB && $( this ).autocomplete( "instance" ).menu.active ) {
					event.preventDefault();
			}
		}).autocomplete({
	    	minLength: 0,
			source: function( request, response ) {
				// delegate back to autocomplete, but extract the last term
				var subjectArray = $.map(json.subjects, function(value, index) {
					return [value];
				});
				response( $.ui.autocomplete.filter(
					subjectArray, extractLast( request.term ) ) );
				},
			focus: function() {
				// prevent value inserted on focus
				return false;
			},
			select: function( event, ui ) {
				var terms = split( this.value );
				// remove the current input
				terms.pop();
				// add the selected item
				terms.push( ui.item.value );
				// add placeholder to get the comma-and-space at the end
				terms.push( "" );
				this.value = terms.join( " " );
				return false;
			}
		});
		
		$("#itemtype-textbox").bind( "keydown", function( event ) {
	    	if ( event.keyCode === $.ui.keyCode.TAB && $( this ).autocomplete( "instance" ).menu.active ) {
					event.preventDefault();
			}
		}).autocomplete({
	    	minLength: 0,
			source: function( request, response ) {
				// delegate back to autocomplete, but extract the last term
				var typeArray = $.map(json.types, function(value, index) {
					return [value];
				});
				response( $.ui.autocomplete.filter(
					typeArray, extractLast( request.term ) ) );
				},
			focus: function() {
				// prevent value inserted on focus
				return false;
			},
			select: function( event, ui ) {
				var terms = split( this.value );
				// remove the current input
				terms.pop();
				// add the selected item
				terms.push( ui.item.value );
				// add placeholder to get the comma-and-space at the end
				terms.push( "" );
				this.value = terms.join( " " );
				return false;
			}
		});
		
	});
	
});
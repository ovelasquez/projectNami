jQuery(document).ready(function($) {
	$('input#post_thumbnail').click(function() { $('input#image_from_post').attr('checked', false); });
	$('input#image_from_post').click(function() { $('input#post_thumbnail').attr('checked', false); });
});
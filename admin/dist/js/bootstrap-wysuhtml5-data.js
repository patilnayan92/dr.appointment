/*Bootstrap wysihtml5 Init*/

$(document).ready(function () {
	"use strict";
	
	$('.textarea_editor').wysihtml5({
		toolbar: {
		  	fa: true,
		  	"link": true,
		  	"html": true,
		  	"image": true,
		  	"color": false,
		    parser: function(html) {
		        return html;
		    }
		}
	});	
});
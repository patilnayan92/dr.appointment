/*Summernote Init*/

$(function() {
	"use strict";
	$('#summernote').summernote({
		placeholder: 'Write something...',
		height: 300,
		// callbacks: {
	 //        onImageUpload: function (files) {
	 //            for (let i = 0; i < files.length; i++) {
	 //                that = $(this);
	 //                upload(files[i]);
	 //            }
	 //        }
	 //    },
	});
});

// function sendFile(file,el) {
// 	var form_data = new FromData();
// 	form_data.append('file',file);
// 	$.ajax({
// 		data:form_data,
// 		type:"POST",
// 		url:'editor-upload.php',
// 		cache:false,
// 		contentType:false,
// 		processData:false,
// 		success:function(url){
// 			$(el).summernote('editor.insertImage',url);
// 		}
// 	})
// }

function upload(file) {
    let out = new FormData();
    out.append('file', file, file.name);

    $.ajax({
        method: 'POST',
        url:  'editor-upload.php',
        contentType: false,
        cache: false,
        processData: false,
        data: out,
        success: function (filename) {

            editor.summernote('insertImage', path, filename);


        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error(textStatus + " " + errorThrown);
        }
    });
};
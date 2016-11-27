
//$()
$.ajax({
    url : post_url,
    type: "POST",
    data : form_data,
    contentType: false,
    cache: false,
    processData:false,
    xhr: function(){
        //upload Progress
        var xhr = $.ajaxSettings.xhr();
        if (xhr.upload) {
            xhr.upload.addEventListener('progress', function(event) {
                var percent = 0;
                var position = event.loaded || event.position;
                var total = event.total;
                if (event.lengthComputable) {
                    percent = Math.ceil(position / total * 100);
                }
                //update progressbar
                $(progress_bar_id +" .progress-bar").css("width", + percent +"%");
                $(progress_bar_id + " .status").text(percent +"%");
            }, true);
        }
        return xhr;
    },
    mimeType:"multipart/form-data"
}).done(function(res){ //
    $(my_form_id)[0].reset(); //reset form
    $(result_output).html(res); //output response from server
    submit_btn.val("Upload").prop( "disabled", false); //enable submit button once ajax is done
});
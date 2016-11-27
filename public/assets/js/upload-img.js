$(document).ready(function (e) {
    $("#inputImgAvatar").change(function () {
        readURL(this);
        $('#modal').modal('show');
    });
});



function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    var $image = $('#image');
    $('#rotateImgAdv1').on('click', function () {
        $image.cropper('rotate', -90);
    });
    $('#rotateImgAdv2').on('click', function () {
        $image.cropper('rotate', 90);
    });
    $('#saveImgAdv').on('click', function () {
        $image.cropper("getCroppedCanvas");
    });
    $('#zoomIn').on('click', function () {
        $image.cropper("zoom", 0.1);
    });
    $('#zoomOut').on('click', function () {
        $image.cropper("zoom", -0.1);
    });

    $('#modal').on('shown.bs.modal', function () {
        $image.cropper({
            aspectRatio: 150 / 130,
            viewMode: 2,
            autoCropArea: 1
        });
    }).on('hidden.bs.modal', function () {
        $image.cropper('destroy');
    });
    $('#saveImgAdv').on('click', function () {
        var btn = $('.btnEnviarImg');
        btn.attr('disabled', 'disabled');
        btn.find('.img-enviando').show();
        btn.find('.img-normal').hide();
        var objCanvas = $image.cropper("getCroppedCanvas");
        $image.cropper("disable");
        if (typeof objCanvas.toBlob !== "undefined") {
            objCanvas.toBlob(function (blob) {
                sendBlob(blob);
            }, "image/jpeg",1);
        } else if (typeof objCanvas.msToBlob !== "undefined") {
            var blob = objCanvas.msToBlob();
            sendBlob(blob);
        }
    });

    function sendBlob(blob) {
        var formData = new FormData();
        var f = $('#imageUploadForm');
        var btn = $('.btnEnviarImg');
        var id_usuario = $('[name="id_usuario"]').val();

        formData.append('img', blob, "a.jpg");
        formData.append('id_usuario', id_usuario);
        
        $.ajax({
            url: f.attr('action'),
            method: "POST",
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.sucesso) {
                    btn.removeAttr('disabled');
                    btn.find('.img-enviando').hide();
                    btn.find('.img-normal').show();
                    $('.img-avatar').attr('src', data.url);
                    $('#modal').modal('hide');
                    $('#inputImgAvatar').val('');
                } else {
                    alert(data.msg);
                    btn.removeAttr('disabled');
                    btn.find('.img-enviando').hide();
                    btn.find('.img-normal').show();
                    $image.cropper("enable");
                }
            },
            error: function () {
                console.log('Upload error');
                btn.removeAttr('disabled');
                btn.find('.img-enviando').hide();
                btn.find('.img-normal').show();
                alert("Ocorreu um erro,por favor, tente novamente mais tarde.");
            }
        });
    }
});


<?php
$this->title('Adicionar Post');
?>
<script src="/vendor/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="/vendor/tinymce/js/tinymce/langs/pt_BR.js"></script>
<div id="divMenuTop" style="height: 75px;">
    <div id="menuTop" class="panel panel-body"><span style="display: inline-block;padding-top:5px;font-size: 18px;margin: 0;line-height: 1;"> </span>
        <div class="pull-right col-md-2" style="padding-left: 1px"><button class="btn btn-success btn-block" onclick="submitForm();" >Adicionar</button></div>        
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Post</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?= $this->formAdmin($form); ?>
            </div>
        </div>
    </div>
    <div class="col-md-11">
        <textarea rows="20" class="form-control" name="conteudo2" id="conteudo2" placeholder="insira o conteudo"></textarea>

        <div class="box box-solid" style="margin-top: 10px;">
            <div class="box-header with-border">
                <h3 class="box-title">Resumo</h3>
            </div>
            <div class="box-body">                
                <textarea maxlength="155" class="form-control" name="resumo" id="resumo2" placeholder="insira o resumo"></textarea>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('scroll', function () {
        if ($(this).scrollTop() >= $('#divMenuTop').position().top) {
            $('#menuTop').attr("style", "padding:10px;position:fixed;margin-left: -15px;right:0px;top:0px;width:100%;margin-bottom:0px;z-index:1500");
            console.log('5555');
        } else if ($(this).scrollTop() < $('#divMenuTop').position().top) {
            $('#menuTop').removeAttr("style");
        }
    });


    $("#conteudo").parent('.form-group').hide();
    $("#resumo").parent('.form-group').hide();
    $("#btnSalvar").parent('.form-group').hide();

    $("#conteudo2").val($("#conteudo").val());
    $("#resumo2").val($("#resumo").val());


    function procurarImagem(field_name, url, type, win) {

        tinyMCE.activeEditor.windowManager.open({
            url: '/admin/blog/galeria?insert',
            title: 'Procurar Imagem',
            width: 1024,
            height: 468
        },
                {
                    addImg: function (url) {
                        win.document.getElementById(field_name).value = url;
                        tinyMCE.activeEditor.windowManager.close();
                    }
                });
    }

    tinymce.init({
        selector: "#conteudo2",
        content_css: "/site/css/bootstrap.min.css,/site/css/style-main.css",
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table directionality emoticons paste textcolor code"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: "ink unlink anchor | image media | forecolor backcolor  | print code ",
        image_advtab: true,
        relative_urls: false,
        browser_spellcheck: true,
        file_browser_callback: procurarImagem,
        image_class_list: [
            {title: 'Nenhum', value: ''},
            {title: 'Borda', value: 'thumbnail'}

        ]
    });

    function submitForm() {
        $('#resumo').val($('#resumo2').val());
        $('#conteudo').val(tinymce.get('conteudo2').getContent());
        $("#formPost").submit();
    }
</script>
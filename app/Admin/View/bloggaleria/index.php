
<?php
$url_load = '';
$this->addCss('/assets/css/upload.css');

if (isset($_GET['insert'])) {
    $url_load = '?insert';
    ?>
    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>AdminLTE 2 | Dashboard</title>
            <!-- Tell the browser to be responsive to screen width -->
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <!-- Bootstrap 3.3.6 -->
            <link rel="stylesheet" href="/admin/bootstrap/css/bootstrap.min.css">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
            <!-- Ionicons -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
            <!-- jvectormap -->
            <link rel="stylesheet" href="/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="/admin/dist/css/AdminLTE.min.css">
            <!-- AdminLTE Skins. Choose a skin from the css/skins
                 folder instead of downloading all of them to reduce the load. -->
            <link rel="stylesheet" href="/admin/dist/css/skins/_all-skins.min.css">
            <?= $this->renderCss() ?>


            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->


            <!-- ./wrapper -->

            <!-- jQuery 2.2.3 -->
            <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
            <!-- Bootstrap 3.3.6 -->
            <script src="/admin/bootstrap/js/bootstrap.min.js"></script>
            <!-- FastClick -->
            <script src="/admin/plugins/fastclick/fastclick.js"></script>
            <!-- AdminLTE App -->
            <script src="/admin/dist/js/app.min.js"></script>
            <!-- Sparkline -->
            <script src="/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
            <!-- jvectormap -->
            <script src="/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
            <script src="/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
            <!-- SlimScroll 1.3.0 -->
            <script src="/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
            <!-- ChartJS 1.0.1 -->
            <!--<script src="/admin/plugins/chartjs/Chart.min.js"></script>-->
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <!--<script src="/admin/dist/js/pages/dashboard2.js"></script>-->
            <!-- AdminLTE for demo purposes -->
            <!--<script src="/admin/dist/js/demo.js"></script>-->
            <?php
            $this->addJs('/assets/js/default.js');
            ?>
            <?= $this->renderJs() ?>

        </head>

        <body style="background-color: #ecf0f5; padding: 10px;">
            <section class="content">
                <?php
            }
            ?>
            <div id="dragandrophandler">Arraste e solte os arquivos aqui</div>
            <br><br>
            <div id="status1"></div>
            <div id="viewGaleria">
            </div>
            <script>
                refreshGaleria();
                function refreshGaleria() {
                    $("#viewGaleria").load('/admin/blog/galeria/view<?= $url_load ?>');
                }
                function sendFileToServer(formData, status)
                {
                    var uploadURL = "/admin/blog/galeria/upload"; //Upload URL
                    var extraData = {}; //Extra Data.
                    var jqXHR = $.ajax({
                        xhr: function () {
                            var xhrobj = $.ajaxSettings.xhr();
                            if (xhrobj.upload) {
                                xhrobj.upload.addEventListener('progress', function (event) {
                                    var percent = 0;
                                    var position = event.loaded || event.position;
                                    var total = event.total;
                                    if (event.lengthComputable) {
                                        percent = Math.ceil(position / total * 100);
                                    }
                                    //Set progress
                                    status.setProgress(percent);
                                }, false);
                            }
                            return xhrobj;
                        },
                        url: uploadURL,
                        type: "POST",
                        contentType: false,
                        processData: false,
                        cache: false,
                        dataType:'json',
                        data: formData,
                        success: function (data) {
                            if (data.sucesso) {
                                status.setProgress(100);
                                refreshGaleria();
                            } else {
                                alert('Ocorreu um erro ao enviar a imagem');
                                status.setProgress(-1);
                            }

                            //            $("#status1").append("File upload Done<br>");         
                        },
                        error: function () {
                            alert('Ocorreu um erro ao enviar a imagem');
                            status.setProgress(-1);
                        }
                    });

                    status.setAbort(jqXHR);
                }

                var rowCount = 0;
                var progessBar = '<div class="col-md-4"><div class="progress active">' +
                        '<div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width:0%">' +
                        '<span class="sr-only">0%</span>' +
                        '</div>' +
                        '</div></div>';
                function createStatusbar(obj)
                {
                    rowCount++;
                    var row = "odd";
                    if (rowCount % 2 == 0)
                        row = "even";
                    this.statusbar = $('<div class="box ' + row + ' box-solid">' +
                            '<div class="box-header with-border">' +
                            '<h3 class="box-title"></h3>' +
                            '</div>' +
                            '<div class="box-body"><div class="row conteudo"></div></div>');
                    this.filename = $("<div class='filename'></div>").appendTo(this.statusbar.find('.box-title'));
                    this.size = $("<div class='filesize col-md-2'></div>").appendTo(this.statusbar.find('.conteudo'));
                    this.progressBar = $(progessBar).appendTo(this.statusbar.find('.conteudo'));
                    this.abort = $("<div class='col-md-2'><div class='abort'>Cancelar</div></div>").appendTo(this.statusbar.find('.conteudo'));
                    obj.after(this.statusbar);

                    this.setFileNameSize = function (name, size)
                    {
                        var sizeStr = "";
                        var sizeKB = size / 1024;
                        if (parseInt(sizeKB) > 1024)
                        {
                            var sizeMB = sizeKB / 1024;
                            sizeStr = sizeMB.toFixed(2) + " MB";
                        } else
                        {
                            sizeStr = sizeKB.toFixed(2) + " KB";
                        }

                        this.filename.html(name);
                        this.size.html(sizeStr);
                    };
                    this.setProgress = function (progress)
                    {
                        var progressBarWidth = progress * this.progressBar.width() / 100;
                        this.progressBar.find('.progress-bar').animate({width: progressBarWidth}, 10).html(progress + "% ");
                        if (parseInt(progress) >= 100)
                        {
                            this.progressBar.find('.progress-bar')
                                    .removeClass('progress-bar-striped progress-bar-primary')
                                    .addClass('progress-bar-success')
                                    .html('Completo');
                            this.abort.hide();

                        } else if (parseInt(progress) < 0) {
                            this.progressBar.find('.progress-bar')
                                    .removeClass('progress-bar-striped progress-bar-primary')
                                    .addClass('progress-bar-danger')
                                    .animate({width: '100%'}, 10)
                                    .html('Erro');
                            this.abort.hide();
                        }
                    };
                    this.setAbort = function (jqxhr)
                    {
                        var sb = this.statusbar;
                        this.abort.click(function ()
                        {
                            jqxhr.abort();
                            sb.hide();
                        });
                    }
                }
                function handleFileUpload(files, obj)
                {
                    for (var i = 0; i < files.length; i++)
                    {
                        var fd = new FormData();
                        fd.append('file', files[i]);

                        var status = new createStatusbar(obj); //Using this we can set progress.
                        status.setFileNameSize(files[i].name, files[i].size);
                        sendFileToServer(fd, status);

                    }
                }
                $(document).ready(function ()
                {
                    var obj = $("#dragandrophandler");
                    obj.on('dragenter', function (e)
                    {
                        e.stopPropagation();
                        e.preventDefault();
                        $(this).css('border', '2px solid #0B85A1');
                    });
                    obj.on('dragover', function (e)
                    {
                        e.stopPropagation();
                        e.preventDefault();
                    });
                    obj.on('drop', function (e)
                    {

                        $(this).css('border', '2px dotted #0B85A1');
                        e.preventDefault();
                        var files = e.originalEvent.dataTransfer.files;

                        //We need to send dropped files to Server
                        handleFileUpload(files, obj);
                    });
                    $(document).on('dragenter', function (e)
                    {
                        e.stopPropagation();
                        e.preventDefault();
                    });
                    $(document).on('dragover', function (e)
                    {
                        e.stopPropagation();
                        e.preventDefault();
                        obj.css('border', '2px dotted #0B85A1');
                    });
                    $(document).on('drop', function (e)
                    {
                        e.stopPropagation();
                        e.preventDefault();
                    });

                });
            </script>
            <?php
            if (isset($_GET['insert'])) {
                ?>
            </section>
        </body>
    </html>
    <?php
}
?>
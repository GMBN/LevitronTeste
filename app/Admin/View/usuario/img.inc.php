<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Imagem de perfil</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form id="imageUploadForm" method="POST" action="/admin/usuario/img"  enctype="multipart/form-data" >
            <?php if(!empty($rs['img'])){ ?>
            <img  class="img-avatar thumbnail" style="margin-bottom: 4px!important;margin: auto;" src="<?= $rs['img'] ?>" />
            <?php }else{ ?>
            <img  class="img-avatar thumbnail" style="margin-bottom: 4px!important;margin: auto;" src="/img/avatar.png" />
            <?php } ?>
            <span class="btnEnviarImg btn btn-block btn-file ink-reaction btn-raised btn-primary">
                <span class="img-enviando"  style="display: none">
                    <i class="fa fa-refresh fa-spin"></i>
                    Enviando ...
                </span>
                <span class="img-normal">
                    <i class="md md-photo-camera"></i> Enviar Imagem 
                    <input type="file" id="inputImgAvatar" name="img">  
                    <input type="hidden" name="id_usuario" value="<?= $rs['id'] ?>">  
                </span>
            </span>
        </form>
        <!-- Modal -->
        <div class="modal fade" id="modal" aria-labelledby="modalLabel" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalLabel">Enviar Imagem do perfil</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <img id="image" style="max-width: 250px;" src="" alt="Imagem Enviada">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btnEnviarImg" id="saveImgAdv">
                            <span class="img-enviando"  style="display: none">
                                <i class="fa fa-refresh fa-spin"></i>
                                Salvando...
                            </span>
                            <span class="img-normal">
                                Salvar Imagem
                            </span>
                        </button>
                        <div class="btn-group pull-left">
                            <button type="button" class="btn btn-primary" data-method="rotate" id="rotateImgAdv1">
                                <span class="fa fa-rotate-left"></span>
                            </button>
                            <button type="button" class="btn btn-primary" data-method="rotate" id="rotateImgAdv2">
                                <span class="fa fa-rotate-right"></span>
                            </button>

                            <button type="button" class="btn btn-primary" id="zoomIn" >
                                <span class="docs-tooltip" data-toggle="tooltip" title="" >
                                    <span class="fa fa-search-plus"></span>
                                </span>
                            </button>
                            <button type="button" class="btn btn-primary" id="zoomOut"  title="Zoom Out">
                                <span class="docs-tooltip" data-toggle="tooltip" title="">
                                    <span class="fa fa-search-minus"></span>
                                </span>
                            </button>
                        </div>
                        <button type="button" class="btn btn-default" onclick="$('#inputImgAvatar').val('')" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<?php
$this->cropper();
$this->addJs('/assets/js/upload-img.js');
$this->addCss('/assets/css/upload-img.css');
?>
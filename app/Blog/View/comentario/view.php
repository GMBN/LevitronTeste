<div class="comments-area">
    <h5 class="comments-title">Comentários (<?= count($rs) ?>)</h5>
    <ul class="comment-list">
        <?php
        $ms = [];
        $usuario = $this->auth()->getUsuario();

        foreach ($rs as $r) {
            $ms[$r['id']] = $r;
        }

        //Associa os comentarios
        foreach ($ms as $r) {
            if (!empty($r['id_comentario'])) {
                $ms[$r['id_comentario']]['res'][] = $ms[$r['id']];
                unset($ms[$r['id']]);
            }
        }

        $comentario = function ($data, $res = false) use(&$comentario, $ms, $usuario) {
            $pl = '';
            if ($res) {
                $pl = 'pl-80';
            }
            $img = $this->avatar();
            $nome = $data['nome'];
            $c_autor = null;
            if (!empty($data['id_usuario'])) {
                $img = $data['u_img'];
                $nome = $data['u_nome'];
                $c_autor = 'p-20 bg-lighter';
            }
            ?>
            <div class="media <?= $pl ?> nested-comment"> 
                <div class="media-left"><img alt="" style="max-width: 75px" src="<?= $img ?>" class="img-thumbnail "></div>
                <div class="media-body <?= $c_autor?>">
                    <h5 class="media-heading comment-heading"><?= $nome ?></h5>
                    <div class="comment-date" style="font-size:11px!important"><?= $this->date($data['created']) ?></div>
                    <p><?= $data['msg'] ?></p>
                    
                    <?php if (!$res) { ?>
                        <a class="replay-icon pull-right text-theme-colored" href="javascript:responderComentario(<?= $data['id'] ?>)"> <i class="fa fa-commenting-o text-theme-colored"></i> Responder</a>
                        <div class="comment-box" id="comentario_<?= $data['id'] ?>" style="display:none">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5>Responder o comentário de <?= $nome ?></h5>
                                    <div class="row">
                                        <form role="form" method="POST" class="form_comentario">
                                            <input type="hidden" name="id_comentario" value="<?= $data['id'] ?>" />
                                            <?php
                                            if ($usuario) {
                                                ?>
                                                <div class="col-sm-12 mb-10"> 
                                                    <div class="media-left"><img alt="" style="max-width: 75px" src="<?= $usuario['img'] ?>" class="img-thumbnail "></div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading comment-heading"><?= $usuario['nome'] ?></h5>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-6 pt-0 pb-0">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" required name="nome"  placeholder="Digite seu Nome">
                                                    </div>

                                                </div>
                                                <div class="col-sm-6 pt-0 pb-0">
                                                    <div class="form-group">
                                                        <input type="text" required class="form-control" name="email"  placeholder="Digite seu Email">
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" required name="msg"   placeholder="Digite seu comentário" rows="5"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-dark btn-flat pull-right m-0">Responder Comentário</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php
                //verifica se o comentario e uma resposta
                if (isset($data['res']) && is_array($data['res'])) {
                    foreach ($data['res'] as $r) {
                        $comentario($r, true);
                    }
                }
                ?>
            </div>
            <?php
        };

        foreach ($ms as $r) {
            $comentario($r);
            ?>
            <!--            <li>
                            <div class="media comment-author">
                                <div class="media-left"><img style="max-width: 75px"  class="img-thumbnail" src="<?= $this->avatar() ?>" alt=""></div>
                                <div class="media-body">
                                    <h5 class="media-heading comment-heading"><?= $r['nome'] ?></h5>
                                    <div class="comment-date"><?= $this->descData($r['created'], true) ?></div>
                                    <p><?= $r['msg'] ?></p>
                                    <a class="replay-icon pull-right text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a> </div>
                                <div class="media pl-30"> 
                                    <div class="media-left"><img alt="" style="max-width: 75px" src="<?= $this->avatar() ?>" class="img-thumbnail "></div>
                                    <div class="media-body">
                                        <h5 class="media-heading comment-heading">John Doe says:</h5>
                                        <div class="comment-date">23/06/2014</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                                        <a class="replay-icon pull-right text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a>
                                    </div>
                                </div>
                            </div>
                        </li>-->
        <?php } ?>
        <!--        <li>
                    <div class="media comment-author"> <a class="media-left" href="#"><img class="img-thumbnail" src="http://placehold.it/75x75" alt=""></a>
                        <div class="media-body">
                            <h5 class="media-heading comment-heading">John Doe says:</h5>
                            <div class="comment-date">23/06/2014</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                            <a class="replay-icon pull-right text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a>
                            <div class="clearfix"></div>
                            <div class="media comment-author nested-comment"> <a href="#" class="media-left pt-20"><img alt="" src="http://placehold.it/75x75" class="img-thumbnail"></a>
                                <div class="media-body p-20 bg-lighter">
                                    <h5 class="media-heading comment-heading">John Doe says:</h5>
                                    <div class="comment-date">23/06/2014</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                                    <a class="replay-icon pull-right text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a>
                                </div>
                            </div>
                            <div class="media comment-author nested-comment"> <a href="#" class="media-left pt-20"><img alt="" src="images/blog/comment4.jpg" class="img-thumbnail"></a>
                                <div class="media-body p-20 bg-lighter">
                                    <h5 class="media-heading comment-heading">John Doe says:</h5>
                                    <div class="comment-date">23/06/2014</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                                    <a class="replay-icon pull-right text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="media comment-author"> <a class="media-left" href="#"><img class="img-thumbnail" src="http://placehold.it/75x75" alt=""></a>
                        <div class="media-body">
                            <h5 class="media-heading comment-heading">John Doe says:</h5>
                            <div class="comment-date">23/06/2014</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                            <a class="replay-icon pull-right text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a> </div>
                    </div>
                </li>-->
    </ul>
</div>

<div class="comment-box">
    <div class="row">
        <div class="col-sm-12">
            <h5>Deixe seu comentário</h5>
            <div class="row">
                <form role="form" method="POST" class="form_comentario">
                    <?php
                    if ($usuario) {
                        ?>
                        <div class="col-sm-12 mb-10"> 
                            <div class="media-left"><img alt="" style="max-width: 75px" src="<?= $usuario['img'] ?>" class="img-thumbnail "></div>
                            <div class="media-body">
                                <h5 class="media-heading comment-heading"><?= $usuario['nome'] ?></h5>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-sm-6 pt-0 pb-0">
                            <div class="form-group">
                                <input type="text" class="form-control" required name="nome"  placeholder="Digite seu Nome">
                            </div>

                        </div>
                        <div class="col-sm-6 pt-0 pb-0">
                            <div class="form-group">
                                <input type="text" required class="form-control" name="email"  placeholder="Digite seu Email">
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <textarea class="form-control" required name="msg"   placeholder="Digite seu comentário" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark btn-flat pull-right m-0">Enviar Comentário</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".form_comentario").clone()
        $(".form_comentario").on('submit', function () {
            var data = $(this).serializeArray();
            data.push({name: 'id_post', value: id_post});
            $.ajax({
                type: "POST",
                data: data,
                dataType: 'json',
                url: "/blog/comentario/add",
                success: function (obj) {
                    if (obj.success) {
                        carregarComentario();
                    }
                }
            });
            return false;
        });
    });
    function responderComentario(id) {
        $('#comentario_' + id).slideToggle();
    }
</script>
<?php
$this->title('Posts');
?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Posts</h3>
        <div class="box-tools">
            <a href="/admin/blog/post/add" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Adicionar</a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-striped ">
            <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Titulo</th>
                    <th>Criado em</th>
                    <th>Comentários</th>
                    <th>Status</th>
                    <th style="width: 90px">Ações</th>
                </tr>
                <?php foreach ($result as $r) { ?>
                    <tr>
                        <td><?= $r['id'] ?></td>
                        <td><?= $r['titulo'] ?></td>
                        <td><?= $this->date($r['created'], 1) ?></td>
                        <td  class="text-center"><button type="button" onclick="listComentario(<?= $r['id'] ?>)" class="btn btn-xs btn-default"><i class="fa fa-comment-o"></i> <?= (int) $r['comentario'] ?></button></td>
                         <td><?php
                            if ($r['ativo'] == 8) {
                                echo '<span class="label label-success">Publicado</span>';
                            } else {
                                echo '<span class="label label-danger">Inativo</span>';
                            }
                            ?>
                        </td>
                        <td>
                            <a class="btn btn-default btn-xs" target="_blank" href="/blog/<?= $r['slug_cat'] ?>/<?= $r['slug'] ?>" data-toggle="tooltip" title="Visualiar"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-primary btn-xs" href="/admin/blog/post/edit/<?= $r['id'] ?>" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
                        </td>

                    </tr>
<?php } ?>
            </tbody></table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="#">«</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </div>
</div>
<div class="modal fade"  tabindex="-1" role="dialog" id="modalListComentario">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Comentários</h4>
            </div>
            <div class="modal-body">
                <div id="contentListComentario">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function listComentario(id_post) {
        $("#modalListComentario").modal('show');
        $('#contentListComentario').load('/admin/blog/comentario/post/' + id_post);
    }
</script>
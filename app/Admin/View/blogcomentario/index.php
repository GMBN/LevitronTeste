<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Comentários</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th>Post</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Mensagem</th>
                    <th>Situção</th>
                    <th style="width: 40px">Ações</th>
                </tr>
                <?php foreach ($result as $r) { ?>
                    <tr>
                        <td><?= $r['post_titulo'] ?></td>
                        <td><?= $r['nome'] ?></td>
                        <td><?= $r['email'] ?></td>
                        <td><?= $r['msg'] ?></td>
                        <td>
                        <?php
                        if($r['situ']==8){
                            echo '<span class="label label-success">Publicado</span>';
                        }else{
                             echo '<span class="label label-danger">Inativo</span>';
                        } ?>
                        <td><a class="btn btn-primary btn-xs" href="/admin/blog/comentario/edit/<?= $r['id'] ?>" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</div>
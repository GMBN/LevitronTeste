<?php
$this->title('Usuários');
?>
<?= $this->msg(); ?>
<div class="box">
    <div class="box-header with-border ">
        <h3 class="box-title">Usuários</h3>
        <div class="box-tools">
            <a href="/admin/usuario/add" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Adicionar</a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 80px">Imagem</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Sobre</th>
                    <th>Status</th>
                    <th style="width: 40px">Ações</th>
                </tr>
                <?php foreach ($result as $r) {
                    $img = "/img/avatar.png";
                    if(!empty($r['img'])){
                        $img = $r['img'];
                    }
                    ?>
                    <tr>
                        <td><?= $r['id'] ?></td>
                        <td class="text-center"><img class="no-margin thumbnail no-padding" width="60px" src="<?= $img ?>"/></td>
                        <td><?= $r['nome'] ?></td>
                        <td><?= $r['email'] ?></td>
                        <td><?= $r['sobre'] ?></td>
                        <td><?php
                            if ($r['ativo'] == 8) {
                                echo '<span class="label label-success">Ativo</span>';
                            } else {
                                echo '<span class="label label-danger">Inativo</span>';
                            }
                            ?></td>
                        <td><a class="btn btn-primary  btn-xs" data-toggle="tooltip" title="Editar" href="/admin/usuario/edit/<?= $r['id'] ?>"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody></table>
    </div>
</div>
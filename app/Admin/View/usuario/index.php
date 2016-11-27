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
              <table class="table table-bordered table-striped">
                <tbody>
                 <tr>
                  <th style="width: 10px">#</th>
                  <th>Titulo</th>
                  <th>Conteúdo</th>
                  <th style="width: 40px">Ações</th>
                </tr>
                 <?php foreach($result as $r){ ?>
                <tr>
                  <td><?= $r['id'] ?></td>
                  <td><?= $r['nome'] ?></td>
                  <td><?= $r['email'] ?></td>
                  <td><a class="btn btn-primary  btn-xs" data-toggle="tooltip" title="Editar" href="/admin/usuario/edit/<?= $r['id'] ?>"><i class="fa fa-pencil"></i></a></td>
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
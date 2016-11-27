<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Categorias</h3>
        <div class="box-tools">
            <a href="/admin/blog/categoria/add" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Adicionar</a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-striped ">
            <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Titulo</th>
                    <th>slug</th>
                    <th style="width: 40px">Ações</th>
                </tr>
                <?php foreach ($result as $r) { ?>
                    <tr>
                        <td><?= $r['id'] ?></td>
                        <td><?= $r['titulo'] ?></td>
                        <td><?= $r['slug'] ?>
                        <td><a class="btn btn-primary btn-xs" data-toggle="tooltip" title="Editar" href="/admin/blog/categoria/edit/<?= $r['id'] ?>"><i class="fa fa-pencil"></i></a></td>
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
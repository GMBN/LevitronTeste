<div class="row">
    <div class="col-md-8">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Comentário <?= $rs['id'] ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?= $this->formAdmin($form); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Informações</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>Post:</th>
                                <td><?= $rs['post_titulo'] ?></td>
                            </tr>
                            <tr>
                                <th>Comentado:</th>
                                <td><?= $this->date($rs['created']) ?></td>
                            </tr>
                            <tr>
                                <th>IP:</th>
                                <td><?= $rs['ip'] ?></td>
                            </tr>
                        </tbody></table>
                </div>
            </div>
        </div>
    </div>
</div>

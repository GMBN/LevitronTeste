<?php
$this->title('Editar Usuário '.$rs['id']);
?>
<div class="row"> 
    <div class="col-md-12">
        <?= $this->msg(); ?>
    </div>
    <div class="col-md-6">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Usuário</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?= $this->formAdmin($form); ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-4">
        <?php require __DIR__ . '/img.inc.php' ?>
    </div>
    <div class="col-md-4">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Alterar Senha</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form method="POST" action="/admin/usuario/senha">
                    <input type="hidden" name="id" value="<?= $rs['id'] ?>" />
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nova Senha</label>
                            <input type="password" class="form-control" name="senha" value="" required="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Confirmar Nova Senha</label>
                            <input type="password" class="form-control" name="confirmar_senha" value="" required="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Alterar Senha</button>
                        </div>
                    </div>
                </form>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>

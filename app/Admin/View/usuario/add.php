<?php
$this->title('Adicionar Usuário');
?>
<div class="row"> 
    <div class="col-md-12">
        <?= $this->msg(); ?>
    </div>
    <div class="col-md-6">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Adicionar Usuário</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?= $this->formAdmin($form); ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<?php
$titulo = "Configuração";
$this->title($titulo);
echo $this->msg();
$this->dateTimePicker();
?>

<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title"><?= $titulo ?></h3>
    </div>
    <div class="box-body">
        <form method="POST" action="/admin/config/save">
            <div class="row">
                <div class="col-sm-4 text-right">
                    <h5>Imagem de fundo</h5>
                </div>
                <div class="col-sm-8">
                    <input type="text" name="imagemFundo" class="form-control" placeholder="URL Imagem de fundo" value="<?= $rs['imagemFundo'] ?>">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-4 text-right">
                    <h5>Data Lançamento</h5>
                </div>
                <div class="col-sm-8">
                    <input type="text" id='datetimepicker' name="dataLancamento" class="form-control" placeholder="Data Lançamento" value="<?= $rs['dataLancamento'] ?>">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-4 text-right">
                </div>
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box-body -->
</div>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            locale: 'pt-br'
        });
    });
</script>
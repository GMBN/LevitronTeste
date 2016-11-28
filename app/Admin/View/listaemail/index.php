
<?php
$titulo = "Lista de E-mails";
$this->title($titulo);

?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?= $titulo ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-striped ">
            <tbody>
                <tr>
                    <th>E-mail</th>
                    <th>Assinado em</th>
                    <th>IP</th>
                </tr>
                <?php foreach ($result as $r) { ?>
                    <tr>
                        <td><?= $r['email'] ?></td>
                        <td><?= $this->descData($r['created'], true) ?>
                        <td><?= $r['ip'] ?>
                    </tr>
                <?php } ?>
            </tbody></table>
    </div>
</div>
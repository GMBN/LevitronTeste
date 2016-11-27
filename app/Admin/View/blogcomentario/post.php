<table class="table table-bordered table-striped">
    <tbody>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Mensagem</th>
            <th>Criado em</th>
            <th>Situção</th>
            <th style="width: 40px">Ações</th>
        </tr>
        <?php foreach ($rs as $r) { ?>
            <tr>
                <td><?= $r['nome'] ?></td>
                <td><?= $r['email'] ?></td>
                <td><?= $r['msg'] ?></td>
                <td><?= $this->date($r['created']) ?></td>
                <td>
                    <?php
                    if ($r['situ'] == 8) {
                        echo '<span class="label label-success">Publicado</span>';
                    } else {
                        echo '<span class="label label-danger">Inativo</span>';
                    }
                    ?>
                <td><a class="btn btn-primary btn-sm" href="/admin/blog/comentario/edit/<?= $r['id'] ?>" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"></i></a></td>
            </tr>
<?php } ?>
    </tbody>
</table>
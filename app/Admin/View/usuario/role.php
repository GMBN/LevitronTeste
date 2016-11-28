<?php
//obtém os roles configurados no sistema
$config = require ROOT . "/app/config.php";
$roles = array_keys($config['roles']);
$current = array();
foreach ($rs as $r) {
    $current[$r['nome']] = $r['nome'];
}
echo $this->msg();
?>
<form method="POST" action="/admin/usuario/role/<?= $id_usuario ?>">
      <div class="form-group">
              <?php
              foreach ($roles as $r) {
                  $checked = '';
                  if (isset($current[$r])) {
                      $checked = 'checked';
                  }
                  ?>
            <div class="checkbox">
                <label>
                    <input name="<?= $r ?>" type="checkbox" value="<?= $r ?>" <?= $checked ?>>
                    <?= $r ?>
                </label>
            </div>
        <?php } ?>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
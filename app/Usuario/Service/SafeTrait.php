<?php

namespace App\Usuario\Service;

trait SafeTrait {

    function gerarSenha($pass) {
        $config = require ROOT . '/config/safe.php';
        $key = $config['key_password'];
        return md5($key . md5($key . $pass));
    }

}

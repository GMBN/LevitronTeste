<?php

namespace App\Usuario\Controller;

use App\Base\Controller\BaseController;

class Auth extends BaseController {

    function check($config) {
        $roles = array();
        $uri = $_SERVER['REQUEST_URI'];

        foreach ($config['roles'] as $role => $val) {
            foreach ($val as $u) {

                if (preg_match('/' . str_replace('/', '\/', $u) . '/',$uri)) {
                    $roles[] = $role;
                }
            }
        }
        if (count($roles) == 0) {
            return true;
        }

        $auth = new \App\Usuario\Service\Auth();
        $session = $auth->getSession();
        if (!isset($session['id_usuario'])) {
            $this->msgAviso('Faça o login para acessar a página solicitada');
            $this->redirect('/usuario/login?redirect='.$uri);
        }
        $rolesUsuario = $auth->getRole();

        $permitido = false;
        foreach ($rolesUsuario as $r) {
            if (in_array($r, $roles)) {
                $permitido = true;
            }
        }

        return $permitido;
    }

}

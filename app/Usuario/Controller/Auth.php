<?php

namespace App\Usuario\Controller;

use App\Base\Controller\BaseController;

class Auth extends BaseController {

    function check($module, $controller, $action) {
        global $e, $config;
        
        if(isset($config['module'][$module]['public']) && $config['module'][$module]['public'] == true){
            return;
        }


        if ($controller == 'App\Usuario\Controller\Usuario' && $action == 'login') {
            return;
        }

        $auth = new \App\Usuario\Service\Auth();

        $session = $auth->getSession();
        $uri = $_SERVER['REQUEST_URI'];

        if (!isset($session['id_usuario'])) {
            $this->msgAviso('Faça o login para acessar a página solicitada');
            $this->redirect('/usuario/login?redirect=' . $uri);
        }
        $rolesUsuario = $auth->getRole();

        if ($module == 'Admin') {
            if (in_array('admin', $rolesUsuario)) {
                return;
            }
        }


        $e->trigger('notAllow', [$module, $controller, $action]);
    }

}

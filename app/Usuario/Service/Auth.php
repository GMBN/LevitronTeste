<?php

namespace App\Usuario\Service;

use App\Usuario\Model\UsuarioSession;
use App\Usuario\Model\Usuario as UsuarioModel;
use App\Usuario\Model\Role as RoleModel;

class Auth {

    function getSession() {
        if (isset($_COOKIE["token_login"])) {
            $codigo = $_COOKIE["token_login"];
            $session = new UsuarioSession();
            return $session->findCodigo($codigo);
        }
        return false;
    }

    function getUsuario() {
        $session = $this->getSession();
        $usuario = new UsuarioModel();
        if ($session) {
            return $usuario->findId($session['id_usuario']);
        }
        return false;
    }

    function getRole() {
        $roles = array();
        $session = $this->getSession();
        $usuario = new RoleModel();
        $rs = $usuario->findUsuario($session['id_usuario']);
        foreach ($rs as $r) {
            $roles[] = $r['nome'];
        }
        return $roles;
    }

    function getIdUsuario() {
        $session = $this->getSession();
        if ($session) {
            return $session['id_usuario'];
        }
        return false;
    }

}

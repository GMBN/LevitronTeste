<?php

namespace App\Base\Controller;

abstract class BaseController {

    function isPost() {
        return ($_SERVER['REQUEST_METHOD'] == 'POST');
    }

    function isGet() {
        return ($_SERVER['REQUEST_METHOD'] == 'GET');
    }

    function redirect($url) {
        header('location: ' . $url);
        die();
    }

    function isAjax() {
        if (strtolower(filter_input(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest') {
            return true;
        }
        return false;
    }

    function msgErro($msg) {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['msg_erro'][] = $msg;
    }

    function msgSucesso($msg) {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['msg_sucesso'][] = $msg;
    }

    function msgAviso($msg) {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['msg_aviso'][] = $msg;
    }

    function auth() {
        return new \App\Usuario\Service\Auth();
    }
    function getIp(){
        return $_SERVER['REMOTE_ADDR'];
    }

}

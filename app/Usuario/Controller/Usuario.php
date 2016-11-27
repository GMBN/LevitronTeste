<?php

namespace App\Usuario\Controller;

use App\Usuario\Model\Usuario as UsuarioModel;
use App\Base\Controller\BaseController;
use App\Usuario\Model\UsuarioSession;

class Usuario extends BaseController {
    
    use \App\Usuario\Service\SafeTrait;

    function login() {
        //Verifica se o usuário já está logado
        $usuario = $this->auth()->getUsuario();
        if (isset($usuario['id'])) {
            //Verifica a pagina para redirecionamento
            if ($usuario['tipo'] == 2) {
                $redirect_default = '/admin';
            } else {
                $redirect_default = '/painel';
            }
            $this->redirect($redirect_default);
        }
        if ($this->isPost()) {
            $post = new UsuarioModel();
            $email = $_POST['email'];
            $senha = $this->gerarSenha($_POST['senha']);
            $rs = $post->login($email, $senha);
            $redirect = isset($_POST['redirect']) ? $_POST['redirect'] : null;
            if (isset($rs['id'])) {

                //Verifica se o usuário está ativo
                if ($rs['ativo'] == 2) {
                    $this->msgErro("O Usuário está desativado");
                    $this->redirect('/usuario/login?redirect=' . $redirect);
                }
                //Inicia a sessao do usuario
                $this->session($rs['id']);

                //Verifica a pagina para redirecionamento
                if ($rs['tipo'] == 2) {
                    $redirect_default = '/admin';
                } else {
                    $redirect_default = '/painel';
                }
                if (empty($redirect)) {
                    $redirect = $redirect_default;
                }
                $this->redirect($redirect);
            }
            $this->msgErro("Usuário ou senha inválio");
            $this->redirect('/usuario/login?redirect=' . $redirect);
        }

        return [];
    }

    function session($id_usuario) {
        $uniq = uniqid(rand(), true);
        $hash = $id_usuario . '_' . $uniq . microtime();
        $dataAtual = new \DateTime('now');
        $dataAtual->add(new \DateInterval('P30D'));
        $codigo = md5(md5($hash));

        $session = new UsuarioSession();
        $session->setAtivo(8);
        $session->setCodigo($codigo);
        $session->setExpira($dataAtual->format('Y-m-d H:i:s'));
        $session->setIdUsuario($id_usuario);
        $session->insert();
        setcookie('token_login', $codigo, time() + 60 * 60 * 24 * 30, '/');
    }

    function sair() {
        $auth = $this->auth()->getSession();
        if ($auth) {
            $session = new UsuarioSession();
            $session->setAtivo(1);//desativa a sessao
            $session->update('codigo =:codigo', ['codigo' => $auth['codigo']]);
            $this->redirect('/usuario/login');
        }
    }
   
}

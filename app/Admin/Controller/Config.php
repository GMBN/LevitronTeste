<?php

namespace App\Admin\Controller;

use App\Admin\Model\Config as Model;
use App\Base\Controller\BaseController;

class Config extends BaseController {

    function save($id_post) {
        if ($this->isPost()) {
            $dados = $_POST;
            foreach ($_POST as $chave => $valor) {
                $model = new Model();
                $model->setChave($chave);
                $model->setValor($valor);
                $model->update("chave=:c", ['c' => $chave]);
            }
            $this->msgSucesso("Configurações salvas com sucesso");
            $this->redirect("/admin/config");
        }
        $this->redirect("/admin/config");
    }

    function index() {
        $post = new Model();
        $rs = $post->listConfig();
        return['rs' => $rs];
    }

}

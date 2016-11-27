<?php

namespace App\Blog\Controller;

use App\Blog\Model\Comentario as ComentarioModel;
use App\Base\Controller\BaseController;
use App\Usuario\Model\Notificacao;

class Comentario extends BaseController {

    function view($id_post) {
        $model = new ComentarioModel();
        $rs = $model->findPost($id_post);
        return ["_template" => false, "rs" => $rs];
    }

    function add() {
        if ($this->isPost()) {
            $usuario = $this->auth()->getIdUsuario();
            $data = $_POST;
            $data['ip'] = $this->getIp();
            $data['situ'] = 8; //seta o comentario como ativo
            $model = new ComentarioModel();
            if ($usuario) {
                $data['id_usuario'] = $usuario; //seta o usuario logado
            }
            $model->hydrate($data);
            $model->insert();
            $id_com = $model->getLastInsertId();

            //insere a notificacao

            $noty = new Notificacao();
            $noty->setRole('editor');
            if ($usuario) {
                $noty->setIdAutor($usuario);
            }
            $noty->setTitulo('Novo Comentário no post ' . $data['id_post']);
            $noty->setLink('/admin/blog/comentario/edit/' . $id_com);
            $noty->insert();
            echo json_encode(['success' => true]);
            exit();
        }
        echo json_encode(['success' => false]);
        exit();
    }

}

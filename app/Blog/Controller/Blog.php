<?php

namespace App\Blog\Controller;

use App\Blog\Model\Post as PostModel;
use App\Blog\Model\PostVisualizacao;
use \App\Base\Controller\BaseController;

class Blog extends BaseController {

    function post($categoria, $slug) {
        $id_usuario = $this->auth()->getIdUsuario();

        $post = new PostModel();
        $rs = $post->findSlug($categoria, $slug);
        if ($rs) {
            //armazena a visualizacao
            $pv = new PostVisualizacao();
            if (!empty($id_usuario)) {
                $pv->setIdUsuario($id_usuario);
            }
            $pv->setIdPost($rs['id']);
            $pv->setIp($this->getIp());
            $pv->insert();

            return ["rs" => $rs];
        }
        return 404;
    }

    function index() {
        $post = new PostModel();
        $rs = $post->findList();
        return ["rs" => $rs];
    }

    function ultimos() {
        $post = new PostModel();
        $rs = $post->findList(10);
        return ["_template" => false, "rs" => $rs];
    }

}

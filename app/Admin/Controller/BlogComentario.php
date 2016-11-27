<?php

namespace App\Admin\Controller;

use App\Blog\Model\Comentario as Model;
use App\Base\Controller\BaseController;
use App\Admin\Form\BlogComentario as Form;

class BlogComentario extends BaseController {

    function edit($id) {
        $objForm = new Form();
        $post = new Model();

        if ($this->isGet()) {
            $rs = $post->findId($id);
            $form = $objForm->form($rs);
            return ["rs" => $rs, "form" => $form];
        }
        if ($this->isPost()) {
            $post->hydrate($_POST);
            $post->update('id=:id', ['id' => $id]);
            return $this->redirect('/admin/blog/comentario');
        }
    }
    
    function post($id_post) {
        $post = new Model();
        $rs = $post->findPost($id_post,false);
        return['_template'=>false,'rs' => $rs];
    }

    function index() {
        $post = new Model();
        $rs = $post->findAll();
        return['result' => $rs];
    }

}

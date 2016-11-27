<?php

namespace App\Admin\Controller;

use App\Blog\Model\Categoria as Model;
use App\Base\Controller\BaseController;
use App\Admin\Form\BlogCategoria as Form;

class BlogCategoria extends BaseController {

    use \App\Base\Service\SlugTrait;

    function add() {
        $objForm = new Form();
        $post = new Model();

        if ($this->isGet()) {
            $form = $objForm->form();
            return ["form" => $form];
        }
        if ($this->isPost()) {
            $_POST['slug'] = $this->gerarSlug($_POST['titulo']);
            $post->hydrate($_POST);
            $post->insert();
            return $this->redirect('/admin/blog/categoria');
        }
    }

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
            return $this->redirect('/admin/blog/categoria');
        }
    }

    function index() {
        $post = new Model();
        $rs = $post->findAll();
        return['result' => $rs];
    }

}

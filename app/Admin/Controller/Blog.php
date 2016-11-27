<?php

namespace App\Admin\Controller;

use App\Blog\Model\Post as PostModel;
use App\Base\Controller\BaseController;
use App\Admin\Form\Blog as BlogForm;
use Intervention\Image\ImageManagerStatic as Image;


class Blog extends BaseController {

    use \App\Base\Service\SlugTrait;
    
    function add() {
        $objForm = new BlogForm();
        $post = new PostModel();

        if ($this->isGet()) {
            $data = ['autor'=>  $this->auth()->getIdUsuario()];//seta o usuário logado como autor
            $form = $objForm->post($data);
            return ["form" => $form];
        }
        if ($this->isPost()) {
            $_POST['slug']=  $this->gerarSlug($_POST['titulo']);
            $post->hydrate($_POST);
            $post->insert();
            $id = $post->getLastInsertId();
            return $this->redirect('/admin/blog/post/edit/'.$id);
        }
    }

    function edit($id) {
        $objForm = new BlogForm();
        $post = new PostModel();

        if ($this->isGet()) {
            $rs = $post->findId($id);
            $form = $objForm->post($rs);
            return ["rs" => $rs, "form" => $form];
        }
        if ($this->isPost()) {
            $post->hydrate($_POST);
            $post->update('id=:id', ['id' => $id]);
            return $this->redirect('/admin/blog/post');
        }
    }

    function post() {
        $post = new PostModel();
        $rs = $post->findGrid();
        return['result' => $rs];
    }

    function img() {
        if ($this->isPost()) {
            $post = $_POST['id_post'];
            // open an image file
            $img = Image::make($_FILES['img']['tmp_name']);

            $url = '/img/blog/' . $post . '_' . md5(uniqid(rand(), true)) . '.jpg';

            // resize image instance
            $img->resize(360, 200);

            // save image in desired format
            $img->save(ROOT . '/public' . $url);

            $model = new PostModel();
            $model->setImg($url);
            $model->update('id = :id', ['id' => $post]);
            echo json_encode(['sucesso' => true, 'url' => $url]);
        }
        exit;
    }

    function index() {
        return ["par"];
    }

}

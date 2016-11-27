<?php

namespace App\Admin\Controller;

use App\Blog\Model\Galeria as Model;
use App\Base\Controller\BaseController;
use Intervention\Image\ImageManagerStatic as Image;

class BlogGaleria extends BaseController {

//    function index($id) {
//        $objForm = new Form();
//        $post = new Model();
//
//        if ($this->isGet()) {
//            $rs = $post->findId($id);
//            $form = $objForm->form($rs);
//            return ["rs" => $rs, "form" => $form];
//        }
//        if ($this->isPost()) {
//            $post->hydrate($_POST);
//            $post->update('id=:id', ['id' => $id]);
//            return $this->redirect('/admin/blog/comentario');
//        }
//    }
    
    function upload() {
        if($this->isPost()){
           // open an image file
            $img = Image::make($_FILES['file']['tmp_name']);
            $name = md5(uniqid(rand(), true)) . '.jpg';
            $url = '/img/blog/'.$name;

            // save image in desired format
            $img->save(ROOT . '/public' . $url);
            
            
            //salva a miniatura da imagem
            $h = (150 * $img->getHeight()) / $img->getWidth();
            // resize image instance            
            $img->resize(150,$h);          
            $img->save(ROOT . '/public/img/blog/150x/'.$name);
           

            $model = new Model();
            $model->setArquivo($url);
            $model->setTipo($_FILES['file']['type']);
            $model->setNomeAntigo($_FILES['file']['name']);
            $model->setTamanho($_FILES['file']['size']);
            $model->setNome($name);
            $model->insert();
            echo json_encode(['sucesso' => true, 'url' => $url]);
        }
        exit();
    }

    function index() {
        $retorno = [];
        if(isset($_GET['insert'])){
            $retorno['_template'] = false;
        }
        $post = new Model();
        $rs = $post->findAll();
        $retorno['rs'] = $rs;
        return $retorno;
    }
    
    function view() {
        $post = new Model();
        $rs = $post->findAll();
        return['_template'=>false,'rs' => $rs];
    }

}

<?php

namespace App\Admin\Controller;

use App\Usuario\Model\Usuario as UsuarioModel;
use App\Base\Controller\BaseController;
use App\Admin\Form\Usuario as UsuariForm;
use Intervention\Image\ImageManagerStatic as Image;

class Usuario extends BaseController {

    use \App\Usuario\Service\SafeTrait;
    
    function add() {

        if ($this->isGet()) {
            $form = (new UsuariForm())->form();
            return ["form" => $form];
        }
        if ($this->isPost()) {
            $model = new UsuarioModel();
            $_POST['senha'] = $this->gerarSenha($_POST['senha']);
            $model->hydrate($_POST);
            $model->insert();
            $id = $model->getLastInsertId();
            $this->msgSucesso('Usuário adicionado com sucesso');
            return $this->redirect('/admin/usuario/edit/'.$id);
        }
    }

    function edit($id) {
        $objForm = new UsuariForm();
        $model = new UsuarioModel();

        if ($this->isGet()) {
            $rs = $model->findId($id);
            $form = $objForm->form($rs);
            unset($form['senha']);
            return ["rs" => $rs, "form" => $form];
        }
        if ($this->isPost()) {
            $model->hydrate($_POST);
            $model->update('id=:id', ['id' => $id]);
            $this->msgSucesso('Operação realizada com sucesso');
            return $this->redirect('/admin/usuario');
        }
    }
    function editSenha() {      

        if ($this->isPost()) {
            $id = $_POST['id'];
            if($_POST['senha'] != $_POST['confirmar_senha']){
                $this->msgErro('As senhas fornecidas não são iguais.');
            return $this->redirect('/admin/usuario/edit/'.$id);
            }
            $senha = $this->gerarSenha($_POST['senha']);
            $model = new UsuarioModel();
            $model->setSenha($senha);
            $model->update('id=:id', ['id' => $id]);
            $this->msgSucesso('Senha alterada com sucesso');
            return $this->redirect('/admin/usuario/edit/'.$id);
        }
    }

    function img() {
        if ($this->isPost()) {
            $usuario = $_POST['id_usuario'];
            // open an image file
            $img = Image::make($_FILES['img']['tmp_name']);

            $url = '/img/usuario/' . $usuario . '_' . md5(uniqid(rand(), true)) . '.jpg';

            // resize image instance
            $img->resize(150, 130);

            // save image in desired format
            $img->save(ROOT . '/public' . $url);

            $model = new UsuarioModel();
            $model->setImg($url);
            $model->update('id = :id', ['id' => $usuario]);
            echo json_encode(['sucesso' => true, 'url' => $url]);
        }
        exit;
    }

    function model() {
        $model = new PostModel();
        $rs = $model->findAll();
        return['result' => $rs];
    }

    function index() {
        $model = new UsuarioModel();
        $rs = $model->findAll();
        return['result' => $rs];
    }

}

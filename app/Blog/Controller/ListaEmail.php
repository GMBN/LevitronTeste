<?php

namespace App\Blog\Controller;

use App\Blog\Model\ListaEmail as Model;

class ListaEmail {

    function save() {
        if (isset($_POST['email'])) {
            $model = new Model();
            $model->setEmail($_POST['email']);
            $model->setIp($_SERVER['REMOTE_ADDR']);
            $model->insert();
            echo json_encode(['success'=>true]);
            exit();
        }
        
        echo json_encode(['success'=>false]);
        exit();
    }

}

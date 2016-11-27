<?php

namespace App\Usuario\Controller;

use App\Usuario\Model\Notificacao as Model;
use App\Usuario\Model\NotificacaoVisualizada as Visualizada;
use App\Base\Controller\BaseController;

class Notificacao extends BaseController {

    use \App\Base\Service\SlugTrait;

    function listNew(){
        $usuario = $this->auth()->getIdUsuario();
        
        $model = new Model();
        $rs =$model->listNew($usuario);
        return ['_template'=>false,'rs'=>$rs];
    }
    
    function noty($id_noty){
        $model = new Model();
        $rs = $model->findId($id_noty); 
        
        $usuario = $this->auth()->getIdUsuario();
        $visualizado = new Visualizada();
        $visualizado->setIdUsuario($usuario);//notificacao visualizada
        $visualizado->setIdNotificacao($rs['id']);
        $visualizado->insert();        
               
        $this->redirect($rs['link']);
    }

}

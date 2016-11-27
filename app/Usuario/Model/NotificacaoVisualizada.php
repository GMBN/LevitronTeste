<?php

namespace App\Usuario\Model;

use App\Base\Model\Model;

class NotificacaoVisualizada extends Model {

    protected $_table = "notificacao_visualizada";
    protected $id_usuario;
    protected $id_notificacao;

    function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
        return $this;
    }

    function setIdNotificacao($id_notificacao) {
        $this->id_notificacao = $id_notificacao;
        return $this;
    }

}

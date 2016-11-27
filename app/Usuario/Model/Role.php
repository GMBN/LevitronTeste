<?php

namespace App\Usuario\Model;

use App\Base\Model\Model;

class Role extends Model {

    protected $_table = "usuario_role";
    protected $id;
    protected $id_usuario;
    protected $nome;

    function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
        return $this;
    }

    function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }
    
    function findUsuario($id_usuario) {
        $sql = 'Select * from ' . $this->_table . ' where id_usuario = :id_usuario';
        $par = ['id_usuario'=>$id_usuario];
        $rs = $this->query($sql,$par);
        return $rs;
    }
}

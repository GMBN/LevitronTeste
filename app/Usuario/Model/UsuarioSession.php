<?php

namespace App\Usuario\Model;

use App\Base\Model\Model;

class UsuarioSession extends Model {

    protected $_table = "usuario_session";
    protected $id;
    protected $id_usuario;
    protected $codigo;
    protected $expira;
    protected $ativo;

    function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
        return $this;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
        return $this;
    }

    function setExpira($expira) {
        $this->expira = $expira;
        return $this;
    }

    function setAtivo($ativo) {
        $this->ativo = $ativo;
        return $this;
    }

    function findCodigo($codigo) {
        $sql = 'Select * from ' . $this->_table . ' where codigo = :codigo AND ativo=8';
        $par = ['codigo' => $codigo];
        $rs = $this->query($sql, $par);
        if ($rs) {
            return $rs[0];
        }
        return false;
    }

}

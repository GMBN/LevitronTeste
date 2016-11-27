<?php

namespace App\Usuario\Model;

use App\Base\Model\Model;

class Notificacao extends Model {

    protected $_table = "notificacao";
    protected $id;
    protected $id_autor;
    protected $titulo;
    protected $msg;
    protected $role;
    protected $id_usuario;
    protected $link;

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setIdAutor($id_autor) {
        $this->id_autor = $id_autor;
        return $this;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    function setMsg($msg) {
        $this->msg = $msg;
        return $this;
    }

    function setRole($role) {
        $this->role = $role;
        return $this;
    }

    function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
        return $this;
    }
    
    function setLink($link) {
        $this->link = $link;
        return $this;
    }

    function countNew($id_usuario) {
        $sql = "select count(*) as qtde from " . $this->_table . " n
               LEFT JOIN notificacao_visualizada  v on (v.id_notificacao = n.id AND v.id_usuario=:usuario)
               WHERE v.id IS NULL
               AND (n.id_autor <> :usuario OR n.id_autor IS NULL)";
        
        $par = ['usuario'=>$id_usuario];
        $rs = $this->query($sql,$par);
        if ($rs) {
            return $rs[0]['qtde'];
        }
        return false;
    }

    function listNew($id_usuario) {
        $sql = "select n.*,u.nome u_nome,u.img u_img from " . $this->_table . " n
               LEFT JOIN usuario u on n.id_autor=u.id
               LEFT JOIN notificacao_visualizada  v on (v.id_notificacao = n.id AND v.id_usuario=:usuario)
               WHERE v.id IS NULL
               AND (n.id_autor <> :usuario OR n.id_autor IS NULL)
               ORDER BY n.created DESC";
         $par = ['usuario'=>$id_usuario];
        $rs = $this->query($sql,$par);
        if ($rs) {
            return $rs;
        }
        return false;
    }

    function findId($id) {
        $sql = "select * from " . $this->_table . " where id=:id";
        $par = ['id' => $id];
        
        $rs = $this->query($sql, $par);
        if ($rs) {
            return $rs[0];
        }
        return false;
    }

}

<?php

namespace App\Blog\Model;

use App\Base\Model\Model;

class Comentario extends Model {

    protected $_table = "blog_comentario";
    protected $id;
    protected $id_post;
    protected $nome;
    protected $email;
    protected $msg;
    protected $id_usuario;
    protected $id_comentario;
    protected $ip;
    protected $situ;

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    function setMsg($msg) {
        $this->msg = $msg;
        return $this;
    }

    function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
        return $this;
    }

    function setIdComentario($id_comentario) {
        $this->id_comentario = $id_comentario;
        return $this;
    }

    function setIdPost($id_post) {
        $this->id_post = $id_post;
        return $this;
    }

    function setIp($ip) {
        $this->ip = $ip;
        return $this;
    }

    function setSitu($situ) {
        $this->situ = $situ;
        return $this;
    }

    function findId($id) {
        $sql = 'Select c.*,p.titulo as post_titulo from ' . $this->_table . ' c
                INNER JOIN blog_post p on p.id = c.id_post
                where c.id = :id';
        $par = ['id' => $id];
        $rs = $this->query($sql, $par);
        return $rs[0];
    }

    function findPost($id_post, $situ = 8) {

        $sql = 'Select c.*,u.nome as u_nome,u.img as u_img from ' . $this->_table . ' c
              LEFT JOIN usuario u ON u.id=c.id_usuario
              where c.id_post = :id_post';
             
        
        if ($situ) {
            $sql .= ' AND situ = 8';//retorna apenas os ativos
        }
        $sql .= ' ORDER BY c.id ASC';
        $par = ['id_post' => $id_post];
        $rs = $this->query($sql, $par);
        return $rs;
    }

    function findAll($where = null) {
        $sql = 'SELECT c.*,p.titulo as post_titulo FROM ' . $this->_table . ' c';
        if (is_array($where)) {
            $sql .=' WHERE ';
            foreach ($where as $col => $val) {
                $sql_where[] = $col . '=:' . $col;
            }
            $sql.= ' ' . implode(' AND ', $sql_where);
        }
        $sql.= ' INNER JOIN blog_post p on p.id = c.id_post ';
        $sql.=' ORDER BY c.id DESC';
        $rs = $this->query($sql, $where);
        return $rs;
    }

}

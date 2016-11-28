<?php

namespace App\Usuario\Model;

use App\Base\Model\Model;

class Usuario extends Model {

    protected $_table = "usuario";
    protected $id;
    protected $img;
    protected $nome;
    protected $email;
    protected $senha;
    protected $sobre;
    protected $facebook;
    protected $twitter;
    protected $google;
    protected $tipo;
    protected $ativo;

    function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    function setSenha($senha) {
        $this->senha = $senha;
        return $this;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
        return $this;
    }

    function setAtivo($ativo) {
        $this->ativo = $ativo;
        return $this;
    }

    function setSobre($sobre) {
        $this->sobre = $sobre;
        return $this;
    }

    function setImg($img) {
        $this->img = $img;
        return $this;
    }

    function setFacebook($facebook) {
        $this->facebook = $facebook;
        return $this;
    }

    function setTwitter($twitter) {
        $this->twitter = $twitter;
        return $this;
    }

    function setGoogle($google) {
        $this->google = $google;
        return $this;
    }

    function findSlug($slug) {
        $sql = 'Select * from ' . $this->_table . ' where slug = :slug';
        $par = ['slug' => $slug];
        $rs = $this->query($sql, $par);
        return $rs[0];
    }

    function findId($id) {
        $sql = 'Select * from ' . $this->_table . ' where id = :id';
        $par = ['id' => $id];
        $rs = $this->query($sql, $par);
        return $rs[0];
    }

    function login($email, $senha) {
        $sql = 'Select * from ' . $this->_table . ' where email=:email and senha=:senha';
        $par = array();
        $par['email'] = $email;
        $par['senha'] = $senha;
        $rs = $this->query($sql, $par);
        return $rs[0];
    }

    function findAutor() {
        $sql = 'Select id as value,nome as text from ' . $this->_table;
        $rs = $this->query($sql);
        return $rs;
    }

}

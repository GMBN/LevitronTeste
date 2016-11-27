<?php

namespace App\Blog\Model;

use App\Base\Model\Model;

class Categoria extends Model {

    protected $_table = "blog_categoria";
    protected $id;
    protected $titulo;
    protected $slug;

    function getId() {
        return $this->id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getSlug() {
        return $this->slug;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    function findSlug($slug) {
        $sql = 'SELECT
                c.titulo c_titulo,
                c.slug c_slug,
                p.titulo p_titulo,
                p.resumo p_resumo,
                p.slug p_slug,
                p.img p_img,
                p.created p_created,
                u.nome nome_autor
                from ' . $this->_table . ' c 
               INNER JOIN blog_post p ON p.id_categoria=c.id
               INNER JOIN usuario u on u.id = p.autor
               WHERE c.slug = :slug';

        $par = ['slug' => $slug];
        $rs = $this->query($sql, $par);
        return $rs;
    }

    function findId($id) {
        $sql = 'Select * from ' . $this->_table . ' where id = :id';
        $par = ['id' => $id];
        $rs = $this->query($sql, $par);
        return $rs[0];
    }

    function findOpt() {
        $sql = 'Select id as value,titulo as text from ' . $this->_table;
        $rs = $this->query($sql);
        return $rs;
    }

}

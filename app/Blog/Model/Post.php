<?php

namespace App\Blog\Model;

use App\Base\Model\Model;

class Post extends Model {

    protected $_table = "blog_post";
    protected $id;
    protected $id_categoria;
    protected $img;
    protected $titulo;
    protected $conteudo;
    protected $resumo;
    protected $slug;
    protected $autor;
    protected $ativo;

    function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
        return $this;
    }

    function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    function setAtivo($ativo) {
        $this->ativo = $ativo;
        return $this;
    }

    function setIdCategoria($id_categoria) {
        $this->id_categoria = $id_categoria;
        return $this;
    }

    function setResumo($resumo) {
        $this->resumo = $resumo;
        return $this;
    }

    function setAutor($autor) {
        $this->autor = $autor;
        return $this;
    }

    function setImg($img) {
        $this->img = $img;
        return $this;
    }

    function findSlug($categoria, $slug) {
        $sql = 'SELECT 
                p.*,
                u.nome autor_nome,
                u.sobre autor_sobre,
                u.img autor_img,
                u.facebook u_facebook,
                u.twitter u_twitter,
                u.google u_google,
                (
                SELECT count(*) as comentario
                FROM blog_comentario 
                WHERE id_post=p.id
                AND situ=8
                GROUP BY id_post 
                ) as comentario,
                c.titulo c_titulo,
                c.slug c_slug
                
                FROM ' . $this->_table . ' p 
               INNER JOIN usuario u on u.id = p.autor
               INNER JOIN blog_categoria c on c.id = p.id_categoria
               WHERE p.slug = :slug 
               AND p.ativo = 8 
               AND c.slug= :categoria';

        $par = ['slug' => $slug, 'categoria' => $categoria];
        $rs = $this->query($sql, $par);
        
        if (isset($rs[0])) {
            return $rs[0];
        }
        return false;
    }

    function findId($id) {
        $sql = 'Select p.*, c.slug c_slug from ' . $this->_table . ' p
               INNER JOIN blog_categoria c on c.id = p.id_categoria
               where p.id = :id';
        $par = ['id' => $id];
        $rs = $this->query($sql, $par);
        return $rs[0];
    }

    function findList($limit = 20, $offset = 0) {
        $sql = 'SELECT 
                p.titulo p_titulo,
                p.resumo p_resumo,
                p.slug p_slug,
                p.img p_img,
                p.created p_created,
                c.slug c_slug,
                (
                SELECT count(*) as comentario
                FROM blog_comentario 
                WHERE id_post=p.id
                GROUP BY id_post 
                ) as comentario,
                u.nome as nome_autor 
                FROM ' . $this->_table . ' p
               INNER JOIN usuario u on u.id = p.autor
               INNER JOIN blog_categoria c on c.id = p.id_categoria
               WHERE p.ativo = 8
               ORDER BY p.id DESC
               LIMIT :limit OFFSET :offset';

        $par = ['limit' => $limit, 'offset' => $offset];

        $rs = $this->query($sql, $par);
        return $rs;
    }

    function findGrid() {
        $sql = 'SELECT
            p.id,p.titulo,
            p.created,
            p.slug,
            p.ativo,
            a.slug as slug_cat,
            (
            SELECT count(*) as comentario
            FROM blog_comentario 
            WHERE id_post=p.id
            ) as comentario,
            (
            SELECT count(*) as visualizacao
            FROM blog_post_visualizacao
            WHERE id_post=p.id
            ) as visualizacao,
            (
            SELECT count(DISTINCT ip) as visualizacao
            FROM blog_post_visualizacao
            WHERE id_post=p.id
            ) as visualizacao_unica
            
            FROM ' . $this->_table . ' p
            INNER JOIN blog_categoria a on a.id=p.id_categoria
            ORDER BY p.id DESC';
        $rs = $this->query($sql);
        return $rs;
    }

}

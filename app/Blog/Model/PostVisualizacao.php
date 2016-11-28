<?php

namespace App\Blog\Model;

use App\Base\Model\Model;

class PostVisualizacao extends Model {

    protected $_table = "blog_post_visualizacao";
    protected $id_post;
    protected $id_usuario;
    protected $ip;
    
    function setIdPost($id_post) {
        $this->id_post = $id_post;
        return $this;
    }

    function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
        return $this;
    }

    function setIp($ip) {
        $this->ip = $ip;
        return $this;
    }
  

}

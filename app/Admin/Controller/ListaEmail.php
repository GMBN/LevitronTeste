<?php

namespace App\Admin\Controller;

use App\Blog\Model\ListaEmail as Model;

class ListaEmail {

    function index() {
        $post = new Model();
        $rs = $post->findAll();
        return['result' => $rs];
    }

}

<?php
namespace App\Blog\Controller;

use App\Blog\Model\Categoria as CategoriaModel;

class Categoria{

    function index($slug){       
        $post = new CategoriaModel();
        $rs = $post->findSlug($slug);
//        print_r($rs);
//        exit();
        return ["rs"=>$rs];
    }
    
    function view(){
        $cat = new CategoriaModel();
        $rs = $cat->findAll();
//        print_r($rs);
//        exit();
        return ["_template"=>false,"rs"=>$rs];
    }
    
}
<?php
namespace App\Blog\Controller;

use App\Blog\Model\Post as PostModel;

class Blog{
    
    function post($categoria,$slug){ 
        $post = new PostModel();
        $rs = $post->findSlug($categoria,$slug);
        return ["rs"=>$rs];
    }
    function index(){       
        $post = new PostModel();
        $rs = $post->findList();
        return ["rs"=>$rs];
    }
    function ultimos(){       
        $post = new PostModel();
        $rs = $post->findList(10);
        return ["_template"=>false,"rs"=>$rs];
    }
    
}
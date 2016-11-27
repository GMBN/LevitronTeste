<?php
namespace App\Blog\Controller;

use App\Blog\Model\Post as PostModel;

class Blog{
    
    function post($slug){ 
        $post = new PostModel();
        $rs = $post->findSlug($slug);
        return ["rs"=>$rs];
    }
    function index(){       
        return ["par"];
    }
    
}
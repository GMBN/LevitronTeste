<?php

return [
    'route' => [
         '/admin/blog/categoria/add' => 'BlogCategoria:add',
        '/admin/blog/categoria/edit/$id' => 'BlogCategoria:edit',
        '/admin/blog/categoria' => 'BlogCategoria:index',
        
        '/admin/blog/comentario' => 'BlogComentario:index',
        '/admin/blog/comentario/edit/$id' => 'BlogComentario:edit',
        '/admin/blog/comentario/post/$id' => 'BlogComentario:post',        
       
        '/admin/blog/post/add' => 'Blog:add',
        '/admin/blog/post/edit/$id' => 'Blog:edit',
        '/admin/blog/post' => 'Blog:post',
        '/admin/blog/post/img' => 'Blog:img',
        
        '/admin/blog/galeria' => 'BlogGaleria:index',
        '/admin/blog/galeria/upload' => 'BlogGaleria:upload',
        '/admin/blog/galeria/view' => 'BlogGaleria:view',
        
        '/admin/usuario' => 'Usuario:index',
        '/admin/usuario/add' => 'Usuario:add',
        '/admin/usuario/edit/$id' => 'Usuario:edit',        
        '/admin/usuario/img' => 'Usuario:img',
        '/admin/usuario/senha' => 'Usuario:editSenha',
        
        '/admin/config' => 'Config:index',
        '/admin/config/save' => 'Config:save',
        
        
        '/admin' => 'Blog:index'
    ],
    'template' => 'admin',
];

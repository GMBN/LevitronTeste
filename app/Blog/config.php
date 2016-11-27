<?php

return [
    'route' => [
        '/blog/post/ultimos' => 'Blog:ultimos',
        
        '/blog/comentario/view/$id_post' => 'Comentario:view',
        '/blog/comentario/add' => 'Comentario:add',
        
        '/blog/categoria/view' => 'Categoria:view',
        '/blog/$categoria/$slug' => 'Blog:post',
        '/blog/$categoria' => 'Categoria:index',
        '/blog/categoria/view' => 'Categoria:view',
        '/blog' => 'Blog:index',
        '/' => 'Blog:index'
    ],
    'template' => 'blog'
];

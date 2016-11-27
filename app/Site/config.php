<?php

return [
    'route'=>[
        '/blog/$slug'=> 'Blog:post',
        '/blog'=> 'Blog:index',
        '/'=> 'Blog:index'
    ],
    'template'=>'blog'
];
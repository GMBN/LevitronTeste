<?php

return [
    'route'=>[
        '/usuario/login'=> 'Usuario:login',
        '/usuario/sair'=> 'Usuario:sair',
        
         '/usuario/notificacao/redirect/$id' => 'Notificacao:noty',
        '/usuario/notificacao/new' => 'Notificacao:listNew',
    ],    
    'template'=>ROOT.'/app/Blog/View/template/blog'
];
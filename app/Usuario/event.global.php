<?php
$e->on('preController',function($module,$controller,$action){
    $auth = new \App\Usuario\Controller\Auth(); 
    $auth->check($module,$controller,$action);
});

$e->on('notAllow',function(){
ECHO 'Não Permitido';
exit();
});


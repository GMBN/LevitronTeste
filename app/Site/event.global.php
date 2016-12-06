<?php

//$e->on('preController', function($module, $controller, $action, $param) {
//    echo "\n SITE GLOBAL controller " . $controller . "\n";
//    echo "Module: " . $module . "\n";
//    echo "Controller: " . $controller . "\n";
//    echo "Action: " . $action . "\n";
//    echo "Param: " . "\n";
//    print_r($param);
//});
//
//$e->on('preRender',function(){
//    echo "SITE GLOBAL antes do Renderizar \n";
//});
////
//$e->on('notFound',function($uri){
//});

new \App\Site\Event\View\Menu();
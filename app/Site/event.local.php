<?php

//$e->on('preController', function($module, $controller, $action, $param) {
//    echo "\n SITE LOCAL controller " . $controller . "\n";
//    echo "Module: " . $module . "\n";
//    echo "Controller: " . $controller . "\n";
//    echo "Action: " . $action . "\n";
//    echo "Param: " . "\n";
//    print_r($param);
//});
//
//
//$e->on('preRender',function($view,$template){
//    echo "SITE LOCAL antes do Renderizar \n";
//    echo "VIEW ".$view. "\n";
//    echo "Template ".$template. "\n";
//    
//});

$e->on('notAllow',function(){

    echo "NÃO PERMITIDO";
});
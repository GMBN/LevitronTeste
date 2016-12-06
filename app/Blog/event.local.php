<?php

//$e->on('preController', function($module, $controller, $action, $param) {
//    echo "\n BLOG LOCAL controller " . $controller . "\n";
//    echo "Module: " . $module . "\n";
//    echo "Controller: " . $controller . "\n";
//    echo "Action: " . $action . "\n";
//    echo "Param: " . "\n";
//    print_r($param);
//});
//
//
//$e->on('preRender',function($view,$template){
//    echo "BLOG LOCAL antes do Renderizar \n";
//    echo "VIEW ".$view. "\n";
//    echo "Template ".$template. "\n";
//    
//});

$e->on('view.gabriel',function(){
   echo 'Gabriel 88888' ;
});


$e->on('view.gabriel',function(){
   echo 'Sonepar' ;
});
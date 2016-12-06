<?php
//
//$e->on('preController', function($module, $controller, $action, $param) {
//    echo "\n BLOG GLOBAL controller " . $controller . "\n";
//    echo "Module: " . $module . "\n";
//    echo "Controller: " . $controller . "\n";
//    echo "Action: " . $action . "\n";
//    echo "Param: " . "\n";
//    print_r($param);
//},888);
//$e->on('preController', function($module, $controller, $action, $param) {
//   global $configModule;
//   print_r($configModule);
//},88);
//
//$e->on('preRender',function($view,$template){
//    echo "BLOG GLOBAL antes do Renderizar \n";
//    echo "VIEW ".$view. "\n";
//    echo "Template ".$template. "\n";
//    
//});

$e->on('notFound',function($uri){
    echo '8888888888888';
});


<?php

$e->on('preController', function($module, $controller, $action, $param) {
    
});
//
//$e->on('preRender',function(){
//    echo "SITE GLOBAL antes do Renderizar \n";
//});
////
//$e->on('notFound',function($uri){
//});

$e->on('view.eventJs', function() {
    global $e;
    $e->trigger('view.addJs', ['/event-manager/assets/js/event-php.js']);
});

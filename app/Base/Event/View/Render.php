<?php

namespace App\Base\Event\View;

class Render {

    protected $js = array();

    function __construct() {
        global $e;
        
        $e->on('view.addJs', function($file) {
            $this->js[] = $file;
        });

        $e->on('view.renderJs', function() {
            $html = '';
            foreach ($this->js as $url) {
                $html =  ' <script src="' . $url . '"></script>' . "\n";
            }
            echo $html;
        });
    }

}

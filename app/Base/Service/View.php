<?php

namespace App\Base\Service;

class View {

    //Adiciona os view helpers
    use \App\Base\Part\ViewHelper,
        \App\Base\Part\Assets,
        \App\Base\Part\Seo;

    function render($dados, $file_view, $file_template, $_template = true) {
        ob_start();
        extract($dados);
        require $file_view;
        $_content = ob_get_clean();

        if ($_template) {
            require $file_template;
        } else {
            echo $_content;
        }
    }

}

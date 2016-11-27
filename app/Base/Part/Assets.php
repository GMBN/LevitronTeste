<?php

namespace App\Base\Part;

trait Assets {
    protected $_css = array();
    protected $_js = array();
    
    function cropper(){
        $this->addCss('/vendor/cropper/cropper.min.css');
        $this->addJs('/vendor/cropper/cropper.min.js');
    }
    
    function addCss($url) {
        $this->_css[] ='<link href="'.$url.'" rel="stylesheet" type="text/css">';
    }
    function addJs($url) {
        $this->_js[] =' <script src="'.$url.'"></script>';
    }
    function renderJs(){
        return implode("\n", $this->_js);
    }
    function renderCss(){
        return implode("\n", $this->_css);
    }
    

}

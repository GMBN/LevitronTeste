<?php

namespace App\Base\Part;

class Seo{
    
    protected  $_head;
    
    function getHead(){
        return $this->_head;
    }
    
   function title($titulo){
       $this->_head.= '<title>'.$titulo.' | SOS Casar</title>'
               . '<meta property="og:title" content="'.$titulo.' | SOS Casar" />';
   }
   function metaDesc($desc){
       $this->_head.= '<meta name="description" content="'.$desc.'"/>'
               . '<meta property="og:description" content="'.$desc.'" />';
   }
   function metaImg($url){
    $this->_head.= ' <meta property="og:image" content="'.$url.'" />';
   }
    
}
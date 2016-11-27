<?php

namespace App\Blog\Model;

use App\Base\Model\Model;

class ListaEmail extends Model {

    protected $_table = "lista_email";
    protected $email;
    protected $ip;
    
    function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    function setIp($ip) {
        $this->ip = $ip;
        return $this;
    }

}

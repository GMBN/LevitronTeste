<?php

namespace App\Admin\Model;

use App\Base\Model\Model;

class Config extends Model {

    protected $_table = "config";
    protected $chave;
    protected $valor;

    function setChave($chave) {
        $this->chave = $chave;
        return $this;
    }

    function setValor($valor) {
        $this->valor = $valor;
        return $this;
    }

    function listConfig() {
        $p = array();
        $sql = 'Select chave,valor from ' . $this->_table;
        $rs = $this->query($sql);
        
        foreach($rs as $r){
            $p[$r['chave']]= $r['valor'];
        }
        return $p;
    }
    
    function getConfig($chave) {
        $sql = 'Select chave,valor from ' . $this->_table;
        $sql.=' where chave=:c';
        $rs = $this->query($sql,['c'=>$chave]);
        return $rs[0]['valor'];
    }

}

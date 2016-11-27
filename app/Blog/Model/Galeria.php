<?php

namespace App\Blog\Model;

use App\Base\Model\Model;

class Galeria extends Model {

    protected $_table = "blog_galeria";
    protected $titulo;
    protected $arquivo;
    protected $nome;
    protected $nome_antigo;
    protected $tipo;
    protected $tamanho;
    
    function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    function setArquivo($arquivo) {
        $this->arquivo = $arquivo;
        return $this;
    }
    function setNomeAntigo($nome_antigo) {
        $this->nome_antigo = $nome_antigo;
        return $this;
    }
    function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
        return $this;
    }

    function setTamanho($tamanho) {
        $this->tamanho = $tamanho;
        return $this;
    }




}

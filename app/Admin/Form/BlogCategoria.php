<?php

namespace App\Admin\Form;

use App\Base\Form\BaseForm;

class BlogCategoria extends BaseForm {

    function form($dados = null) {
        $elem = [
            '_form'=>[
              'method'=>'POST',
            ],
            'titulo' => [
                'type' => 'text',
                'desc' => 'Insira o titulo',
                'label' => 'Titulo',
                'col' => 6
            ],
            'btnSalvar' => [
                'type' => 'submit',
                'desc'=>'Salvar'
            ],
        ];
        return $this->add($elem, $dados);
    }

}

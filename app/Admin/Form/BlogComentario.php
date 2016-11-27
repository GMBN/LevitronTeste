<?php

namespace App\Admin\Form;

use App\Base\Form\BaseForm;

class BlogComentario extends BaseForm {

    function form($dados = null) {
        $elem = [
            '_form'=>[
              'method'=>'POST',
            ],
            'nome' => [
                'type' => 'text',
                'desc' => 'Insira o nome',
                'label' => 'Nome',
                'col' => 6
            ],
            'email' => [
                'type' => 'text',
                'desc' => 'Insira o email',
                'label' => 'E-mail',
                'col' => 6
            ],
             'msg' => [
                'type' => 'textarea',
                'desc' => 'Insira a mensagem',
                'label' => 'Mensagem',
                'col' => 12
            ],
            'situ' => [
                'type' => 'select',
                 'label' => 'Situação',
                'option' =>[
                    8=>'publicado',
                    1=>'inativo'
                ],
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

<?php

namespace App\Admin\Form;

use App\Base\Form\BaseForm;

class Usuario extends BaseForm {

    function form($dados = array()) {
        $elem = [
            '_form' => [
                'method' => 'POST',
            ],
            'nome' => [
                'type' => 'text',
                'desc' => 'Insira o Nome',
                'label' => 'Nome',
                'col' => 12
            ],
            'email' => [
                'type' => 'text',
                'desc' => 'Insira o Email',
                'label' => 'E-mail',
                'col' => 12
            ],
            'senha' => [
                'type' => 'password',
                'desc' => 'Insira a senha',
                'label' => 'Senha',
                'col' => 12
            ],
            'sobre' => [
                'type' => 'textarea',
                'desc' => 'Insira uma descrição',
                'label' => 'Sobre',
                'col' => 12
            ],
            'tipo' => [
                'type' => 'select',
                'label' => 'Tipo',
                'col' => 12,
                'option' => [
                    '1' => 'Normal',
                    '2' => 'Administração'
                ]
            ],
            'ativo' => [
                'type' => 'select',
                'label' => 'Ativo',
                'col' => 12,
                'option' => [
                    '8' => 'Sim',
                    '2' => 'Não'
                ]
            ],
            'btnSalvar' => [
                'type' => 'submit',
                'desc' => 'Salvar'
            ],
        ];
        return $this->add($elem, $dados);
    }

}

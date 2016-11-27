<?php

namespace App\Usuario\Form;

use App\Base\Form\BaseForm;

class Usuario extends BaseForm {

    function login($dados = array()) {
        $elem = [
            '_form'=>[
              'method'=>'POST',
            ],
            'email' => [
                'type' => 'text',
                'desc' => 'Insira o Email',
                'label' => 'E-mail',
                'col' => 6
            ],
            'senha' => [
                'type' => 'password',
                'desc' => 'Insira a senha',
                'label' => 'Senha',
                'col' => 6
            ],
            'btnEntrar' => [
                'type' => 'submit',
                'desc'=>'Entrar'
            ],
        ];
        return $this->add($elem, $dados);
    }

}

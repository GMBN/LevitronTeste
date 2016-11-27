<?php

namespace App\Admin\Form;

use App\Base\Form\BaseForm;

class Blog extends BaseForm {

    function post($dados = null) {
        $elem = [
            '_form' => [
                'method' => 'POST',
                'id' => 'formPost'
            ],
            'id_categoria' => [
                'type' => 'select',
                'label' => 'Categoria',
                'db' => ['\App\Blog\Model\Categoria', 'findOpt'],
                'col' => 12
            ],
            'titulo' => [
                'type' => 'text',
                'desc' => 'Insira o titulo',
                'label' => 'Titulo',
                'col' => 12,
                'attr' => [
                    'maxlength' => 65
                ]
            ],
            'conteudo' => [
                'type' => 'textarea',
                'label' => 'Conteúdo',
                'desc' => 'insira o conteudo',
                'attr' => [
                    'rows' => 20
                ]
            ],
            'resumo' => [
                'type' => 'textarea',
                'label' => 'Resumo',
                'desc' => 'insira o resumo',
                'attr' => [
                    'maxlength' => 155
                ]
            ],
            'autor' => [
                'type' => 'select',
                'label' => 'Autor',
                'db' => ['\App\Usuario\Model\Usuario', 'findAutor'],
                'col' => 6
            ],
            'ativo' => [
                'type' => 'select',
                'label' => 'Publicado?',
                'col' => 5,
                'option' => [
                    '8' => 'Sim',
                    '2' => 'Não'
                ]
            ]
        ];
        return $this->add($elem, $dados);
    }

}

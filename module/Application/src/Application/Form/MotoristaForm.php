<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\Form\Element;

class MotoristaForm extends Form
{
    public function __construct()
    {
        parent::__construct('motorista');

        // Adicionando o campo de Nome
        $this->add([
            'name' => 'nome',
            'type' => Element\Text::class,
            'attributes' => [
                'class' => 'form-control',
                'required' => 'required',
                'maxlength' => 200,
            ],
            'options' => [
                'label' => 'Nome',
            ],
        ]);

        $this->add([
            'name' => 'rg',
            'type' => Element\Text::class,
            'attributes' => [
                'class' => 'form-control input-integer',
                'required' => 'required',
                'maxlength' => 20,
            ],
            'options' => [
                'label' => 'RG',
            ],
        ]);

        $this->add([
            'name' => 'cpf',
            'type' => Element\Text::class,
            'attributes' => [
                'class' => 'form-control input-cpf',
                'required' => 'required',
                'maxlength' => 14,
            ],
            'options' => [
                'label' => 'CPF',
            ],
        ]);

        $this->add([
            'name' => 'telefone',
            'type' => Element\Text::class,
            'attributes' => [
                'class' => 'form-control input-phone',
                'maxlength' => 20,
            ],
            'options' => [
                'label' => 'Telefone',
            ],
        ]);

        $this->add([
            'name' => 'veiculo',
            'type' => Element\Select::class,
            'options' => [
                'label' => 'Veículo',
                'empty_option' => 'Selecione um veículo',
            ],
            'attributes' => [
                'class' => 'form-select select2',
                'required' => 'required',
            ],
        ]);

        $this->add([
            'name' => 'cadastrar',
            'type' => Element\Submit::class,
            'attributes' => [
                'value' => 'Cadastrar',
                'id'    => 'submitbtn',
            ],
        ]);

        $this->setInputFilter($this->createInputFilter());
    }

    private function createInputFilter()
    {
        $inputFilter = new InputFilter();

        $inputFilter->add([
            'name' => 'nome',
            'required' => true,
            'validators' => [
                [
                    'name'    => 'NotEmpty',
                    'options' => ['messages' => ['isEmpty' => 'O nome é obrigatório']],
                ],
                [
                    'name'    => 'StringLength',
                    'options' => [
                        'max'     => 200,
                        'messages' => [
                            \Zend\Validator\StringLength::TOO_LONG => 'O nome não pode ter mais de 200 caracteres.',
                        ],
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'rg',
            'required' => true,
            'validators' => [
                [
                    'name'    => 'NotEmpty',
                    'options' => ['messages' => ['isEmpty' => 'O RG é obrigatório']],
                ],
                [
                    'name'    => 'StringLength',
                    'options' => [
                        'max'     => 20,
                        'messages' => [
                            \Zend\Validator\StringLength::TOO_LONG => 'O RG não pode ter mais de 20 caracteres.',
                        ],
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'cpf',
            'required' => true,
            'validators' => [
                [
                    'name'    => 'NotEmpty',
                    'options' => ['messages' => ['isEmpty' => 'O CPF é obrigatório']],
                ],
                [
                    'name'    => 'StringLength',
                    'options' => [
                        'max'     => 14,
                        'messages' => [
                            \Zend\Validator\StringLength::TOO_LONG => 'O CPF não pode ter mais de 14 caracteres.',
                        ],
                    ],
                ],
            ],
        ]);

        // Filtro para o campo 'phone'
        $inputFilter->add([
            'name' => 'telefone',
            'required' => false,
            'validators' => [
                [
                    'name'    => 'StringLength',
                    'options' => [
                        'max'     => 20,
                        'messages' => [
                            \Zend\Validator\StringLength::TOO_LONG => 'O telefone não pode ter mais de 20 caracteres.',
                        ],
                    ],
                ],
            ],
        ]);
        $inputFilter->add([
            'name' => 'veiculo',
            'required' => false,
        ]);

        return $inputFilter;
    }
}

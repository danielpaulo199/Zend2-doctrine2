<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\Validator;
use Zend\Form\Element;

class VeiculoForm extends Form
{
    public function __construct()
    {
        parent::__construct('vehicle');
        $this->setAttribute('method', 'post');

        $this->add([
            'name' => 'placa',
            'type' => Element\Text::class,
            'attributes' => [
                'required' => 'required',
                'maxlength' => 7
            ],
        ]);

        $this->add([
            'name' => 'renavam',
            'type' => Element\Text::class,
            'attributes' => [
                'required' => false,
                'maxlength' => 30
            ],
        ]);

        $this->add([
            'name' => 'modelo',
            'type' => Element\Text::class,
            'attributes' => [
                'required' => 'required',
                'maxlength' => 20
            ],
        ]);

        $this->add([
            'name' => 'marca',
            'type' => Element\Text::class,
            'attributes' => [
                'required' => 'required',
                'maxlength' => 20
            ],
        ]);

        $this->add([
            'name' => 'ano',
            'type' => Element\Text::class,
            'attributes' => [
                'required' => 'required',
                'maxlength' => 4
            ],
        ]);

        $this->add([
            'name' => 'cor',
            'type' => Element\Text::class,
            'attributes' => [
                'required' => 'required',
                'maxlength' => 20
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
            'name' => 'placa',
            'required' => true,
            'validators' => [
                [
                    'name' => Validator\NotEmpty::class,
                    'options' => [
                        'messages' => [
                            Validator\NotEmpty::IS_EMPTY => 'Placa é obrigatória',
                        ],
                    ],
                ],
                [
                    'name' => Validator\StringLength::class,
                    'options' => [
                        'max' => 7,
                        'messages' => [
                            Validator\StringLength::TOO_LONG => 'Placa deve ter no máximo 7 caracteres',
                        ],
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'renavam',
            'required' => false,
            'filters' => [
                ['name' => 'StringTrim'],
            ],
            'validators' => [
                [
                    'name' => Validator\StringLength::class,
                    'options' => [
                        'max' => 30,
                        'messages' => [
                            Validator\StringLength::TOO_LONG => 'Renavam deve ter no máximo 30 caracteres',
                        ],
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'modelo',
            'required' => true,
            'validators' => [
                [
                    'name' => Validator\NotEmpty::class,
                    'options' => [
                        'messages' => [
                            Validator\NotEmpty::IS_EMPTY => 'Modelo é obrigatório',
                        ],
                    ],
                ],
                [
                    'name' => Validator\StringLength::class,
                    'options' => [
                        'max' => 20,
                        'messages' => [
                            Validator\StringLength::TOO_LONG => 'Modelo deve tetr no máximo 20 caracteres',
                        ],
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'marca',
            'required' => true,
            'validators' => [
                [
                    'name' => Validator\NotEmpty::class,
                    'options' => [
                        'messages' => [
                            Validator\NotEmpty::IS_EMPTY => 'Marca é obrigatória',
                        ],
                    ],
                ],
                [
                    'name' => Validator\StringLength::class,
                    'options' => [
                        'max' => 20,
                        'messages' => [
                            Validator\StringLength::TOO_LONG => 'Marca deve ter no máximo 20 caracteres',
                        ],
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'ano',
            'required' => true,
            'validators' => [
                [
                    'name' => Validator\NotEmpty::class,
                    'options' => [
                        'messages' => [
                            Validator\NotEmpty::IS_EMPTY => 'Ano é obrigatório',
                        ],
                    ],
                ],
                [
                    'name' => Validator\Digits::class,
                    'options' => [
                        'messages' => [
                            Validator\Digits::NOT_DIGITS => 'Ano deve ser composto apenas por números',
                        ],
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'cor',
            'required' => true,
            'validators' => [
                [
                    'name' => Validator\NotEmpty::class,
                    'options' => [
                        'messages' => [
                            Validator\NotEmpty::IS_EMPTY => 'Cor é obrigatória',
                        ],
                    ],
                ],
                [
                    'name' => Validator\StringLength::class,
                    'options' => [
                        'max' => 20,
                        'messages' => [
                            Validator\StringLength::TOO_LONG => 'Cor deva ter no máximo 20 caracteres',
                        ],
                    ],
                ],
            ],
        ]);

        return $inputFilter;
    }
}

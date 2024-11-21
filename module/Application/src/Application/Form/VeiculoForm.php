<?php
namespace Application\Form;

use Zend\Form\Form;

class VeiculoForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('veiculo');

        $this->add([
            'name' => 'placa',
            'type' => 'Text',
            'options' => [
                'label' => 'Placa',
            ],
        ]);

        $this->add([
            'name' => 'modelo',
            'type' => 'Text',
            'options' => [
                'label' => 'Modelo',
            ],
        ]);

        $this->add([
            'name' => 'marca',
            'type' => 'Text',
            'options' => [
                'label' => 'Marca',
            ],
        ]);

        $this->add([
            'name' => 'ano',
            'type' => 'Number',
            'options' => [
                'label' => 'Ano',
            ],
        ]);

        $this->add([
            'name' => 'cor',
            'type' => 'Text',
            'options' => [
                'label' => 'Cor',
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => [
                'value' => 'Salvar',
            ],
        ]);
    }
}

<?php


namespace App\Form\Product;


use Zend\Form\Element;
use Zend\Form\Form;

class Create extends Form
{

    public function __construct($name = null, array $options = [])
    {
        parent::__construct($name, $options);

        $this->add([
            'name' => 'name',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Nome'
            ],
            'attributes' => [
                'id' => 'name'
            ]
        ]);

        $this->add([
            'name' => 'price',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Preço'
            ],
            'attributes' => [
                'id' => 'price'
            ]
        ]);

        $this->add([
            'name' => 'description',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Descrição'
            ],
            'attributes' => [
                'id' => 'description'
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => Element\Button::class,
            'attributes' => [
                'type' => 'submit'
            ]
        ]);
    }

}
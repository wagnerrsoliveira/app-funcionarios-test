<?php

namespace Funcionario\Form;


use Interop\Container\ContainerInterface;
use Zend\Form\Form;

class FuncionarioForm extends Form
{
    public function __construct(ContainerInterface $container,$name = 'funcionario', array $options = [])
    {
        parent::__construct($name, $options);
        $this->setInputFilter($container->get(FuncionarioFilter::class));


        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);

        $this->add([
            'name'=>'nome',
            'type'=>'text',
            'options'=>[
                'label'=>'Nome',
            ],
            'attributes' =>[
                'id' =>'nome',
                'required'=>true,
                'class'=>'form-control',
                'placeholder'=>'Digite o nome'
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id'    => 'submitbutton',
            ],
        ]);
    }

}
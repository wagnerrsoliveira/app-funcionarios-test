<?php

namespace Auth\Form;


use Interop\Container\ContainerInterface;
use Zend\Form\Form;

class LoginForm extends Form
{
    public function __construct(ContainerInterface $container, $name = 'login', array $options = [])
    {
        parent::__construct($name, $options);
        $this->setInputFilter($container->get(LoginFilter::class));

        

        $this->add([
            'name'=>'email',
            'type'=>'email',
            'options'=>[
                'label'=>'E-mail',
            ],
            'attributes' =>[
                'id' =>'email',
                'required'=>true,
                'class'=>'form-control',
                'placeholder'=>'Digite seu e-mail'
            ],
        ]);

        $this->add([
            'name'=>'password',
            'type'=>'password',
            'options'=>[
                'label'=>'Senha',
            ],
            'attributes' =>[
                'id' =>'password',
                'required'=>true,
                'class'=>'form-control',
                'placeholder'=>'Digite sua senha'
            ],
        ]);
    }


}
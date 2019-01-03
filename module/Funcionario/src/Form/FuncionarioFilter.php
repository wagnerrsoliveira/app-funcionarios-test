<?php

namespace Funcionario\Form;


use Interop\Container\ContainerInterface;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;
use Zend\Validator\StringLength;

class FuncionarioFilter extends InputFilter
{

    public function __construct(ContainerInterface $container)
    {
        $this->add([
            'name' => 'id',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $this->add([
            'name'=>'nome',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [NotEmpty::IS_EMPTY => "Campo Obrigatorio"],
                    ],
                ],
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 3,
                        'max' => 255,
                        'messages' => [
                            StringLength::TOO_SHORT=> "O nome deve ter mais de 2 caracteres",
                            StringLength::TOO_LONG=> "O nome deve ter menos de 256 caracteres",
                        ],
                    ],
                ],
            ],

        ]);
    }
}
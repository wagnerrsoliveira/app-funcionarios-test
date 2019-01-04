<?php

namespace Funcionario\Form;


use Interop\Container\ContainerInterface;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\Validator\Date;
use Zend\Validator\EmailAddress;
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
                            'messages' => [NotEmpty::IS_EMPTY => '*Campo Obrigatorio'],
                        ],
                    ],
                    [
                        'name' => StringLength::class,
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min' => 3,
                            'max' => 255,
                            'messages' => [
                                StringLength::TOO_SHORT=> 'O nome deve ter mais de 2 caracteres',
                                StringLength::TOO_LONG=> 'O nome deve ter menos de 256 caracteres',
                            ],
                        ],
                    ],
                ],

        ]);

        $this->add([
            'name'=>'rg',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [NotEmpty::IS_EMPTY => '*Campo Obrigatorio'],
                    ],
                ],
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 12,
                        'max' => 12,
                        'messages' => [
                            StringLength::TOO_SHORT=> 'O Rg deve ter 12 caracteres',
                            StringLength::TOO_LONG=> 'O Rg deve ter 12 caracteres',
                        ],
                    ],
                ],
            ],
        ]);

        $this->add([
            'name'=>'cpf',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [NotEmpty::IS_EMPTY => '*Campo Obrigatorio'],
                    ],
                ],
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 14,
                        'max' => 14,
                        'messages' => [
                            StringLength::TOO_SHORT=> 'O CPF deve ter 14 caracteres',
                            StringLength::TOO_LONG=> 'O CPF deve ter 14 caracteres',
                        ],
                    ],
                ],
            ],

        ]);

        $this->add([
            'name'=>'data_nascimento',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [NotEmpty::IS_EMPTY => '*Campo Obrigatorio'],
                    ],
                ],
                [
                    'name' => Date::class,
                    'options' => [
                        'messages' => [
                            Date::INVALID_DATE=> 'Data Inválida',
                        ],
                    ],
                ],
            ],

        ]);

        $this->add([
            'name'=>'estado_civil',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [NotEmpty::IS_EMPTY => '*Campo Obrigatorio'],
                    ],
                ],
            ],

        ]);

        $this->add([
            'name'=>'sexo',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [NotEmpty::IS_EMPTY => '*Campo Obrigatorio'],
                    ],
                ],
            ],

        ]);



        $this->add([
            'name'=>'email',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [NotEmpty::IS_EMPTY => '*Campo Obrigatorio'],
                    ],
                ],
                [
                    'name' => EmailAddress::class,
                    'options' => [
                        'messages' => [
                            EmailAddress::INVALID => "Formato Do Email incorreto!",
                            EmailAddress::INVALID_HOSTNAME => "Formato Do Email incorreto!",
                            ],
                    ],
                ],
            ],

        ]);

        $this->add([
            'name'=>'telefone_fixo',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [NotEmpty::IS_EMPTY => '*Campo Obrigatorio'],
                    ],
                ],
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 15,
                        'max' => 15,
                        'messages' => [
                            StringLength::TOO_SHORT=> 'O Telefone incorreto',
                            StringLength::TOO_LONG=> 'O Telefone incorreto',
                        ],
                    ],
                ],
            ],

        ]);

        $this->add([
            'name'=>'telefone_movel',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 16,
                        'max' => 16,
                        'messages' => [
                            StringLength::TOO_SHORT=> 'O Telefone incorreto',
                            StringLength::TOO_LONG=> 'O Telefone incorreto',
                        ],
                    ],
                ],
            ],

        ]);

        $this->add([
            'name'=>'cep',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [NotEmpty::IS_EMPTY => '*Campo Obrigatorio'],
                    ],
                ],
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 9,
                        'max' => 9,
                        'messages' => [
                            StringLength::TOO_SHORT=> 'O Cep incorreto',
                            StringLength::TOO_LONG=> 'O Cep incorreto',
                        ],
                    ],
                ],
            ],

        ]);

        $this->add([
            'name'=>'logradouro',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [NotEmpty::IS_EMPTY => '*Campo Obrigatorio'],
                    ],
                ],
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 3,
                        'max' => 255,
                        'messages' => [
                            StringLength::TOO_SHORT=> 'O logradouro deve ter mais de 3 caracteres',
                            StringLength::TOO_LONG=> 'O logradouro deve ter menos de 256 caracteres',
                        ],
                    ],
                ],
            ],

        ]);

        $this->add([
            'name'=>'numero',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [NotEmpty::IS_EMPTY => '*Campo Obrigatorio'],
                    ],
                ],
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'max' => 5,
                        'messages' => [
                            StringLength::TOO_LONG=> 'O número deve ter menos que 6 caracteres',
                        ],
                    ],
                ],
            ],

        ]);
        $this->add([
            'name'=>'complemento',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min'=>3,
                        'max' => 45,
                        'messages' => [
                            StringLength::TOO_SHORT=> 'O Complemento deve ter mais de 3 caracteres',
                            StringLength::TOO_LONG=> 'O Complemento deve ter menos que 45 caracteres',
                        ],
                    ],
                ],
            ],
        ]);
        $this->add([
            'name'=>'bairro',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [NotEmpty::IS_EMPTY => '*Campo Obrigatorio'],
                    ],
                ],
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min'=>3,
                        'max' => 255,
                        'messages' => [
                            StringLength::TOO_SHORT=> 'O bairro deve ter mais de 3 caracteres',
                            StringLength::TOO_LONG=> 'O bairro deve ter menos que 256 caracteres',
                        ],
                    ],
                ],
            ],
        ]);

        $this->add([
            'name'=>'cidade',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [NotEmpty::IS_EMPTY => '*Campo Obrigatorio'],
                    ],
                ],
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min'=>3,
                        'max' => 45,
                        'messages' => [
                            StringLength::TOO_SHORT=> 'A cidade deve ter mais de 3 caracteres',
                            StringLength::TOO_LONG=> 'A cidade deve ter menos que 46 caracteres',
                        ],
                    ],
                ],
            ],
        ]);

        $this->add([
            'name'=>'estado',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [NotEmpty::IS_EMPTY => '*Campo Obrigatorio'],
                    ],
                ],
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min'=>2,
                        'max' => 45,
                        'messages' => [
                            StringLength::TOO_SHORT=> 'O estado deve ter mais de 2 caracteres',
                            StringLength::TOO_LONG=> 'O estado deve ter menos que 46 caracteres',
                        ],
                    ],
                ],
            ],
        ]);

        $this->add([
            'name'=>'id_funcao',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [NotEmpty::IS_EMPTY => '*Campo Obrigatorio'],
                    ],
                ],
            ],

        ]);
        $this->add([
            'name'=>'id_departamento',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [NotEmpty::IS_EMPTY => '*Campo Obrigatorio'],
                    ],
                ],
            ],

        ]);
        $this->add([
            'name'=>'salario',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [NotEmpty::IS_EMPTY => '*Campo Obrigatorio'],
                    ],
                ],
            ],
        ]);

        $this->add([
            'name'=>'data_admissao',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [NotEmpty::IS_EMPTY => '*Campo Obrigatorio'],
                    ],
                ],
                [
                    'name' => Date::class,
                    'options' => [
                        'messages' => [
                            Date::INVALID_DATE=> 'Data Inválida',
                        ],
                    ],
                ],
            ],

        ]);
        $this->add([
            'name'=>'data_demissao',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => Date::class,
                    'options' => [
                        'messages' => [
                            Date::INVALID_DATE=> 'Data Inválida',
                        ],
                    ],
                ],
            ],

        ]);
    }
}
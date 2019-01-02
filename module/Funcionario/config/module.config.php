<?php

namespace Funcionario;

use Funcionario\Controller\Factory\FuncionarioControllerFactory;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'funcionario' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/funcionario[/:action]',
                    'defaults' => [
                        'controller' => Controller\FuncionarioController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\FuncionarioController::class => FuncionarioControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
<?php

namespace Funcionario\Form\Factory;


use Funcionario\Form\FuncionarioFilter;
use Interop\Container\ContainerInterface;

class FuncionarioFilterFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new FuncionarioFilter($container);
    }
}
<?php

namespace Funcionario\Form\Factory;


use Funcionario\Form\FuncionarioForm;
use Interop\Container\ContainerInterface;

class FuncionarioFormFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new FuncionarioForm($container);
    }
}
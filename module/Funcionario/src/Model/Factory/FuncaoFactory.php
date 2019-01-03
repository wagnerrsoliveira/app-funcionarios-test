<?php

namespace Funcionario\Model\Factory;


use Funcionario\Model\Funcao;
use Interop\Container\ContainerInterface;

class FuncaoFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new Funcao($container);
    }
}
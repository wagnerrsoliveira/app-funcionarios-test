<?php

namespace Funcionario\Model\Factory;


use Funcionario\Model\Departamento;
use Interop\Container\ContainerInterface;

class DepartamentoFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new Departamento($container);
    }
}
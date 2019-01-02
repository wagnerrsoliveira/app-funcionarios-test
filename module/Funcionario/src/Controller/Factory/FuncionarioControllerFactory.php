<?php
/**
 * Created by PhpStorm.
 * User: Pcp
 * Date: 02/01/2019
 * Time: 12:39
 */

namespace Funcionario\Controller\Factory;


use Funcionario\Controller\FuncionarioController;
use Interop\Container\ContainerInterface;

class FuncionarioControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new FuncionarioController($container);
    }
}
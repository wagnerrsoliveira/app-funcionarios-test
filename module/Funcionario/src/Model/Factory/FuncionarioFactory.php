<?php
/**
 * Created by PhpStorm.
 * User: Pcp
 * Date: 02/01/2019
 * Time: 13:06
 */

namespace Funcionario\Model\Factory;


use Funcionario\Model\Funcionario;
use Interop\Container\ContainerInterface;

class FuncionarioFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new Funcionario($container);
    }
}
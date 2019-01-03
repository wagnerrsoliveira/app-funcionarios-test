<?php

namespace Funcionario\Model\Factory;


use Funcionario\Model\Funcionario;
use Funcionario\Model\FuncionarioRepository;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class FuncionarioRepositoryFactory
{
    public function __invoke(ContainerInterface $containerInterface)
    {
        $resultPrototype = new ResultSet();
        $resultPrototype->setArrayObjectPrototype($containerInterface->get(Funcionario::class));
        return new FuncionarioRepository(new TableGateway('funcionarios',$containerInterface->get(AdapterInterface::class),null,$resultPrototype));
    }
}
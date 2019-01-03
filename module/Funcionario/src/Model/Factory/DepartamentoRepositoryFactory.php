<?php

namespace Funcionario\Model\Factory;


use Funcionario\Model\Departamento;
use Funcionario\Model\DepartamentoRepository;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class DepartamentoRepositoryFactory
{
    public function __invoke(ContainerInterface $containerInterface)
    {
        $resultPrototype = new ResultSet();
        $resultPrototype->setArrayObjectPrototype($containerInterface->get(Departamento::class));
        return new DepartamentoRepository(new TableGateway('departamentos',$containerInterface->get(AdapterInterface::class),null,$resultPrototype));
    }
}
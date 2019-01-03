<?php
/**
 * Created by PhpStorm.
 * User: wagner
 * Date: 02/01/19
 * Time: 21:41
 */

namespace Funcionario\Model\Factory;


use Funcionario\Model\Funcao;
use Funcionario\Model\FuncaoRepository;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class FuncaoRepositoryFactory
{
    public function __invoke(ContainerInterface $containerInterface)
    {
        $resultPrototype = new ResultSet();
        $resultPrototype->setArrayObjectPrototype($containerInterface->get(Funcao::class));
        return new FuncaoRepository(new TableGateway('funcoes',$containerInterface->get(AdapterInterface::class),null,$resultPrototype));
    }
}
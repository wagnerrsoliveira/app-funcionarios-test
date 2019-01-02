<?php
/**
 * Created by PhpStorm.
 * User: Pcp
 * Date: 02/01/2019
 * Time: 13:41
 */

namespace Funcionario\Model\Factory;


use Funcionario\Model\FuncionarioRepository;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\TableGateway;

class FuncionarioRepositoryFactory
{
    public function __invoke(ContainerInterface $containerInterface)
    {
        $resultPrototype = new ResultSet();
        $resultPrototype->setArrayObjectPrototype($containerInterface->get(Users::class));
        return new FuncionarioRepository(new TableGateway('tbl_funcionarios',$containerInterface->get(AdapterInterface::class),null,$resultPrototype));
    }
}
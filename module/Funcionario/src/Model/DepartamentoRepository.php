<?php

namespace Funcionario\Model;


use Zend\Db\TableGateway\TableGateway;

class DepartamentoRepository
{
    private $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getTable()
    {
        return $this->tableGateway->getTable();
    }

    public function select($where = null)
    {
        return $this->tableGateway->select($where);
    }
}
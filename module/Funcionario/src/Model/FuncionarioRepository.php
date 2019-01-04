<?php
/**
 * Created by PhpStorm.
 * User: Pcp
 * Date: 02/01/2019
 * Time: 13:39
 */

namespace Funcionario\Model;


use Zend\Db\TableGateway\TableGateway;

class FuncionarioRepository
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

    public function getFuncionario($id){
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id'=>$id]);
        $row = $rowset->current();

        if(! $row){
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d' .
                $id
            ));
        }
        return $row;
    }

    public function select($where = null)
    {
        return $this->tableGateway->select($where);
    }
    public function insert($set)
    {
        $this->tableGateway->insert($set);
        return $this->tableGateway->getLastInsertValue();
    }
    public function update($set, $where = null)
    {
        return $this->tableGateway->update($set,$where);
    }
    public function delete($where)
    {
        return $this->tableGateway->delete($where);
    }
}
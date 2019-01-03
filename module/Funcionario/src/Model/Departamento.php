<?php

namespace Funcionario\Model;


class Departamento
{
    private $id;
    private $descricao;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function getDescricao()
    {
        return $this->descricao;
    }


    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function exchangeArray($data)
    {
        $this->id     = isset($data['id']) ? $data['id'] : null;
        $this->descricao = isset($data['descricao']) ? $data['descricao'] : null;
    }


    public function getArrayCopy()
    {
        return [
            'id'     => $this->id,
            'descricao' => $this->descricao,
        ];
    }
}
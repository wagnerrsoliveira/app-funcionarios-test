<?php

namespace Auth\Model;


use Zend\Hydrator\ClassMethods;

class Users
{
    protected $id;
    protected $nome;
    protected $email;
    protected $password;
    protected $created;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }
    public function exchangeArray(array  $options=[])
    {
        $hidrator=new ClassMethods();
        $hidrator->hydrate($options,$this);
    }
    public function toArray(){
        $hidrator=new ClassMethods();
        return $hidrator->extract($this);
    }
}
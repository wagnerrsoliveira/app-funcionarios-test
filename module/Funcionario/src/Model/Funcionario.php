<?php


namespace Funcionario\Model;



class Funcionario
{
    private $id;
    private $nome;
    private $rg;
    private $cpf;
    private $dataNascimento;
    private $estadoCivil;
    private $sexo;
    private $email;
    private $telefoneFixo;
    private $telefoneMovel;
    private $cep;
    private $logradouro;
    private $numero;
    private $bairro;
    private $complemento;
    private $cidade;
    private $estado;
    private $salario;
    private $dataAdmissao;
    private $dataDemissao;
    private $idFuncao;
    private $idDepartamento;


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


    public function getRg()
    {
        return $this->rg;
    }


    public function setRg($rg)
    {
        $this->rg = $rg;
    }


    public function getCpf()
    {
        return $this->cpf;
    }


    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }


    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }


    public function getEstadoCivil()
    {
        return $this->estadoCivil;
    }


    public function setEstadoCivil($estadoCivil)
    {
        $this->estadoCivil = $estadoCivil;
    }


    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getTelefoneFixo()
    {
        return $this->telefoneFixo;
    }


    public function setTelefoneFixo($telefoneFixo)
    {
        $this->telefoneFixo = $telefoneFixo;
    }


    public function getTelefoneMovel()
    {
        return $this->telefoneMovel;
    }


    public function setTelefoneMovel($telefoneMovel)
    {
        $this->telefoneMovel = $telefoneMovel;
    }


    public function getCep()
    {
        return $this->cep;
    }


    public function setCep($cep)
    {
        $this->cep = $cep;
    }


    public function getLogradouro()
    {
        return $this->logradouro;
    }


    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }


    public function getNumero()
    {
        return $this->numero;
    }


    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }


    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }


    public function getCidade()
    {
        return $this->cidade;
    }


    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }


    public function getEstado()
    {
        return $this->estado;
    }


    public function setEstado($estado)
    {
        $this->estado = $estado;
    }


    public function getSalario()
    {
        return $this->salario;
    }


    public function setSalario($salario)
    {
        $this->salario = $salario;
    }

    public function getDataAdmissao()
    {
        return $this->dataAdmissao;
    }


    public function setDataAdmissao($dataAdmissao)
    {
        $this->dataAdmissao = $dataAdmissao;
    }


    public function getDataDemissao()
    {
        return $this->dataDemissao;
    }


    public function setDataDemissao($dataDemissao)
    {
        $this->dataDemissao = $dataDemissao;
    }


    public function getIdFuncao()
    {
        return $this->idFuncao;
    }


    public function setIdFuncao($idFuncao)
    {
        $this->idFuncao = $idFuncao;
    }


    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }


    public function setIdDepartamento($idDepartamento)
    {
        $this->idDepartamento = $idDepartamento;
    }


    public function exchangeArray($data)
    {
        $this->id     = isset($data['id']) ? $data['id'] : null;
        $this->nome = isset($data['nome']) ? $data['nome'] : null;
        $this->rg  = isset($data['rg']) ? $data['rg'] : null;
        $this->cpf     = isset($data['cpf']) ? $data['cpf'] : null;
        $this->dataNascimento  = isset($data['data_nascimento']) ? $data['data_nascimento'] : null;
        $this->estadoCivil  = isset($data['estado_civil']) ? $data['estado_civil'] : null;
        $this->sexo = isset($data['sexo']) ? $data['sexo'] : null;
        $this->email  = isset($data['email']) ? $data['email'] : null;
        $this->telefoneFixo  = isset($data['telefone_fixo']) ? $data['telefone_fixo'] : null;
        $this->telefoneMovel  = isset($data['telefone_movel']) ? $data['telefone_movel'] : null;
        $this->cep  = isset($data['cep']) ? $data['cep'] : null;
        $this->logradouro  = isset($data['logradouro']) ? $data['logradouro'] : null;
        $this->numero  = isset($data['numero']) ? $data['numero'] : null;
        $this->bairro  = isset($data['bairro']) ? $data['bairro'] : null;
        $this->complemento  = isset($data['complemento']) ? $data['complemento'] : null;
        $this->cidade  = isset($data['cidade']) ? $data['cidade'] : null;
        $this->estado  = isset($data['estado']) ? $data['estado'] : null;
        $this->salario  = isset($data['salario']) ? $data['salario'] : null;
        $this->dataAdmissao  = isset($data['data_admissao']) ? $data['data_admissao'] : null;
        $this->dataDemissao  = isset($data['data_demissao']) ? $data['data_demissao'] : null;
        $this->idFuncao  = isset($data['id_funcao']) ? $data['id_funcao'] : null;
        $this->idDepartamento  = isset($data['id_departamento']) ? $data['id_departamento'] : null;


    }

    public function getArrayCopy()
    {
        return [
            'id'     => $this->id,
            'nome' => $this->nome,
            'rg' => $this->rg,
            'cpf' => $this->cpf,
            'data_nascimento' => $this->dataNascimento,
            'estado_civil' => $this->estadoCivil,
            'sexo' => $this->sexo,
            'email' => $this->email,
            'telefone_fixo' => $this->telefoneFixo,
            'telefone_movel' => $this->telefoneMovel,
            'cep' => $this->cep,
            'logradouro' => $this->logradouro,
            'numero' => $this->numero,
            'bairro' => $this->bairro,
            'complemento' => $this->complemento,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'salario' => $this->salario,
            'data_admissao' => $this->dataAdmissao,
            'data_demissao' => $this->dataDemissao,
            'id_funcao'  => $this->idFuncao,
            'id_departamento'  => $this->idDepartamento,
        ];
    }



}
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
        $this->rg = preg_replace("/[^0-9A-Z]/", "", $rg);
    }


    public function getCpf()
    {
        return $this->cpf;
    }


    public function setCpf($cpf)
    {
        $this->cpf = preg_replace("/[^0-9]/", "", $cpf);
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
        $this->telefoneFixo = preg_replace("/[^0-9]/", "", $telefoneFixo);
    }


    public function getTelefoneMovel()
    {
        return $this->telefoneMovel;
    }


    public function setTelefoneMovel($telefoneMovel)
    {
        $this->telefoneMovel = preg_replace("/[^0-9]/", "", $telefoneMovel);
    }


    public function getCep()
    {
        return $this->cep;
    }


    public function setCep($cep)
    {
        $this->cep =  preg_replace("/[^0-9]/", "", $cep);
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
        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $salario);
        $this->salario = $valor;
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
        if (empty($dataDemissao)||$dataDemissao==''){
            $this->dataDemissao =null;
        }
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
            isset($data['id']) ? $this->setId($data['id']) : $this->setId(null) ;
            isset($data['nome']) ? $this->setNome($data['nome']) : $this->setNome(null);
            isset($data['rg']) ? $this->setRg($data['rg']) : $this->setRg(null);
            isset($data['cpf']) ? $this->setCpf($data['cpf']) : $this->setCpf(null) ;
            isset($data['data_nascimento']) ? $this->setDataNascimento($data['data_nascimento']) : $this->setDataNascimento(null);
            isset($data['estado_civil']) ? $this->setEstadoCivil($data['estado_civil']) : $this->setEstadoCivil(null) ;
            isset($data['sexo']) ? $this->setSexo($data['sexo']): $this->setSexo(null);
            isset($data['email']) ? $this->setEmail($data['email']) : $this->setEmail(null);
            isset($data['telefone_fixo']) ? $this->setTelefoneFixo($data['telefone_fixo']) : $this->setTelefoneFixo(null);
            isset($data['telefone_movel']) ? $this->setTelefoneMovel($data['telefone_movel']) : $this->setTelefoneMovel(null);
            isset($data['cep']) ? $this->setCep($data['cep']) : $this->setCep(null);
            isset($data['logradouro']) ? $this->setLogradouro($data['logradouro']): $this->setLogradouro(null);
            isset($data['numero']) ? $this->setNumero($data['numero']) : $this->setNumero(null);
            isset($data['bairro']) ? $this->setBairro($data['bairro']) : $this->setBairro(null);
            isset($data['complemento']) ? $this->setComplemento($data['complemento']) : $this->setComplemento(null);
            isset($data['cidade']) ? $this->setCidade($data['cidade']) : $this->setCidade(null) ;
            isset($data['estado']) ? $this->setEstado($data['estado']) : $this->setEstado(null);
            isset($data['salario']) ? $this->setSalario($data['salario']) : $this->setSalario(null);
            isset($data['data_admissao']) ? $this->setDataAdmissao($data['data_admissao']) : $this->setDataAdmissao(null);
            isset($data['data_demissao']) ? $this->setDataDemissao($data['data_demissao']) : $this->setDataDemissao(null);
            isset($data['id_funcao']) ? $this->setIdFuncao($data['id_funcao']) : $this->setIdFuncao(null);
            isset($data['id_departamento']) ? $this->setIdDepartamento($data['id_departamento']) : $this->setIdDepartamento(null) ;


    }

    public function getArrayCopy()
    {

            $arrayObjFunc = array();
                $this->id>0 ? $arrayObjFunc['id'] = $this->id:false;
            $arrayObjFunc['nome'] = $this->nome;
            $arrayObjFunc['rg'] = $this->rg;
            $arrayObjFunc['cpf'] = $this->cpf;
            $arrayObjFunc['data_nascimento'] = $this->dataNascimento;
            $arrayObjFunc['estado_civil'] = $this->estadoCivil;
            $arrayObjFunc['sexo'] = $this->sexo;
            $arrayObjFunc['email'] = $this->email;
            $arrayObjFunc['telefone_fixo'] = $this->telefoneFixo;
            $arrayObjFunc['telefone_movel'] = $this->telefoneMovel;
            $arrayObjFunc['cep'] = $this->cep;
            $arrayObjFunc['logradouro'] = $this->logradouro;
            $arrayObjFunc['numero'] = $this->numero;
            $arrayObjFunc['bairro'] = $this->bairro;
            $arrayObjFunc['complemento'] = $this->complemento;
            $arrayObjFunc['cidade'] = $this->cidade;
            $arrayObjFunc['estado'] = $this->estado;
            $arrayObjFunc['salario'] = $this->salario;
            $arrayObjFunc['data_admissao'] = $this->dataAdmissao;
            !empty($this->dataDemissao) ? $arrayObjFunc['data_demissao'] = $this->dataDemissao:false;
            $arrayObjFunc['id_funcao'] = $this->idFuncao;
            $arrayObjFunc['id_departamento'] = $this->idDepartamento;

            return $arrayObjFunc;

    }



}
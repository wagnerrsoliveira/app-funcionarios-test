<?php

namespace Funcionario\Form;


use Funcionario\Model\DepartamentoRepository;
use Funcionario\Model\FuncaoRepository;
use Interop\Container\ContainerInterface;
use Zend\Form\Form;

class FuncionarioForm extends Form
{
    public function __construct(ContainerInterface $container,$name = 'funcionario', array $options = [])
    {
        parent::__construct($name, $options);
        $this->setInputFilter($container->get(FuncionarioFilter::class));


        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);

        $this->add([
            'name'=>'nome',
            'type'=>'text',
            'options'=>[
                'label'=>'Nome:'
            ],
            'attributes' =>[
                'id' =>'nome',
                'required'=>true,
                'class'=>'form-control',
                'placeholder'=>'Digite o nome'
            ],
        ]);

        $this->add([
            'name'=>'rg',
            'type'=>'text',
            'options'=>[
                'label'=>'RG:'
            ],
            'attributes' =>[
                'id' =>'rg',
                'required'=>true,
                'class'=>'form-control',
                'placeholder'=>'99.999.999.X'
            ],
        ]);

        $this->add([
            'name'=>'cpf',
            'type'=>'text',
            'options'=>[
                'label'=>'CPF:'
            ],
            'attributes' =>[
                'id' =>'cpf',
                'required'=>true,
                'class'=>'form-control',
                'placeholder'=>'999.999.999.99'
            ],
        ]);

        $this->add([
            'name'=>'dataNasc',
            'type'=>'date',
            'options'=>[
                'label'=>'Data Nasc.:'
            ],
            'attributes' =>[
                'id' =>'dataNasc',
                'required'=>true,
                'class'=>'form-control',
                'placeholder'=>'01/01/1900'
            ],
        ]);

        $this->add([
            'name'=>'estadoCivil',
            'type'=>'Select',
            'options'=>[
                'label'=>'Estado Civil.:',
                'value_options' => array(
                    'S' => 'Solteiro(a)',
                    'C' => 'Casado(a)',
                    'V' => 'Viúvo(a)',
                    'D' => 'Divorciado(a)',
                )
            ],
            'attributes' =>[
                'id' =>'estadoCivil',
                'required'=>true,
                'class'=>'form-control',
            ],
        ]);

        $this->add([
            'name'=>'sexo',
            'type'=>'Radio',
            'options'=>[
                'label'=>'Sexo.:',
                'value_options' => array(
                    '0' => 'Female',
                    '1' => 'Male',
                ),
            ],
            'attributes' =>[
                'id' =>'sexo',
                'required'=>true,
                'class'=>'radio-inline'
            ],
        ]);


        $this->add([
            'name'=>'email',
            'type'=>'email',
            'options'=>[
                'label'=>'E-mail.:'
            ],
            'attributes' =>[
                'id' =>'email',
                'required'=>true,
                'class'=>'form-control',
                'placeholder'=>'username@email.com'
            ],
        ]);

        $this->add([
            'name'=>'telefoneFixo',
            'type'=>'text',
            'options'=>[
                'label'=>'Telefone Fixo:'
            ],
            'attributes' =>[
                'id' =>'telefoneFixo',
                'required'=>true,
                'class'=>'form-control',
                'placeholder'=>'(018) 3333-3333'
            ],
        ]);

        $this->add([
            'name'=>'telefoneMovel',
            'type'=>'text',
            'options'=>[
                'label'=>'Telefone Movel:'
            ],
            'attributes' =>[
                'id' =>'telefoneMovel',
                'class'=>'form-control',
                'placeholder'=>'(018) 99999-9999'
            ],
        ]);

        $this->add([
            'name'=>'cep',
            'type'=>'text',
            'options'=>[
                'label'=>'CEP:'
            ],
            'attributes' =>[
                'id' =>'cep',
                'required'=>true,
                'class'=>'form-control',
                'placeholder'=>'19000-000'
            ],
        ]);

        $this->add([
            'name'=>'logradouro',
            'type'=>'text',
            'options'=>[
                'label'=>'Logradouro:'
            ],
            'attributes' =>[
                'id' =>'logradouro',
                'required'=>true,
                'class'=>'form-control',
                'placeholder'=>'Rua/Av.'
            ],
        ]);

        $this->add([
            'name'=>'numero',
            'type'=>'text',
            'options'=>[
                'label'=>'Número:'
            ],
            'attributes' =>[
                'id' =>'numero',
                'required'=>true,
                'class'=>'form-control',
                'placeholder'=>'99.'
            ],
        ]);

        $this->add([
            'name'=>'complemento',
            'type'=>'text',
            'options'=>[
                'label'=>'Complemento:'
            ],
            'attributes' =>[
                'id' =>'complemento',
                'class'=>'form-control',
                'placeholder'=>''
            ],
        ]);

        $this->add([
            'name'=>'bairro',
            'type'=>'text',
            'options'=>[
                'label'=>'Bairro:'
            ],
            'attributes' =>[
                'id' =>'bairro',
                'class'=>'form-control',
                'placeholder'=>'Digite o bairro'
            ],
        ]);

        $this->add([
            'name'=>'cidade',
            'type'=>'text',
            'options'=>[
                'label'=>'Cidade:'
            ],
            'attributes' =>[
                'id' =>'cidade',
                'class'=>'form-control',
                'placeholder'=>'Digite a cidade'
            ],
        ]);

        $this->add([
            'name'=>'estado',
            'type'=>'text',
            'options'=>[
                'label'=>'Estado:'
            ],
            'attributes' =>[
                'id' =>'estado',
                'class'=>'form-control',
                'placeholder'=>'Digite o estado'
            ],
        ]);

        $this->add([
            'name'=>'salario',
            'type'=>'text',
            'options'=>[
                'label'=>'Salário:'
            ],
            'attributes' =>[
                'id' =>'salario',
                'class'=>'form-control',
                'placeholder'=>'R$ 9.999,99'
            ],
        ]);
        $funcoes = $container->get(FuncaoRepository::class)->select();
        $arryFuncao =  array();
        foreach ($funcoes as $f){
            $arryFuncao[$f->getId()]=$f->getDescricao();
        };
        $this->add([
            'name'=>'funcao',
            'type'=>'Select',
            'options'=>[
                'label'=>'Função:',
                'value_options'=>$arryFuncao

            ],
            'attributes' =>[
                'id' =>'funcao',
                'required'=>true,
                'class'=>'form-control',
            ],
        ]);

        $departamentos = $container->get(DepartamentoRepository::class)->select();
        $arryDepartament =  array();
        foreach ($departamentos as $d){
            $arryDepartament[$d->getId()]=$d->getDescricao();
        };
        $this->add([
            'name'=>'departamento',
            'type'=>'Select',
            'options'=>[
                'label'=>'Departamento:',
                'value_options'=>$arryDepartament

            ],
            'attributes' =>[
                'id' =>'departamento',
                'required'=>true,
                'class'=>'form-control',
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Salvar',
                'id'    => 'submitbutton',
            ],
        ]);
        $this->add([
            'name'=>'dataAdmissao',
            'type'=>'date',
            'options'=>[
                'label'=>'Data Admissão.:'
            ],
            'attributes' =>[
                'id' =>'dataAdmissao',
                'required'=>true,
                'class'=>'form-control',
                'placeholder'=>'01/01/1900'
            ],
        ]);
        $this->add([
            'name'=>'dataDemissao',
            'type'=>'date',
            'options'=>[
                'label'=>'Data Demissão.:'
            ],
            'attributes' =>[
                'id' =>'dataDemissao',
                'class'=>'form-control',
                'placeholder'=>'01/01/1900'
            ],
        ]);


    }

}
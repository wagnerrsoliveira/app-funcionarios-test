<?php

namespace Funcionario;

use Funcionario\Controller\Factory\FuncionarioControllerFactory;
use Funcionario\Controller\FuncionarioController;
use Funcionario\Form\Factory\FuncionarioFilterFactory;
use Funcionario\Form\Factory\FuncionarioFormFactory;
use Funcionario\Form\FuncionarioFilter;
use Funcionario\Form\FuncionarioForm;
use Funcionario\Model\Departamento;
use Funcionario\Model\DepartamentoRepository;
use Funcionario\Model\Factory\DepartamentoFactory;
use Funcionario\Model\Factory\DepartamentoRepositoryFactory;
use Funcionario\Model\Factory\FuncaoFactory;
use Funcionario\Model\Factory\FuncaoRepositoryFactory;
use Funcionario\Model\Factory\FuncionarioFactory;
use Funcionario\Model\Factory\FuncionarioRepositoryFactory;
use Funcionario\Model\Funcao;
use Funcionario\Model\FuncaoRepository;
use Funcionario\Model\Funcionario;
use Funcionario\Model\FuncionarioRepository;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ConfigProviderInterface, ServiceProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }


    public function getServiceConfig()
    {
        return [
            'factories'=>[
                FuncionarioController::class=>FuncionarioControllerFactory::class,
                Funcionario::class=>FuncionarioFactory::class,
                FuncionarioRepository::class=>FuncionarioRepositoryFactory::class,
                FuncionarioForm::class=>FuncionarioFormFactory::class,
                FuncionarioFilter::class=>FuncionarioFilterFactory::class,
                Funcao::class=>FuncaoFactory::class,
                FuncaoRepository::class=>FuncaoRepositoryFactory::class,
                Departamento::class=>DepartamentoFactory::class,
                DepartamentoRepository::class=>DepartamentoRepositoryFactory::class,
                ],
        ];
    }


}
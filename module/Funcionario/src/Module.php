<?php

namespace Funcionario;

use Funcionario\Controller\Factory\FuncionarioControllerFactory;
use Funcionario\Controller\FuncionarioController;
use Funcionario\Model\Factory\FuncionarioFactory;
use Funcionario\Model\Factory\FuncionarioRepositoryFactory;
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
                ],
        ];
    }


}
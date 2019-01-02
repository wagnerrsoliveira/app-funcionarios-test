<?php

namespace Auth;

use Auth\Form\Factory\LoginFilterFactory;
use Auth\Form\Factory\LoginFormFactory;
use Auth\Form\LoginFilter;
use Auth\Form\LoginForm;
use Auth\Model\Factory\UsersFactory;
use Auth\Model\Factory\UsersRepositoryFactory;
use Auth\Model\Users;
use Auth\Model\UsersRepository;
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
                LoginForm::class=>LoginFormFactory::class,
                LoginFilter::class=>LoginFilterFactory::class,
                Users::class=>UsersFactory::class,
                UsersRepository::class=>UsersRepositoryFactory::class,
            ]
        ];
    }


}
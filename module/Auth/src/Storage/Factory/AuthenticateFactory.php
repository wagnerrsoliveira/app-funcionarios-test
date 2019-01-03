<?php

namespace Auth\Storage\Factory;

use Auth\Storage\Authenticate;
use Auth\Storage\AuthStorage;
use Interop\Container\ContainerInterface;
use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter as AuthAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\Db\Adapter\AdapterInterface;

class AuthenticateFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $dbAdapter =$container->get(AdapterInterface::class);
        $dbTableAuthAdapter = new AuthAdapter($dbAdapter,
            'users',
            'email',
            'password',
            "MD5('123456') AND level = 1");
        $authService = new AuthenticationService();
        $authService->setAdapter($dbTableAuthAdapter);
        $authService->setStorage(new AuthStorage());
        return new Authenticate($authService);
    }
}
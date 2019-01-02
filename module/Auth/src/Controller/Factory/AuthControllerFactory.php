<?php

namespace Auth\Controller\Factory;


use Auth\Controller\AuthController;
use Interop\Container\ContainerInterface;

class AuthControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new AuthController($container);
    }

   }
<?php

namespace Auth\Form\Factory;


use Auth\Form\LoginForm;
use Interop\Container\ContainerInterface;

class LoginFormFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new LoginForm($container);
    }
}
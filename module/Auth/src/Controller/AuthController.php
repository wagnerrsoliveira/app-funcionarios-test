<?php

namespace Auth\Controller;

use Auth\Model\UsersRepository;
use Interop\Container\ContainerInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AuthController extends AbstractActionController
{
    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface)
    {
        $this->containerInterface = $containerInterface;
    }

    public function indexAction()
    {
        $users = $this->containerInterface->get(UsersRepository::class)->select();
        return new ViewModel(['users'=>$users]);
    }
}
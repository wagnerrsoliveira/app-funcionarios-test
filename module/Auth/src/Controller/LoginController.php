<?php

namespace Auth\Controller;

use Auth\Form\LoginForm;
use Auth\Storage\Authenticate;
use Interop\Container\ContainerInterface;
use Auth\Storage\Result;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LoginController extends AbstractActionController
{
    protected $authenticate;

    private $containerInterface;


    public function __construct(ContainerInterface $containerInterface)
    {
        $this->containerInterface = $containerInterface;
    }

    public function getAuthenticate()
    {
        $this->authenticate=$this->containerInterface->get(Authenticate::class);
        return $this->authenticate;
    }

    public function loginAction()
    {

        $auth = $this->getAuthenticate();
        if ($auth->hasIdentity()) {
            return $this->redirect()->toRoute('home');
        }
        $form = $this->containerInterface->get(LoginForm::class);
        if ($this->params()->fromPost()){

            $form->setData($this->params()->fromPost());
            if ($form->isValid()) {

                $dataform = $form->getData();

                $result = $auth->login(
                    $dataform['email'],
                    md5($dataform['password']),
                    $this->getRequest()->getServer('HTTP_USER_AGENT'),
                    $this->getRequest()->getServer('REMOTE_ADDR'));

                $messagesResult = new Result($result->getCode(), $result->getIdentity());

                if ($result->isValid()) {
                    //AUTHENTICADO COM SUCESSO
                    // $request['message']=$messagesResult->getMessage();
                    // $request['success']=$result->getCode();
                    // $request['redirect']="/admin";
                    return $this->redirect()->toRoute('home');
                }
                return $this->redirect()->toRoute('login');
            }
            return $this->redirect()->toRoute('home');
        }
        return new ViewModel(compact('form'));
    }

    public function logoutAction()
    {
        if ($this->getAuthenticate()->hasIdentity()) {
            $this->getAuthenticate()->logout();
        }
        return $this->redirect()->toRoute('login');
    }

}
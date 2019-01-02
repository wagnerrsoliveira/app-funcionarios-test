<?php
/**
 * Created by PhpStorm.
 * User: Pcp
 * Date: 02/01/2019
 * Time: 12:35
 */

namespace Funcionario\Controller;



use Interop\Container\ContainerInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class FuncionarioController extends AbstractActionController
{

    private $containerInterface;


    public function __construct(ContainerInterface $containerInterface)
    {
        $this->containerInterface = $containerInterface;
    }

    public function indexAction()
    {
        if(!$this->identity())
        {
            return $this->redirect()->toRoute('login');
        }
        return new ViewModel();
    }
}
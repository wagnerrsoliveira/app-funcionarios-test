<?php

namespace Funcionario\Controller;



use Funcionario\Form\FuncionarioForm;
use Funcionario\Model\DepartamentoRepository;
use Funcionario\Model\FuncaoRepository;
use Funcionario\Model\FuncionarioRepository;
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

    private function isLogado(){
        if(!$this->identity())
        {
            return $this->redirect()->toRoute('login');
        }
    }

    public function indexAction()
    {
        $this->isLogado();
        $funcionarios= $this->containerInterface->get(FuncionarioRepository::class)->select();
        $funcoes = $this->containerInterface->get(FuncaoRepository::class)->select();
        $departamentos = $this->containerInterface->get(DepartamentoRepository::class)->select();

        return new ViewModel(compact('funcoes','departamentos','funcionarios'));
    }

    public function addAction()
    {
        $this->isLogado();

        $form = $this->containerInterface->get(FuncionarioForm::class);


        if ($this->params()->fromPost()) {
            return ['form' => $form];
        }
           return new ViewModel();
    }

    public function detailAction()
    {
        //$this->isLogado();
        $id = (int) $this->params()->fromRoute('id', 0);

        if (0 === $id) {
            return $this->redirect()->toRoute('funcionario', ['action' => 'index']);
        }
        $funcionarios= $this->containerInterface->get(FuncionarioRepository::class)->select(['id'=>$id]);
        if (count($funcionarios)==0){
            return $this->redirect()->toRoute('funcionario', ['action' => 'index']);
        }
        $funcoes = $this->containerInterface->get(FuncaoRepository::class)->select();
        $departamentos = $this->containerInterface->get(DepartamentoRepository::class)->select();
        return new ViewModel(compact('funcoes','departamentos','funcionarios'));
    }

}
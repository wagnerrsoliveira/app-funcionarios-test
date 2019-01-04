<?php

namespace Funcionario\Controller;



use Funcionario\Form\FuncionarioForm;
use Funcionario\Model\DepartamentoRepository;
use Funcionario\Model\FuncaoRepository;
use Funcionario\Model\Funcionario;
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
            $form->setData($this->params()->fromPost());
            if (! $form->isValid()) {
                return compact('form','funcoes');
            }else{
                $funcionario =new Funcionario();
                $funcionario->exchangeArray($form->getData());


                 $this->containerInterface->get(FuncionarioRepository::class)->insert($funcionario->getArrayCopy());
                $this->redirect()->toRoute('funcionario');
            }

            return new ViewModel(compact('form'));
        }
        return new ViewModel(compact('form'));
    }

    public function detailAction()
    {
        $this->isLogado();
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

    public function editAction(){

        $this->isLogado();
        $id = (int) $this->params()->fromRoute('id', 0);

        if (0 === $id) {
            return $this->redirect()->toRoute('funcionario', ['action' => 'add']);
        }


        try {
            $funcionario = $this->containerInterface->get(FuncionarioRepository::class)->getFuncionario($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('funcionario', ['action' => 'index']);
        }

        $form = $this->containerInterface->get(FuncionarioForm::class);

        $form->bind($funcionario);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];

        if (! $request->isPost()) {
            return $viewData;
        }


        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return $viewData;
        }

        $this->containerInterface->get(FuncionarioRepository::class)->update($funcionario->getArrayCopy(), ["id"=>$id]);


        return $this->redirect()->toRoute('funcionario', ['action' => 'index']);
    }

    public function deleteAction(){

        $this->isLogado();
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('funcionario');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');

            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $this->containerInterface->get(FuncionarioRepository::class)->delete(['id'=>$id]);
            }

            return $this->redirect()->toRoute('funcionario');
        }

        return [
            'id'    => $id,
            'funcionario' => $this->containerInterface->get(FuncionarioRepository::class)->getFuncionario($id),
        ];
    }

}
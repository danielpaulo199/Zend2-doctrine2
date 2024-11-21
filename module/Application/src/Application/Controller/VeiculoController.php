<?php
namespace Application\Controller;

use Application\Entity\Veiculo;
use Application\Form\VeiculoForm;
use Application\Service\VeiculoServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class VeiculoController extends AbstractActionController
{
    private VeiculoServiceInterface $veiculoService;

    public function __construct(VeiculoServiceInterface $veiculoService)
    {
        $this->veiculoService = $veiculoService;
    }

    public function indexAction()
    {
        return new ViewModel([
            'veiculos' => $this->veiculoService->getAll(),
        ]);
    }

    public function cadastrarAction()
    {
        $form = new VeiculoForm();

        if ($this->getRequest()->isPost()) {

            $data = $this->getRequest()->getPost();

            $veiculo = new Veiculo();
            $veiculo->setPlaca($data['placa']);
            $veiculo->setRenavam($data['renavam']);
            $veiculo->setModelo($data['modelo']);
            $veiculo->setMarca($data['marca']);
            $veiculo->setAno($data['ano']);
            $veiculo->setCor($data['cor']);

            $this->veiculoService->cadastrar($veiculo);

            return $this->redirect()->toRoute('veiculo');
        }

        return new ViewModel([
            'form' => $form,
        ]);
    }

    public function editarAction()
    {
        $id = (int) $this->params()->fromRoute('id');
        $veiculo = $this->veiculoService->getById($id);

        if (!$veiculo) {
            return $this->redirect()->toRoute('veiculo');
        }

        $form = new VeiculoForm();
        $form->bind($veiculo);

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            $veiculo->setPlaca($data['placa']);
            $veiculo->setRenavam($data['renavam']);
            $veiculo->setModelo($data['modelo']);
            $veiculo->setMarca($data['marca']);
            $veiculo->setAno($data['ano']);
            $veiculo->setCor($data['cor']);

            $this->veiculoService->atualizar($veiculo);

            return $this->redirect()->toRoute('veiculo');
        }

        return new ViewModel([
            'form' => $form,
            'veiculo' => $veiculo,
        ]);
    }

    public function deletarAction()
    {
        $id = (int) $this->params()->fromRoute('id');

        $veiculo = $this->veiculoService->getById($id);

        if ($veiculo) {
            $this->veiculoService->deletar($veiculo);
        }

        return $this->redirect()->toRoute('veiculo');
    }
}

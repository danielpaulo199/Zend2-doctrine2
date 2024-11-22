<?php

namespace Application\Controller;

use Application\Service\MotoristaServiceInterface;
use Application\Entity\Motorista;
use Application\Form\MotoristaForm;
use Application\Service\VeiculoServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MotoristaController extends AbstractActionController
{
    protected MotoristaServiceInterface $motoristaService;
    protected VeiculoServiceInterface $veiculoService;

    public function __construct(MotoristaServiceInterface $motoristaService, VeiculoServiceInterface $veiculoService)
    {
        $this->motoristaService = $motoristaService;
        $this->veiculoService = $veiculoService;
    }

    public function indexAction()
    {
        return new ViewModel([
            'activeRoute' => 'motoristas',
            'motoristas' => $this->motoristaService->getAll()
        ]);
    }

    public function cadastrarAction()
    {
        $veiculos = $this->veiculoService->getAll();

        // Gerar opções para o campo de seleção de veículos
        $veiculosArray = [];
        foreach ($veiculos as $veiculo) {
            $vehiclesArray[$veiculo->getId()] = $veiculo->getPlaca() . ' | ' . $veiculo->getMarca() . ' | ' . $veiculo->getModelo();
        }

        $form = new MotoristaForm();
        $form->get('veiculo')->setValueOptions($vehiclesArray);
        $form->setInputFilter($form->getInputFilter());

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                $motorista = new Motorista();
                $motorista->exchangeArray($form->getData());

                // Associar o motorista ao veículo selecionado
                $vehicleId = $form->getData()['veiculo'];

                $veiculo = $this->veiculoService->getById($vehicleId);
                $motorista->setVeiculo($veiculo);

                $this->motoristaService->add($motorista);
                return $this->redirect()->toRoute('motoristas');
            }
        }

        return new ViewModel([
            'activeRoute' => 'motoristas',
            'form' => $form
        ]);
    }

    public function editarAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        $motorista = $this->motoristaService->getById($id);

        if (!$motorista) {
            return $this->redirect()->toRoute('motoristas');
        }

        // Obter a lista de veículos
        $veiculos = $this->veiculoService->getAll();
        $veiculosArray = [];
        foreach ($veiculos as $veiculo) {
            $veiculosArray[$veiculo->getId()] = $veiculo->getPlaca() . ' | ' . $veiculo->getMarca() . ' | ' . $veiculo->getModelo();
        }

        $form = new MotoristaForm();
        $form->get('veiculo')->setValueOptions($veiculosArray);
        $form->bind($motorista);

        // Setando o veículo atual do motorista
        $form->get('veiculo')->setValue($motorista->getVehicle()->getId());

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                $veiculoId = $form->get('veiculo')->getValue();
                $veiculo = $this->veiculoService->getById($veiculoId);

                // Atualiza o motorista com o novo veículo
                $motorista->setVehicle($veiculo);

                $this->motoristaService->update($motorista);

                return $this->redirect()->toRoute('motoristas');
            }
        }

        return new ViewModel([
            'activeRoute' => 'motoristas',
            'form' => $form,
            'id' => $id
        ]);
    }

    public function deletarAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);

        if ($id) {
            $motorista = $this->motoristaService->getById($id);

            if ($motorista) {
                $this->motoristaService->delete($motorista);
            }
        }

        return $this->redirect()->toRoute('motoristas');
    }
}

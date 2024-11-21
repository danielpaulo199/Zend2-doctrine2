<?php
namespace Application\Controller;

use Application\Entity\Veiculo;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Factory\EntityManagerFactory;

class VeiculoController extends AbstractActionController
{
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = EntityManagerFactory::factory();
    }

    // Listar todos os veículos
    public function indexAction()
    {
        die('estou no index veiculo');
        $veiculos = $this->entityManager->getRepository(Veiculo::class)->findAll();
        return new ViewModel([
            'veiculos' => $veiculos,
        ]);
    }

    // Cadastrar um novo veículo
    public function addAction()
    {
        $veiculo = new Veiculo();
        $form = new VeiculoForm();

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            $veiculo->setPlaca($data['placa']);
            $veiculo->setRenavam($data['renavam']);
            $veiculo->setModelo($data['modelo']);
            $veiculo->setMarca($data['marca']);
            $veiculo->setAno($data['ano']);
            $veiculo->setCor($data['cor']);

            $this->entityManager->persist($veiculo);
            $this->entityManager->flush();

            return $this->redirect()->toRoute('veiculo');
        }

        return new ViewModel([
            'form' => $form,
        ]);
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id');
        $veiculo = $this->entityManager->find(Veiculo::class, $id);

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

            $this->entityManager->flush();

            return $this->redirect()->toRoute('veiculo');
        }

        return new ViewModel([
            'form' => $form,
            'veiculo' => $veiculo,
        ]);
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id');

        $veiculo = $this->entityManager->find(Veiculo::class, $id);
        if ($veiculo) {
            $this->entityManager->remove($veiculo);
            $this->entityManager->flush();
        }

        return $this->redirect()->toRoute('veiculo');
    }
}

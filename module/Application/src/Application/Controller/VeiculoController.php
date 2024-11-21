<?php
namespace Application\Controller;

use Application\Entity\Veiculo;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Factory\EntityManagerFactory;
use Application\Form\VeiculoForm;
use Doctrine\ORM\{EntityManagerInterface, EntityRepository};

class VeiculoController extends AbstractActionController
{
    private EntityRepository $veiculosRepository;
    private EntityManagerInterface $entityManager;

    public function __construct()
    {
        $this->entityManager = EntityManagerFactory::factory();

        $this->veiculosRepository = $this->entityManager
            ->getRepository(Veiculo::class);
    }

    public function indexAction()
    {
        return new ViewModel([
            'veiculos' => $this->veiculosRepository->findAll(),
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

            $this->entityManager->persist($veiculo);
            $this->entityManager->flush();

            return $this->redirect()->toRoute('veiculo');
        }

        return new ViewModel([
            'form' => $form,
        ]);
    }

    public function editarAction()
    {
        $id = (int) $this->params()->fromRoute('id');
        $veiculo = $this->veiculosRepository->find($id);

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

    public function deletarAction()
    {
        $id = (int) $this->params()->fromRoute('id');

        $veiculo = $this->veiculosRepository->find($id);

        if ($veiculo) {
            $this->entityManager->remove($veiculo);
            $this->entityManager->flush();
        }

        return $this->redirect()->toRoute('veiculo');
    }
}

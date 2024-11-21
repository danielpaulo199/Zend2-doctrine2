<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\Veiculo;

class VeiculoService implements VeiculoServiceInterface
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Busca todos os registros de veículos.
     *
     * @return array
     */
    public function getAll()
    {
        return $this->entityManager->getRepository(Veiculo::class)->findAll();
    }

    /**
     * Encontra um veículo com base no id.
     *
     * @param int $id
     * @return Veiculo|null
     */
    public function getById(int $id)
    {
        return $this->entityManager->getRepository(Veiculo::class)->find($id);
    }

    /**
     * Cadastra um veículo.
     *
     * @param Veiculo $veiculo
     * @return Veiculo
     */
    public function cadastrar(Veiculo $veiculo)
    {
        $this->entityManager->persist($veiculo);
        $this->entityManager->flush();
        return $veiculo;
    }

    /**
     * Atualiza um veículo.
     *
     * @param Veiculo $veiculo
     * @return Veiculo
     */
    public function atualizar(Veiculo $veiculo)
    {
        $this->entityManager->merge($veiculo);
        $this->entityManager->flush();
        return $veiculo;
    }

    /**
     * Deleta um veiculo.
     *
     * @param Veiculo $veiculo
     * @return bool
     */
    public function deletar(Veiculo $veiculo)
    {
        $this->entityManager->remove($veiculo);
        $this->entityManager->flush();

        return true;
    }
}

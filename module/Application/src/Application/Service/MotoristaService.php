<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\Motorista;

class MotoristaService implements MotoristaServiceInterface
{

    protected $entityManager;


    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Retorna todos os registros
     *
     * @return array
     */
    public function getAll()
    {
        return $this->entityManager->getRepository(Motorista::class)->findAll();
    }

    /**
     * Recupera um motorista pelo id.
     *
     * @param int $id
     * @return Motorista|null
     */
    public function getById(int $id)
    {
        return $this->entityManager->getRepository(Motorista::class)->find($id);
    }

    /**
     * Cadastra um novo motorista
     *
     * @param Motorista $motora
     * @return Motorista
     */
    public function add(Motorista $motora)
    {
        $this->entityManager->persist($motora);
        $this->entityManager->flush();
        return $motora;
    }

    /**
     * Atualiza um registro
     *
     * @param Motorista $motora
     * @return Motorista
     */
    public function update(Motorista $motora)
    {
        $this->entityManager->merge($motora);
        $this->entityManager->flush();
        return $motora;
    }

    /**
     * Deleta um motorista.
     *
     * @param Motorista $motora
     * @return void
     */
    public function delete(Motorista $motora)
    {
        $this->entityManager->remove($motora);
        $this->entityManager->flush();
    }
}

<?php

namespace Application\Service;

use Application\Entity\Motorista;

interface MotoristaServiceInterface
{
    /**
     * Retorna todos os registros
     *
     * @return array
     */
    public function getAll();

    /**
     * Recupera um motorista pelo id.
     *
     * @param int $id
     * @return Motorista|null
     */
    public function getById(int $id);

    /**
     * Cadastra um novo motorista
     *
     * @param Motorista $motora
     * @return Motorista
     */
    public function add(Motorista $motora);

    /**
     * Atualiza um registro
     *
     * @param Motorista $motora
     * @return Motorista
     */
    public function update(Motorista $motora);

    /**
     * Deleta um motorista.
     *
     * @param Motorista $motora
     * @return void
     */
    public function delete(Motorista $motora);
}
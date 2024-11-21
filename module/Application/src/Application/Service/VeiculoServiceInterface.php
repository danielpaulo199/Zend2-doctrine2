<?php

namespace Application\Service;

use Application\Entity\Veiculo;

interface VeiculoServiceInterface
{
    /**
     * Busca todos os registros de veículos.
     *
     * @return array
     */
    public function getAll();

    /**
     * Encontra um veículo com base no id.
     *
     * @param int $id
     * @return Veiculo|null
     */
    public function getById(int $id);

    /**
     * Cadastra um veículo.
     *
     * @param Veiculo $veiculo
     * @return Veiculo
     */
    public function cadastrar(Veiculo $veiculo);

    /**
     * Atualiza um veículo.
     *
     * @param Veiculo $veiculo
     * @return Veiculo
     */
    public function atualizar(Veiculo $veiculo);

    /**
     * Deleta um veiculo.
     *
     * @param Veiculo $veiculo
     * @return bool
     */
    public function deletar(Veiculo $veiculo);
}
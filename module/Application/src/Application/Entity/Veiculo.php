<?php

namespace Application\Entity;

/**
 * @Entity
 */
class Veiculo
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @Column(type="string", length=7)
    */
    private string $placa;

    /**
     * @Column(type="string", length=30, nullable=true)
    */
    private int $renavam;

    /**
     * @Column(type="string", length=20)
     */
    private string $modelo;

    /**
     * @Column(type="string", length=20)
     */
    private string $marca;

    /**
     * @Column(type="integer")
     */
    private int $ano;

    /**
     * @Column(type="string", length=20)
     */
    private string $cor;

    public function getId(): int
    {
        return $this->id;
    }

    public function getPlaca(): string
    {
        return $this->placa;
    }

    public function setPlaca(string $placa): void
    {
        $this->placa = $placa;
    }

    public function getRenavam(): int
    {
        return $this->renavam;
    }

    public function setRenavam(int $renavam): void
    {
        $this->renavam = $renavam;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo): void
    {
        $this->modelo = $modelo;
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): void
    {
        $this->marca = $marca;
    }

    public function getAno(): int
    {
        return $this->ano;
    }

    public function setAno(int $ano): void
    {
        $this->ano = $ano;
    }

    public function getCor(): string
    {
        return $this->cor;
    }

    public function setCor(string $cor): void
    {
        $this->cor = $cor;
    }
}

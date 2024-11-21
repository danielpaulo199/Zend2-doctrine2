<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="veiculos")
 */
class Veiculo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /** @ORM\Column(type="string", length=7) */
    private $placa;

    /** @ORM\Column(type="string", length=30, nullable=true) */
    private $renavam;

    /** @ORM\Column(type="string", length=20) */
    private $modelo;

    /** @ORM\Column(type="string", length=20) */
    private $marca;

    /** @ORM\Column(type="integer") */
    private $ano;

    /** @ORM\Column(type="string", length=20) */
    private $cor;

    public function getId()
    {
        return $this->id;
    }

    public function getPlaca()
    {
        return $this->placa;
    }

    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }

    public function getRenavam()
    {
        return $this->renavam;
    }

    public function setRenavam($renavam)
    {
        $this->renavam = $renavam;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function setAno($ano)
    {
        $this->ano = $ano;
    }

    public function getCor()
    {
        return $this->cor;
    }

    public function setCor($cor)
    {
        $this->cor = $cor;
    }
}

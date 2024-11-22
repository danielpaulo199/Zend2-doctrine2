<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity
 * @Table(name="motorista")
 */
class Motorista
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @Column(type="string", length=200)
     * @var string
     */
    private string $nome;

    /**
     * @Column(type="string", length=20)
     * @var string
     */
    private string $rg;

    /**
     * @Column(type="string", length=11)
     * @var string
     */
    private string $cpf;

    /**
     * @Column(type="string", length=20, nullable=true)
     * @var string
     */
    private ?string $telefone;

    /**
     * @ManyToOne(targetEntity="Application\Entity\Veiculo")
     * @JoinColumn(name="veiculo_id", referencedColumnName="id")
     * @var Veiculo
     */
    private ?Veiculo $veiculo;

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getRg(): string
    {
        return $this->rg;
    }

    public function setRg(string $rg): void
    {
        $this->rg = $rg;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(?string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getVeiculo(): ?Veiculo
    {
        return $this->veiculo;
    }

    public function setVeiculo(?Veiculo $veiculo): void
    {
        $this->veiculo = $veiculo;
    }

    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'rg' => $this->rg,
            'cpf' => $this->cpf,
            'telefone' => $this->telefone,
            'veiculo' => $this->veiculo ? $this->veiculo->getId() : null,
        ];
    }

    public function exchangeArray(array $array)
    {
        $this->nome = isset($array['nome']) ? $array['nome'] : null;
        $this->rg = isset($array['rg']) ? $array['rg'] : null;
        $this->cpf = isset($array['cpf']) ? $array['cpf'] : null;
        $this->telefone = isset($array['telefone']) ? $array['telefone'] : null;
        $this->veiculo = isset($array['veiculo']) ? $array['veiculo'] : null;

        return $this;
    }
}

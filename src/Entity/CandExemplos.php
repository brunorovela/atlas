<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CandExemplosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandExemplosRepository::class)]
#[ORM\Table(
    name: 'cand_exemplos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class CandExemplos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_exemplo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdExemplo = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255, nullable: true)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'ds_comparar', type: 'string', length: 255, nullable: true)]
    private ?string $dsComparar = null;

    #[ORM\Column(name: 'sn_ok', type: 'integer', nullable: true)]
    private ?int $snOk = null;

    #[ORM\Column(name: 'ds_modo', type: 'string', length: 255, nullable: true)]
    private ?string $dsModo = null;

    #[ORM\Column(name: 'vl_percentual', type: 'integer', nullable: true)]
    private ?int $vlPercentual = null;

    public function __construct(
        ?string $dsNome = null,
        ?string $dsComparar = null,
        ?int $snOk = null,
        ?string $dsModo = null,
        ?int $vlPercentual = null
    ) {
        $this->dsNome = $dsNome;
        $this->dsComparar = $dsComparar;
        $this->snOk = $snOk;
        $this->dsModo = $dsModo;
        $this->vlPercentual = $vlPercentual;
    }

    public function getCdExemplo(): ?int
    {
        return $this->cdExemplo;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
        return $this;
    }

    public function getDsComparar(): ?string
    {
        return $this->dsComparar;
    }

    public function setDsComparar(?string $dsComparar): self
    {
        $this->dsComparar = $dsComparar;
        return $this;
    }

    public function getSnOk(): ?int
    {
        return $this->snOk;
    }

    public function setSnOk(?int $snOk): self
    {
        $this->snOk = $snOk;
        return $this;
    }

    public function getDsModo(): ?string
    {
        return $this->dsModo;
    }

    public function setDsModo(?string $dsModo): self
    {
        $this->dsModo = $dsModo;
        return $this;
    }

    public function getVlPercentual(): ?int
    {
        return $this->vlPercentual;
    }

    public function setVlPercentual(?int $vlPercentual): self
    {
        $this->vlPercentual = $vlPercentual;
        return $this;
    }
}

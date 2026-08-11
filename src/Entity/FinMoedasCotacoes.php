<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinMoedasCotacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinMoedasCotacoesRepository::class)]
#[ORM\Table(
    name: 'fin_moedas_cotacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'id_cotacoes', columns: ['id_cotacoes'])]
class FinMoedasCotacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_cotacoes', type: 'integer', options: ['unsigned' => true])]
    private ?int $idCotacoes = null;

    #[ORM\Column(name: 'cd_moeda_base', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMoedaBase = null;

    #[ORM\Column(name: 'cd_moeda_cota', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMoedaCota = null;

    #[ORM\Column(name: 'dt_cotacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCotacao = null;

    #[ORM\Column(name: 'vl_moeda_cota', type: 'float', nullable: true)]
    private ?float $vlMoedaCota = null;

    public function __construct(
        ?int $cdMoedaBase = null,
        ?int $cdMoedaCota = null,
        ?\DateTimeInterface $dtCotacao = null,
        ?float $vlMoedaCota = null
    ) {
        $this->cdMoedaBase = $cdMoedaBase;
        $this->cdMoedaCota = $cdMoedaCota;
        $this->dtCotacao = $dtCotacao;
        $this->vlMoedaCota = $vlMoedaCota;
    }

    public function getIdCotacoes(): ?int
    {
        return $this->idCotacoes;
    }

    public function getCdMoedaBase(): ?int
    {
        return $this->cdMoedaBase;
    }

    public function setCdMoedaBase(?int $cdMoedaBase): self
    {
        $this->cdMoedaBase = $cdMoedaBase;
        return $this;
    }

    public function getCdMoedaCota(): ?int
    {
        return $this->cdMoedaCota;
    }

    public function setCdMoedaCota(?int $cdMoedaCota): self
    {
        $this->cdMoedaCota = $cdMoedaCota;
        return $this;
    }

    public function getDtCotacao(): ?\DateTimeInterface
    {
        return $this->dtCotacao;
    }

    public function setDtCotacao(?\DateTimeInterface $dtCotacao): self
    {
        $this->dtCotacao = $dtCotacao;
        return $this;
    }

    public function getVlMoedaCota(): ?float
    {
        return $this->vlMoedaCota;
    }

    public function setVlMoedaCota(?float $vlMoedaCota): self
    {
        $this->vlMoedaCota = $vlMoedaCota;
        return $this;
    }
}

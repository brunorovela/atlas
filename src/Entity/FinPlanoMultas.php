<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinPlanoMultasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanoMultasRepository::class)]
#[ORM\Table(
    name: 'fin_plano_multas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxMultas', columns: ['nr_anosem', 'cd_tipo_titulo', 'nr_dia_vencimento'])]
#[ORM\Index(name: 'IX_NR_ANOSEM', columns: ['nr_anosem'])]
#[ORM\Index(name: 'IX_CD_TIPO_TITULO', columns: ['cd_tipo_titulo'])]
#[ORM\Index(name: 'IX_NR_DIA_VENCIMENTO', columns: ['nr_dia_vencimento'])]
class FinPlanoMultas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_multa', type: 'integer', options: ['unsigned' => true])]
    private ?int $idMulta = null;

    #[ORM\Column(name: 'nr_anosem', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnosem = null;

    #[ORM\Column(name: 'cd_tipo_titulo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipoTitulo = null;

    #[ORM\Column(name: 'nr_dia_vencimento', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrDiaVencimento = null;

    #[ORM\Column(name: 'vl_multa', type: 'float', nullable: true)]
    private ?float $vlMulta = null;

    public function __construct(
        ?int $nrAnosem = null,
        ?int $cdTipoTitulo = null,
        ?int $nrDiaVencimento = null,
        ?float $vlMulta = null
    ) {
        $this->nrAnosem = $nrAnosem;
        $this->cdTipoTitulo = $cdTipoTitulo;
        $this->nrDiaVencimento = $nrDiaVencimento;
        $this->vlMulta = $vlMulta;
    }

    public function getIdMulta(): ?int
    {
        return $this->idMulta;
    }

    public function getNrAnosem(): ?int
    {
        return $this->nrAnosem;
    }

    public function setNrAnosem(?int $nrAnosem): self
    {
        $this->nrAnosem = $nrAnosem;
        return $this;
    }

    public function getCdTipoTitulo(): ?int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(?int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
        return $this;
    }

    public function getNrDiaVencimento(): ?int
    {
        return $this->nrDiaVencimento;
    }

    public function setNrDiaVencimento(?int $nrDiaVencimento): self
    {
        $this->nrDiaVencimento = $nrDiaVencimento;
        return $this;
    }

    public function getVlMulta(): ?float
    {
        return $this->vlMulta;
    }

    public function setVlMulta(?float $vlMulta): self
    {
        $this->vlMulta = $vlMulta;
        return $this;
    }
}

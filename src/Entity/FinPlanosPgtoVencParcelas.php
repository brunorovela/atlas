<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinPlanosPgtoVencParcelasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanosPgtoVencParcelasRepository::class)]
#[ORM\Table(
    name: 'fin_planos_pgto_venc_parcelas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
#[ORM\Index(name: 'cd_plano_parcela', columns: ['cd_plano_parcela'])]
class FinPlanosPgtoVencParcelas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_venc_parcela', type: 'integer')]
    private ?int $cdVencParcela = null;

    #[ORM\Column(name: 'cd_plano_parcela', type: 'integer')]
    private ?int $cdPlanoParcela = null;

    #[ORM\Column(name: 'nr_parcela', type: 'integer')]
    private ?int $nrParcela = null;

    #[ORM\Column(name: 'nr_mes', type: TinyIntType::NAME)]
    private ?int $nrMes = null;

    #[ORM\Column(name: 'nr_dia', type: TinyIntType::NAME, nullable: true)]
    private ?int $nrDia = null;

    public function __construct(
        ?int $cdPlanoParcela = null,
        ?int $nrParcela = null,
        ?int $nrMes = null,
        ?int $nrDia = null
    ) {
        $this->cdPlanoParcela = $cdPlanoParcela;
        $this->nrParcela = $nrParcela;
        $this->nrMes = $nrMes;
        $this->nrDia = $nrDia;
    }

    public function getCdVencParcela(): ?int
    {
        return $this->cdVencParcela;
    }

    public function getCdPlanoParcela(): ?int
    {
        return $this->cdPlanoParcela;
    }

    public function setCdPlanoParcela(?int $cdPlanoParcela): self
    {
        $this->cdPlanoParcela = $cdPlanoParcela;
        return $this;
    }

    public function getNrParcela(): ?int
    {
        return $this->nrParcela;
    }

    public function setNrParcela(?int $nrParcela): self
    {
        $this->nrParcela = $nrParcela;
        return $this;
    }

    public function getNrMes(): ?int
    {
        return $this->nrMes;
    }

    public function setNrMes(?int $nrMes): self
    {
        $this->nrMes = $nrMes;
        return $this;
    }

    public function getNrDia(): ?int
    {
        return $this->nrDia;
    }

    public function setNrDia(?int $nrDia): self
    {
        $this->nrDia = $nrDia;
        return $this;
    }
}

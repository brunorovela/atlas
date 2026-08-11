<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConInscricoesAreasObsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConInscricoesAreasObsRepository::class)]
#[ORM\Table(
    name: 'con_inscricoes_areas_obs',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_INSCRICAO_AREA', columns: ['cd_inscricao_area'])]
class ConInscricoesAreasObs
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_observacao', type: 'integer')]
    private ?int $cdObservacao = null;

    #[ORM\Column(name: 'tx_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $txObservacao = null;

    #[ORM\Column(name: 'cd_inscricao_area', type: 'integer')]
    private ?int $cdInscricaoArea = null;

    public function __construct(
        ?string $txObservacao = null,
        ?int $cdInscricaoArea = null
    ) {
        $this->txObservacao = $txObservacao;
        $this->cdInscricaoArea = $cdInscricaoArea;
    }

    public function getCdObservacao(): ?int
    {
        return $this->cdObservacao;
    }

    public function getTxObservacao(): ?string
    {
        return $this->txObservacao;
    }

    public function setTxObservacao(?string $txObservacao): self
    {
        $this->txObservacao = $txObservacao;
        return $this;
    }

    public function getCdInscricaoArea(): ?int
    {
        return $this->cdInscricaoArea;
    }

    public function setCdInscricaoArea(?int $cdInscricaoArea): self
    {
        $this->cdInscricaoArea = $cdInscricaoArea;
        return $this;
    }
}

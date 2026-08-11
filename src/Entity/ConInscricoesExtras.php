<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConInscricoesExtrasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConInscricoesExtrasRepository::class)]
#[ORM\Table(
    name: 'con_inscricoes_extras',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_inscricoes_valores', columns: ['cd_inscricao_extra'])]
#[ORM\Index(name: 'IX_CD_INSCRICAO_AREA', columns: ['cd_inscricao_area'])]
#[ORM\Index(name: 'IX_DS_CAMPO', columns: ['ds_campo'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_CAMPO', columns: ['cd_campo'])]
class ConInscricoesExtras
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_inscricao_extra', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdInscricaoExtra = null;

    #[ORM\Column(name: 'cd_inscricao_area', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdInscricaoArea = null;

    #[ORM\Column(name: 'ds_campo', type: 'string', length: 100, nullable: true)]
    private ?string $dsCampo = null;

    #[ORM\Column(name: 'cd_campo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCampo = null;

    #[ORM\Column(name: 'ds_valor', type: 'string', length: 255, nullable: true)]
    private ?string $dsValor = null;

    public function __construct(
        ?int $cdInscricaoArea = null,
        ?string $dsCampo = null,
        ?int $cdCampo = null,
        ?string $dsValor = null
    ) {
        $this->cdInscricaoArea = $cdInscricaoArea;
        $this->dsCampo = $dsCampo;
        $this->cdCampo = $cdCampo;
        $this->dsValor = $dsValor;
    }

    public function getCdInscricaoExtra(): ?int
    {
        return $this->cdInscricaoExtra;
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

    public function getDsCampo(): ?string
    {
        return $this->dsCampo;
    }

    public function setDsCampo(?string $dsCampo): self
    {
        $this->dsCampo = $dsCampo;
        return $this;
    }

    public function getCdCampo(): ?int
    {
        return $this->cdCampo;
    }

    public function setCdCampo(?int $cdCampo): self
    {
        $this->cdCampo = $cdCampo;
        return $this;
    }

    public function getDsValor(): ?string
    {
        return $this->dsValor;
    }

    public function setDsValor(?string $dsValor): self
    {
        $this->dsValor = $dsValor;
        return $this;
    }
}

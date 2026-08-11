<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\RemOcorrenciasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemOcorrenciasRepository::class)]
#[ORM\Table(
    name: 'rem_ocorrencias',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxUniq', columns: ['cd_layout', 'cd_acao'])]
#[ORM\Index(name: 'IX_CD_LAYOUT', columns: ['cd_layout'])]
#[ORM\Index(name: 'IX_CD_ACAO', columns: ['cd_acao'])]
class RemOcorrencias
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_rem_ocorrencia', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRemOcorrencia = null;

    #[ORM\Column(name: 'cd_layout', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdLayout = null;

    #[ORM\Column(name: 'cd_acao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAcao = null;

    #[ORM\Column(name: 'cd_ocorrencia', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdOcorrencia = null;

    #[ORM\Column(name: 'ds_ocorrencia', type: 'string', length: 255, nullable: true)]
    private ?string $dsOcorrencia = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snAtivo = 0;

    #[ORM\Column(name: 'NR_POSICAO_INICIO', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrPosicaoInicio = null;

    #[ORM\Column(name: 'NR_TAMANHO', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrTamanho = null;

    public function __construct(
        ?int $cdLayout = null,
        ?int $cdAcao = null,
        ?int $cdOcorrencia = null,
        ?string $dsOcorrencia = null,
        ?int $snAtivo = 0,
        ?int $nrPosicaoInicio = null,
        ?int $nrTamanho = null
    ) {
        $this->cdLayout = $cdLayout;
        $this->cdAcao = $cdAcao;
        $this->cdOcorrencia = $cdOcorrencia;
        $this->dsOcorrencia = $dsOcorrencia;
        $this->snAtivo = $snAtivo;
        $this->nrPosicaoInicio = $nrPosicaoInicio;
        $this->nrTamanho = $nrTamanho;
    }

    public function getCdRemOcorrencia(): ?int
    {
        return $this->cdRemOcorrencia;
    }

    public function getCdLayout(): ?int
    {
        return $this->cdLayout;
    }

    public function setCdLayout(?int $cdLayout): self
    {
        $this->cdLayout = $cdLayout;
        return $this;
    }

    public function getCdAcao(): ?int
    {
        return $this->cdAcao;
    }

    public function setCdAcao(?int $cdAcao): self
    {
        $this->cdAcao = $cdAcao;
        return $this;
    }

    public function getCdOcorrencia(): ?int
    {
        return $this->cdOcorrencia;
    }

    public function setCdOcorrencia(?int $cdOcorrencia): self
    {
        $this->cdOcorrencia = $cdOcorrencia;
        return $this;
    }

    public function getDsOcorrencia(): ?string
    {
        return $this->dsOcorrencia;
    }

    public function setDsOcorrencia(?string $dsOcorrencia): self
    {
        $this->dsOcorrencia = $dsOcorrencia;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getNrPosicaoInicio(): ?int
    {
        return $this->nrPosicaoInicio;
    }

    public function setNrPosicaoInicio(?int $nrPosicaoInicio): self
    {
        $this->nrPosicaoInicio = $nrPosicaoInicio;
        return $this;
    }

    public function getNrTamanho(): ?int
    {
        return $this->nrTamanho;
    }

    public function setNrTamanho(?int $nrTamanho): self
    {
        $this->nrTamanho = $nrTamanho;
        return $this;
    }
}

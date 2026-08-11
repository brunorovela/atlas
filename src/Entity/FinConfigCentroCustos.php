<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinConfigCentroCustosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinConfigCentroCustosRepository::class)]
#[ORM\Table(
    name: 'fin_config_centro_custos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'fin_config_centro_custos_unique', columns: ['cd_centro', 'cd_coligada_matriz'])]
#[ORM\Index(name: 'IX_CD_CENTRO', columns: ['cd_centro'])]
#[ORM\Index(name: 'IX_CD_COLIGADA_MATRIZ', columns: ['cd_coligada_matriz'])]
class FinConfigCentroCustos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_centro', type: 'integer')]
    private ?int $idCentro = null;

    #[ORM\Column(name: 'cd_centro', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdCentro = 0;

    #[ORM\Column(name: 'cd_coligada_matriz', type: 'smallint', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdColigadaMatriz = 1;

    #[ORM\Column(name: 'ds_centro', type: 'string', length: 255, nullable: true)]
    private ?string $dsCentro = null;

    #[ORM\Column(name: 'ds_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'cd_classificacao', type: 'string', length: 100, nullable: true)]
    private ?string $cdClassificacao = null;

    #[ORM\Column(name: 'tp_centro', type: 'smallint', nullable: true)]
    private ?int $tpCentro = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snAtivo = true;

    #[ORM\Column(name: 'ds_sql', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsSql = null;

    #[ORM\Column(name: 'cd_centro_pai', type: 'integer')]
    private ?int $cdCentroPai = null;

    #[ORM\Column(name: 'nr_tipo_regra', type: 'integer', nullable: true)]
    private ?int $nrTipoRegra = null;

    #[ORM\Column(name: 'cd_contabilidade', type: 'string', length: 255, nullable: true)]
    private ?string $cdContabilidade = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        int $cdCentro = 0,
        int $cdColigadaMatriz = 1,
        ?string $dsCentro = null,
        ?string $dsObservacao = null,
        ?string $cdClassificacao = null,
        ?int $tpCentro = null,
        ?int $cdGrupo = null,
        ?bool $snAtivo = true,
        ?string $dsSql = null,
        ?int $cdCentroPai = null,
        ?int $nrTipoRegra = null,
        ?string $cdContabilidade = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdCentro = $cdCentro;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        $this->dsCentro = $dsCentro;
        $this->dsObservacao = $dsObservacao;
        $this->cdClassificacao = $cdClassificacao;
        $this->tpCentro = $tpCentro;
        $this->cdGrupo = $cdGrupo;
        $this->snAtivo = $snAtivo;
        $this->dsSql = $dsSql;
        $this->cdCentroPai = $cdCentroPai;
        $this->nrTipoRegra = $nrTipoRegra;
        $this->cdContabilidade = $cdContabilidade;
        $this->dtBase = $dtBase;
    }

    public function getIdCentro(): ?int
    {
        return $this->idCentro;
    }

    public function getCdCentro(): int
    {
        return $this->cdCentro;
    }

    public function setCdCentro(int $cdCentro): self
    {
        $this->cdCentro = $cdCentro;
        return $this;
    }

    public function getCdColigadaMatriz(): int
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(int $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }

    public function getDsCentro(): ?string
    {
        return $this->dsCentro;
    }

    public function setDsCentro(?string $dsCentro): self
    {
        $this->dsCentro = $dsCentro;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }

    public function getCdClassificacao(): ?string
    {
        return $this->cdClassificacao;
    }

    public function setCdClassificacao(?string $cdClassificacao): self
    {
        $this->cdClassificacao = $cdClassificacao;
        return $this;
    }

    public function getTpCentro(): ?int
    {
        return $this->tpCentro;
    }

    public function setTpCentro(?int $tpCentro): self
    {
        $this->tpCentro = $tpCentro;
        return $this;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getDsSql(): ?string
    {
        return $this->dsSql;
    }

    public function setDsSql(?string $dsSql): self
    {
        $this->dsSql = $dsSql;
        return $this;
    }

    public function getCdCentroPai(): ?int
    {
        return $this->cdCentroPai;
    }

    public function setCdCentroPai(?int $cdCentroPai): self
    {
        $this->cdCentroPai = $cdCentroPai;
        return $this;
    }

    public function getNrTipoRegra(): ?int
    {
        return $this->nrTipoRegra;
    }

    public function setNrTipoRegra(?int $nrTipoRegra): self
    {
        $this->nrTipoRegra = $nrTipoRegra;
        return $this;
    }

    public function getCdContabilidade(): ?string
    {
        return $this->cdContabilidade;
    }

    public function setCdContabilidade(?string $cdContabilidade): self
    {
        $this->cdContabilidade = $cdContabilidade;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}

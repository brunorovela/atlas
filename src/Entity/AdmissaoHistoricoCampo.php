<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\AdmissaoHistoricoCampoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdmissaoHistoricoCampoRepository::class)]
#[ORM\Table(
    name: 'admissao_historico_campo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_ADM_CAMPO_CD_ADMISSAO_CAMPO_ADM_HIST_CAMPO_CD_ADMISSAO_CAMPO', columns: ['CD_ADMISSAO_CAMPO'])]
#[ORM\Index(name: 'FK_FIN_CONFIG_CC_CD_CENTRO_CD_COLIGADA_MATRIZ_ADM_HIST_CAMPO', columns: ['CD_CENTRO', 'CD_COLIGADA_MATRIZ'])]
#[ORM\Index(name: 'IDX_AB50AB062E351D90', columns: ['CD_ADMISSAO_HISTORICO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_ADM_CAMPO_CD_ADMISSAO_CAMPO_ADM_HIST_CAMPO_CD_ADMISSAO_CAMPO', 'colunas' => ['CD_ADMISSAO_CAMPO'], 'tabelaAlvo' => 'admissao_campo', 'colunasAlvo' => ['CD_ADMISSAO_CAMPO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_ADM_HIST_CD_ADMISSAO_HIST_ADM_HIST_CAMPO_CD_ADMISSAO_HIST', 'colunas' => ['CD_ADMISSAO_HISTORICO'], 'tabelaAlvo' => 'admissao_historico', 'colunasAlvo' => ['CD_ADMISSAO_HISTORICO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_FIN_CONFIG_CC_CD_CENTRO_CD_COLIGADA_MATRIZ_ADM_HIST_CAMPO', 'colunas' => ['CD_CENTRO', 'CD_COLIGADA_MATRIZ'], 'tabelaAlvo' => 'fin_config_centro_custos', 'colunasAlvo' => ['cd_centro', 'cd_coligada_matriz'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AdmissaoHistoricoCampo
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: AdmissaoHistorico::class)]
    #[ORM\JoinColumn(name: 'CD_ADMISSAO_HISTORICO', referencedColumnName: 'CD_ADMISSAO_HISTORICO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?AdmissaoHistorico $cdAdmissaoHistorico = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: AdmissaoCampo::class)]
    #[ORM\JoinColumn(name: 'CD_ADMISSAO_CAMPO', referencedColumnName: 'CD_ADMISSAO_CAMPO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?AdmissaoCampo $cdAdmissaoCampo = null;

    #[ORM\Column(name: 'SN_ATIVO', type: 'boolean', options: ['default' => '0'])]
    private bool $snAtivo = false;

    #[ORM\Column(name: 'VL_HORAS', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $vlHoras = null;

    #[ORM\Column(name: 'CD_CENTRO', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCentro = null;

    #[ORM\Column(name: 'CD_COLIGADA_MATRIZ', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $cdColigadaMatriz = null;

    public function __construct(
        ?AdmissaoHistorico $cdAdmissaoHistorico = null,
        ?AdmissaoCampo $cdAdmissaoCampo = null,
        bool $snAtivo = false,
        ?float $vlHoras = null,
        ?int $cdCentro = null,
        ?int $cdColigadaMatriz = null
    ) {
        $this->cdAdmissaoHistorico = $cdAdmissaoHistorico;
        $this->cdAdmissaoCampo = $cdAdmissaoCampo;
        $this->snAtivo = $snAtivo;
        $this->vlHoras = $vlHoras;
        $this->cdCentro = $cdCentro;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdAdmissaoHistorico(): ?AdmissaoHistorico
    {
        return $this->cdAdmissaoHistorico;
    }

    public function setCdAdmissaoHistorico(?AdmissaoHistorico $cdAdmissaoHistorico): self
    {
        $this->cdAdmissaoHistorico = $cdAdmissaoHistorico;
        return $this;
    }

    public function getCdAdmissaoCampo(): ?AdmissaoCampo
    {
        return $this->cdAdmissaoCampo;
    }

    public function setCdAdmissaoCampo(?AdmissaoCampo $cdAdmissaoCampo): self
    {
        $this->cdAdmissaoCampo = $cdAdmissaoCampo;
        return $this;
    }

    public function isSnAtivo(): bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getVlHoras(): ?float
    {
        return $this->vlHoras;
    }

    public function setVlHoras(?float $vlHoras): self
    {
        $this->vlHoras = $vlHoras;
        return $this;
    }

    public function getCdCentro(): ?int
    {
        return $this->cdCentro;
    }

    public function setCdCentro(?int $cdCentro): self
    {
        $this->cdCentro = $cdCentro;
        return $this;
    }

    public function getCdColigadaMatriz(): ?int
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?int $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }
}

<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\AdmissaoHistoricoCampoCursoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdmissaoHistoricoCampoCursoRepository::class)]
#[ORM\Table(
    name: 'admissao_historico_campo_curso',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_CUR_MESTRE_CD_CURSO_ADMISSAO_HISTORICO_CAMPO_CURSO_CD_CURSO', columns: ['CD_CURSO'])]
#[ORM\Index(name: 'FK_ADM_HIST_CAMPO_CURSO_CONFIG_CC_CD_CENTRO_CD_COLIGADA_MATRIZ', columns: ['CD_CENTRO', 'CD_COLIGADA_MATRIZ'])]
#[ORM\Index(name: 'IDX_8F8D5CC92E351D90EE1711EF', columns: ['CD_ADMISSAO_HISTORICO', 'CD_ADMISSAO_CAMPO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_ADM_HIST_CAMPO_ADM_HIST_CAMPO_CURSO_CD_ADM_HIST_CD_ADM_CAMPO', 'colunas' => ['CD_ADMISSAO_HISTORICO', 'CD_ADMISSAO_CAMPO'], 'tabelaAlvo' => 'admissao_historico_campo', 'colunasAlvo' => ['CD_ADMISSAO_HISTORICO', 'CD_ADMISSAO_CAMPO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_ADM_HIST_CAMPO_CURSO_CONFIG_CC_CD_CENTRO_CD_COLIGADA_MATRIZ', 'colunas' => ['CD_CENTRO', 'CD_COLIGADA_MATRIZ'], 'tabelaAlvo' => 'fin_config_centro_custos', 'colunasAlvo' => ['cd_centro', 'cd_coligada_matriz'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_CUR_MESTRE_CD_CURSO_ADMISSAO_HISTORICO_CAMPO_CURSO_CD_CURSO', 'colunas' => ['CD_CURSO'], 'tabelaAlvo' => 'cursos_mestre', 'colunasAlvo' => ['CD_CURSO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AdmissaoHistoricoCampoCurso
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_ADMISSAO_HISTORICO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAdmissaoHistorico = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_ADMISSAO_CAMPO', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $cdAdmissaoCampo = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CursosMestre::class)]
    #[ORM\JoinColumn(name: 'CD_CURSO', referencedColumnName: 'CD_CURSO', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CursosMestre $cdCurso = null;

    #[ORM\Column(name: 'VL_HORAS', type: 'float', nullable: true)]
    private ?float $vlHoras = null;

    #[ORM\Column(name: 'CD_CENTRO', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCentro = null;

    #[ORM\Column(name: 'CD_COLIGADA_MATRIZ', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $cdColigadaMatriz = null;

    public function __construct(
        ?int $cdAdmissaoHistorico = null,
        ?int $cdAdmissaoCampo = null,
        ?CursosMestre $cdCurso = null,
        ?float $vlHoras = null,
        ?int $cdCentro = null,
        ?int $cdColigadaMatriz = null
    ) {
        $this->cdAdmissaoHistorico = $cdAdmissaoHistorico;
        $this->cdAdmissaoCampo = $cdAdmissaoCampo;
        $this->cdCurso = $cdCurso;
        $this->vlHoras = $vlHoras;
        $this->cdCentro = $cdCentro;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdAdmissaoHistorico(): ?int
    {
        return $this->cdAdmissaoHistorico;
    }

    public function setCdAdmissaoHistorico(?int $cdAdmissaoHistorico): self
    {
        $this->cdAdmissaoHistorico = $cdAdmissaoHistorico;
        return $this;
    }

    public function getCdAdmissaoCampo(): ?int
    {
        return $this->cdAdmissaoCampo;
    }

    public function setCdAdmissaoCampo(?int $cdAdmissaoCampo): self
    {
        $this->cdAdmissaoCampo = $cdAdmissaoCampo;
        return $this;
    }

    public function getCdCurso(): ?CursosMestre
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?CursosMestre $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
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

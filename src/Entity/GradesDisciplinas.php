<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\GradesDisciplinasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GradesDisciplinasRepository::class)]
#[ORM\Table(
    name: 'grades_disciplinas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_GRADE', columns: ['CD_GRADE'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['CD_CURSO'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['CD_DISCIPLINA'])]
#[ORM\Index(name: 'IX_NR_SERIE', columns: ['NR_SERIE'])]
#[ORM\Index(name: 'IX_CD_AVALIACAO', columns: ['CD_AVALIACAO'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA_FRENTE', columns: ['CD_DISCIPLINA_FRENTE'])]
#[ORM\Index(name: 'IX_CD_CURSO_CD_GRADE', columns: ['CD_CURSO', 'CD_GRADE'])]
#[ORM\Index(name: 'IX_CD_CURSO_CD_GRADE_CD_DISCIPLINA', columns: ['CD_CURSO', 'CD_GRADE', 'CD_DISCIPLINA'])]
#[ORM\Index(name: 'IX_SN_COMPARTILHADA', columns: ['SN_COMPARTILHADA'])]
#[ORM\Index(name: 'FK_CD_CATEGORIA_COMPONENTE_CURRICULAR', columns: ['cd_categoria_componente_curricular'])]
#[ORM\Index(name: 'grades_disciplinas_unidade_curricular_etiqueta_FK', columns: ['id_unidade_curricular_etiqueta'])]
#[ORM\Index(name: 'grades_disciplinas_unidade_curricular_tipo_FK', columns: ['id_unidade_curricular_tipo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CD_CATEGORIA_COMPONENTE_CURRICULAR', 'colunas' => ['cd_categoria_componente_curricular'], 'tabelaAlvo' => 'unim_categoria_componente_curricular', 'colunasAlvo' => ['cd_categoria_componente_curricular'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'grades_disciplinas_unidade_curricular_etiqueta_FK', 'colunas' => ['id_unidade_curricular_etiqueta'], 'tabelaAlvo' => 'unidade_curricular_etiqueta', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'grades_disciplinas_unidade_curricular_tipo_FK', 'colunas' => ['id_unidade_curricular_tipo'], 'tabelaAlvo' => 'unidade_curricular_tipo', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class GradesDisciplinas
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_GRADE', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrade = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_CURSO', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_DISCIPLINA', type: 'integer', options: ['default' => '0'])]
    private int $cdDisciplina = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'NR_SERIE', type: 'integer', options: ['default' => '0'])]
    private int $nrSerie = 0;

    #[ORM\ManyToOne(targetEntity: UnimCategoriaComponenteCurricular::class)]
    #[ORM\JoinColumn(name: 'cd_categoria_componente_curricular', referencedColumnName: 'cd_categoria_componente_curricular', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnimCategoriaComponenteCurricular $cdCategoriaComponenteCurricular = null;

    #[ORM\ManyToOne(targetEntity: UnidadeCurricularTipo::class)]
    #[ORM\JoinColumn(name: 'id_unidade_curricular_tipo', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnidadeCurricularTipo $idUnidadeCurricularTipo = null;

    #[ORM\ManyToOne(targetEntity: UnidadeCurricularEtiqueta::class)]
    #[ORM\JoinColumn(name: 'id_unidade_curricular_etiqueta', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnidadeCurricularEtiqueta $idUnidadeCurricularEtiqueta = null;

    #[ORM\Column(name: 'NR_AULAS', type: 'smallfloat', nullable: true)]
    private ?float $nrAulas = null;

    #[ORM\Column(name: 'VL_VALOR', type: 'smallfloat', nullable: true)]
    private ?float $vlValor = null;

    #[ORM\Column(name: 'vl_ch_extensao', type: 'smallfloat', nullable: true)]
    private ?float $vlChExtensao = null;

    #[ORM\Column(name: 'vl_ch_etapa1', type: 'smallfloat', nullable: true)]
    private ?float $vlChEtapa1 = null;

    #[ORM\Column(name: 'vl_ch_etapa2', type: 'smallfloat', nullable: true)]
    private ?float $vlChEtapa2 = null;

    #[ORM\Column(name: 'vl_ch_etapa3', type: 'smallfloat', nullable: true)]
    private ?float $vlChEtapa3 = null;

    #[ORM\Column(name: 'vl_ch_etapa4', type: 'smallfloat', nullable: true)]
    private ?float $vlChEtapa4 = null;

    #[ORM\Column(name: 'vl_valor_relogio', type: 'time', nullable: true)]
    private ?\DateTimeInterface $vlValorRelogio = null;

    #[ORM\Column(name: 'SN_COMPARTILHADA', type: 'integer', nullable: true)]
    private ?int $snCompartilhada = null;

    #[ORM\Column(name: 'NR_CREDITOS_ACADEMICOS', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrCreditosAcademicos = null;

    #[ORM\Column(name: 'CD_DISCIPLINA_CATEGORIA', type: 'integer', nullable: true)]
    private ?int $cdDisciplinaCategoria = null;

    #[ORM\Column(name: 'NR_CARGA_HORARIA_PRATICA', type: 'smallfloat', nullable: true)]
    private ?float $nrCargaHorariaPratica = null;

    #[ORM\Column(name: 'NR_CARGA_HORARIA_TEORICA', type: 'smallfloat', nullable: true)]
    private ?float $nrCargaHorariaTeorica = null;

    #[ORM\Column(name: 'CD_AVALIACAO', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAvaliacao = null;

    #[ORM\Column(name: 'SN_EXTRA', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snExtra = false;

    #[ORM\Column(name: 'CD_DISCIPLINA_FRENTE', type: 'integer', nullable: true)]
    private ?int $cdDisciplinaFrente = null;

    #[ORM\Column(name: 'NR_QTD_DIAS_INICIO_MOODLE', type: 'integer', options: ['default' => '0'])]
    private int $nrQtdDiasInicioMoodle = 0;

    #[ORM\Column(name: 'SN_OPTATIVA', type: 'boolean', options: ['default' => '0'])]
    private bool $snOptativa = false;

    #[ORM\Column(name: 'NR_CH_TEORICA_PRATICA', type: 'smallfloat', nullable: true)]
    private ?float $nrChTeoricaPratica = null;

    #[ORM\Column(name: 'SN_AJUSTE_REMATRICULA', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snAjusteRematricula = 1;

    #[ORM\Column(name: 'dt_revisao', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtRevisao = null;

    #[ORM\Column(name: 'dt_limite', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLimite = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    // Sem construtor: 30 propriedades. Use os setters encadeados.

    public function getCdGrade(): ?int
    {
        return $this->cdGrade;
    }

    public function setCdGrade(?int $cdGrade): self
    {
        $this->cdGrade = $cdGrade;
        return $this;
    }

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdDisciplina(): int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function getNrSerie(): int
    {
        return $this->nrSerie;
    }

    public function setNrSerie(int $nrSerie): self
    {
        $this->nrSerie = $nrSerie;
        return $this;
    }

    public function getCdCategoriaComponenteCurricular(): ?UnimCategoriaComponenteCurricular
    {
        return $this->cdCategoriaComponenteCurricular;
    }

    public function setCdCategoriaComponenteCurricular(?UnimCategoriaComponenteCurricular $cdCategoriaComponenteCurricular): self
    {
        $this->cdCategoriaComponenteCurricular = $cdCategoriaComponenteCurricular;
        return $this;
    }

    public function getIdUnidadeCurricularTipo(): ?UnidadeCurricularTipo
    {
        return $this->idUnidadeCurricularTipo;
    }

    public function setIdUnidadeCurricularTipo(?UnidadeCurricularTipo $idUnidadeCurricularTipo): self
    {
        $this->idUnidadeCurricularTipo = $idUnidadeCurricularTipo;
        return $this;
    }

    public function getIdUnidadeCurricularEtiqueta(): ?UnidadeCurricularEtiqueta
    {
        return $this->idUnidadeCurricularEtiqueta;
    }

    public function setIdUnidadeCurricularEtiqueta(?UnidadeCurricularEtiqueta $idUnidadeCurricularEtiqueta): self
    {
        $this->idUnidadeCurricularEtiqueta = $idUnidadeCurricularEtiqueta;
        return $this;
    }

    public function getNrAulas(): ?float
    {
        return $this->nrAulas;
    }

    public function setNrAulas(?float $nrAulas): self
    {
        $this->nrAulas = $nrAulas;
        return $this;
    }

    public function getVlValor(): ?float
    {
        return $this->vlValor;
    }

    public function setVlValor(?float $vlValor): self
    {
        $this->vlValor = $vlValor;
        return $this;
    }

    public function getVlChExtensao(): ?float
    {
        return $this->vlChExtensao;
    }

    public function setVlChExtensao(?float $vlChExtensao): self
    {
        $this->vlChExtensao = $vlChExtensao;
        return $this;
    }

    public function getVlChEtapa1(): ?float
    {
        return $this->vlChEtapa1;
    }

    public function setVlChEtapa1(?float $vlChEtapa1): self
    {
        $this->vlChEtapa1 = $vlChEtapa1;
        return $this;
    }

    public function getVlChEtapa2(): ?float
    {
        return $this->vlChEtapa2;
    }

    public function setVlChEtapa2(?float $vlChEtapa2): self
    {
        $this->vlChEtapa2 = $vlChEtapa2;
        return $this;
    }

    public function getVlChEtapa3(): ?float
    {
        return $this->vlChEtapa3;
    }

    public function setVlChEtapa3(?float $vlChEtapa3): self
    {
        $this->vlChEtapa3 = $vlChEtapa3;
        return $this;
    }

    public function getVlChEtapa4(): ?float
    {
        return $this->vlChEtapa4;
    }

    public function setVlChEtapa4(?float $vlChEtapa4): self
    {
        $this->vlChEtapa4 = $vlChEtapa4;
        return $this;
    }

    public function getVlValorRelogio(): ?\DateTimeInterface
    {
        return $this->vlValorRelogio;
    }

    public function setVlValorRelogio(?\DateTimeInterface $vlValorRelogio): self
    {
        $this->vlValorRelogio = $vlValorRelogio;
        return $this;
    }

    public function getSnCompartilhada(): ?int
    {
        return $this->snCompartilhada;
    }

    public function setSnCompartilhada(?int $snCompartilhada): self
    {
        $this->snCompartilhada = $snCompartilhada;
        return $this;
    }

    public function getNrCreditosAcademicos(): ?int
    {
        return $this->nrCreditosAcademicos;
    }

    public function setNrCreditosAcademicos(?int $nrCreditosAcademicos): self
    {
        $this->nrCreditosAcademicos = $nrCreditosAcademicos;
        return $this;
    }

    public function getCdDisciplinaCategoria(): ?int
    {
        return $this->cdDisciplinaCategoria;
    }

    public function setCdDisciplinaCategoria(?int $cdDisciplinaCategoria): self
    {
        $this->cdDisciplinaCategoria = $cdDisciplinaCategoria;
        return $this;
    }

    public function getNrCargaHorariaPratica(): ?float
    {
        return $this->nrCargaHorariaPratica;
    }

    public function setNrCargaHorariaPratica(?float $nrCargaHorariaPratica): self
    {
        $this->nrCargaHorariaPratica = $nrCargaHorariaPratica;
        return $this;
    }

    public function getNrCargaHorariaTeorica(): ?float
    {
        return $this->nrCargaHorariaTeorica;
    }

    public function setNrCargaHorariaTeorica(?float $nrCargaHorariaTeorica): self
    {
        $this->nrCargaHorariaTeorica = $nrCargaHorariaTeorica;
        return $this;
    }

    public function getCdAvaliacao(): ?int
    {
        return $this->cdAvaliacao;
    }

    public function setCdAvaliacao(?int $cdAvaliacao): self
    {
        $this->cdAvaliacao = $cdAvaliacao;
        return $this;
    }

    public function isSnExtra(): ?bool
    {
        return $this->snExtra;
    }

    public function setSnExtra(?bool $snExtra): self
    {
        $this->snExtra = $snExtra;
        return $this;
    }

    public function getCdDisciplinaFrente(): ?int
    {
        return $this->cdDisciplinaFrente;
    }

    public function setCdDisciplinaFrente(?int $cdDisciplinaFrente): self
    {
        $this->cdDisciplinaFrente = $cdDisciplinaFrente;
        return $this;
    }

    public function getNrQtdDiasInicioMoodle(): int
    {
        return $this->nrQtdDiasInicioMoodle;
    }

    public function setNrQtdDiasInicioMoodle(int $nrQtdDiasInicioMoodle): self
    {
        $this->nrQtdDiasInicioMoodle = $nrQtdDiasInicioMoodle;
        return $this;
    }

    public function isSnOptativa(): bool
    {
        return $this->snOptativa;
    }

    public function setSnOptativa(bool $snOptativa): self
    {
        $this->snOptativa = $snOptativa;
        return $this;
    }

    public function getNrChTeoricaPratica(): ?float
    {
        return $this->nrChTeoricaPratica;
    }

    public function setNrChTeoricaPratica(?float $nrChTeoricaPratica): self
    {
        $this->nrChTeoricaPratica = $nrChTeoricaPratica;
        return $this;
    }

    public function getSnAjusteRematricula(): int
    {
        return $this->snAjusteRematricula;
    }

    public function setSnAjusteRematricula(int $snAjusteRematricula): self
    {
        $this->snAjusteRematricula = $snAjusteRematricula;
        return $this;
    }

    public function getDtRevisao(): ?\DateTimeInterface
    {
        return $this->dtRevisao;
    }

    public function setDtRevisao(?\DateTimeInterface $dtRevisao): self
    {
        $this->dtRevisao = $dtRevisao;
        return $this;
    }

    public function getDtLimite(): ?\DateTimeInterface
    {
        return $this->dtLimite;
    }

    public function setDtLimite(?\DateTimeInterface $dtLimite): self
    {
        $this->dtLimite = $dtLimite;
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

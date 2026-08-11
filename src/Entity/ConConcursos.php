<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ConConcursosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConConcursosRepository::class)]
#[ORM\Table(
    name: 'con_concursos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_concurso', columns: ['cd_concurso'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_CD_DEPTO', columns: ['cd_depto'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_DT_INICIO', columns: ['dt_inicio'])]
#[ORM\Index(name: 'IX_DT_FIM', columns: ['dt_fim'])]
#[ORM\Index(name: 'IX_CURSO', columns: ['curso'])]
#[ORM\Index(name: 'IX_TURMA', columns: ['turma'], options: ['lengths' => [20]])]
class ConConcursos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_concurso', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConcurso = null;

    #[ORM\Column(name: 'cd_tipo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'ds_concurso', type: 'string', length: 255, nullable: true)]
    private ?string $dsConcurso = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'dt_libera_resultado', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLiberaResultado = null;

    #[ORM\Column(name: 'sn_multiplas_areas', type: 'boolean', options: ['default' => '0'])]
    private bool $snMultiplasAreas = false;

    #[ORM\Column(name: 'cd_depto', type: 'integer', nullable: true)]
    private ?int $cdDepto = null;

    #[ORM\Column(name: 'nr_valor_inscricao', type: 'float', options: ['unsigned' => true, 'default' => '0.000'])]
    private float $nrValorInscricao = 0.0;

    #[ORM\Column(name: 'dt_financeiro_venc', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFinanceiroVenc = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'sn_confirma_fin', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $snConfirmaFin = 0;

    #[ORM\Column(name: 'sn_mat_confirma_fin', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snMatConfirmaFin = 0;

    #[ORM\Column(name: 'sn_material', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snMaterial = 0;

    #[ORM\Column(name: 'turma', type: 'string', length: 50)]
    private ?string $turma = null;

    #[ORM\Column(name: 'curso', type: 'string', length: 15, nullable: true)]
    private ?string $curso = null;

    #[ORM\Column(name: 'sn_exibir_grade', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snExibirGrade = 0;

    #[ORM\Column(name: 'sn_exibir_informacoes', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snExibirInformacoes = 0;

    #[ORM\Column(name: 'sn_confirma_cadastro', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snConfirmaCadastro = 1;

    #[ORM\Column(name: 'sn_altera_dados_extra', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAlteraDadosExtra = false;

    #[ORM\Column(name: 'dt_fim_altera_dados_extra', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFimAlteraDadosExtra = null;

    #[ORM\Column(name: 'sn_classificacao', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snClassificacao = 1;

    #[ORM\Column(name: 'ds_finalidade', type: 'string', length: 120, nullable: true, options: ['comment' => 'Inscrição, Matricula, Adesão, Ingresso'])]
    private ?string $dsFinalidade = null;

    #[ORM\Column(name: 'sn_utiliza_peso', type: 'string', length: 1, options: ['fixed' => true, 'default' => '1'])]
    private string $snUtilizaPeso = '1';

    #[ORM\Column(name: 'nr_import_grade', type: 'integer', nullable: true)]
    private ?int $nrImportGrade = null;

    #[ORM\Column(name: 'sn_fila_espera', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snFilaEspera = false;

    #[ORM\Column(name: 'sn_avisa_isencao', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snAvisaIsencao = true;

    #[ORM\Column(name: 'sn_presencial', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $snPresencial = 1;

    #[ORM\Column(name: 'sn_confirma_area', type: 'boolean', options: ['default' => '0'])]
    private bool $snConfirmaArea = false;

    #[ORM\Column(name: 'sn_mostrar_inscricao_extra', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snMostrarInscricaoExtra = false;

    // Sem construtor: 29 propriedades. Use os setters encadeados.

    public function getCdConcurso(): ?int
    {
        return $this->cdConcurso;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getDsConcurso(): ?string
    {
        return $this->dsConcurso;
    }

    public function setDsConcurso(?string $dsConcurso): self
    {
        $this->dsConcurso = $dsConcurso;
        return $this;
    }

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dtInicio;
    }

    public function setDtInicio(?\DateTimeInterface $dtInicio): self
    {
        $this->dtInicio = $dtInicio;
        return $this;
    }

    public function getDtFim(): ?\DateTimeInterface
    {
        return $this->dtFim;
    }

    public function setDtFim(?\DateTimeInterface $dtFim): self
    {
        $this->dtFim = $dtFim;
        return $this;
    }

    public function getDtLiberaResultado(): ?\DateTimeInterface
    {
        return $this->dtLiberaResultado;
    }

    public function setDtLiberaResultado(?\DateTimeInterface $dtLiberaResultado): self
    {
        $this->dtLiberaResultado = $dtLiberaResultado;
        return $this;
    }

    public function isSnMultiplasAreas(): bool
    {
        return $this->snMultiplasAreas;
    }

    public function setSnMultiplasAreas(bool $snMultiplasAreas): self
    {
        $this->snMultiplasAreas = $snMultiplasAreas;
        return $this;
    }

    public function getCdDepto(): ?int
    {
        return $this->cdDepto;
    }

    public function setCdDepto(?int $cdDepto): self
    {
        $this->cdDepto = $cdDepto;
        return $this;
    }

    public function getNrValorInscricao(): float
    {
        return $this->nrValorInscricao;
    }

    public function setNrValorInscricao(float $nrValorInscricao): self
    {
        $this->nrValorInscricao = $nrValorInscricao;
        return $this;
    }

    public function getDtFinanceiroVenc(): ?\DateTimeInterface
    {
        return $this->dtFinanceiroVenc;
    }

    public function setDtFinanceiroVenc(?\DateTimeInterface $dtFinanceiroVenc): self
    {
        $this->dtFinanceiroVenc = $dtFinanceiroVenc;
        return $this;
    }

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getSnConfirmaFin(): int
    {
        return $this->snConfirmaFin;
    }

    public function setSnConfirmaFin(int $snConfirmaFin): self
    {
        $this->snConfirmaFin = $snConfirmaFin;
        return $this;
    }

    public function getSnMatConfirmaFin(): ?int
    {
        return $this->snMatConfirmaFin;
    }

    public function setSnMatConfirmaFin(?int $snMatConfirmaFin): self
    {
        $this->snMatConfirmaFin = $snMatConfirmaFin;
        return $this;
    }

    public function getSnMaterial(): ?int
    {
        return $this->snMaterial;
    }

    public function setSnMaterial(?int $snMaterial): self
    {
        $this->snMaterial = $snMaterial;
        return $this;
    }

    public function getTurma(): ?string
    {
        return $this->turma;
    }

    public function setTurma(?string $turma): self
    {
        $this->turma = $turma;
        return $this;
    }

    public function getCurso(): ?string
    {
        return $this->curso;
    }

    public function setCurso(?string $curso): self
    {
        $this->curso = $curso;
        return $this;
    }

    public function getSnExibirGrade(): ?int
    {
        return $this->snExibirGrade;
    }

    public function setSnExibirGrade(?int $snExibirGrade): self
    {
        $this->snExibirGrade = $snExibirGrade;
        return $this;
    }

    public function getSnExibirInformacoes(): ?int
    {
        return $this->snExibirInformacoes;
    }

    public function setSnExibirInformacoes(?int $snExibirInformacoes): self
    {
        $this->snExibirInformacoes = $snExibirInformacoes;
        return $this;
    }

    public function getSnConfirmaCadastro(): ?int
    {
        return $this->snConfirmaCadastro;
    }

    public function setSnConfirmaCadastro(?int $snConfirmaCadastro): self
    {
        $this->snConfirmaCadastro = $snConfirmaCadastro;
        return $this;
    }

    public function isSnAlteraDadosExtra(): ?bool
    {
        return $this->snAlteraDadosExtra;
    }

    public function setSnAlteraDadosExtra(?bool $snAlteraDadosExtra): self
    {
        $this->snAlteraDadosExtra = $snAlteraDadosExtra;
        return $this;
    }

    public function getDtFimAlteraDadosExtra(): ?\DateTimeInterface
    {
        return $this->dtFimAlteraDadosExtra;
    }

    public function setDtFimAlteraDadosExtra(?\DateTimeInterface $dtFimAlteraDadosExtra): self
    {
        $this->dtFimAlteraDadosExtra = $dtFimAlteraDadosExtra;
        return $this;
    }

    public function getSnClassificacao(): int
    {
        return $this->snClassificacao;
    }

    public function setSnClassificacao(int $snClassificacao): self
    {
        $this->snClassificacao = $snClassificacao;
        return $this;
    }

    public function getDsFinalidade(): ?string
    {
        return $this->dsFinalidade;
    }

    public function setDsFinalidade(?string $dsFinalidade): self
    {
        $this->dsFinalidade = $dsFinalidade;
        return $this;
    }

    public function getSnUtilizaPeso(): string
    {
        return $this->snUtilizaPeso;
    }

    public function setSnUtilizaPeso(string $snUtilizaPeso): self
    {
        $this->snUtilizaPeso = $snUtilizaPeso;
        return $this;
    }

    public function getNrImportGrade(): ?int
    {
        return $this->nrImportGrade;
    }

    public function setNrImportGrade(?int $nrImportGrade): self
    {
        $this->nrImportGrade = $nrImportGrade;
        return $this;
    }

    public function isSnFilaEspera(): ?bool
    {
        return $this->snFilaEspera;
    }

    public function setSnFilaEspera(?bool $snFilaEspera): self
    {
        $this->snFilaEspera = $snFilaEspera;
        return $this;
    }

    public function isSnAvisaIsencao(): ?bool
    {
        return $this->snAvisaIsencao;
    }

    public function setSnAvisaIsencao(?bool $snAvisaIsencao): self
    {
        $this->snAvisaIsencao = $snAvisaIsencao;
        return $this;
    }

    public function getSnPresencial(): int
    {
        return $this->snPresencial;
    }

    public function setSnPresencial(int $snPresencial): self
    {
        $this->snPresencial = $snPresencial;
        return $this;
    }

    public function isSnConfirmaArea(): bool
    {
        return $this->snConfirmaArea;
    }

    public function setSnConfirmaArea(bool $snConfirmaArea): self
    {
        $this->snConfirmaArea = $snConfirmaArea;
        return $this;
    }

    public function isSnMostrarInscricaoExtra(): ?bool
    {
        return $this->snMostrarInscricaoExtra;
    }

    public function setSnMostrarInscricaoExtra(?bool $snMostrarInscricaoExtra): self
    {
        $this->snMostrarInscricaoExtra = $snMostrarInscricaoExtra;
        return $this;
    }
}

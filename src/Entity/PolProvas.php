<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PolProvasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolProvasRepository::class)]
#[ORM\Table(
    name: 'pol_provas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_RESPONSAVEL', columns: ['cd_responsavel'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA_PAI', columns: ['cd_disciplina_pai'])]
#[ORM\Index(name: 'IX_DT_INICIO', columns: ['dt_inicio'])]
#[ORM\Index(name: 'IX_DT_FIM', columns: ['dt_fim'])]
class PolProvas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova', type: 'integer')]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'cd_responsavel', type: 'integer')]
    private ?int $cdResponsavel = null;

    #[ORM\Column(name: 'cd_disciplina_pai', type: 'string', length: 255, nullable: true)]
    private ?string $cdDisciplinaPai = null;

    #[ORM\Column(name: 'cd_categoria', type: 'integer')]
    private ?int $cdCategoria = null;

    #[ORM\Column(name: 'ds_prova', type: 'string', length: 255, nullable: true)]
    private ?string $dsProva = null;

    #[ORM\Column(name: 'vl_peso', type: 'smallfloat', nullable: true, options: ['default' => '0'])]
    private ?float $vlPeso = 0.0;

    #[ORM\Column(name: 'nr_qtd_questoes', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrQtdQuestoes = 0;

    #[ORM\Column(name: 'nr_qtd_resolucoes', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrQtdResolucoes = 0;

    #[ORM\Column(name: 'nr_etapa', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrEtapa = 0;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'sn_avaliacao', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snAvaliacao = 0;

    #[ORM\Column(name: 'sn_exibe_gabarito', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snExibeGabarito = 0;

    #[ORM\Column(name: 'sn_questoes_aleatorio', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snQuestoesAleatorio = 0;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snAtivo = 0;

    #[ORM\Column(name: 'sn_questoes_disciplina', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snQuestoesDisciplina = 0;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'nr_tempo_resolucao', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrTempoResolucao = 0;

    #[ORM\Column(name: 'cd_avaliacao_tipo', type: 'integer', nullable: true)]
    private ?int $cdAvaliacaoTipo = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'nr_nota_maxima', type: 'float', nullable: true)]
    private ?float $nrNotaMaxima = null;

    #[ORM\Column(name: 'nr_tipo_digitacao', type: 'integer', nullable: true)]
    private ?int $nrTipoDigitacao = null;

    #[ORM\Column(name: 'dt_exibir_gabarito', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtExibirGabarito = null;

    #[ORM\Column(name: 'nr_qtd_questoes_descritivas', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrQtdQuestoesDescritivas = 0;

    #[ORM\Column(name: 'sn_questoes_aleatorio_discursivas', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snQuestoesAleatorioDiscursivas = 0;

    // Sem construtor: 24 propriedades. Use os setters encadeados.

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function getCdResponsavel(): ?int
    {
        return $this->cdResponsavel;
    }

    public function setCdResponsavel(?int $cdResponsavel): self
    {
        $this->cdResponsavel = $cdResponsavel;
        return $this;
    }

    public function getCdDisciplinaPai(): ?string
    {
        return $this->cdDisciplinaPai;
    }

    public function setCdDisciplinaPai(?string $cdDisciplinaPai): self
    {
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        return $this;
    }

    public function getCdCategoria(): ?int
    {
        return $this->cdCategoria;
    }

    public function setCdCategoria(?int $cdCategoria): self
    {
        $this->cdCategoria = $cdCategoria;
        return $this;
    }

    public function getDsProva(): ?string
    {
        return $this->dsProva;
    }

    public function setDsProva(?string $dsProva): self
    {
        $this->dsProva = $dsProva;
        return $this;
    }

    public function getVlPeso(): ?float
    {
        return $this->vlPeso;
    }

    public function setVlPeso(?float $vlPeso): self
    {
        $this->vlPeso = $vlPeso;
        return $this;
    }

    public function getNrQtdQuestoes(): ?int
    {
        return $this->nrQtdQuestoes;
    }

    public function setNrQtdQuestoes(?int $nrQtdQuestoes): self
    {
        $this->nrQtdQuestoes = $nrQtdQuestoes;
        return $this;
    }

    public function getNrQtdResolucoes(): ?int
    {
        return $this->nrQtdResolucoes;
    }

    public function setNrQtdResolucoes(?int $nrQtdResolucoes): self
    {
        $this->nrQtdResolucoes = $nrQtdResolucoes;
        return $this;
    }

    public function getNrEtapa(): ?int
    {
        return $this->nrEtapa;
    }

    public function setNrEtapa(?int $nrEtapa): self
    {
        $this->nrEtapa = $nrEtapa;
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

    public function getSnAvaliacao(): ?int
    {
        return $this->snAvaliacao;
    }

    public function setSnAvaliacao(?int $snAvaliacao): self
    {
        $this->snAvaliacao = $snAvaliacao;
        return $this;
    }

    public function getSnExibeGabarito(): ?int
    {
        return $this->snExibeGabarito;
    }

    public function setSnExibeGabarito(?int $snExibeGabarito): self
    {
        $this->snExibeGabarito = $snExibeGabarito;
        return $this;
    }

    public function getSnQuestoesAleatorio(): ?int
    {
        return $this->snQuestoesAleatorio;
    }

    public function setSnQuestoesAleatorio(?int $snQuestoesAleatorio): self
    {
        $this->snQuestoesAleatorio = $snQuestoesAleatorio;
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

    public function getSnQuestoesDisciplina(): ?int
    {
        return $this->snQuestoesDisciplina;
    }

    public function setSnQuestoesDisciplina(?int $snQuestoesDisciplina): self
    {
        $this->snQuestoesDisciplina = $snQuestoesDisciplina;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }

    public function getNrTempoResolucao(): ?int
    {
        return $this->nrTempoResolucao;
    }

    public function setNrTempoResolucao(?int $nrTempoResolucao): self
    {
        $this->nrTempoResolucao = $nrTempoResolucao;
        return $this;
    }

    public function getCdAvaliacaoTipo(): ?int
    {
        return $this->cdAvaliacaoTipo;
    }

    public function setCdAvaliacaoTipo(?int $cdAvaliacaoTipo): self
    {
        $this->cdAvaliacaoTipo = $cdAvaliacaoTipo;
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

    public function getNrNotaMaxima(): ?float
    {
        return $this->nrNotaMaxima;
    }

    public function setNrNotaMaxima(?float $nrNotaMaxima): self
    {
        $this->nrNotaMaxima = $nrNotaMaxima;
        return $this;
    }

    public function getNrTipoDigitacao(): ?int
    {
        return $this->nrTipoDigitacao;
    }

    public function setNrTipoDigitacao(?int $nrTipoDigitacao): self
    {
        $this->nrTipoDigitacao = $nrTipoDigitacao;
        return $this;
    }

    public function getDtExibirGabarito(): ?\DateTimeInterface
    {
        return $this->dtExibirGabarito;
    }

    public function setDtExibirGabarito(?\DateTimeInterface $dtExibirGabarito): self
    {
        $this->dtExibirGabarito = $dtExibirGabarito;
        return $this;
    }

    public function getNrQtdQuestoesDescritivas(): ?int
    {
        return $this->nrQtdQuestoesDescritivas;
    }

    public function setNrQtdQuestoesDescritivas(?int $nrQtdQuestoesDescritivas): self
    {
        $this->nrQtdQuestoesDescritivas = $nrQtdQuestoesDescritivas;
        return $this;
    }

    public function getSnQuestoesAleatorioDiscursivas(): ?int
    {
        return $this->snQuestoesAleatorioDiscursivas;
    }

    public function setSnQuestoesAleatorioDiscursivas(?int $snQuestoesAleatorioDiscursivas): self
    {
        $this->snQuestoesAleatorioDiscursivas = $snQuestoesAleatorioDiscursivas;
        return $this;
    }
}

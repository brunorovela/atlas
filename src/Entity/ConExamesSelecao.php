<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ConExamesSelecaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConExamesSelecaoRepository::class)]
#[ORM\Table(
    name: 'con_exames_selecao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CONCURSO', columns: ['cd_concurso'])]
#[ORM\Index(name: 'IX_DT_INICIAL', columns: ['dt_inicial'])]
#[ORM\Index(name: 'IX_DT_FINAL', columns: ['dt_final'])]
class ConExamesSelecao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_exame', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdExame = null;

    #[ORM\Column(name: 'cd_concurso', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConcurso = null;

    #[ORM\Column(name: 'ds_exame', type: 'string', length: 255)]
    private ?string $dsExame = null;

    #[ORM\Column(name: 'nr_resolucoes', type: 'smallint', options: ['unsigned' => true])]
    private ?int $nrResolucoes = null;

    #[ORM\Column(name: 'nr_minutos_resolucao', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrMinutosResolucao = null;

    #[ORM\Column(name: 'sn_exibir_gabarito', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snExibirGabarito = 1;

    #[ORM\Column(name: 'dt_inicial', type: 'datetime')]
    private ?\DateTimeInterface $dtInicial = null;

    #[ORM\Column(name: 'dt_final', type: 'datetime')]
    private ?\DateTimeInterface $dtFinal = null;

    #[ORM\Column(name: 'sn_agrupar_questoes_assunto', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snAgruparQuestoesAssunto = 1;

    #[ORM\Column(name: 'ds_formula', type: 'string', length: 255)]
    private ?string $dsFormula = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime')]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snAtivo = 1;

    #[ORM\Column(name: 'sn_objetiva', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snObjetiva = 1;

    #[ORM\Column(name: 'sn_redacao', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snRedacao = 1;

    #[ORM\Column(name: 'sn_redacao_apos_prova', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snRedacaoAposProva = 0;

    #[ORM\Column(name: 'ds_formula_reprovacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsFormulaReprovacao = null;

    #[ORM\Column(name: 'sn_aplica_reprovado', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snAplicaReprovado = 0;

    #[ORM\Column(name: 'nr_texto_min', type: 'smallint', nullable: true)]
    private ?int $nrTextoMin = null;

    #[ORM\Column(name: 'nr_texto_max', type: 'smallint', nullable: true)]
    private ?int $nrTextoMax = null;

    public function __construct(
        ?int $cdConcurso = null,
        ?string $dsExame = null,
        ?int $nrResolucoes = null,
        ?int $nrMinutosResolucao = null,
        int $snExibirGabarito = 1,
        ?\DateTimeInterface $dtInicial = null,
        ?\DateTimeInterface $dtFinal = null,
        int $snAgruparQuestoesAssunto = 1,
        ?string $dsFormula = null,
        ?\DateTimeInterface $dtCadastro = null,
        int $snAtivo = 1,
        int $snObjetiva = 1,
        int $snRedacao = 1,
        ?int $snRedacaoAposProva = 0,
        ?string $dsFormulaReprovacao = null,
        ?int $snAplicaReprovado = 0,
        ?int $nrTextoMin = null,
        ?int $nrTextoMax = null
    ) {
        $this->cdConcurso = $cdConcurso;
        $this->dsExame = $dsExame;
        $this->nrResolucoes = $nrResolucoes;
        $this->nrMinutosResolucao = $nrMinutosResolucao;
        $this->snExibirGabarito = $snExibirGabarito;
        $this->dtInicial = $dtInicial;
        $this->dtFinal = $dtFinal;
        $this->snAgruparQuestoesAssunto = $snAgruparQuestoesAssunto;
        $this->dsFormula = $dsFormula;
        $this->dtCadastro = $dtCadastro;
        $this->snAtivo = $snAtivo;
        $this->snObjetiva = $snObjetiva;
        $this->snRedacao = $snRedacao;
        $this->snRedacaoAposProva = $snRedacaoAposProva;
        $this->dsFormulaReprovacao = $dsFormulaReprovacao;
        $this->snAplicaReprovado = $snAplicaReprovado;
        $this->nrTextoMin = $nrTextoMin;
        $this->nrTextoMax = $nrTextoMax;
    }

    public function getCdExame(): ?int
    {
        return $this->cdExame;
    }

    public function getCdConcurso(): ?int
    {
        return $this->cdConcurso;
    }

    public function setCdConcurso(?int $cdConcurso): self
    {
        $this->cdConcurso = $cdConcurso;
        return $this;
    }

    public function getDsExame(): ?string
    {
        return $this->dsExame;
    }

    public function setDsExame(?string $dsExame): self
    {
        $this->dsExame = $dsExame;
        return $this;
    }

    public function getNrResolucoes(): ?int
    {
        return $this->nrResolucoes;
    }

    public function setNrResolucoes(?int $nrResolucoes): self
    {
        $this->nrResolucoes = $nrResolucoes;
        return $this;
    }

    public function getNrMinutosResolucao(): ?int
    {
        return $this->nrMinutosResolucao;
    }

    public function setNrMinutosResolucao(?int $nrMinutosResolucao): self
    {
        $this->nrMinutosResolucao = $nrMinutosResolucao;
        return $this;
    }

    public function getSnExibirGabarito(): int
    {
        return $this->snExibirGabarito;
    }

    public function setSnExibirGabarito(int $snExibirGabarito): self
    {
        $this->snExibirGabarito = $snExibirGabarito;
        return $this;
    }

    public function getDtInicial(): ?\DateTimeInterface
    {
        return $this->dtInicial;
    }

    public function setDtInicial(?\DateTimeInterface $dtInicial): self
    {
        $this->dtInicial = $dtInicial;
        return $this;
    }

    public function getDtFinal(): ?\DateTimeInterface
    {
        return $this->dtFinal;
    }

    public function setDtFinal(?\DateTimeInterface $dtFinal): self
    {
        $this->dtFinal = $dtFinal;
        return $this;
    }

    public function getSnAgruparQuestoesAssunto(): int
    {
        return $this->snAgruparQuestoesAssunto;
    }

    public function setSnAgruparQuestoesAssunto(int $snAgruparQuestoesAssunto): self
    {
        $this->snAgruparQuestoesAssunto = $snAgruparQuestoesAssunto;
        return $this;
    }

    public function getDsFormula(): ?string
    {
        return $this->dsFormula;
    }

    public function setDsFormula(?string $dsFormula): self
    {
        $this->dsFormula = $dsFormula;
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

    public function getSnAtivo(): int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getSnObjetiva(): int
    {
        return $this->snObjetiva;
    }

    public function setSnObjetiva(int $snObjetiva): self
    {
        $this->snObjetiva = $snObjetiva;
        return $this;
    }

    public function getSnRedacao(): int
    {
        return $this->snRedacao;
    }

    public function setSnRedacao(int $snRedacao): self
    {
        $this->snRedacao = $snRedacao;
        return $this;
    }

    public function getSnRedacaoAposProva(): ?int
    {
        return $this->snRedacaoAposProva;
    }

    public function setSnRedacaoAposProva(?int $snRedacaoAposProva): self
    {
        $this->snRedacaoAposProva = $snRedacaoAposProva;
        return $this;
    }

    public function getDsFormulaReprovacao(): ?string
    {
        return $this->dsFormulaReprovacao;
    }

    public function setDsFormulaReprovacao(?string $dsFormulaReprovacao): self
    {
        $this->dsFormulaReprovacao = $dsFormulaReprovacao;
        return $this;
    }

    public function getSnAplicaReprovado(): ?int
    {
        return $this->snAplicaReprovado;
    }

    public function setSnAplicaReprovado(?int $snAplicaReprovado): self
    {
        $this->snAplicaReprovado = $snAplicaReprovado;
        return $this;
    }

    public function getNrTextoMin(): ?int
    {
        return $this->nrTextoMin;
    }

    public function setNrTextoMin(?int $nrTextoMin): self
    {
        $this->nrTextoMin = $nrTextoMin;
        return $this;
    }

    public function getNrTextoMax(): ?int
    {
        return $this->nrTextoMax;
    }

    public function setNrTextoMax(?int $nrTextoMax): self
    {
        $this->nrTextoMax = $nrTextoMax;
        return $this;
    }
}

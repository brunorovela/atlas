<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\AvlAvaliacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlAvaliacoesRepository::class)]
#[ORM\Table(
    name: 'avl_avaliacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Avalia??es']
)]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class AvlAvaliacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_avaliacao', type: 'integer')]
    private ?int $cdAvaliacao = null;

    #[ORM\Column(name: 'ds_avaliacao', type: 'string', length: 200, options: ['default' => ''])]
    private string $dsAvaliacao = '';

    #[ORM\Column(name: 'ds_observacoes', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacoes = null;

    #[ORM\Column(name: 'ds_mensagem_final', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsMensagemFinal = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'cd_tipo_apresentacao', type: 'smallint', options: ['default' => '0'])]
    private int $cdTipoApresentacao = 0;

    #[ORM\Column(name: 'sn_voltar_questoes', type: 'boolean', options: ['default' => '0'])]
    private bool $snVoltarQuestoes = false;

    #[ORM\Column(name: 'sn_responder_apos_finalizacao', type: 'boolean', options: ['default' => '0'])]
    private bool $snResponderAposFinalizacao = false;

    #[ORM\Column(name: 'sn_gabarito', type: 'boolean', options: ['default' => '0'])]
    private bool $snGabarito = false;

    #[ORM\Column(name: 'sn_disponivel', type: 'boolean', options: ['default' => '1'])]
    private bool $snDisponivel = true;

    #[ORM\Column(name: 'dt_psqd_resultados', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtPsqdResultados = null;

    #[ORM\Column(name: 'sn_psqd_resultados', type: 'boolean', options: ['default' => '1'])]
    private bool $snPsqdResultados = true;

    #[ORM\Column(name: 'sn_avld_resultados', type: 'boolean', options: ['default' => '1'])]
    private bool $snAvldResultados = true;

    #[ORM\Column(name: 'dt_avld_resultados', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtAvldResultados = null;

    #[ORM\Column(name: 'cd_pode_nao_responder', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $cdPodeNaoResponder = 1;

    #[ORM\Column(name: 'sn_coordenador_pode_ver', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snCoordenadorPodeVer = 0;

    #[ORM\Column(name: 'ds_ano_semestre', type: 'smallint', nullable: true)]
    private ?int $dsAnoSemestre = null;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', nullable: true)]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'cd_tipo_avaliacao', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $cdTipoAvaliacao = 0;

    #[ORM\Column(name: 'sn_coligadas', type: TinyIntType::NAME, nullable: true)]
    private ?int $snColigadas = null;

    #[ORM\Column(name: 'SN_RESULTADOS', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snResultados = true;

    #[ORM\Column(name: 'sn_relatorios_descritivo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snRelatoriosDescritivo = 1;

    #[ORM\Column(name: 'sn_relatorios_respostas', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snRelatoriosRespostas = 1;

    #[ORM\Column(name: 'sn_relatorios_asp_gerais', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snRelatoriosAspGerais = 1;

    #[ORM\Column(name: 'sn_relatorios_disp_prof', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snRelatoriosDispProf = 1;

    #[ORM\Column(name: 'SN_RESULTADOS_AVALIADOS', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snResultadosAvaliados = 1;

    #[ORM\Column(name: 'nr_dias_avaliacao', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrDiasAvaliacao = null;

    #[ORM\Column(name: 'sn_rel_avl_geral_alunos', type: TinyIntType::NAME, nullable: true, options: ['default' => '1'])]
    private ?int $snRelAvlGeralAlunos = 1;

    #[ORM\Column(name: 'sn_rel_avl_geral_professores', type: TinyIntType::NAME, nullable: true, options: ['default' => '1'])]
    private ?int $snRelAvlGeralProfessores = 1;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    // Sem construtor: 30 propriedades. Use os setters encadeados.

    public function getCdAvaliacao(): ?int
    {
        return $this->cdAvaliacao;
    }

    public function getDsAvaliacao(): string
    {
        return $this->dsAvaliacao;
    }

    public function setDsAvaliacao(string $dsAvaliacao): self
    {
        $this->dsAvaliacao = $dsAvaliacao;
        return $this;
    }

    public function getDsObservacoes(): ?string
    {
        return $this->dsObservacoes;
    }

    public function setDsObservacoes(?string $dsObservacoes): self
    {
        $this->dsObservacoes = $dsObservacoes;
        return $this;
    }

    public function getDsMensagemFinal(): ?string
    {
        return $this->dsMensagemFinal;
    }

    public function setDsMensagemFinal(?string $dsMensagemFinal): self
    {
        $this->dsMensagemFinal = $dsMensagemFinal;
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

    public function getCdTipoApresentacao(): int
    {
        return $this->cdTipoApresentacao;
    }

    public function setCdTipoApresentacao(int $cdTipoApresentacao): self
    {
        $this->cdTipoApresentacao = $cdTipoApresentacao;
        return $this;
    }

    public function isSnVoltarQuestoes(): bool
    {
        return $this->snVoltarQuestoes;
    }

    public function setSnVoltarQuestoes(bool $snVoltarQuestoes): self
    {
        $this->snVoltarQuestoes = $snVoltarQuestoes;
        return $this;
    }

    public function isSnResponderAposFinalizacao(): bool
    {
        return $this->snResponderAposFinalizacao;
    }

    public function setSnResponderAposFinalizacao(bool $snResponderAposFinalizacao): self
    {
        $this->snResponderAposFinalizacao = $snResponderAposFinalizacao;
        return $this;
    }

    public function isSnGabarito(): bool
    {
        return $this->snGabarito;
    }

    public function setSnGabarito(bool $snGabarito): self
    {
        $this->snGabarito = $snGabarito;
        return $this;
    }

    public function isSnDisponivel(): bool
    {
        return $this->snDisponivel;
    }

    public function setSnDisponivel(bool $snDisponivel): self
    {
        $this->snDisponivel = $snDisponivel;
        return $this;
    }

    public function getDtPsqdResultados(): ?\DateTimeInterface
    {
        return $this->dtPsqdResultados;
    }

    public function setDtPsqdResultados(?\DateTimeInterface $dtPsqdResultados): self
    {
        $this->dtPsqdResultados = $dtPsqdResultados;
        return $this;
    }

    public function isSnPsqdResultados(): bool
    {
        return $this->snPsqdResultados;
    }

    public function setSnPsqdResultados(bool $snPsqdResultados): self
    {
        $this->snPsqdResultados = $snPsqdResultados;
        return $this;
    }

    public function isSnAvldResultados(): bool
    {
        return $this->snAvldResultados;
    }

    public function setSnAvldResultados(bool $snAvldResultados): self
    {
        $this->snAvldResultados = $snAvldResultados;
        return $this;
    }

    public function getDtAvldResultados(): ?\DateTimeInterface
    {
        return $this->dtAvldResultados;
    }

    public function setDtAvldResultados(?\DateTimeInterface $dtAvldResultados): self
    {
        $this->dtAvldResultados = $dtAvldResultados;
        return $this;
    }

    public function getCdPodeNaoResponder(): ?int
    {
        return $this->cdPodeNaoResponder;
    }

    public function setCdPodeNaoResponder(?int $cdPodeNaoResponder): self
    {
        $this->cdPodeNaoResponder = $cdPodeNaoResponder;
        return $this;
    }

    public function getSnCoordenadorPodeVer(): ?int
    {
        return $this->snCoordenadorPodeVer;
    }

    public function setSnCoordenadorPodeVer(?int $snCoordenadorPodeVer): self
    {
        $this->snCoordenadorPodeVer = $snCoordenadorPodeVer;
        return $this;
    }

    public function getDsAnoSemestre(): ?int
    {
        return $this->dsAnoSemestre;
    }

    public function setDsAnoSemestre(?int $dsAnoSemestre): self
    {
        $this->dsAnoSemestre = $dsAnoSemestre;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getCdTipoAvaliacao(): ?int
    {
        return $this->cdTipoAvaliacao;
    }

    public function setCdTipoAvaliacao(?int $cdTipoAvaliacao): self
    {
        $this->cdTipoAvaliacao = $cdTipoAvaliacao;
        return $this;
    }

    public function getSnColigadas(): ?int
    {
        return $this->snColigadas;
    }

    public function setSnColigadas(?int $snColigadas): self
    {
        $this->snColigadas = $snColigadas;
        return $this;
    }

    public function isSnResultados(): ?bool
    {
        return $this->snResultados;
    }

    public function setSnResultados(?bool $snResultados): self
    {
        $this->snResultados = $snResultados;
        return $this;
    }

    public function getSnRelatoriosDescritivo(): ?int
    {
        return $this->snRelatoriosDescritivo;
    }

    public function setSnRelatoriosDescritivo(?int $snRelatoriosDescritivo): self
    {
        $this->snRelatoriosDescritivo = $snRelatoriosDescritivo;
        return $this;
    }

    public function getSnRelatoriosRespostas(): ?int
    {
        return $this->snRelatoriosRespostas;
    }

    public function setSnRelatoriosRespostas(?int $snRelatoriosRespostas): self
    {
        $this->snRelatoriosRespostas = $snRelatoriosRespostas;
        return $this;
    }

    public function getSnRelatoriosAspGerais(): ?int
    {
        return $this->snRelatoriosAspGerais;
    }

    public function setSnRelatoriosAspGerais(?int $snRelatoriosAspGerais): self
    {
        $this->snRelatoriosAspGerais = $snRelatoriosAspGerais;
        return $this;
    }

    public function getSnRelatoriosDispProf(): ?int
    {
        return $this->snRelatoriosDispProf;
    }

    public function setSnRelatoriosDispProf(?int $snRelatoriosDispProf): self
    {
        $this->snRelatoriosDispProf = $snRelatoriosDispProf;
        return $this;
    }

    public function getSnResultadosAvaliados(): ?int
    {
        return $this->snResultadosAvaliados;
    }

    public function setSnResultadosAvaliados(?int $snResultadosAvaliados): self
    {
        $this->snResultadosAvaliados = $snResultadosAvaliados;
        return $this;
    }

    public function getNrDiasAvaliacao(): ?int
    {
        return $this->nrDiasAvaliacao;
    }

    public function setNrDiasAvaliacao(?int $nrDiasAvaliacao): self
    {
        $this->nrDiasAvaliacao = $nrDiasAvaliacao;
        return $this;
    }

    public function getSnRelAvlGeralAlunos(): ?int
    {
        return $this->snRelAvlGeralAlunos;
    }

    public function setSnRelAvlGeralAlunos(?int $snRelAvlGeralAlunos): self
    {
        $this->snRelAvlGeralAlunos = $snRelAvlGeralAlunos;
        return $this;
    }

    public function getSnRelAvlGeralProfessores(): ?int
    {
        return $this->snRelAvlGeralProfessores;
    }

    public function setSnRelAvlGeralProfessores(?int $snRelAvlGeralProfessores): self
    {
        $this->snRelAvlGeralProfessores = $snRelAvlGeralProfessores;
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

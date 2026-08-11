<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ProdProcessoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProdProcessoRepository::class)]
#[ORM\Table(
    name: 'prod_processo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TIPO_TRABALHO', columns: ['cd_tipo_trabalho'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA_PAI', columns: ['cd_disciplina_pai'])]
#[ORM\Index(name: 'IX_DT_INICIO', columns: ['dt_inicio'])]
#[ORM\Index(name: 'IX_DT_FIM', columns: ['dt_fim'])]
class ProdProcesso
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_processo', type: 'integer')]
    private ?int $cdProcesso = null;

    #[ORM\Column(name: 'cd_tipo_trabalho', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTipoTrabalho = null;

    #[ORM\Column(name: 'cd_disciplina_pai', type: 'string', length: 255)]
    private ?string $cdDisciplinaPai = null;

    #[ORM\Column(name: 'nm_processo', type: 'string', length: 255, nullable: true)]
    private ?string $nmProcesso = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'ds_informacoes', type: 'text', length: 65535, nullable: true)]
    private ?string $dsInformacoes = null;

    #[ORM\Column(name: 'cd_professor', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdProfessor = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'sn_atividade_domiciliar', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snAtividadeDomiciliar = 0;

    #[ORM\Column(name: 'tp_producao_academica', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $tpProducaoAcademica = 1;

    #[ORM\Column(name: 'nr_etapa', type: 'integer', nullable: true)]
    private ?int $nrEtapa = null;

    #[ORM\Column(name: 'cd_avaliacao_tipo', type: 'integer', nullable: true)]
    private ?int $cdAvaliacaoTipo = null;

    #[ORM\Column(name: 'sn_resolucao_grupo', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snResolucaoGrupo = 0;

    #[ORM\Column(name: 'vl_nota_maxima', type: 'integer', nullable: true)]
    private ?int $vlNotaMaxima = null;

    public function __construct(
        ?int $cdTipoTrabalho = null,
        ?string $cdDisciplinaPai = null,
        ?string $nmProcesso = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFim = null,
        ?string $dsInformacoes = null,
        ?int $cdProfessor = null,
        ?\DateTimeInterface $dtInclusao = null,
        int $snAtividadeDomiciliar = 0,
        int $tpProducaoAcademica = 1,
        ?int $nrEtapa = null,
        ?int $cdAvaliacaoTipo = null,
        int $snResolucaoGrupo = 0,
        ?int $vlNotaMaxima = null
    ) {
        $this->cdTipoTrabalho = $cdTipoTrabalho;
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        $this->nmProcesso = $nmProcesso;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->dsInformacoes = $dsInformacoes;
        $this->cdProfessor = $cdProfessor;
        $this->dtInclusao = $dtInclusao;
        $this->snAtividadeDomiciliar = $snAtividadeDomiciliar;
        $this->tpProducaoAcademica = $tpProducaoAcademica;
        $this->nrEtapa = $nrEtapa;
        $this->cdAvaliacaoTipo = $cdAvaliacaoTipo;
        $this->snResolucaoGrupo = $snResolucaoGrupo;
        $this->vlNotaMaxima = $vlNotaMaxima;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
    }

    public function getCdTipoTrabalho(): ?int
    {
        return $this->cdTipoTrabalho;
    }

    public function setCdTipoTrabalho(?int $cdTipoTrabalho): self
    {
        $this->cdTipoTrabalho = $cdTipoTrabalho;
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

    public function getNmProcesso(): ?string
    {
        return $this->nmProcesso;
    }

    public function setNmProcesso(?string $nmProcesso): self
    {
        $this->nmProcesso = $nmProcesso;
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

    public function getDsInformacoes(): ?string
    {
        return $this->dsInformacoes;
    }

    public function setDsInformacoes(?string $dsInformacoes): self
    {
        $this->dsInformacoes = $dsInformacoes;
        return $this;
    }

    public function getCdProfessor(): ?int
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(?int $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
        return $this;
    }

    public function getSnAtividadeDomiciliar(): int
    {
        return $this->snAtividadeDomiciliar;
    }

    public function setSnAtividadeDomiciliar(int $snAtividadeDomiciliar): self
    {
        $this->snAtividadeDomiciliar = $snAtividadeDomiciliar;
        return $this;
    }

    public function getTpProducaoAcademica(): int
    {
        return $this->tpProducaoAcademica;
    }

    public function setTpProducaoAcademica(int $tpProducaoAcademica): self
    {
        $this->tpProducaoAcademica = $tpProducaoAcademica;
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

    public function getCdAvaliacaoTipo(): ?int
    {
        return $this->cdAvaliacaoTipo;
    }

    public function setCdAvaliacaoTipo(?int $cdAvaliacaoTipo): self
    {
        $this->cdAvaliacaoTipo = $cdAvaliacaoTipo;
        return $this;
    }

    public function getSnResolucaoGrupo(): int
    {
        return $this->snResolucaoGrupo;
    }

    public function setSnResolucaoGrupo(int $snResolucaoGrupo): self
    {
        $this->snResolucaoGrupo = $snResolucaoGrupo;
        return $this;
    }

    public function getVlNotaMaxima(): ?int
    {
        return $this->vlNotaMaxima;
    }

    public function setVlNotaMaxima(?int $vlNotaMaxima): self
    {
        $this->vlNotaMaxima = $vlNotaMaxima;
        return $this;
    }
}

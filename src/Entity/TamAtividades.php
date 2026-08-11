<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\TamAtividadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TamAtividadesRepository::class)]
#[ORM\Table(
    name: 'tam_atividades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ATIVIDADE', columns: ['cd_atividade'])]
#[ORM\Index(name: 'IX_CD_EVENTO', columns: ['cd_evento'])]
#[ORM\Index(name: 'IX_DT_ATIVIDADE', columns: ['dt_atividade'])]
#[ORM\Index(name: 'IX_HR_INICIO', columns: ['hr_inicio'])]
#[ORM\Index(name: 'IX_HR_FIM', columns: ['hr_fim'])]
#[ORM\Index(name: 'IX_NR_HORAS', columns: ['nr_horas'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'tam_atividades_ibfk_1', 'colunas' => ['cd_evento'], 'tabelaAlvo' => 'tam_eventos', 'colunasAlvo' => ['CD_EVENTO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class TamAtividades
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_atividade', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAtividade = null;

    #[ORM\ManyToOne(targetEntity: TamEventos::class)]
    #[ORM\JoinColumn(name: 'cd_evento', referencedColumnName: 'CD_EVENTO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?TamEventos $cdEvento = null;

    #[ORM\Column(name: 'nm_palestrante', type: 'text', length: 16777215, nullable: true)]
    private ?string $nmPalestrante = null;

    #[ORM\Column(name: 'ds_tema', type: 'text', nullable: true)]
    private ?string $dsTema = null;

    #[ORM\Column(name: 'dt_atividade', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtAtividade = null;

    #[ORM\Column(name: 'hr_inicio', type: 'time', nullable: true)]
    private ?\DateTimeInterface $hrInicio = null;

    #[ORM\Column(name: 'hr_fim', type: 'time', nullable: true)]
    private ?\DateTimeInterface $hrFim = null;

    #[ORM\Column(name: 'nr_horas', type: 'decimal', precision: 5, scale: 2, nullable: true, options: ['unsigned' => true])]
    private ?string $nrHoras = null;

    #[ORM\Column(name: 'nr_vagas', type: 'integer', nullable: true)]
    private ?int $nrVagas = null;

    #[ORM\Column(name: 'sn_escolhe', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snEscolhe = null;

    #[ORM\Column(name: 'me_ambiente', type: 'text', length: 16777215, nullable: true)]
    private ?string $meAmbiente = null;

    #[ORM\Column(name: 'ds_atividade', type: 'string', length: 255, nullable: true)]
    private ?string $dsAtividade = null;

    #[ORM\Column(name: 'sn_atividade_padrao', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAtividadePadrao = false;

    #[ORM\Column(name: 'sn_exibe_inscricao', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snExibeInscricao = 1;

    #[ORM\Column(name: 'sn_horario_cheio', type: TinyIntType::NAME, nullable: true)]
    private ?int $snHorarioCheio = null;

    public function __construct(
        ?TamEventos $cdEvento = null,
        ?string $nmPalestrante = null,
        ?string $dsTema = null,
        ?\DateTimeInterface $dtAtividade = null,
        ?\DateTimeInterface $hrInicio = null,
        ?\DateTimeInterface $hrFim = null,
        ?string $nrHoras = null,
        ?int $nrVagas = null,
        ?int $snEscolhe = null,
        ?string $meAmbiente = null,
        ?string $dsAtividade = null,
        ?bool $snAtividadePadrao = false,
        ?int $snExibeInscricao = 1,
        ?int $snHorarioCheio = null
    ) {
        $this->cdEvento = $cdEvento;
        $this->nmPalestrante = $nmPalestrante;
        $this->dsTema = $dsTema;
        $this->dtAtividade = $dtAtividade;
        $this->hrInicio = $hrInicio;
        $this->hrFim = $hrFim;
        $this->nrHoras = $nrHoras;
        $this->nrVagas = $nrVagas;
        $this->snEscolhe = $snEscolhe;
        $this->meAmbiente = $meAmbiente;
        $this->dsAtividade = $dsAtividade;
        $this->snAtividadePadrao = $snAtividadePadrao;
        $this->snExibeInscricao = $snExibeInscricao;
        $this->snHorarioCheio = $snHorarioCheio;
    }

    public function getCdAtividade(): ?int
    {
        return $this->cdAtividade;
    }

    public function getCdEvento(): ?TamEventos
    {
        return $this->cdEvento;
    }

    public function setCdEvento(?TamEventos $cdEvento): self
    {
        $this->cdEvento = $cdEvento;
        return $this;
    }

    public function getNmPalestrante(): ?string
    {
        return $this->nmPalestrante;
    }

    public function setNmPalestrante(?string $nmPalestrante): self
    {
        $this->nmPalestrante = $nmPalestrante;
        return $this;
    }

    public function getDsTema(): ?string
    {
        return $this->dsTema;
    }

    public function setDsTema(?string $dsTema): self
    {
        $this->dsTema = $dsTema;
        return $this;
    }

    public function getDtAtividade(): ?\DateTimeInterface
    {
        return $this->dtAtividade;
    }

    public function setDtAtividade(?\DateTimeInterface $dtAtividade): self
    {
        $this->dtAtividade = $dtAtividade;
        return $this;
    }

    public function getHrInicio(): ?\DateTimeInterface
    {
        return $this->hrInicio;
    }

    public function setHrInicio(?\DateTimeInterface $hrInicio): self
    {
        $this->hrInicio = $hrInicio;
        return $this;
    }

    public function getHrFim(): ?\DateTimeInterface
    {
        return $this->hrFim;
    }

    public function setHrFim(?\DateTimeInterface $hrFim): self
    {
        $this->hrFim = $hrFim;
        return $this;
    }

    public function getNrHoras(): ?string
    {
        return $this->nrHoras;
    }

    public function setNrHoras(?string $nrHoras): self
    {
        $this->nrHoras = $nrHoras;
        return $this;
    }

    public function getNrVagas(): ?int
    {
        return $this->nrVagas;
    }

    public function setNrVagas(?int $nrVagas): self
    {
        $this->nrVagas = $nrVagas;
        return $this;
    }

    public function getSnEscolhe(): ?int
    {
        return $this->snEscolhe;
    }

    public function setSnEscolhe(?int $snEscolhe): self
    {
        $this->snEscolhe = $snEscolhe;
        return $this;
    }

    public function getMeAmbiente(): ?string
    {
        return $this->meAmbiente;
    }

    public function setMeAmbiente(?string $meAmbiente): self
    {
        $this->meAmbiente = $meAmbiente;
        return $this;
    }

    public function getDsAtividade(): ?string
    {
        return $this->dsAtividade;
    }

    public function setDsAtividade(?string $dsAtividade): self
    {
        $this->dsAtividade = $dsAtividade;
        return $this;
    }

    public function isSnAtividadePadrao(): ?bool
    {
        return $this->snAtividadePadrao;
    }

    public function setSnAtividadePadrao(?bool $snAtividadePadrao): self
    {
        $this->snAtividadePadrao = $snAtividadePadrao;
        return $this;
    }

    public function getSnExibeInscricao(): ?int
    {
        return $this->snExibeInscricao;
    }

    public function setSnExibeInscricao(?int $snExibeInscricao): self
    {
        $this->snExibeInscricao = $snExibeInscricao;
        return $this;
    }

    public function getSnHorarioCheio(): ?int
    {
        return $this->snHorarioCheio;
    }

    public function setSnHorarioCheio(?int $snHorarioCheio): self
    {
        $this->snHorarioCheio = $snHorarioCheio;
        return $this;
    }
}

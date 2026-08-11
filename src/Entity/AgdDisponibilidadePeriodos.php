<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\AgdDisponibilidadePeriodosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgdDisponibilidadePeriodosRepository::class)]
#[ORM\Table(
    name: 'agd_disponibilidade_periodos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IDX_AGD_DISPONIBILIDADE_PERIODOS_CD_DISPONIBILIDADE', columns: ['cd_disponibilidade'])]
#[ORM\Index(name: 'IDX_AGD_DISPONIBILIDADE_PERIODOS_CD_SALA', columns: ['cd_sala'])]
#[ORM\Index(name: 'IX_CD_DISPONIBILIDADE', columns: ['cd_disponibilidade'])]
#[ORM\Index(name: 'IX_CD_SALA', columns: ['cd_sala'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_AGD_DISPONIBILIDADE_PERIODOS_AGD_DISPONIBILIDADE_CD_', 'colunas' => ['cd_disponibilidade'], 'tabelaAlvo' => 'agd_disponibilidade', 'colunasAlvo' => ['cd_disponibilidade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_AGD_DISPONIBILIDADE_PERIODOS_UNIM_SALA_CD_SALA', 'colunas' => ['cd_sala'], 'tabelaAlvo' => 'unim_sala', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AgdDisponibilidadePeriodos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_disponibilidade_periodo', type: 'integer')]
    private ?int $cdDisponibilidadePeriodo = null;

    #[ORM\ManyToOne(targetEntity: AgdDisponibilidade::class)]
    #[ORM\JoinColumn(name: 'cd_disponibilidade', referencedColumnName: 'cd_disponibilidade', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?AgdDisponibilidade $cdDisponibilidade = null;

    #[ORM\ManyToOne(targetEntity: UnimSala::class)]
    #[ORM\JoinColumn(name: 'cd_sala', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimSala $cdSala = null;

    #[ORM\Column(name: 'dt_inicio', type: 'date')]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'date')]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'hr_inicio', type: 'time')]
    private ?\DateTimeInterface $hrInicio = null;

    #[ORM\Column(name: 'hr_fim', type: 'time')]
    private ?\DateTimeInterface $hrFim = null;

    #[ORM\Column(name: 'dt_inicio_agendamento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicioAgendamento = null;

    #[ORM\Column(name: 'nr_dia_semana', type: 'integer')]
    private ?int $nrDiaSemana = null;

    #[ORM\Column(name: 'sn_varias_pessoas', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snVariasPessoas = 0;

    #[ORM\Column(name: 'nr_quantidade_pessoas', type: 'integer', nullable: true)]
    private ?int $nrQuantidadePessoas = null;

    #[ORM\Column(name: 'nr_intervalo', type: 'integer', nullable: true)]
    private ?int $nrIntervalo = null;

    #[ORM\Column(name: 'nr_dias_antecedencia', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrDiasAntecedencia = 0;

    #[ORM\Column(name: 'ds_modo_disponibilidade', type: 'string', length: 20)]
    private ?string $dsModoDisponibilidade = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $snAtivo = 1;

    #[ORM\Column(name: 'sn_turmas', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snTurmas = 0;

    public function __construct(
        ?AgdDisponibilidade $cdDisponibilidade = null,
        ?UnimSala $cdSala = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFim = null,
        ?\DateTimeInterface $hrInicio = null,
        ?\DateTimeInterface $hrFim = null,
        ?\DateTimeInterface $dtInicioAgendamento = null,
        ?int $nrDiaSemana = null,
        int $snVariasPessoas = 0,
        ?int $nrQuantidadePessoas = null,
        ?int $nrIntervalo = null,
        ?int $nrDiasAntecedencia = 0,
        ?string $dsModoDisponibilidade = null,
        int $snAtivo = 1,
        ?int $snTurmas = 0
    ) {
        $this->cdDisponibilidade = $cdDisponibilidade;
        $this->cdSala = $cdSala;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->hrInicio = $hrInicio;
        $this->hrFim = $hrFim;
        $this->dtInicioAgendamento = $dtInicioAgendamento;
        $this->nrDiaSemana = $nrDiaSemana;
        $this->snVariasPessoas = $snVariasPessoas;
        $this->nrQuantidadePessoas = $nrQuantidadePessoas;
        $this->nrIntervalo = $nrIntervalo;
        $this->nrDiasAntecedencia = $nrDiasAntecedencia;
        $this->dsModoDisponibilidade = $dsModoDisponibilidade;
        $this->snAtivo = $snAtivo;
        $this->snTurmas = $snTurmas;
    }

    public function getCdDisponibilidadePeriodo(): ?int
    {
        return $this->cdDisponibilidadePeriodo;
    }

    public function getCdDisponibilidade(): ?AgdDisponibilidade
    {
        return $this->cdDisponibilidade;
    }

    public function setCdDisponibilidade(?AgdDisponibilidade $cdDisponibilidade): self
    {
        $this->cdDisponibilidade = $cdDisponibilidade;
        return $this;
    }

    public function getCdSala(): ?UnimSala
    {
        return $this->cdSala;
    }

    public function setCdSala(?UnimSala $cdSala): self
    {
        $this->cdSala = $cdSala;
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

    public function getDtInicioAgendamento(): ?\DateTimeInterface
    {
        return $this->dtInicioAgendamento;
    }

    public function setDtInicioAgendamento(?\DateTimeInterface $dtInicioAgendamento): self
    {
        $this->dtInicioAgendamento = $dtInicioAgendamento;
        return $this;
    }

    public function getNrDiaSemana(): ?int
    {
        return $this->nrDiaSemana;
    }

    public function setNrDiaSemana(?int $nrDiaSemana): self
    {
        $this->nrDiaSemana = $nrDiaSemana;
        return $this;
    }

    public function getSnVariasPessoas(): int
    {
        return $this->snVariasPessoas;
    }

    public function setSnVariasPessoas(int $snVariasPessoas): self
    {
        $this->snVariasPessoas = $snVariasPessoas;
        return $this;
    }

    public function getNrQuantidadePessoas(): ?int
    {
        return $this->nrQuantidadePessoas;
    }

    public function setNrQuantidadePessoas(?int $nrQuantidadePessoas): self
    {
        $this->nrQuantidadePessoas = $nrQuantidadePessoas;
        return $this;
    }

    public function getNrIntervalo(): ?int
    {
        return $this->nrIntervalo;
    }

    public function setNrIntervalo(?int $nrIntervalo): self
    {
        $this->nrIntervalo = $nrIntervalo;
        return $this;
    }

    public function getNrDiasAntecedencia(): ?int
    {
        return $this->nrDiasAntecedencia;
    }

    public function setNrDiasAntecedencia(?int $nrDiasAntecedencia): self
    {
        $this->nrDiasAntecedencia = $nrDiasAntecedencia;
        return $this;
    }

    public function getDsModoDisponibilidade(): ?string
    {
        return $this->dsModoDisponibilidade;
    }

    public function setDsModoDisponibilidade(?string $dsModoDisponibilidade): self
    {
        $this->dsModoDisponibilidade = $dsModoDisponibilidade;
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

    public function getSnTurmas(): ?int
    {
        return $this->snTurmas;
    }

    public function setSnTurmas(?int $snTurmas): self
    {
        $this->snTurmas = $snTurmas;
        return $this;
    }
}

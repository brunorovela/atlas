<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\ResReservasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResReservasRepository::class)]
#[ORM\Table(
    name: 'res_reservas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_reserva', columns: ['cd_reserva'])]
#[ORM\Index(name: 'cd_pessoa', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'cd_regra', columns: ['cd_regra'])]
#[ORM\Index(name: 'cd_equipamento', columns: ['cd_equipamento'])]
#[ORM\Index(name: 'cd_horario', columns: ['cd_horario'])]
#[ORM\Index(name: 'cd_situacao', columns: ['cd_situacao'])]
#[ORM\Index(name: 'res_reservas_turmas_fk', columns: ['nr_anosemestre', 'cd_turma'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_REGRA', columns: ['cd_regra'])]
#[ORM\Index(name: 'IX_CD_EQUIPAMENTO', columns: ['cd_equipamento'])]
#[ORM\Index(name: 'IX_CD_HORARIO', columns: ['cd_horario'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'res_reservas_equipamentos_fk', 'colunas' => ['cd_equipamento'], 'tabelaAlvo' => 'res_equipamentos', 'colunasAlvo' => ['cd_equipamento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'res_reservas_horario_fk', 'colunas' => ['cd_horario'], 'tabelaAlvo' => 'res_horarios', 'colunasAlvo' => ['cd_horario'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'res_reservas_pessoas_fk', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'res_reservas_regras_fk', 'colunas' => ['cd_regra'], 'tabelaAlvo' => 'res_regras', 'colunasAlvo' => ['cd_regra'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'res_reservas_situacao_fk', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'res_reservas_situacao', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'res_reservas_turmas_fk', 'colunas' => ['nr_anosemestre', 'cd_turma'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['anosemestre', 'codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ResReservas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_reserva', type: 'integer')]
    private ?int $cdReserva = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\ManyToOne(targetEntity: ResRegras::class)]
    #[ORM\JoinColumn(name: 'cd_regra', referencedColumnName: 'cd_regra', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ResRegras $cdRegra = null;

    #[ORM\ManyToOne(targetEntity: ResEquipamentos::class)]
    #[ORM\JoinColumn(name: 'cd_equipamento', referencedColumnName: 'cd_equipamento', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ResEquipamentos $cdEquipamento = null;

    #[ORM\Column(name: 'cd_categoria', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCategoria = null;

    #[ORM\ManyToOne(targetEntity: ResHorarios::class)]
    #[ORM\JoinColumn(name: 'cd_horario', referencedColumnName: 'cd_horario', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ResHorarios $cdHorario = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50, nullable: true)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', nullable: true)]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'cd_cedido', type: 'integer', nullable: true)]
    private ?int $cdCedido = null;

    #[ORM\ManyToOne(targetEntity: ResReservasSituacao::class)]
    #[ORM\JoinColumn(name: 'cd_situacao', referencedColumnName: 'cd_situacao', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ResReservasSituacao $cdSituacao = null;

    #[ORM\Column(name: 'dt_reserva', type: 'datetime')]
    private ?\DateTimeInterface $dtReserva = null;

    #[ORM\Column(name: 'ds_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'dt_registro_novo', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRegistroNovo = null;

    #[ORM\Column(name: 'sn_especial', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snEspecial = 'N';

    #[ORM\Column(name: 'ds_sala', type: 'string', length: 40, nullable: true)]
    private ?string $dsSala = null;

    #[ORM\Column(name: 'sn_automatica', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snAutomatica = 0;

    #[ORM\Column(name: 'sn_agrupada', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0', 'comment' => 'Campo que indica se a reserva é agrupada ou não (agrupamento é feito por: cd_pessoa, cd_regra, cd_tipo (tabela res_equipamentos), cd_turma, cd_disciplina, cd_situacao, dt_reserva e nr_anosemestre)'])]
    private int $snAgrupada = 0;

    #[ORM\Column(name: 'cd_reserva_agrupar', type: 'integer', nullable: true)]
    private ?int $cdReservaAgrupar = null;

    #[ORM\Column(name: 'dt_envio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEnvio = null;

    #[ORM\Column(name: 'sn_entregue', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snEntregue = false;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?ResRegras $cdRegra = null,
        ?ResEquipamentos $cdEquipamento = null,
        ?int $cdCategoria = null,
        ?ResHorarios $cdHorario = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        ?int $cdCedido = null,
        ?ResReservasSituacao $cdSituacao = null,
        ?\DateTimeInterface $dtReserva = null,
        ?string $dsObservacao = null,
        ?int $nrAnosemestre = null,
        ?\DateTimeInterface $dtRegistroNovo = null,
        ?string $snEspecial = 'N',
        ?string $dsSala = null,
        ?int $snAutomatica = 0,
        int $snAgrupada = 0,
        ?int $cdReservaAgrupar = null,
        ?\DateTimeInterface $dtEnvio = null,
        ?bool $snEntregue = false
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdRegra = $cdRegra;
        $this->cdEquipamento = $cdEquipamento;
        $this->cdCategoria = $cdCategoria;
        $this->cdHorario = $cdHorario;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdCedido = $cdCedido;
        $this->cdSituacao = $cdSituacao;
        $this->dtReserva = $dtReserva;
        $this->dsObservacao = $dsObservacao;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->dtRegistroNovo = $dtRegistroNovo;
        $this->snEspecial = $snEspecial;
        $this->dsSala = $dsSala;
        $this->snAutomatica = $snAutomatica;
        $this->snAgrupada = $snAgrupada;
        $this->cdReservaAgrupar = $cdReservaAgrupar;
        $this->dtEnvio = $dtEnvio;
        $this->snEntregue = $snEntregue;
    }

    public function getCdReserva(): ?int
    {
        return $this->cdReserva;
    }

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdRegra(): ?ResRegras
    {
        return $this->cdRegra;
    }

    public function setCdRegra(?ResRegras $cdRegra): self
    {
        $this->cdRegra = $cdRegra;
        return $this;
    }

    public function getCdEquipamento(): ?ResEquipamentos
    {
        return $this->cdEquipamento;
    }

    public function setCdEquipamento(?ResEquipamentos $cdEquipamento): self
    {
        $this->cdEquipamento = $cdEquipamento;
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

    public function getCdHorario(): ?ResHorarios
    {
        return $this->cdHorario;
    }

    public function setCdHorario(?ResHorarios $cdHorario): self
    {
        $this->cdHorario = $cdHorario;
        return $this;
    }

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function getCdCedido(): ?int
    {
        return $this->cdCedido;
    }

    public function setCdCedido(?int $cdCedido): self
    {
        $this->cdCedido = $cdCedido;
        return $this;
    }

    public function getCdSituacao(): ?ResReservasSituacao
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?ResReservasSituacao $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getDtReserva(): ?\DateTimeInterface
    {
        return $this->dtReserva;
    }

    public function setDtReserva(?\DateTimeInterface $dtReserva): self
    {
        $this->dtReserva = $dtReserva;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
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

    public function getDtRegistroNovo(): ?\DateTimeInterface
    {
        return $this->dtRegistroNovo;
    }

    public function setDtRegistroNovo(?\DateTimeInterface $dtRegistroNovo): self
    {
        $this->dtRegistroNovo = $dtRegistroNovo;
        return $this;
    }

    public function getSnEspecial(): ?string
    {
        return $this->snEspecial;
    }

    public function setSnEspecial(?string $snEspecial): self
    {
        $this->snEspecial = $snEspecial;
        return $this;
    }

    public function getDsSala(): ?string
    {
        return $this->dsSala;
    }

    public function setDsSala(?string $dsSala): self
    {
        $this->dsSala = $dsSala;
        return $this;
    }

    public function getSnAutomatica(): ?int
    {
        return $this->snAutomatica;
    }

    public function setSnAutomatica(?int $snAutomatica): self
    {
        $this->snAutomatica = $snAutomatica;
        return $this;
    }

    public function getSnAgrupada(): int
    {
        return $this->snAgrupada;
    }

    public function setSnAgrupada(int $snAgrupada): self
    {
        $this->snAgrupada = $snAgrupada;
        return $this;
    }

    public function getCdReservaAgrupar(): ?int
    {
        return $this->cdReservaAgrupar;
    }

    public function setCdReservaAgrupar(?int $cdReservaAgrupar): self
    {
        $this->cdReservaAgrupar = $cdReservaAgrupar;
        return $this;
    }

    public function getDtEnvio(): ?\DateTimeInterface
    {
        return $this->dtEnvio;
    }

    public function setDtEnvio(?\DateTimeInterface $dtEnvio): self
    {
        $this->dtEnvio = $dtEnvio;
        return $this;
    }

    public function isSnEntregue(): ?bool
    {
        return $this->snEntregue;
    }

    public function setSnEntregue(?bool $snEntregue): self
    {
        $this->snEntregue = $snEntregue;
        return $this;
    }
}

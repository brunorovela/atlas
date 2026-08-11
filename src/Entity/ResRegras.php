<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ResRegrasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResRegrasRepository::class)]
#[ORM\Table(
    name: 'res_regras',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_regra', columns: ['cd_regra'])]
#[ORM\UniqueConstraint(name: 'PK_REGRAS_UNK', columns: ['cd_tipo', 'cd_grupo', 'cd_disciplina_categoria'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_CD_CATEGORIA', columns: ['cd_categoria'])]
#[ORM\Index(name: 'IX_CD_PERIODO', columns: ['cd_periodo'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA_CATEGORIA', columns: ['cd_disciplina_categoria'])]
class ResRegras
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_regra', type: 'integer')]
    private ?int $cdRegra = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer')]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'cd_tipo', type: 'integer')]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'cd_categoria', type: 'integer')]
    private ?int $cdCategoria = null;

    #[ORM\Column(name: 'cd_periodo', type: 'integer')]
    private ?int $cdPeriodo = null;

    #[ORM\Column(name: 'cd_disciplina_categoria', type: 'integer', nullable: true, options: ['default' => '-1', 'comment' => 'Armazena o código da disciplina_categoria (chave da tabela disciplinas_categorias)'])]
    private ?int $cdDisciplinaCategoria = -1;

    #[ORM\Column(name: 'qtd_reservas', type: 'smallfloat', nullable: true)]
    private ?float $qtdReservas = null;

    #[ORM\Column(name: 'sn_porcredito', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snPorcredito = 0;

    #[ORM\Column(name: 'nr_dias_liberacao', type: 'integer', nullable: true)]
    private ?int $nrDiasLiberacao = null;

    #[ORM\Column(name: 'nr_dias_bloqueio', type: 'integer', nullable: true)]
    private ?int $nrDiasBloqueio = null;

    #[ORM\Column(name: 'sn_horario_turma', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snHorarioTurma = false;

    #[ORM\Column(name: 'sn_sala_obrigatoria', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snSalaObrigatoria = 1;

    #[ORM\Column(name: 'sn_escolhe_turma', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snEscolheTurma = true;

    #[ORM\Column(name: 'sn_escolhe_pessoa', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snEscolhePessoa = 0;

    #[ORM\Column(name: 'sn_escolhe_data_final', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snEscolheDataFinal = 0;

    #[ORM\Column(name: 'sn_libera_horarios_mesmo_tipo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snLiberaHorariosMesmoTipo = 0;

    #[ORM\Column(name: 'sn_aceita_res_per_aulas_turma', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snAceitaResPerAulasTurma = 0;

    #[ORM\Column(name: 'sn_editar_reserva', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0', 'comment' => 'Permite a edição de reservas já realizadas'])]
    private int $snEditarReserva = 0;

    #[ORM\Column(name: 'sn_reserva_feriados', type: TinyIntType::NAME, nullable: true, options: ['default' => '1'])]
    private ?int $snReservaFeriados = 1;

    public function __construct(
        ?int $cdGrupo = null,
        ?int $cdTipo = null,
        ?int $cdCategoria = null,
        ?int $cdPeriodo = null,
        ?int $cdDisciplinaCategoria = -1,
        ?float $qtdReservas = null,
        int $snPorcredito = 0,
        ?int $nrDiasLiberacao = null,
        ?int $nrDiasBloqueio = null,
        ?bool $snHorarioTurma = false,
        ?int $snSalaObrigatoria = 1,
        ?bool $snEscolheTurma = true,
        ?int $snEscolhePessoa = 0,
        ?int $snEscolheDataFinal = 0,
        ?int $snLiberaHorariosMesmoTipo = 0,
        int $snAceitaResPerAulasTurma = 0,
        int $snEditarReserva = 0,
        ?int $snReservaFeriados = 1
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->cdTipo = $cdTipo;
        $this->cdCategoria = $cdCategoria;
        $this->cdPeriodo = $cdPeriodo;
        $this->cdDisciplinaCategoria = $cdDisciplinaCategoria;
        $this->qtdReservas = $qtdReservas;
        $this->snPorcredito = $snPorcredito;
        $this->nrDiasLiberacao = $nrDiasLiberacao;
        $this->nrDiasBloqueio = $nrDiasBloqueio;
        $this->snHorarioTurma = $snHorarioTurma;
        $this->snSalaObrigatoria = $snSalaObrigatoria;
        $this->snEscolheTurma = $snEscolheTurma;
        $this->snEscolhePessoa = $snEscolhePessoa;
        $this->snEscolheDataFinal = $snEscolheDataFinal;
        $this->snLiberaHorariosMesmoTipo = $snLiberaHorariosMesmoTipo;
        $this->snAceitaResPerAulasTurma = $snAceitaResPerAulasTurma;
        $this->snEditarReserva = $snEditarReserva;
        $this->snReservaFeriados = $snReservaFeriados;
    }

    public function getCdRegra(): ?int
    {
        return $this->cdRegra;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
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

    public function getCdCategoria(): ?int
    {
        return $this->cdCategoria;
    }

    public function setCdCategoria(?int $cdCategoria): self
    {
        $this->cdCategoria = $cdCategoria;
        return $this;
    }

    public function getCdPeriodo(): ?int
    {
        return $this->cdPeriodo;
    }

    public function setCdPeriodo(?int $cdPeriodo): self
    {
        $this->cdPeriodo = $cdPeriodo;
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

    public function getQtdReservas(): ?float
    {
        return $this->qtdReservas;
    }

    public function setQtdReservas(?float $qtdReservas): self
    {
        $this->qtdReservas = $qtdReservas;
        return $this;
    }

    public function getSnPorcredito(): int
    {
        return $this->snPorcredito;
    }

    public function setSnPorcredito(int $snPorcredito): self
    {
        $this->snPorcredito = $snPorcredito;
        return $this;
    }

    public function getNrDiasLiberacao(): ?int
    {
        return $this->nrDiasLiberacao;
    }

    public function setNrDiasLiberacao(?int $nrDiasLiberacao): self
    {
        $this->nrDiasLiberacao = $nrDiasLiberacao;
        return $this;
    }

    public function getNrDiasBloqueio(): ?int
    {
        return $this->nrDiasBloqueio;
    }

    public function setNrDiasBloqueio(?int $nrDiasBloqueio): self
    {
        $this->nrDiasBloqueio = $nrDiasBloqueio;
        return $this;
    }

    public function isSnHorarioTurma(): ?bool
    {
        return $this->snHorarioTurma;
    }

    public function setSnHorarioTurma(?bool $snHorarioTurma): self
    {
        $this->snHorarioTurma = $snHorarioTurma;
        return $this;
    }

    public function getSnSalaObrigatoria(): ?int
    {
        return $this->snSalaObrigatoria;
    }

    public function setSnSalaObrigatoria(?int $snSalaObrigatoria): self
    {
        $this->snSalaObrigatoria = $snSalaObrigatoria;
        return $this;
    }

    public function isSnEscolheTurma(): ?bool
    {
        return $this->snEscolheTurma;
    }

    public function setSnEscolheTurma(?bool $snEscolheTurma): self
    {
        $this->snEscolheTurma = $snEscolheTurma;
        return $this;
    }

    public function getSnEscolhePessoa(): ?int
    {
        return $this->snEscolhePessoa;
    }

    public function setSnEscolhePessoa(?int $snEscolhePessoa): self
    {
        $this->snEscolhePessoa = $snEscolhePessoa;
        return $this;
    }

    public function getSnEscolheDataFinal(): ?int
    {
        return $this->snEscolheDataFinal;
    }

    public function setSnEscolheDataFinal(?int $snEscolheDataFinal): self
    {
        $this->snEscolheDataFinal = $snEscolheDataFinal;
        return $this;
    }

    public function getSnLiberaHorariosMesmoTipo(): ?int
    {
        return $this->snLiberaHorariosMesmoTipo;
    }

    public function setSnLiberaHorariosMesmoTipo(?int $snLiberaHorariosMesmoTipo): self
    {
        $this->snLiberaHorariosMesmoTipo = $snLiberaHorariosMesmoTipo;
        return $this;
    }

    public function getSnAceitaResPerAulasTurma(): int
    {
        return $this->snAceitaResPerAulasTurma;
    }

    public function setSnAceitaResPerAulasTurma(int $snAceitaResPerAulasTurma): self
    {
        $this->snAceitaResPerAulasTurma = $snAceitaResPerAulasTurma;
        return $this;
    }

    public function getSnEditarReserva(): int
    {
        return $this->snEditarReserva;
    }

    public function setSnEditarReserva(int $snEditarReserva): self
    {
        $this->snEditarReserva = $snEditarReserva;
        return $this;
    }

    public function getSnReservaFeriados(): ?int
    {
        return $this->snReservaFeriados;
    }

    public function setSnReservaFeriados(?int $snReservaFeriados): self
    {
        $this->snReservaFeriados = $snReservaFeriados;
        return $this;
    }
}

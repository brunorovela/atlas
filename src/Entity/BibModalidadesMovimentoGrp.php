<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\BibModalidadesMovimentoGrpRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibModalidadesMovimentoGrpRepository::class)]
#[ORM\Table(
    name: 'bib_modalidades_movimento_grp',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_BIB_MODALIDADES_MOVIMENTO_GRP_CD_BIB_GRUPO_CD_MODALIDADE', columns: ['cd_bib_grupo', 'cd_modalidade'])]
#[ORM\Index(name: 'cd_modalidade', columns: ['cd_modalidade'])]
#[ORM\Index(name: 'cd_bib_grupo', columns: ['cd_bib_grupo'])]
#[ORM\Index(name: 'IX_CD_MODALIDADE', columns: ['cd_modalidade'])]
#[ORM\Index(name: 'IX_CD_BIB_GRUPO', columns: ['cd_bib_grupo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_modalidades_movimento_grp_ibfk_1', 'colunas' => ['cd_modalidade'], 'tabelaAlvo' => 'bib_modalidades_movimento', 'colunasAlvo' => ['cd_modalidade'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']],
        ['nome' => 'bib_modalidades_movimento_grp_ibfk_2', 'colunas' => ['cd_bib_grupo'], 'tabelaAlvo' => 'bib_grupos', 'colunasAlvo' => ['cd_bib_grupo'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class BibModalidadesMovimentoGrp
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_modalidade_grupo', type: 'integer')]
    private ?int $cdModalidadeGrupo = null;

    #[ORM\ManyToOne(targetEntity: BibModalidadesMovimento::class)]
    #[ORM\JoinColumn(name: 'cd_modalidade', referencedColumnName: 'cd_modalidade', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibModalidadesMovimento $cdModalidade = null;

    #[ORM\ManyToOne(targetEntity: BibGrupos::class)]
    #[ORM\JoinColumn(name: 'cd_bib_grupo', referencedColumnName: 'cd_bib_grupo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibGrupos $cdBibGrupo = null;

    #[ORM\Column(name: 'nr_dias_proximo_emprestimo', type: 'integer', nullable: true)]
    private ?int $nrDiasProximoEmprestimo = null;

    #[ORM\Column(name: 'nr_maximo_renovacoes_local', type: 'integer', nullable: true)]
    private ?int $nrMaximoRenovacoesLocal = null;

    #[ORM\Column(name: 'nr_dias_expira_reserva', type: 'integer', nullable: true)]
    private ?int $nrDiasExpiraReserva = null;

    #[ORM\Column(name: 'nr_renovacoes_garantidas', type: 'integer', nullable: true)]
    private ?int $nrRenovacoesGarantidas = null;

    #[ORM\Column(name: 'nr_maximo_renovacoes_online', type: 'integer', nullable: true)]
    private ?int $nrMaximoRenovacoesOnline = null;

    #[ORM\Column(name: 'sn_reserva_local', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snReservaLocal = 0;

    #[ORM\Column(name: 'sn_reserva_online', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snReservaOnline = 0;

    #[ORM\Column(name: 'sn_emprestimo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snEmprestimo = 0;

    #[ORM\Column(name: 'nr_emprestimos_simultaneos', type: 'integer', nullable: true)]
    private ?int $nrEmprestimosSimultaneos = null;

    #[ORM\Column(name: 'sn_multa_base_calendario', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snMultaBaseCalendario = null;

    #[ORM\Column(name: 'db_multa_valor', type: 'float', nullable: true)]
    private ?float $dbMultaValor = null;

    #[ORM\Column(name: 'nr_multa_horas_intervalo_conta', type: 'integer', nullable: true)]
    private ?int $nrMultaHorasIntervaloConta = null;

    #[ORM\Column(name: 'sn_empresta_reservados', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snEmprestaReservados = 0;

    #[ORM\Column(name: 'tm_hora_limite_devolucoes', type: 'time', nullable: true)]
    private ?\DateTimeInterface $tmHoraLimiteDevolucoes = null;

    #[ORM\Column(name: 'tm_hora_limite_devolve_reserva', type: 'time', nullable: true)]
    private ?\DateTimeInterface $tmHoraLimiteDevolveReserva = null;

    #[ORM\Column(name: 'tm_hora_limite_renovacoes', type: 'time', nullable: true)]
    private ?\DateTimeInterface $tmHoraLimiteRenovacoes = null;

    #[ORM\Column(name: 'tm_hora_limite_renovacao_onl', type: 'time', nullable: true)]
    private ?\DateTimeInterface $tmHoraLimiteRenovacaoOnl = null;

    #[ORM\Column(name: 'tm_hora_limite_emprestimos', type: 'time', nullable: true)]
    private ?\DateTimeInterface $tmHoraLimiteEmprestimos = null;

    #[ORM\Column(name: 'tm_hora_limite_reservas_local', type: 'time', nullable: true)]
    private ?\DateTimeInterface $tmHoraLimiteReservasLocal = null;

    #[ORM\Column(name: 'tm_hora_limite_reservas_online', type: 'time', nullable: true)]
    private ?\DateTimeInterface $tmHoraLimiteReservasOnline = null;

    #[ORM\Column(name: 'nr_horas_emprestimo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrHorasEmprestimo = null;

    #[ORM\Column(name: 'sn_emprestar_mais_exemplares', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snEmprestarMaisExemplares = null;

    #[ORM\Column(name: 'db_multa_minima_bloquear', type: 'float', nullable: true, options: ['default' => '999.000'])]
    private ?float $dbMultaMinimaBloquear = 999.0;

    #[ORM\Column(name: 'db_multa_minima_bloq_res', type: 'float', nullable: true, options: ['default' => '999.000'])]
    private ?float $dbMultaMinimaBloqRes = 999.0;

    // Sem construtor: 26 propriedades. Use os setters encadeados.

    public function getCdModalidadeGrupo(): ?int
    {
        return $this->cdModalidadeGrupo;
    }

    public function getCdModalidade(): ?BibModalidadesMovimento
    {
        return $this->cdModalidade;
    }

    public function setCdModalidade(?BibModalidadesMovimento $cdModalidade): self
    {
        $this->cdModalidade = $cdModalidade;
        return $this;
    }

    public function getCdBibGrupo(): ?BibGrupos
    {
        return $this->cdBibGrupo;
    }

    public function setCdBibGrupo(?BibGrupos $cdBibGrupo): self
    {
        $this->cdBibGrupo = $cdBibGrupo;
        return $this;
    }

    public function getNrDiasProximoEmprestimo(): ?int
    {
        return $this->nrDiasProximoEmprestimo;
    }

    public function setNrDiasProximoEmprestimo(?int $nrDiasProximoEmprestimo): self
    {
        $this->nrDiasProximoEmprestimo = $nrDiasProximoEmprestimo;
        return $this;
    }

    public function getNrMaximoRenovacoesLocal(): ?int
    {
        return $this->nrMaximoRenovacoesLocal;
    }

    public function setNrMaximoRenovacoesLocal(?int $nrMaximoRenovacoesLocal): self
    {
        $this->nrMaximoRenovacoesLocal = $nrMaximoRenovacoesLocal;
        return $this;
    }

    public function getNrDiasExpiraReserva(): ?int
    {
        return $this->nrDiasExpiraReserva;
    }

    public function setNrDiasExpiraReserva(?int $nrDiasExpiraReserva): self
    {
        $this->nrDiasExpiraReserva = $nrDiasExpiraReserva;
        return $this;
    }

    public function getNrRenovacoesGarantidas(): ?int
    {
        return $this->nrRenovacoesGarantidas;
    }

    public function setNrRenovacoesGarantidas(?int $nrRenovacoesGarantidas): self
    {
        $this->nrRenovacoesGarantidas = $nrRenovacoesGarantidas;
        return $this;
    }

    public function getNrMaximoRenovacoesOnline(): ?int
    {
        return $this->nrMaximoRenovacoesOnline;
    }

    public function setNrMaximoRenovacoesOnline(?int $nrMaximoRenovacoesOnline): self
    {
        $this->nrMaximoRenovacoesOnline = $nrMaximoRenovacoesOnline;
        return $this;
    }

    public function getSnReservaLocal(): ?int
    {
        return $this->snReservaLocal;
    }

    public function setSnReservaLocal(?int $snReservaLocal): self
    {
        $this->snReservaLocal = $snReservaLocal;
        return $this;
    }

    public function getSnReservaOnline(): int
    {
        return $this->snReservaOnline;
    }

    public function setSnReservaOnline(int $snReservaOnline): self
    {
        $this->snReservaOnline = $snReservaOnline;
        return $this;
    }

    public function getSnEmprestimo(): ?int
    {
        return $this->snEmprestimo;
    }

    public function setSnEmprestimo(?int $snEmprestimo): self
    {
        $this->snEmprestimo = $snEmprestimo;
        return $this;
    }

    public function getNrEmprestimosSimultaneos(): ?int
    {
        return $this->nrEmprestimosSimultaneos;
    }

    public function setNrEmprestimosSimultaneos(?int $nrEmprestimosSimultaneos): self
    {
        $this->nrEmprestimosSimultaneos = $nrEmprestimosSimultaneos;
        return $this;
    }

    public function getSnMultaBaseCalendario(): ?int
    {
        return $this->snMultaBaseCalendario;
    }

    public function setSnMultaBaseCalendario(?int $snMultaBaseCalendario): self
    {
        $this->snMultaBaseCalendario = $snMultaBaseCalendario;
        return $this;
    }

    public function getDbMultaValor(): ?float
    {
        return $this->dbMultaValor;
    }

    public function setDbMultaValor(?float $dbMultaValor): self
    {
        $this->dbMultaValor = $dbMultaValor;
        return $this;
    }

    public function getNrMultaHorasIntervaloConta(): ?int
    {
        return $this->nrMultaHorasIntervaloConta;
    }

    public function setNrMultaHorasIntervaloConta(?int $nrMultaHorasIntervaloConta): self
    {
        $this->nrMultaHorasIntervaloConta = $nrMultaHorasIntervaloConta;
        return $this;
    }

    public function getSnEmprestaReservados(): ?int
    {
        return $this->snEmprestaReservados;
    }

    public function setSnEmprestaReservados(?int $snEmprestaReservados): self
    {
        $this->snEmprestaReservados = $snEmprestaReservados;
        return $this;
    }

    public function getTmHoraLimiteDevolucoes(): ?\DateTimeInterface
    {
        return $this->tmHoraLimiteDevolucoes;
    }

    public function setTmHoraLimiteDevolucoes(?\DateTimeInterface $tmHoraLimiteDevolucoes): self
    {
        $this->tmHoraLimiteDevolucoes = $tmHoraLimiteDevolucoes;
        return $this;
    }

    public function getTmHoraLimiteDevolveReserva(): ?\DateTimeInterface
    {
        return $this->tmHoraLimiteDevolveReserva;
    }

    public function setTmHoraLimiteDevolveReserva(?\DateTimeInterface $tmHoraLimiteDevolveReserva): self
    {
        $this->tmHoraLimiteDevolveReserva = $tmHoraLimiteDevolveReserva;
        return $this;
    }

    public function getTmHoraLimiteRenovacoes(): ?\DateTimeInterface
    {
        return $this->tmHoraLimiteRenovacoes;
    }

    public function setTmHoraLimiteRenovacoes(?\DateTimeInterface $tmHoraLimiteRenovacoes): self
    {
        $this->tmHoraLimiteRenovacoes = $tmHoraLimiteRenovacoes;
        return $this;
    }

    public function getTmHoraLimiteRenovacaoOnl(): ?\DateTimeInterface
    {
        return $this->tmHoraLimiteRenovacaoOnl;
    }

    public function setTmHoraLimiteRenovacaoOnl(?\DateTimeInterface $tmHoraLimiteRenovacaoOnl): self
    {
        $this->tmHoraLimiteRenovacaoOnl = $tmHoraLimiteRenovacaoOnl;
        return $this;
    }

    public function getTmHoraLimiteEmprestimos(): ?\DateTimeInterface
    {
        return $this->tmHoraLimiteEmprestimos;
    }

    public function setTmHoraLimiteEmprestimos(?\DateTimeInterface $tmHoraLimiteEmprestimos): self
    {
        $this->tmHoraLimiteEmprestimos = $tmHoraLimiteEmprestimos;
        return $this;
    }

    public function getTmHoraLimiteReservasLocal(): ?\DateTimeInterface
    {
        return $this->tmHoraLimiteReservasLocal;
    }

    public function setTmHoraLimiteReservasLocal(?\DateTimeInterface $tmHoraLimiteReservasLocal): self
    {
        $this->tmHoraLimiteReservasLocal = $tmHoraLimiteReservasLocal;
        return $this;
    }

    public function getTmHoraLimiteReservasOnline(): ?\DateTimeInterface
    {
        return $this->tmHoraLimiteReservasOnline;
    }

    public function setTmHoraLimiteReservasOnline(?\DateTimeInterface $tmHoraLimiteReservasOnline): self
    {
        $this->tmHoraLimiteReservasOnline = $tmHoraLimiteReservasOnline;
        return $this;
    }

    public function getNrHorasEmprestimo(): ?int
    {
        return $this->nrHorasEmprestimo;
    }

    public function setNrHorasEmprestimo(?int $nrHorasEmprestimo): self
    {
        $this->nrHorasEmprestimo = $nrHorasEmprestimo;
        return $this;
    }

    public function getSnEmprestarMaisExemplares(): ?int
    {
        return $this->snEmprestarMaisExemplares;
    }

    public function setSnEmprestarMaisExemplares(?int $snEmprestarMaisExemplares): self
    {
        $this->snEmprestarMaisExemplares = $snEmprestarMaisExemplares;
        return $this;
    }

    public function getDbMultaMinimaBloquear(): ?float
    {
        return $this->dbMultaMinimaBloquear;
    }

    public function setDbMultaMinimaBloquear(?float $dbMultaMinimaBloquear): self
    {
        $this->dbMultaMinimaBloquear = $dbMultaMinimaBloquear;
        return $this;
    }

    public function getDbMultaMinimaBloqRes(): ?float
    {
        return $this->dbMultaMinimaBloqRes;
    }

    public function setDbMultaMinimaBloqRes(?float $dbMultaMinimaBloqRes): self
    {
        $this->dbMultaMinimaBloqRes = $dbMultaMinimaBloqRes;
        return $this;
    }
}

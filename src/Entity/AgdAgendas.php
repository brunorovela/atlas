<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\AgdAgendasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgdAgendasRepository::class)]
#[ORM\Table(
    name: 'agd_agendas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IDX_AGD_AGENDAS_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IDX_AGD_AGENDAS_CD_AGENDA_ORIGINAL', columns: ['cd_agenda_original'])]
#[ORM\Index(name: 'IDX_AGD_AGENDAS_CD_PESSOA_ORIGEM', columns: ['cd_pessoa_origem'])]
#[ORM\Index(name: 'IDX_AGD_AGENDAS_CD_PESSOA_DESTINO', columns: ['cd_pessoa_destino'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_AGENDA_ORIGINAL', columns: ['cd_agenda_original'])]
#[ORM\Index(name: 'IX_CD_PESSOA_ORIGEM', columns: ['cd_pessoa_origem'])]
#[ORM\Index(name: 'IX_CD_PESSOA_DESTINO', columns: ['cd_pessoa_destino'])]
#[ORM\Index(name: 'IX_CD_DISPONIBILIDADE_PERIODO', columns: ['cd_disponibilidade_periodo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_AGD_AGENDAS_AGD_AGENDAS_CD_AGENDA_ORIGINAL', 'colunas' => ['cd_agenda_original'], 'tabelaAlvo' => 'agd_agendas', 'colunasAlvo' => ['cd_agenda'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']],
        ['nome' => 'FK_AGD_AGENDAS_AGD_DISPONIBILIDADE_PERIODOS_CD_DISP_PER', 'colunas' => ['cd_disponibilidade_periodo'], 'tabelaAlvo' => 'agd_disponibilidade_periodos', 'colunasAlvo' => ['cd_disponibilidade_periodo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_AGD_AGENDAS_AGD_SITUACOES_CD_SITUACAO', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'agd_situacoes', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_AGD_AGENDAS_PESSOAS_CD_PESSOA_DESTINO', 'colunas' => ['cd_pessoa_destino'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_AGD_AGENDAS_PESSOAS_CD_PESSOA_ORIGEM', 'colunas' => ['cd_pessoa_origem'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AgdAgendas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_agenda', type: 'integer')]
    private ?int $cdAgenda = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_origem', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaOrigem = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_destino', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaDestino = null;

    #[ORM\ManyToOne(targetEntity: AgdSituacoes::class)]
    #[ORM\JoinColumn(name: 'cd_situacao', referencedColumnName: 'cd_situacao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?AgdSituacoes $cdSituacao = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime')]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime')]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'ds_descricao', type: 'text', length: 65535, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\ManyToOne(targetEntity: AgdAgendas::class)]
    #[ORM\JoinColumn(name: 'cd_agenda_original', referencedColumnName: 'cd_agenda', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?AgdAgendas $cdAgendaOriginal = null;

    #[ORM\Column(name: 'ds_justificativa_cancelamento', type: 'text', length: 65535, nullable: true)]
    private ?string $dsJustificativaCancelamento = null;

    #[ORM\ManyToOne(targetEntity: AgdDisponibilidadePeriodos::class)]
    #[ORM\JoinColumn(name: 'cd_disponibilidade_periodo', referencedColumnName: 'cd_disponibilidade_periodo', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?AgdDisponibilidadePeriodos $cdDisponibilidadePeriodo = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true)]
    private ?int $cdUsuario = null;

    public function __construct(
        ?Pessoas $cdPessoaOrigem = null,
        ?Pessoas $cdPessoaDestino = null,
        ?AgdSituacoes $cdSituacao = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFim = null,
        ?string $dsDescricao = null,
        ?AgdAgendas $cdAgendaOriginal = null,
        ?string $dsJustificativaCancelamento = null,
        ?AgdDisponibilidadePeriodos $cdDisponibilidadePeriodo = null,
        ?int $cdUsuario = null
    ) {
        $this->cdPessoaOrigem = $cdPessoaOrigem;
        $this->cdPessoaDestino = $cdPessoaDestino;
        $this->cdSituacao = $cdSituacao;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->dsDescricao = $dsDescricao;
        $this->cdAgendaOriginal = $cdAgendaOriginal;
        $this->dsJustificativaCancelamento = $dsJustificativaCancelamento;
        $this->cdDisponibilidadePeriodo = $cdDisponibilidadePeriodo;
        $this->cdUsuario = $cdUsuario;
    }

    public function getCdAgenda(): ?int
    {
        return $this->cdAgenda;
    }

    public function getCdPessoaOrigem(): ?Pessoas
    {
        return $this->cdPessoaOrigem;
    }

    public function setCdPessoaOrigem(?Pessoas $cdPessoaOrigem): self
    {
        $this->cdPessoaOrigem = $cdPessoaOrigem;
        return $this;
    }

    public function getCdPessoaDestino(): ?Pessoas
    {
        return $this->cdPessoaDestino;
    }

    public function setCdPessoaDestino(?Pessoas $cdPessoaDestino): self
    {
        $this->cdPessoaDestino = $cdPessoaDestino;
        return $this;
    }

    public function getCdSituacao(): ?AgdSituacoes
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?AgdSituacoes $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
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

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }

    public function getCdAgendaOriginal(): ?AgdAgendas
    {
        return $this->cdAgendaOriginal;
    }

    public function setCdAgendaOriginal(?AgdAgendas $cdAgendaOriginal): self
    {
        $this->cdAgendaOriginal = $cdAgendaOriginal;
        return $this;
    }

    public function getDsJustificativaCancelamento(): ?string
    {
        return $this->dsJustificativaCancelamento;
    }

    public function setDsJustificativaCancelamento(?string $dsJustificativaCancelamento): self
    {
        $this->dsJustificativaCancelamento = $dsJustificativaCancelamento;
        return $this;
    }

    public function getCdDisponibilidadePeriodo(): ?AgdDisponibilidadePeriodos
    {
        return $this->cdDisponibilidadePeriodo;
    }

    public function setCdDisponibilidadePeriodo(?AgdDisponibilidadePeriodos $cdDisponibilidadePeriodo): self
    {
        $this->cdDisponibilidadePeriodo = $cdDisponibilidadePeriodo;
        return $this;
    }

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }
}

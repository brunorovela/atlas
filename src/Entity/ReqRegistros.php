<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ReqRegistrosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReqRegistrosRepository::class)]
#[ORM\Table(
    name: 'req_registros',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'fk_registros_cd_req_grupo', columns: ['cd_req_grupo'])]
#[ORM\Index(name: 'fk_registros_cd_tramite', columns: ['cd_tramite'])]
#[ORM\Index(name: 'fk_registros_cd_situacao', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_REQ_GRUPO', columns: ['cd_req_grupo'])]
#[ORM\Index(name: 'IX_CD_TRAMITE', columns: ['cd_tramite'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'fk_registros_cd_req_motivo_indeferimento', columns: ['cd_req_motivo_indeferimento'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_registros_cd_req_grupo', 'colunas' => ['cd_req_grupo'], 'tabelaAlvo' => 'req_grupos', 'colunasAlvo' => ['cd_req_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_registros_cd_req_motivo_indeferimento', 'colunas' => ['cd_req_motivo_indeferimento'], 'tabelaAlvo' => 'req_motivos_indeferimento', 'colunasAlvo' => ['cd_req_motivo_indeferimento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_registros_cd_situacao', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'req_situacoes', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_registros_cd_tramite', 'colunas' => ['cd_tramite'], 'tabelaAlvo' => 'req_tramite', 'colunasAlvo' => ['cd_tramite'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ReqRegistros
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_req_registros', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdReqRegistros = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'dt_inicio', type: 'date')]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_finalizacao', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtFinalizacao = null;

    #[ORM\ManyToOne(targetEntity: ReqSituacoes::class)]
    #[ORM\JoinColumn(name: 'cd_situacao', referencedColumnName: 'cd_situacao', nullable: false, options: ['default' => '1', 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?ReqSituacoes $cdSituacao = null;

    #[ORM\ManyToOne(targetEntity: ReqTramite::class)]
    #[ORM\JoinColumn(name: 'cd_tramite', referencedColumnName: 'cd_tramite', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?ReqTramite $cdTramite = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'nr_ano_sem', type: 'integer')]
    private ?int $nrAnoSem = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', nullable: true)]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'me_observacao', type: 'text', length: 16777215)]
    private ?string $meObservacao = null;

    #[ORM\ManyToOne(targetEntity: ReqGrupos::class)]
    #[ORM\JoinColumn(name: 'cd_req_grupo', referencedColumnName: 'cd_req_grupo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?ReqGrupos $cdReqGrupo = null;

    #[ORM\Column(name: 'cd_situacao_resultado', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacaoResultado = null;

    #[ORM\Column(name: 'sn_deferido', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $snDeferido = null;

    #[ORM\Column(name: 'ds_bimestre', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $dsBimestre = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true)]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'cd_solicitante', type: 'integer', nullable: true)]
    private ?int $cdSolicitante = null;

    #[ORM\Column(name: 'hr_inicio', type: 'time', nullable: true)]
    private ?\DateTimeInterface $hrInicio = null;

    #[ORM\Column(name: 'hr_fim', type: 'time', nullable: true)]
    private ?\DateTimeInterface $hrFim = null;

    #[ORM\ManyToOne(targetEntity: ReqMotivosIndeferimento::class)]
    #[ORM\JoinColumn(name: 'cd_req_motivo_indeferimento', referencedColumnName: 'cd_req_motivo_indeferimento', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ReqMotivosIndeferimento $cdReqMotivoIndeferimento = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFinalizacao = null,
        ?ReqSituacoes $cdSituacao = null,
        ?ReqTramite $cdTramite = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?int $nrAnoSem = null,
        ?int $cdMensalidade = null,
        ?string $meObservacao = null,
        ?ReqGrupos $cdReqGrupo = null,
        ?int $cdSituacaoResultado = null,
        ?int $snDeferido = null,
        ?int $dsBimestre = null,
        ?int $cdUsuario = null,
        ?int $cdSolicitante = null,
        ?\DateTimeInterface $hrInicio = null,
        ?\DateTimeInterface $hrFim = null,
        ?ReqMotivosIndeferimento $cdReqMotivoIndeferimento = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dtInicio = $dtInicio;
        $this->dtFinalizacao = $dtFinalizacao;
        $this->cdSituacao = $cdSituacao;
        $this->cdTramite = $cdTramite;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->nrAnoSem = $nrAnoSem;
        $this->cdMensalidade = $cdMensalidade;
        $this->meObservacao = $meObservacao;
        $this->cdReqGrupo = $cdReqGrupo;
        $this->cdSituacaoResultado = $cdSituacaoResultado;
        $this->snDeferido = $snDeferido;
        $this->dsBimestre = $dsBimestre;
        $this->cdUsuario = $cdUsuario;
        $this->cdSolicitante = $cdSolicitante;
        $this->hrInicio = $hrInicio;
        $this->hrFim = $hrFim;
        $this->cdReqMotivoIndeferimento = $cdReqMotivoIndeferimento;
        $this->dtBase = $dtBase;
    }

    public function getCdReqRegistros(): ?int
    {
        return $this->cdReqRegistros;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
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

    public function getDtFinalizacao(): ?\DateTimeInterface
    {
        return $this->dtFinalizacao;
    }

    public function setDtFinalizacao(?\DateTimeInterface $dtFinalizacao): self
    {
        $this->dtFinalizacao = $dtFinalizacao;
        return $this;
    }

    public function getCdSituacao(): ?ReqSituacoes
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?ReqSituacoes $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getCdTramite(): ?ReqTramite
    {
        return $this->cdTramite;
    }

    public function setCdTramite(?ReqTramite $cdTramite): self
    {
        $this->cdTramite = $cdTramite;
        return $this;
    }

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
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

    public function getNrAnoSem(): ?int
    {
        return $this->nrAnoSem;
    }

    public function setNrAnoSem(?int $nrAnoSem): self
    {
        $this->nrAnoSem = $nrAnoSem;
        return $this;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getMeObservacao(): ?string
    {
        return $this->meObservacao;
    }

    public function setMeObservacao(?string $meObservacao): self
    {
        $this->meObservacao = $meObservacao;
        return $this;
    }

    public function getCdReqGrupo(): ?ReqGrupos
    {
        return $this->cdReqGrupo;
    }

    public function setCdReqGrupo(?ReqGrupos $cdReqGrupo): self
    {
        $this->cdReqGrupo = $cdReqGrupo;
        return $this;
    }

    public function getCdSituacaoResultado(): ?int
    {
        return $this->cdSituacaoResultado;
    }

    public function setCdSituacaoResultado(?int $cdSituacaoResultado): self
    {
        $this->cdSituacaoResultado = $cdSituacaoResultado;
        return $this;
    }

    public function getSnDeferido(): ?int
    {
        return $this->snDeferido;
    }

    public function setSnDeferido(?int $snDeferido): self
    {
        $this->snDeferido = $snDeferido;
        return $this;
    }

    public function getDsBimestre(): ?int
    {
        return $this->dsBimestre;
    }

    public function setDsBimestre(?int $dsBimestre): self
    {
        $this->dsBimestre = $dsBimestre;
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

    public function getCdSolicitante(): ?int
    {
        return $this->cdSolicitante;
    }

    public function setCdSolicitante(?int $cdSolicitante): self
    {
        $this->cdSolicitante = $cdSolicitante;
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

    public function getCdReqMotivoIndeferimento(): ?ReqMotivosIndeferimento
    {
        return $this->cdReqMotivoIndeferimento;
    }

    public function setCdReqMotivoIndeferimento(?ReqMotivosIndeferimento $cdReqMotivoIndeferimento): self
    {
        $this->cdReqMotivoIndeferimento = $cdReqMotivoIndeferimento;
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

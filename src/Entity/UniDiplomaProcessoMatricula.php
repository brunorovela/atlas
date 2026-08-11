<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UniDiplomaProcessoMatriculaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniDiplomaProcessoMatriculaRepository::class)]
#[ORM\Table(
    name: 'uni_diploma_processo_matricula',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_cd_diploma_processo_id_matricula', columns: ['cd_diploma_processo', 'id_matricula'])]
#[ORM\Index(name: 'FK_uni_diploma_processo_matricula_uni_diploma_processo', columns: ['cd_diploma_processo'])]
#[ORM\Index(name: 'FK_uni_diploma_processo_matricula_matriculas', columns: ['id_matricula'])]
#[ORM\Index(name: 'FK_uni_dpm_uni_diploma_processo_matricula_situacao', columns: ['cd_diploma_processo_matricula_situacao'])]
#[ORM\Index(name: 'FK_uni_diploma_processo_matricula_tecfy_log', columns: ['cd_log_gravar'])]
#[ORM\Index(name: 'FK_uni_diploma_processo_matricula_tecfy_log_2', columns: ['cd_log_gravar_doc_academica'])]
#[ORM\Index(name: 'FK_uni_diploma_processo_matricula_tecfy_log_3', columns: ['cd_log_consultar'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_uni_diploma_processo_matricula_matriculas', 'colunas' => ['id_matricula'], 'tabelaAlvo' => 'matriculas', 'colunasAlvo' => ['id_matricula'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_uni_diploma_processo_matricula_tecfy_log', 'colunas' => ['cd_log_gravar'], 'tabelaAlvo' => 'tecfy_log', 'colunasAlvo' => ['cd_tecfy_log'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_uni_diploma_processo_matricula_tecfy_log_2', 'colunas' => ['cd_log_gravar_doc_academica'], 'tabelaAlvo' => 'tecfy_log', 'colunasAlvo' => ['cd_tecfy_log'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_uni_diploma_processo_matricula_tecfy_log_3', 'colunas' => ['cd_log_consultar'], 'tabelaAlvo' => 'tecfy_log', 'colunasAlvo' => ['cd_tecfy_log'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_uni_diploma_processo_matricula_uni_diploma_processo', 'colunas' => ['cd_diploma_processo'], 'tabelaAlvo' => 'uni_diploma_processo', 'colunasAlvo' => ['cd_diploma_processo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_uni_dpm_uni_diploma_processo_matricula_situacao', 'colunas' => ['cd_diploma_processo_matricula_situacao'], 'tabelaAlvo' => 'uni_diploma_processo_matricula_situacao', 'colunasAlvo' => ['cd_diploma_processo_matricula_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UniDiplomaProcessoMatricula
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_diploma_processo_matricula', type: 'integer')]
    private ?int $cdDiplomaProcessoMatricula = null;

    #[ORM\ManyToOne(targetEntity: UniDiplomaProcesso::class)]
    #[ORM\JoinColumn(name: 'cd_diploma_processo', referencedColumnName: 'cd_diploma_processo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UniDiplomaProcesso $cdDiplomaProcesso = null;

    #[ORM\Column(name: 'id_matricula', type: 'integer')]
    private ?int $idMatricula = null;

    #[ORM\ManyToOne(targetEntity: UniDiplomaProcessoMatriculaSituacao::class)]
    #[ORM\JoinColumn(name: 'cd_diploma_processo_matricula_situacao', referencedColumnName: 'cd_diploma_processo_matricula_situacao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UniDiplomaProcessoMatriculaSituacao $cdDiplomaProcessoMatriculaSituacao = null;

    #[ORM\ManyToOne(targetEntity: TecfyLog::class)]
    #[ORM\JoinColumn(name: 'cd_log_gravar', referencedColumnName: 'cd_tecfy_log', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?TecfyLog $cdLogGravar = null;

    #[ORM\ManyToOne(targetEntity: TecfyLog::class)]
    #[ORM\JoinColumn(name: 'cd_log_gravar_doc_academica', referencedColumnName: 'cd_tecfy_log', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?TecfyLog $cdLogGravarDocAcademica = null;

    #[ORM\ManyToOne(targetEntity: TecfyLog::class)]
    #[ORM\JoinColumn(name: 'cd_log_consultar', referencedColumnName: 'cd_tecfy_log', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?TecfyLog $cdLogConsultar = null;

    #[ORM\Column(name: 'ds_chave_diploma', type: 'string', length: 50, nullable: true)]
    private ?string $dsChaveDiploma = null;

    #[ORM\Column(name: 'ds_chave_historico', type: 'string', length: 50, nullable: true)]
    private ?string $dsChaveHistorico = null;

    #[ORM\Column(name: 'id_diploma', type: 'integer', nullable: true, options: ['comment' => 'Campo que armazena o IDDiploma retornado pelo endpoint GravarDiplomaDigital da tecfy'])]
    private ?int $idDiploma = null;

    #[ORM\Column(name: 'ds_log', type: 'text', nullable: true)]
    private ?string $dsLog = null;

    #[ORM\Column(name: 'dt_log', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLog = null;

    #[ORM\Column(name: 'ds_url', type: 'string', length: 1000, nullable: true)]
    private ?string $dsUrl = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?UniDiplomaProcesso $cdDiplomaProcesso = null,
        ?int $idMatricula = null,
        ?UniDiplomaProcessoMatriculaSituacao $cdDiplomaProcessoMatriculaSituacao = null,
        ?TecfyLog $cdLogGravar = null,
        ?TecfyLog $cdLogGravarDocAcademica = null,
        ?TecfyLog $cdLogConsultar = null,
        ?string $dsChaveDiploma = null,
        ?string $dsChaveHistorico = null,
        ?int $idDiploma = null,
        ?string $dsLog = null,
        ?\DateTimeInterface $dtLog = null,
        ?string $dsUrl = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdDiplomaProcesso = $cdDiplomaProcesso;
        $this->idMatricula = $idMatricula;
        $this->cdDiplomaProcessoMatriculaSituacao = $cdDiplomaProcessoMatriculaSituacao;
        $this->cdLogGravar = $cdLogGravar;
        $this->cdLogGravarDocAcademica = $cdLogGravarDocAcademica;
        $this->cdLogConsultar = $cdLogConsultar;
        $this->dsChaveDiploma = $dsChaveDiploma;
        $this->dsChaveHistorico = $dsChaveHistorico;
        $this->idDiploma = $idDiploma;
        $this->dsLog = $dsLog;
        $this->dtLog = $dtLog;
        $this->dsUrl = $dsUrl;
        $this->dtBase = $dtBase;
    }

    public function getCdDiplomaProcessoMatricula(): ?int
    {
        return $this->cdDiplomaProcessoMatricula;
    }

    public function getCdDiplomaProcesso(): ?UniDiplomaProcesso
    {
        return $this->cdDiplomaProcesso;
    }

    public function setCdDiplomaProcesso(?UniDiplomaProcesso $cdDiplomaProcesso): self
    {
        $this->cdDiplomaProcesso = $cdDiplomaProcesso;
        return $this;
    }

    public function getIdMatricula(): ?int
    {
        return $this->idMatricula;
    }

    public function setIdMatricula(?int $idMatricula): self
    {
        $this->idMatricula = $idMatricula;
        return $this;
    }

    public function getCdDiplomaProcessoMatriculaSituacao(): ?UniDiplomaProcessoMatriculaSituacao
    {
        return $this->cdDiplomaProcessoMatriculaSituacao;
    }

    public function setCdDiplomaProcessoMatriculaSituacao(?UniDiplomaProcessoMatriculaSituacao $cdDiplomaProcessoMatriculaSituacao): self
    {
        $this->cdDiplomaProcessoMatriculaSituacao = $cdDiplomaProcessoMatriculaSituacao;
        return $this;
    }

    public function getCdLogGravar(): ?TecfyLog
    {
        return $this->cdLogGravar;
    }

    public function setCdLogGravar(?TecfyLog $cdLogGravar): self
    {
        $this->cdLogGravar = $cdLogGravar;
        return $this;
    }

    public function getCdLogGravarDocAcademica(): ?TecfyLog
    {
        return $this->cdLogGravarDocAcademica;
    }

    public function setCdLogGravarDocAcademica(?TecfyLog $cdLogGravarDocAcademica): self
    {
        $this->cdLogGravarDocAcademica = $cdLogGravarDocAcademica;
        return $this;
    }

    public function getCdLogConsultar(): ?TecfyLog
    {
        return $this->cdLogConsultar;
    }

    public function setCdLogConsultar(?TecfyLog $cdLogConsultar): self
    {
        $this->cdLogConsultar = $cdLogConsultar;
        return $this;
    }

    public function getDsChaveDiploma(): ?string
    {
        return $this->dsChaveDiploma;
    }

    public function setDsChaveDiploma(?string $dsChaveDiploma): self
    {
        $this->dsChaveDiploma = $dsChaveDiploma;
        return $this;
    }

    public function getDsChaveHistorico(): ?string
    {
        return $this->dsChaveHistorico;
    }

    public function setDsChaveHistorico(?string $dsChaveHistorico): self
    {
        $this->dsChaveHistorico = $dsChaveHistorico;
        return $this;
    }

    public function getIdDiploma(): ?int
    {
        return $this->idDiploma;
    }

    public function setIdDiploma(?int $idDiploma): self
    {
        $this->idDiploma = $idDiploma;
        return $this;
    }

    public function getDsLog(): ?string
    {
        return $this->dsLog;
    }

    public function setDsLog(?string $dsLog): self
    {
        $this->dsLog = $dsLog;
        return $this;
    }

    public function getDtLog(): ?\DateTimeInterface
    {
        return $this->dtLog;
    }

    public function setDtLog(?\DateTimeInterface $dtLog): self
    {
        $this->dtLog = $dtLog;
        return $this;
    }

    public function getDsUrl(): ?string
    {
        return $this->dsUrl;
    }

    public function setDsUrl(?string $dsUrl): self
    {
        $this->dsUrl = $dsUrl;
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

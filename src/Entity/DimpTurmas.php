<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\DimpTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DimpTurmasRepository::class)]
#[ORM\Table(
    name: 'dimp_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_DOCUMENTO', columns: ['cd_documento'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_DOCUMENTOS_LOGS_CD_DOCUMENTO', 'colunas' => ['cd_documento'], 'tabelaAlvo' => 'dimp_documentos', 'colunasAlvo' => ['cd_documento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_DOCUMENTOS_TURMAS_CD_DOCUMENTO', 'colunas' => ['cd_documento'], 'tabelaAlvo' => 'dimp_documentos', 'colunasAlvo' => ['cd_documento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class DimpTurmas
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: DimpDocumentos::class)]
    #[ORM\JoinColumn(name: 'cd_documento', referencedColumnName: 'cd_documento', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?DimpDocumentos $cdDocumento = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50, options: ['fixed' => true])]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer', options: ['default' => '0'])]
    private int $cdDisciplina = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'integer')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'dt_documento', type: 'datetime')]
    private ?\DateTimeInterface $dtDocumento = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer')]
    private ?int $cdSituacao = null;

    public function __construct(
        ?DimpDocumentos $cdDocumento = null,
        ?string $cdTurma = null,
        int $cdDisciplina = 0,
        ?int $nrAnosemestre = null,
        ?\DateTimeInterface $dtDocumento = null,
        ?int $cdSituacao = null
    ) {
        $this->cdDocumento = $cdDocumento;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->dtDocumento = $dtDocumento;
        $this->cdSituacao = $cdSituacao;
    }

    public function getCdDocumento(): ?DimpDocumentos
    {
        return $this->cdDocumento;
    }

    public function setCdDocumento(?DimpDocumentos $cdDocumento): self
    {
        $this->cdDocumento = $cdDocumento;
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

    public function getCdDisciplina(): int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
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

    public function getDtDocumento(): ?\DateTimeInterface
    {
        return $this->dtDocumento;
    }

    public function setDtDocumento(?\DateTimeInterface $dtDocumento): self
    {
        $this->dtDocumento = $dtDocumento;
        return $this;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }
}

<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\DisciplinasMestreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisciplinasMestreRepository::class)]
#[ORM\Table(
    name: 'disciplinas_mestre',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_disciplina_pai', columns: ['cd_disciplina_pai'])]
#[ORM\UniqueConstraint(name: 'UK_ID_DISCIPLINA_MESTRE', columns: ['id_disciplina_mestre'])]
#[EsquemaFisico(
    chavesEstrangeiras: [],
    autoIncremento: ['id_disciplina_mestre']
)]
class DisciplinasMestre
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina_pai', type: 'string', length: 255, options: ['default' => ''])]
    private string $cdDisciplinaPai = '';

    #[ORM\Column(name: 'ds_disciplina', type: 'string', length: 255, nullable: true)]
    private ?string $dsDisciplina = null;

    #[ORM\Column(name: 'nr_ordem', type: 'smallint', nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'ds_sigla', type: 'string', length: 10, nullable: true)]
    private ?string $dsSigla = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'cd_disc_mec', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdDiscMec = null;

    #[ORM\Column(name: 'sn_ativa', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $snAtiva = 1;

    #[ORM\Column(name: 'sn_exporta_moodle', type: 'boolean', options: ['default' => '1'])]
    private bool $snExportaMoodle = true;

    #[ORM\Column(name: 'id_disciplina_mestre', type: 'integer')]
    private ?int $idDisciplinaMestre = null;

    public function __construct(
        string $cdDisciplinaPai = '',
        ?string $dsDisciplina = null,
        ?int $nrOrdem = null,
        ?string $dsSigla = null,
        ?string $dsDescricao = null,
        ?int $cdDiscMec = null,
        ?int $snAtiva = 1,
        bool $snExportaMoodle = true,
        ?int $idDisciplinaMestre = null
    ) {
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        $this->dsDisciplina = $dsDisciplina;
        $this->nrOrdem = $nrOrdem;
        $this->dsSigla = $dsSigla;
        $this->dsDescricao = $dsDescricao;
        $this->cdDiscMec = $cdDiscMec;
        $this->snAtiva = $snAtiva;
        $this->snExportaMoodle = $snExportaMoodle;
        $this->idDisciplinaMestre = $idDisciplinaMestre;
    }

    public function getCdDisciplinaPai(): string
    {
        return $this->cdDisciplinaPai;
    }

    public function setCdDisciplinaPai(string $cdDisciplinaPai): self
    {
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        return $this;
    }

    public function getDsDisciplina(): ?string
    {
        return $this->dsDisciplina;
    }

    public function setDsDisciplina(?string $dsDisciplina): self
    {
        $this->dsDisciplina = $dsDisciplina;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getDsSigla(): ?string
    {
        return $this->dsSigla;
    }

    public function setDsSigla(?string $dsSigla): self
    {
        $this->dsSigla = $dsSigla;
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

    public function getCdDiscMec(): ?int
    {
        return $this->cdDiscMec;
    }

    public function setCdDiscMec(?int $cdDiscMec): self
    {
        $this->cdDiscMec = $cdDiscMec;
        return $this;
    }

    public function getSnAtiva(): ?int
    {
        return $this->snAtiva;
    }

    public function setSnAtiva(?int $snAtiva): self
    {
        $this->snAtiva = $snAtiva;
        return $this;
    }

    public function isSnExportaMoodle(): bool
    {
        return $this->snExportaMoodle;
    }

    public function setSnExportaMoodle(bool $snExportaMoodle): self
    {
        $this->snExportaMoodle = $snExportaMoodle;
        return $this;
    }

    public function getIdDisciplinaMestre(): ?int
    {
        return $this->idDisciplinaMestre;
    }

    public function setIdDisciplinaMestre(?int $idDisciplinaMestre): self
    {
        $this->idDisciplinaMestre = $idDisciplinaMestre;
        return $this;
    }
}

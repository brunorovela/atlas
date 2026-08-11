<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\KonvivaMatriculasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KonvivaMatriculasRepository::class)]
#[ORM\Table(
    name: 'konviva_matriculas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_KONVIVA_MATRICULA', columns: ['cd_konviva_matricula'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['id_disciplina'])]
class KonvivaMatriculas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_konviva_matricula', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdKonvivaMatricula = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'id_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $idDisciplina = null;

    #[ORM\Column(name: 'ds_frequencia', type: 'string', length: 8, nullable: true)]
    private ?string $dsFrequencia = null;

    #[ORM\Column(name: 'ds_aproveitamento', type: 'string', length: 8, nullable: true)]
    private ?string $dsAproveitamento = null;

    #[ORM\Column(name: 'dt_alteracao', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtAlteracao = null;

    public function __construct(
        ?int $cdKonvivaMatricula = null,
        ?int $nrAnosemestre = null,
        ?string $cdTurma = null,
        ?int $cdPessoa = null,
        ?int $idDisciplina = null,
        ?string $dsFrequencia = null,
        ?string $dsAproveitamento = null,
        ?\DateTimeInterface $dtAlteracao = null
    ) {
        $this->cdKonvivaMatricula = $cdKonvivaMatricula;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
        $this->cdPessoa = $cdPessoa;
        $this->idDisciplina = $idDisciplina;
        $this->dsFrequencia = $dsFrequencia;
        $this->dsAproveitamento = $dsAproveitamento;
        $this->dtAlteracao = $dtAlteracao;
    }

    public function getCdKonvivaMatricula(): ?int
    {
        return $this->cdKonvivaMatricula;
    }

    public function setCdKonvivaMatricula(?int $cdKonvivaMatricula): self
    {
        $this->cdKonvivaMatricula = $cdKonvivaMatricula;
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

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
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

    public function getIdDisciplina(): ?int
    {
        return $this->idDisciplina;
    }

    public function setIdDisciplina(?int $idDisciplina): self
    {
        $this->idDisciplina = $idDisciplina;
        return $this;
    }

    public function getDsFrequencia(): ?string
    {
        return $this->dsFrequencia;
    }

    public function setDsFrequencia(?string $dsFrequencia): self
    {
        $this->dsFrequencia = $dsFrequencia;
        return $this;
    }

    public function getDsAproveitamento(): ?string
    {
        return $this->dsAproveitamento;
    }

    public function setDsAproveitamento(?string $dsAproveitamento): self
    {
        $this->dsAproveitamento = $dsAproveitamento;
        return $this;
    }

    public function getDtAlteracao(): ?\DateTimeInterface
    {
        return $this->dtAlteracao;
    }

    public function setDtAlteracao(?\DateTimeInterface $dtAlteracao): self
    {
        $this->dtAlteracao = $dtAlteracao;
        return $this;
    }
}

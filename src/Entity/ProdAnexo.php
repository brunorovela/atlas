<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProdAnexoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProdAnexoRepository::class)]
#[ORM\Table(
    name: 'prod_anexo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'prod_anexo_unique', columns: ['ds_chave'])]
#[ORM\Index(name: 'ix_prod_aluno_anexo', columns: ['cd_processo', 'cd_turma', 'cd_disciplina', 'cd_aluno', 'nr_anosemestre'])]
class ProdAnexo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_anexo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAnexo = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 100, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_aluno', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAluno = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_processo', type: 'integer')]
    private ?int $cdProcesso = null;

    #[ORM\Column(name: 'nm_anexo', type: 'string', length: 255, nullable: true)]
    private ?string $nmAnexo = null;

    #[ORM\Column(name: 'ds_tipo_anexo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTipoAnexo = null;

    #[ORM\Column(name: 'me_anexo', type: 'blob', length: 16777215, nullable: true)]
    private ?string $meAnexo = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInclusao = null;

    public function __construct(
        ?string $dsChave = null,
        ?int $nrAnosemestre = null,
        ?int $cdAluno = null,
        ?int $cdDisciplina = null,
        ?string $cdTurma = null,
        ?int $cdProcesso = null,
        ?string $nmAnexo = null,
        ?string $dsTipoAnexo = null,
        ?string $meAnexo = null,
        ?\DateTimeInterface $dtInclusao = null
    ) {
        $this->dsChave = $dsChave;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdAluno = $cdAluno;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdTurma = $cdTurma;
        $this->cdProcesso = $cdProcesso;
        $this->nmAnexo = $nmAnexo;
        $this->dsTipoAnexo = $dsTipoAnexo;
        $this->meAnexo = $meAnexo;
        $this->dtInclusao = $dtInclusao;
    }

    public function getCdAnexo(): ?int
    {
        return $this->cdAnexo;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
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

    public function getCdAluno(): ?int
    {
        return $this->cdAluno;
    }

    public function setCdAluno(?int $cdAluno): self
    {
        $this->cdAluno = $cdAluno;
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

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
    }

    public function setCdProcesso(?int $cdProcesso): self
    {
        $this->cdProcesso = $cdProcesso;
        return $this;
    }

    public function getNmAnexo(): ?string
    {
        return $this->nmAnexo;
    }

    public function setNmAnexo(?string $nmAnexo): self
    {
        $this->nmAnexo = $nmAnexo;
        return $this;
    }

    public function getDsTipoAnexo(): ?string
    {
        return $this->dsTipoAnexo;
    }

    public function setDsTipoAnexo(?string $dsTipoAnexo): self
    {
        $this->dsTipoAnexo = $dsTipoAnexo;
        return $this;
    }

    public function getMeAnexo(): ?string
    {
        return $this->meAnexo;
    }

    public function setMeAnexo(?string $meAnexo): self
    {
        $this->meAnexo = $meAnexo;
        return $this;
    }

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
        return $this;
    }
}

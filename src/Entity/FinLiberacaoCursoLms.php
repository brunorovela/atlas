<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinLiberacaoCursoLmsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinLiberacaoCursoLmsRepository::class)]
#[ORM\Table(
    name: 'fin_liberacao_curso_lms',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'FK_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'FK_DISCIPLINA', columns: ['id_disciplina'])]
#[ORM\Index(name: 'FK_USUARIO', columns: ['cd_usuario'])]
class FinLiberacaoCursoLms
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_liberacao_curso_lms', type: 'integer')]
    private ?int $cdLiberacaoCursoLms = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'id_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $idDisciplina = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer')]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'dt_liberacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLiberacao = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snAtivo = true;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $cdTurma = null,
        ?int $idDisciplina = null,
        ?int $cdUsuario = null,
        ?\DateTimeInterface $dtLiberacao = null,
        ?bool $snAtivo = true
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdTurma = $cdTurma;
        $this->idDisciplina = $idDisciplina;
        $this->cdUsuario = $cdUsuario;
        $this->dtLiberacao = $dtLiberacao;
        $this->snAtivo = $snAtivo;
    }

    public function getCdLiberacaoCursoLms(): ?int
    {
        return $this->cdLiberacaoCursoLms;
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

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
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

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    public function getDtLiberacao(): ?\DateTimeInterface
    {
        return $this->dtLiberacao;
    }

    public function setDtLiberacao(?\DateTimeInterface $dtLiberacao): self
    {
        $this->dtLiberacao = $dtLiberacao;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}

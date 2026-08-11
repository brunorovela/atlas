<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinPlanosPgtoCursosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanosPgtoCursosRepository::class)]
#[ORM\Table(
    name: 'fin_planos_pgto_cursos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_PLANO', columns: ['cd_plano'])]
class FinPlanosPgtoCursos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_plano', type: 'integer')]
    private ?int $cdPlano = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    public function __construct(
        ?int $cdPlano = null,
        ?string $cdCurso = null
    ) {
        $this->cdPlano = $cdPlano;
        $this->cdCurso = $cdCurso;
    }

    public function getCdPlano(): ?int
    {
        return $this->cdPlano;
    }

    public function setCdPlano(?int $cdPlano): self
    {
        $this->cdPlano = $cdPlano;
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
}

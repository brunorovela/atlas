<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncCursosEmecRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncCursosEmecRepository::class)]
#[ORM\Table(
    name: 'estnc_cursos_emec',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class EstncCursosEmec
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_curso_emec', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCursoEmec = null;

    #[ORM\Column(name: 'ds_curso_emec', type: 'string', length: 255)]
    private ?string $dsCursoEmec = null;

    public function __construct(
        ?string $dsCursoEmec = null
    ) {
        $this->dsCursoEmec = $dsCursoEmec;
    }

    public function getCdCursoEmec(): ?int
    {
        return $this->cdCursoEmec;
    }

    public function getDsCursoEmec(): ?string
    {
        return $this->dsCursoEmec;
    }

    public function setDsCursoEmec(?string $dsCursoEmec): self
    {
        $this->dsCursoEmec = $dsCursoEmec;
        return $this;
    }
}

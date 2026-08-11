<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConExamesTemasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConExamesTemasRepository::class)]
#[ORM\Table(
    name: 'con_exames_temas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_EXAME', columns: ['cd_exame'])]
#[ORM\Index(name: 'IX_CD_TEMA', columns: ['cd_tema'])]
class ConExamesTemas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_exame', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdExame = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_tema', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTema = null;

    public function __construct(
        ?int $cdExame = null,
        ?int $cdTema = null
    ) {
        $this->cdExame = $cdExame;
        $this->cdTema = $cdTema;
    }

    public function getCdExame(): ?int
    {
        return $this->cdExame;
    }

    public function setCdExame(?int $cdExame): self
    {
        $this->cdExame = $cdExame;
        return $this;
    }

    public function getCdTema(): ?int
    {
        return $this->cdTema;
    }

    public function setCdTema(?int $cdTema): self
    {
        $this->cdTema = $cdTema;
        return $this;
    }
}

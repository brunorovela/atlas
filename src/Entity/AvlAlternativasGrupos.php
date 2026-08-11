<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvlAlternativasGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlAlternativasGruposRepository::class)]
#[ORM\Table(
    name: 'avl_alternativas_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Grupos de alternativas pr?-definidas']
)]
#[ORM\UniqueConstraint(name: 'cd_grupo', columns: ['cd_grupo'])]
class AvlAlternativasGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo', type: 'integer')]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'ds_grupo', type: 'string', length: 100, options: ['default' => ''])]
    private string $dsGrupo = '';

    public function __construct(
        string $dsGrupo = ''
    ) {
        $this->dsGrupo = $dsGrupo;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function getDsGrupo(): string
    {
        return $this->dsGrupo;
    }

    public function setDsGrupo(string $dsGrupo): self
    {
        $this->dsGrupo = $dsGrupo;
        return $this;
    }
}

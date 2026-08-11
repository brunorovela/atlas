<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvlQuestoesTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlQuestoesTiposRepository::class)]
#[ORM\Table(
    name: 'avl_questoes_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Tipos de quest?es, o usu?rio ? deve ter acesso a esses da']
)]
#[ORM\UniqueConstraint(name: 'cd_tipo', columns: ['cd_tipo'])]
class AvlQuestoesTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo', type: 'integer')]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 100, options: ['default' => ''])]
    private string $dsTipo = '';

    public function __construct(
        string $dsTipo = ''
    ) {
        $this->dsTipo = $dsTipo;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function getDsTipo(): string
    {
        return $this->dsTipo;
    }

    public function setDsTipo(string $dsTipo): self
    {
        $this->dsTipo = $dsTipo;
        return $this;
    }
}

<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProfessoresTiposAtividadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfessoresTiposAtividadesRepository::class)]
#[ORM\Table(
    name: 'professores_tipos_atividades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class ProfessoresTiposAtividades
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ativadade', type: 'smallint')]
    private ?int $cdAtivadade = null;

    #[ORM\Column(name: 'ds_atividade', type: 'string', length: 100, nullable: true)]
    private ?string $dsAtividade = null;

    public function __construct(
        ?string $dsAtividade = null
    ) {
        $this->dsAtividade = $dsAtividade;
    }

    public function getCdAtivadade(): ?int
    {
        return $this->cdAtivadade;
    }

    public function getDsAtividade(): ?string
    {
        return $this->dsAtividade;
    }

    public function setDsAtividade(?string $dsAtividade): self
    {
        $this->dsAtividade = $dsAtividade;
        return $this;
    }
}

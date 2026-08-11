<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\EstncSetoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncSetoresRepository::class)]
#[ORM\Table(
    name: 'estnc_setores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class EstncSetores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_setor', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSetor = null;

    #[ORM\Column(name: 'ds_setor', type: 'string', length: 255, nullable: true)]
    private ?string $dsSetor = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    public function __construct(
        ?string $dsSetor = null,
        ?int $snAtivo = null
    ) {
        $this->dsSetor = $dsSetor;
        $this->snAtivo = $snAtivo;
    }

    public function getCdSetor(): ?int
    {
        return $this->cdSetor;
    }

    public function getDsSetor(): ?string
    {
        return $this->dsSetor;
    }

    public function setDsSetor(?string $dsSetor): self
    {
        $this->dsSetor = $dsSetor;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}

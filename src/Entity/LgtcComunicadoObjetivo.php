<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\LgtcComunicadoObjetivoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LgtcComunicadoObjetivoRepository::class)]
#[ORM\Table(
    name: 'lgtc_comunicado_objetivo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_COMUNICADO_OBJETIVO_DS_OBJETIVO', columns: ['DS_OBJETIVO'])]
class LgtcComunicadoObjetivo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_OBJETIVO', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $cdObjetivo = null;

    #[ORM\Column(name: 'DS_OBJETIVO', type: 'string', length: 255)]
    private ?string $dsObjetivo = null;

    public function __construct(
        ?string $dsObjetivo = null
    ) {
        $this->dsObjetivo = $dsObjetivo;
    }

    public function getCdObjetivo(): ?int
    {
        return $this->cdObjetivo;
    }

    public function getDsObjetivo(): ?string
    {
        return $this->dsObjetivo;
    }

    public function setDsObjetivo(?string $dsObjetivo): self
    {
        $this->dsObjetivo = $dsObjetivo;
        return $this;
    }
}

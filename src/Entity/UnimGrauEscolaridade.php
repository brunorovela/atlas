<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnimGrauEscolaridadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimGrauEscolaridadeRepository::class)]
#[ORM\Table(
    name: 'unim_grau_escolaridade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class UnimGrauEscolaridade
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grau_escolaridade', type: 'integer')]
    private ?int $cdGrauEscolaridade = null;

    #[ORM\Column(name: 'ds_grau_escolaridade', type: 'string', length: 255)]
    private ?string $dsGrauEscolaridade = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsGrauEscolaridade = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsGrauEscolaridade = $dsGrauEscolaridade;
        $this->dtBase = $dtBase;
    }

    public function getCdGrauEscolaridade(): ?int
    {
        return $this->cdGrauEscolaridade;
    }

    public function getDsGrauEscolaridade(): ?string
    {
        return $this->dsGrauEscolaridade;
    }

    public function setDsGrauEscolaridade(?string $dsGrauEscolaridade): self
    {
        $this->dsGrauEscolaridade = $dsGrauEscolaridade;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}

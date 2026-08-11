<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfeG2kaLayoutRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeG2kaLayoutRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_g2ka_layout',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinNfeG2kaLayout
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_grupo', type: 'string', length: 20)]
    private ?string $cdGrupo = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'ds_campos', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsCampos = null;

    public function __construct(
        ?string $cdGrupo = null,
        ?int $nrOrdem = null,
        ?string $dsCampos = null
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->nrOrdem = $nrOrdem;
        $this->dsCampos = $dsCampos;
    }

    public function getCdGrupo(): ?string
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?string $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getDsCampos(): ?string
    {
        return $this->dsCampos;
    }

    public function setDsCampos(?string $dsCampos): self
    {
        $this->dsCampos = $dsCampos;
        return $this;
    }
}

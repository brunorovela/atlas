<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BibSituacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibSituacoesRepository::class)]
#[ORM\Table(
    name: 'bib_situacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class BibSituacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_situacao', type: 'integer')]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'ds_sigla', type: 'string', length: 10)]
    private ?string $dsSigla = null;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 50)]
    private ?string $dsSituacao = null;

    public function __construct(
        ?string $dsSigla = null,
        ?string $dsSituacao = null
    ) {
        $this->dsSigla = $dsSigla;
        $this->dsSituacao = $dsSituacao;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function getDsSigla(): ?string
    {
        return $this->dsSigla;
    }

    public function setDsSigla(?string $dsSigla): self
    {
        $this->dsSigla = $dsSigla;
        return $this;
    }

    public function getDsSituacao(): ?string
    {
        return $this->dsSituacao;
    }

    public function setDsSituacao(?string $dsSituacao): self
    {
        $this->dsSituacao = $dsSituacao;
        return $this;
    }
}

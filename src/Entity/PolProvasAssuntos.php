<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PolProvasAssuntosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolProvasAssuntosRepository::class)]
#[ORM\Table(
    name: 'pol_provas_assuntos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ASSUNTO', columns: ['cd_assunto'])]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
class PolProvasAssuntos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_assunto', type: 'integer')]
    private ?int $cdProvaAssunto = null;

    #[ORM\Column(name: 'cd_assunto', type: 'integer')]
    private ?int $cdAssunto = null;

    #[ORM\Column(name: 'cd_prova', type: 'integer')]
    private ?int $cdProva = null;

    public function __construct(
        ?int $cdAssunto = null,
        ?int $cdProva = null
    ) {
        $this->cdAssunto = $cdAssunto;
        $this->cdProva = $cdProva;
    }

    public function getCdProvaAssunto(): ?int
    {
        return $this->cdProvaAssunto;
    }

    public function getCdAssunto(): ?int
    {
        return $this->cdAssunto;
    }

    public function setCdAssunto(?int $cdAssunto): self
    {
        $this->cdAssunto = $cdAssunto;
        return $this;
    }

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
        return $this;
    }
}

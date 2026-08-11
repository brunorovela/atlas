<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncAvaliacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncAvaliacoesRepository::class)]
#[ORM\Table(
    name: 'estnc_avaliacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class EstncAvaliacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_avaliacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAvaliacao = null;

    #[ORM\Column(name: 'ds_avaliacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsAvaliacao = null;

    #[ORM\Column(name: 'me_obs', type: 'blob', length: 65535, nullable: true)]
    private ?string $meObs = null;

    public function __construct(
        ?string $dsAvaliacao = null,
        ?string $meObs = null
    ) {
        $this->dsAvaliacao = $dsAvaliacao;
        $this->meObs = $meObs;
    }

    public function getCdAvaliacao(): ?int
    {
        return $this->cdAvaliacao;
    }

    public function getDsAvaliacao(): ?string
    {
        return $this->dsAvaliacao;
    }

    public function setDsAvaliacao(?string $dsAvaliacao): self
    {
        $this->dsAvaliacao = $dsAvaliacao;
        return $this;
    }

    public function getMeObs(): ?string
    {
        return $this->meObs;
    }

    public function setMeObs(?string $meObs): self
    {
        $this->meObs = $meObs;
        return $this;
    }
}

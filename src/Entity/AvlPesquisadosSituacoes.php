<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvlPesquisadosSituacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlPesquisadosSituacoesRepository::class)]
#[ORM\Table(
    name: 'avl_pesquisados_situacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_situ_respondeu', columns: ['cd_situ_respondeu'])]
class AvlPesquisadosSituacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_situ_respondeu', type: 'integer')]
    private ?int $cdSituRespondeu = null;

    #[ORM\Column(name: 'ds_situ_respondeu', type: 'string', length: 50)]
    private ?string $dsSituRespondeu = null;

    public function __construct(
        ?string $dsSituRespondeu = null
    ) {
        $this->dsSituRespondeu = $dsSituRespondeu;
    }

    public function getCdSituRespondeu(): ?int
    {
        return $this->cdSituRespondeu;
    }

    public function getDsSituRespondeu(): ?string
    {
        return $this->dsSituRespondeu;
    }

    public function setDsSituRespondeu(?string $dsSituRespondeu): self
    {
        $this->dsSituRespondeu = $dsSituRespondeu;
        return $this;
    }
}

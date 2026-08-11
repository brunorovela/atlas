<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RemAcoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemAcoesRepository::class)]
#[ORM\Table(
    name: 'rem_acoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ds_chave', columns: ['ds_chave'])]
class RemAcoes
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_acao', type: 'integer')]
    private ?int $cdAcao = null;

    #[ORM\Column(name: 'ds_acao', type: 'string', length: 255)]
    private ?string $dsAcao = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255)]
    private ?string $dsChave = null;

    public function __construct(
        ?int $cdAcao = null,
        ?string $dsAcao = null,
        ?string $dsChave = null
    ) {
        $this->cdAcao = $cdAcao;
        $this->dsAcao = $dsAcao;
        $this->dsChave = $dsChave;
    }

    public function getCdAcao(): ?int
    {
        return $this->cdAcao;
    }

    public function setCdAcao(?int $cdAcao): self
    {
        $this->cdAcao = $cdAcao;
        return $this;
    }

    public function getDsAcao(): ?string
    {
        return $this->dsAcao;
    }

    public function setDsAcao(?string $dsAcao): self
    {
        $this->dsAcao = $dsAcao;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }
}

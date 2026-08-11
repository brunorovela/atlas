<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConSituacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConSituacoesRepository::class)]
#[ORM\Table(
    name: 'con_situacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_situacao', columns: ['cd_situacao'])]
#[ORM\UniqueConstraint(name: 'ds_chave', columns: ['ds_chave'])]
#[ORM\UniqueConstraint(name: 'ds_situacao', columns: ['ds_situacao'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'])]
class ConSituacoes
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_situacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 20)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 100)]
    private ?string $dsSituacao = null;

    public function __construct(
        ?int $cdSituacao = null,
        ?string $dsChave = null,
        ?string $dsSituacao = null
    ) {
        $this->cdSituacao = $cdSituacao;
        $this->dsChave = $dsChave;
        $this->dsSituacao = $dsSituacao;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
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

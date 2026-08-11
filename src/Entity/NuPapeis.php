<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuPapeisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuPapeisRepository::class)]
#[ORM\Table(
    name: 'nu_papeis',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DS_PAPEL', columns: ['ds_papel'])]
class NuPapeis
{
    #[ORM\Id]
    #[ORM\Column(name: 'ds_papel', type: 'string', length: 50)]
    private ?string $dsPapel = null;

    #[ORM\Column(name: 'ds_observacao', type: 'string', length: 93, options: ['default' => ''])]
    private string $dsObservacao = '';

    public function __construct(
        ?string $dsPapel = null,
        string $dsObservacao = ''
    ) {
        $this->dsPapel = $dsPapel;
        $this->dsObservacao = $dsObservacao;
    }

    public function getDsPapel(): ?string
    {
        return $this->dsPapel;
    }

    public function setDsPapel(?string $dsPapel): self
    {
        $this->dsPapel = $dsPapel;
        return $this;
    }

    public function getDsObservacao(): string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }
}

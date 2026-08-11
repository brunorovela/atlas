<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TipoCertificadoraRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipoCertificadoraRepository::class)]
#[ORM\Table(
    name: 'tipo_certificadora',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class TipoCertificadora
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo_certificadora', type: 'integer')]
    private ?int $cdTipoCertificadora = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    public function __construct(
        ?string $dsChave = null,
        ?string $dsDescricao = null
    ) {
        $this->dsChave = $dsChave;
        $this->dsDescricao = $dsDescricao;
    }

    public function getCdTipoCertificadora(): ?int
    {
        return $this->cdTipoCertificadora;
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

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }
}

<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OrgaosEmissoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrgaosEmissoresRepository::class)]
#[ORM\Table(
    name: 'orgaos_emissores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_orgao_emissor', columns: ['cd_orgao_emissor'])]
class OrgaosEmissores
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_orgao_emissor', type: 'integer', options: ['default' => '0'])]
    private int $cdOrgaoEmissor = 0;

    #[ORM\Column(name: 'ds_orgao_emissor', type: 'string', length: 120, nullable: true)]
    private ?string $dsOrgaoEmissor = null;

    public function __construct(
        int $cdOrgaoEmissor = 0,
        ?string $dsOrgaoEmissor = null
    ) {
        $this->cdOrgaoEmissor = $cdOrgaoEmissor;
        $this->dsOrgaoEmissor = $dsOrgaoEmissor;
    }

    public function getCdOrgaoEmissor(): int
    {
        return $this->cdOrgaoEmissor;
    }

    public function setCdOrgaoEmissor(int $cdOrgaoEmissor): self
    {
        $this->cdOrgaoEmissor = $cdOrgaoEmissor;
        return $this;
    }

    public function getDsOrgaoEmissor(): ?string
    {
        return $this->dsOrgaoEmissor;
    }

    public function setDsOrgaoEmissor(?string $dsOrgaoEmissor): self
    {
        $this->dsOrgaoEmissor = $dsOrgaoEmissor;
        return $this;
    }
}

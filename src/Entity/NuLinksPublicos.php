<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuLinksPublicosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuLinksPublicosRepository::class)]
#[ORM\Table(
    name: 'nu_links_publicos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class NuLinksPublicos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_LINK_PUBLICO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdLinkPublico = null;

    #[ORM\Column(name: 'DS_TITULO', type: 'string', length: 255)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'DS_LINK', type: 'string', length: 255)]
    private ?string $dsLink = null;

    public function __construct(
        ?string $dsTitulo = null,
        ?string $dsLink = null
    ) {
        $this->dsTitulo = $dsTitulo;
        $this->dsLink = $dsLink;
    }

    public function getCdLinkPublico(): ?int
    {
        return $this->cdLinkPublico;
    }

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
    }

    public function getDsLink(): ?string
    {
        return $this->dsLink;
    }

    public function setDsLink(?string $dsLink): self
    {
        $this->dsLink = $dsLink;
        return $this;
    }
}

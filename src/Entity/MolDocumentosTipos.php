<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MolDocumentosTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MolDocumentosTiposRepository::class)]
#[ORM\Table(
    name: 'mol_documentos_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_tipo', columns: ['cd_documento_tipo'])]
class MolDocumentosTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_documento_tipo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDocumentoTipo = null;

    #[ORM\Column(name: 'ds_documento_tipo', type: 'string', length: 50, nullable: true)]
    private ?string $dsDocumentoTipo = null;

    public function __construct(
        ?string $dsDocumentoTipo = null
    ) {
        $this->dsDocumentoTipo = $dsDocumentoTipo;
    }

    public function getCdDocumentoTipo(): ?int
    {
        return $this->cdDocumentoTipo;
    }

    public function getDsDocumentoTipo(): ?string
    {
        return $this->dsDocumentoTipo;
    }

    public function setDsDocumentoTipo(?string $dsDocumentoTipo): self
    {
        $this->dsDocumentoTipo = $dsDocumentoTipo;
        return $this;
    }
}

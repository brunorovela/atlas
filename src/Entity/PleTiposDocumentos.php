<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PleTiposDocumentosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PleTiposDocumentosRepository::class)]
#[ORM\Table(
    name: 'ple_tipos_documentos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class PleTiposDocumentos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo_documento', type: 'integer')]
    private ?int $cdTipoDocumento = null;

    #[ORM\Column(name: 'ds_tipo_documento', type: 'string', length: 255, nullable: true)]
    private ?string $dsTipoDocumento = null;

    #[ORM\Column(name: 'sn_novo_plano', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snNovoPlano = false;

    public function __construct(
        ?string $dsTipoDocumento = null,
        ?bool $snNovoPlano = false
    ) {
        $this->dsTipoDocumento = $dsTipoDocumento;
        $this->snNovoPlano = $snNovoPlano;
    }

    public function getCdTipoDocumento(): ?int
    {
        return $this->cdTipoDocumento;
    }

    public function getDsTipoDocumento(): ?string
    {
        return $this->dsTipoDocumento;
    }

    public function setDsTipoDocumento(?string $dsTipoDocumento): self
    {
        $this->dsTipoDocumento = $dsTipoDocumento;
        return $this;
    }

    public function isSnNovoPlano(): ?bool
    {
        return $this->snNovoPlano;
    }

    public function setSnNovoPlano(?bool $snNovoPlano): self
    {
        $this->snNovoPlano = $snNovoPlano;
        return $this;
    }
}

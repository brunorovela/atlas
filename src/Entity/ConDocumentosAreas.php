<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConDocumentosAreasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConDocumentosAreasRepository::class)]
#[ORM\Table(
    name: 'con_documentos_areas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_area_documento', columns: ['cd_documento_area'])]
#[ORM\Index(name: 'IX_CD_DOCUMENTO', columns: ['cd_documento'])]
#[ORM\Index(name: 'IX_CD_AREA', columns: ['cd_area'])]
class ConDocumentosAreas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_documento_area', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDocumentoArea = null;

    #[ORM\Column(name: 'cd_documento', type: 'integer', nullable: true)]
    private ?int $cdDocumento = null;

    #[ORM\Column(name: 'cd_area', type: 'integer', nullable: true)]
    private ?int $cdArea = null;

    #[ORM\Column(name: 'sn_confirma_exibir', type: 'integer', options: ['default' => '0'])]
    private int $snConfirmaExibir = 0;

    public function __construct(
        ?int $cdDocumento = null,
        ?int $cdArea = null,
        int $snConfirmaExibir = 0
    ) {
        $this->cdDocumento = $cdDocumento;
        $this->cdArea = $cdArea;
        $this->snConfirmaExibir = $snConfirmaExibir;
    }

    public function getCdDocumentoArea(): ?int
    {
        return $this->cdDocumentoArea;
    }

    public function getCdDocumento(): ?int
    {
        return $this->cdDocumento;
    }

    public function setCdDocumento(?int $cdDocumento): self
    {
        $this->cdDocumento = $cdDocumento;
        return $this;
    }

    public function getCdArea(): ?int
    {
        return $this->cdArea;
    }

    public function setCdArea(?int $cdArea): self
    {
        $this->cdArea = $cdArea;
        return $this;
    }

    public function getSnConfirmaExibir(): int
    {
        return $this->snConfirmaExibir;
    }

    public function setSnConfirmaExibir(int $snConfirmaExibir): self
    {
        $this->snConfirmaExibir = $snConfirmaExibir;
        return $this;
    }
}

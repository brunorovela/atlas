<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConDocumentosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConDocumentosRepository::class)]
#[ORM\Table(
    name: 'con_documentos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CONCURSO', columns: ['cd_concurso'])]
class ConDocumentos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_documento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDocumento = null;

    #[ORM\Column(name: 'cd_concurso', type: 'integer', nullable: true)]
    private ?int $cdConcurso = null;

    #[ORM\Column(name: 'nm_documento', type: 'string', length: 200, nullable: true)]
    private ?string $nmDocumento = null;

    #[ORM\Column(name: 'me_documento', type: 'blob', length: 65535, nullable: true)]
    private ?string $meDocumento = null;

    public function __construct(
        ?int $cdConcurso = null,
        ?string $nmDocumento = null,
        ?string $meDocumento = null
    ) {
        $this->cdConcurso = $cdConcurso;
        $this->nmDocumento = $nmDocumento;
        $this->meDocumento = $meDocumento;
    }

    public function getCdDocumento(): ?int
    {
        return $this->cdDocumento;
    }

    public function getCdConcurso(): ?int
    {
        return $this->cdConcurso;
    }

    public function setCdConcurso(?int $cdConcurso): self
    {
        $this->cdConcurso = $cdConcurso;
        return $this;
    }

    public function getNmDocumento(): ?string
    {
        return $this->nmDocumento;
    }

    public function setNmDocumento(?string $nmDocumento): self
    {
        $this->nmDocumento = $nmDocumento;
        return $this;
    }

    public function getMeDocumento(): ?string
    {
        return $this->meDocumento;
    }

    public function setMeDocumento(?string $meDocumento): self
    {
        $this->meDocumento = $meDocumento;
        return $this;
    }
}

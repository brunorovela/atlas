<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DimpDocumentosArquivosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DimpDocumentosArquivosRepository::class)]
#[ORM\Table(
    name: 'dimp_documentos_arquivos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'IDX_UNIQUE', columns: ['cd_documento', 'ds_documento_hash'])]
#[ORM\Index(name: 'IX_CD_DOCUMENTO', columns: ['cd_documento'])]
class DimpDocumentosArquivos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_documento_arquivo', type: 'integer')]
    private ?int $cdDocumentoArquivo = null;

    #[ORM\Column(name: 'cd_documento', type: 'integer')]
    private ?int $cdDocumento = null;

    #[ORM\Column(name: 'me_documento', type: 'blob', length: 16777215)]
    private ?string $meDocumento = null;

    #[ORM\Column(name: 'ds_documento_hash', type: 'string', length: 32)]
    private ?string $dsDocumentoHash = null;

    #[ORM\Column(name: 'nr_paginas', type: 'integer', nullable: true)]
    private ?int $nrPaginas = null;

    public function __construct(
        ?int $cdDocumento = null,
        ?string $meDocumento = null,
        ?string $dsDocumentoHash = null,
        ?int $nrPaginas = null
    ) {
        $this->cdDocumento = $cdDocumento;
        $this->meDocumento = $meDocumento;
        $this->dsDocumentoHash = $dsDocumentoHash;
        $this->nrPaginas = $nrPaginas;
    }

    public function getCdDocumentoArquivo(): ?int
    {
        return $this->cdDocumentoArquivo;
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

    public function getMeDocumento(): ?string
    {
        return $this->meDocumento;
    }

    public function setMeDocumento(?string $meDocumento): self
    {
        $this->meDocumento = $meDocumento;
        return $this;
    }

    public function getDsDocumentoHash(): ?string
    {
        return $this->dsDocumentoHash;
    }

    public function setDsDocumentoHash(?string $dsDocumentoHash): self
    {
        $this->dsDocumentoHash = $dsDocumentoHash;
        return $this;
    }

    public function getNrPaginas(): ?int
    {
        return $this->nrPaginas;
    }

    public function setNrPaginas(?int $nrPaginas): self
    {
        $this->nrPaginas = $nrPaginas;
        return $this;
    }
}

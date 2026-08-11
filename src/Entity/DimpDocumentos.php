<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DimpDocumentosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DimpDocumentosRepository::class)]
#[ORM\Table(
    name: 'dimp_documentos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PROFESSOR', columns: ['cd_professor'])]
class DimpDocumentos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_documento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDocumento = null;

    #[ORM\Column(name: 'cd_professor', type: 'integer')]
    private ?int $cdProfessor = null;

    #[ORM\Column(name: 'ds_documento', type: 'string', length: 255)]
    private ?string $dsDocumento = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime')]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'sn_forcar_cabecalho', type: 'boolean', options: ['default' => '0'])]
    private bool $snForcarCabecalho = false;

    #[ORM\Column(name: 'cd_tipo', type: 'integer')]
    private ?int $cdTipo = null;

    public function __construct(
        ?int $cdProfessor = null,
        ?string $dsDocumento = null,
        ?\DateTimeInterface $dtInclusao = null,
        bool $snForcarCabecalho = false,
        ?int $cdTipo = null
    ) {
        $this->cdProfessor = $cdProfessor;
        $this->dsDocumento = $dsDocumento;
        $this->dtInclusao = $dtInclusao;
        $this->snForcarCabecalho = $snForcarCabecalho;
        $this->cdTipo = $cdTipo;
    }

    public function getCdDocumento(): ?int
    {
        return $this->cdDocumento;
    }

    public function getCdProfessor(): ?int
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(?int $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getDsDocumento(): ?string
    {
        return $this->dsDocumento;
    }

    public function setDsDocumento(?string $dsDocumento): self
    {
        $this->dsDocumento = $dsDocumento;
        return $this;
    }

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
        return $this;
    }

    public function isSnForcarCabecalho(): bool
    {
        return $this->snForcarCabecalho;
    }

    public function setSnForcarCabecalho(bool $snForcarCabecalho): self
    {
        $this->snForcarCabecalho = $snForcarCabecalho;
        return $this;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }
}

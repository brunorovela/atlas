<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\AvaPastasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvaPastasRepository::class)]
#[ORM\Table(
    name: 'ava_pastas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ava_pastas_uniques', columns: ['nm_pasta', 'cd_pasta_pai'])]
#[ORM\UniqueConstraint(name: 'UK_AVA_PASTAS_CD_PASTA_PAI_NM_ORIGINAL', columns: ['cd_pasta_pai', 'nm_original'])]
#[ORM\Index(name: 'IX_CD_PASTA_PAI', columns: ['cd_pasta_pai'])]
class AvaPastas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_pasta', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPasta = null;

    #[ORM\Column(name: 'nm_pasta', type: 'string', length: 255)]
    private ?string $nmPasta = null;

    #[ORM\Column(name: 'cd_pasta_pai', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPastaPai = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'sn_principal', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snPrincipal = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'nm_original', type: 'string', length: 255)]
    private ?string $nmOriginal = null;

    public function __construct(
        ?string $nmPasta = null,
        ?int $cdPastaPai = null,
        ?int $snAtivo = null,
        ?int $snPrincipal = null,
        ?int $nrOrdem = null,
        ?string $nmOriginal = null
    ) {
        $this->nmPasta = $nmPasta;
        $this->cdPastaPai = $cdPastaPai;
        $this->snAtivo = $snAtivo;
        $this->snPrincipal = $snPrincipal;
        $this->nrOrdem = $nrOrdem;
        $this->nmOriginal = $nmOriginal;
    }

    public function getCdPasta(): ?int
    {
        return $this->cdPasta;
    }

    public function getNmPasta(): ?string
    {
        return $this->nmPasta;
    }

    public function setNmPasta(?string $nmPasta): self
    {
        $this->nmPasta = $nmPasta;
        return $this;
    }

    public function getCdPastaPai(): ?int
    {
        return $this->cdPastaPai;
    }

    public function setCdPastaPai(?int $cdPastaPai): self
    {
        $this->cdPastaPai = $cdPastaPai;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getSnPrincipal(): ?int
    {
        return $this->snPrincipal;
    }

    public function setSnPrincipal(?int $snPrincipal): self
    {
        $this->snPrincipal = $snPrincipal;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getNmOriginal(): ?string
    {
        return $this->nmOriginal;
    }

    public function setNmOriginal(?string $nmOriginal): self
    {
        $this->nmOriginal = $nmOriginal;
        return $this;
    }
}

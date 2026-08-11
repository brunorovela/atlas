<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PintAnexosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintAnexosRepository::class)]
#[ORM\Table(
    name: 'pint_anexos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class PintAnexos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_anexo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAnexo = null;

    #[ORM\Column(name: 'cd_responsavel', type: 'integer', nullable: true)]
    private ?int $cdResponsavel = null;

    #[ORM\Column(name: 'nm_anexo', type: 'string', length: 250, nullable: true)]
    private ?string $nmAnexo = null;

    #[ORM\Column(name: 'mb_anexo', type: 'blob', nullable: true)]
    private ?string $mbAnexo = null;

    #[ORM\Column(name: 'nm_original', type: 'string', length: 250, nullable: true)]
    private ?string $nmOriginal = null;

    #[ORM\Column(name: 'ds_tamanho', type: 'string', length: 250, nullable: true)]
    private ?string $dsTamanho = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'sn_controle', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snControle = null;

    public function __construct(
        ?int $cdResponsavel = null,
        ?string $nmAnexo = null,
        ?string $mbAnexo = null,
        ?string $nmOriginal = null,
        ?string $dsTamanho = null,
        ?int $snAtivo = null,
        ?int $snControle = null
    ) {
        $this->cdResponsavel = $cdResponsavel;
        $this->nmAnexo = $nmAnexo;
        $this->mbAnexo = $mbAnexo;
        $this->nmOriginal = $nmOriginal;
        $this->dsTamanho = $dsTamanho;
        $this->snAtivo = $snAtivo;
        $this->snControle = $snControle;
    }

    public function getCdAnexo(): ?int
    {
        return $this->cdAnexo;
    }

    public function getCdResponsavel(): ?int
    {
        return $this->cdResponsavel;
    }

    public function setCdResponsavel(?int $cdResponsavel): self
    {
        $this->cdResponsavel = $cdResponsavel;
        return $this;
    }

    public function getNmAnexo(): ?string
    {
        return $this->nmAnexo;
    }

    public function setNmAnexo(?string $nmAnexo): self
    {
        $this->nmAnexo = $nmAnexo;
        return $this;
    }

    public function getMbAnexo(): ?string
    {
        return $this->mbAnexo;
    }

    public function setMbAnexo(?string $mbAnexo): self
    {
        $this->mbAnexo = $mbAnexo;
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

    public function getDsTamanho(): ?string
    {
        return $this->dsTamanho;
    }

    public function setDsTamanho(?string $dsTamanho): self
    {
        $this->dsTamanho = $dsTamanho;
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

    public function getSnControle(): ?int
    {
        return $this->snControle;
    }

    public function setSnControle(?int $snControle): self
    {
        $this->snControle = $snControle;
        return $this;
    }
}

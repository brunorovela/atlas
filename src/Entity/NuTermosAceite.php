<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\NuTermosAceiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuTermosAceiteRepository::class)]
#[ORM\Table(
    name: 'nu_termos_aceite',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class NuTermosAceite
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_termo', type: 'integer')]
    private ?int $cdTermo = null;

    #[ORM\Column(name: 'nm_termo', type: 'string', length: 255)]
    private ?string $nmTermo = null;

    #[ORM\Column(name: 'ds_conteudo', type: 'text', length: 16777215)]
    private ?string $dsConteudo = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME)]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'bb_arquivo', type: 'blob', length: 16777215, nullable: true)]
    private ?string $bbArquivo = null;

    public function __construct(
        ?string $nmTermo = null,
        ?string $dsConteudo = null,
        ?int $snAtivo = null,
        ?string $bbArquivo = null
    ) {
        $this->nmTermo = $nmTermo;
        $this->dsConteudo = $dsConteudo;
        $this->snAtivo = $snAtivo;
        $this->bbArquivo = $bbArquivo;
    }

    public function getCdTermo(): ?int
    {
        return $this->cdTermo;
    }

    public function getNmTermo(): ?string
    {
        return $this->nmTermo;
    }

    public function setNmTermo(?string $nmTermo): self
    {
        $this->nmTermo = $nmTermo;
        return $this;
    }

    public function getDsConteudo(): ?string
    {
        return $this->dsConteudo;
    }

    public function setDsConteudo(?string $dsConteudo): self
    {
        $this->dsConteudo = $dsConteudo;
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

    public function getBbArquivo(): ?string
    {
        return $this->bbArquivo;
    }

    public function setBbArquivo(?string $bbArquivo): self
    {
        $this->bbArquivo = $bbArquivo;
        return $this;
    }
}

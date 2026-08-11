<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuTextosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuTextosRepository::class)]
#[ORM\Table(
    name: 'nu_textos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_mensagem', columns: ['cd_texto'])]
#[ORM\UniqueConstraint(name: 'ds_chave', columns: ['ds_chave', 'cd_interno'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_INTERNO', columns: ['cd_interno'])]
class NuTextos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_texto', type: 'integer')]
    private ?int $cdTexto = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_texto', type: 'string', length: 255, nullable: true)]
    private ?string $dsTexto = null;

    #[ORM\Column(name: 'cd_interno', type: 'integer', nullable: true)]
    private ?int $cdInterno = null;

    #[ORM\Column(name: 'me_texto', type: 'text', nullable: true)]
    private ?string $meTexto = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', options: ['default' => '0'])]
    private bool $snAtivo = false;

    public function __construct(
        ?string $dsChave = null,
        ?string $dsTexto = null,
        ?int $cdInterno = null,
        ?string $meTexto = null,
        bool $snAtivo = false
    ) {
        $this->dsChave = $dsChave;
        $this->dsTexto = $dsTexto;
        $this->cdInterno = $cdInterno;
        $this->meTexto = $meTexto;
        $this->snAtivo = $snAtivo;
    }

    public function getCdTexto(): ?int
    {
        return $this->cdTexto;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsTexto(): ?string
    {
        return $this->dsTexto;
    }

    public function setDsTexto(?string $dsTexto): self
    {
        $this->dsTexto = $dsTexto;
        return $this;
    }

    public function getCdInterno(): ?int
    {
        return $this->cdInterno;
    }

    public function setCdInterno(?int $cdInterno): self
    {
        $this->cdInterno = $cdInterno;
        return $this;
    }

    public function getMeTexto(): ?string
    {
        return $this->meTexto;
    }

    public function setMeTexto(?string $meTexto): self
    {
        $this->meTexto = $meTexto;
        return $this;
    }

    public function isSnAtivo(): bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}

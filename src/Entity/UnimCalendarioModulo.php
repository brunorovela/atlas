<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnimCalendarioModuloRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimCalendarioModuloRepository::class)]
#[ORM\Table(
    name: 'unim_calendario_modulo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class UnimCalendarioModulo
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_modulo', type: 'integer')]
    private ?int $cdModulo = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'ds_papel', type: 'string', length: 255, nullable: true)]
    private ?string $dsPapel = null;

    #[ORM\Column(name: 'me_sql', type: 'text', length: 65535, nullable: true)]
    private ?string $meSql = null;

    public function __construct(
        ?int $cdModulo = null,
        ?string $dsDescricao = null,
        ?string $dsPapel = null,
        ?string $meSql = null
    ) {
        $this->cdModulo = $cdModulo;
        $this->dsDescricao = $dsDescricao;
        $this->dsPapel = $dsPapel;
        $this->meSql = $meSql;
    }

    public function getCdModulo(): ?int
    {
        return $this->cdModulo;
    }

    public function setCdModulo(?int $cdModulo): self
    {
        $this->cdModulo = $cdModulo;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }

    public function getDsPapel(): ?string
    {
        return $this->dsPapel;
    }

    public function setDsPapel(?string $dsPapel): self
    {
        $this->dsPapel = $dsPapel;
        return $this;
    }

    public function getMeSql(): ?string
    {
        return $this->meSql;
    }

    public function setMeSql(?string $meSql): self
    {
        $this->meSql = $meSql;
        return $this;
    }
}

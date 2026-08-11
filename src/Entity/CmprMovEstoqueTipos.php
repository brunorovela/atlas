<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CmprMovEstoqueTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprMovEstoqueTiposRepository::class)]
#[ORM\Table(
    name: 'cmpr_mov_estoque_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'IX_CMPR_MOV_ESTOQUE_TIPOS_DS_CHAVE', columns: ['ds_chave'])]
class CmprMovEstoqueTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'sn_entrada', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snEntrada = true;

    public function __construct(
        ?string $dsTitulo = null,
        ?string $dsChave = null,
        ?bool $snEntrada = true
    ) {
        $this->dsTitulo = $dsTitulo;
        $this->dsChave = $dsChave;
        $this->snEntrada = $snEntrada;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
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

    public function isSnEntrada(): ?bool
    {
        return $this->snEntrada;
    }

    public function setSnEntrada(?bool $snEntrada): self
    {
        $this->snEntrada = $snEntrada;
        return $this;
    }
}

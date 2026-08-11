<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ConConfiguracaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConConfiguracaoRepository::class)]
#[ORM\Table(
    name: 'con_configuracao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class ConConfiguracao
{
    #[ORM\Id]
    #[ORM\Column(name: 'nm_campo', type: 'string', length: 100)]
    private ?string $nmCampo = null;

    #[ORM\Column(name: 'ds_campo', type: 'string', length: 50)]
    private ?string $dsCampo = null;

    #[ORM\Column(name: 'sn_verifica', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snVerifica = 0;

    #[ORM\Column(name: 'sn_valida', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snValida = 0;

    public function __construct(
        ?string $nmCampo = null,
        ?string $dsCampo = null,
        int $snVerifica = 0,
        int $snValida = 0
    ) {
        $this->nmCampo = $nmCampo;
        $this->dsCampo = $dsCampo;
        $this->snVerifica = $snVerifica;
        $this->snValida = $snValida;
    }

    public function getNmCampo(): ?string
    {
        return $this->nmCampo;
    }

    public function setNmCampo(?string $nmCampo): self
    {
        $this->nmCampo = $nmCampo;
        return $this;
    }

    public function getDsCampo(): ?string
    {
        return $this->dsCampo;
    }

    public function setDsCampo(?string $dsCampo): self
    {
        $this->dsCampo = $dsCampo;
        return $this;
    }

    public function getSnVerifica(): int
    {
        return $this->snVerifica;
    }

    public function setSnVerifica(int $snVerifica): self
    {
        $this->snVerifica = $snVerifica;
        return $this;
    }

    public function getSnValida(): int
    {
        return $this->snValida;
    }

    public function setSnValida(int $snValida): self
    {
        $this->snValida = $snValida;
        return $this;
    }
}

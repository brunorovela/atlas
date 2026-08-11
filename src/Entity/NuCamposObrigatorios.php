<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuCamposObrigatoriosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuCamposObrigatoriosRepository::class)]
#[ORM\Table(
    name: 'nu_campos_obrigatorios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_MODULO', columns: ['cd_modulo'])]
class NuCamposObrigatorios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_campo_obrigatorio', type: 'integer')]
    private ?int $cdCampoObrigatorio = null;

    #[ORM\Column(name: 'cd_modulo', type: 'integer')]
    private ?int $cdModulo = null;

    #[ORM\Column(name: 'ds_campo', type: 'string', length: 255)]
    private ?string $dsCampo = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_aviso', type: 'string', length: 255, nullable: true)]
    private ?string $dsAviso = null;

    public function __construct(
        ?int $cdModulo = null,
        ?string $dsCampo = null,
        ?string $dsChave = null,
        ?string $dsAviso = null
    ) {
        $this->cdModulo = $cdModulo;
        $this->dsCampo = $dsCampo;
        $this->dsChave = $dsChave;
        $this->dsAviso = $dsAviso;
    }

    public function getCdCampoObrigatorio(): ?int
    {
        return $this->cdCampoObrigatorio;
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

    public function getDsCampo(): ?string
    {
        return $this->dsCampo;
    }

    public function setDsCampo(?string $dsCampo): self
    {
        $this->dsCampo = $dsCampo;
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

    public function getDsAviso(): ?string
    {
        return $this->dsAviso;
    }

    public function setDsAviso(?string $dsAviso): self
    {
        $this->dsAviso = $dsAviso;
        return $this;
    }
}

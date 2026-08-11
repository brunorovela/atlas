<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuCadastrosCamposTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuCadastrosCamposTiposRepository::class)]
#[ORM\Table(
    name: 'nu_cadastros_campos_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'])]
#[ORM\Index(name: 'IX_CD_VALIDACAO', columns: ['cd_validacao'])]
class NuCadastrosCamposTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo', type: 'integer')]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 20, options: ['default' => ''])]
    private string $dsChave = '';

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 50)]
    private ?string $dsTipo = null;

    #[ORM\Column(name: 'cd_validacao', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdValidacao = 0;

    public function __construct(
        string $dsChave = '',
        ?string $dsTipo = null,
        ?int $cdValidacao = 0
    ) {
        $this->dsChave = $dsChave;
        $this->dsTipo = $dsTipo;
        $this->cdValidacao = $cdValidacao;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function getDsChave(): string
    {
        return $this->dsChave;
    }

    public function setDsChave(string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsTipo(): ?string
    {
        return $this->dsTipo;
    }

    public function setDsTipo(?string $dsTipo): self
    {
        $this->dsTipo = $dsTipo;
        return $this;
    }

    public function getCdValidacao(): ?int
    {
        return $this->cdValidacao;
    }

    public function setCdValidacao(?int $cdValidacao): self
    {
        $this->cdValidacao = $cdValidacao;
        return $this;
    }
}

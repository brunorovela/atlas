<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\CmprUnidadeMedidaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprUnidadeMedidaRepository::class)]
#[ORM\Table(
    name: 'cmpr_unidade_medida',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class CmprUnidadeMedida
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_unidade', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdUnidade = null;

    #[ORM\Column(name: 'ds_unidade', type: 'string', length: 255, nullable: true)]
    private ?string $dsUnidade = null;

    #[ORM\Column(name: 'ds_sigla', type: 'string', length: 50, nullable: true)]
    private ?string $dsSigla = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snAtivo = 1;

    public function __construct(
        ?string $dsUnidade = null,
        ?string $dsSigla = null,
        ?int $snAtivo = 1
    ) {
        $this->dsUnidade = $dsUnidade;
        $this->dsSigla = $dsSigla;
        $this->snAtivo = $snAtivo;
    }

    public function getCdUnidade(): ?int
    {
        return $this->cdUnidade;
    }

    public function getDsUnidade(): ?string
    {
        return $this->dsUnidade;
    }

    public function setDsUnidade(?string $dsUnidade): self
    {
        $this->dsUnidade = $dsUnidade;
        return $this;
    }

    public function getDsSigla(): ?string
    {
        return $this->dsSigla;
    }

    public function setDsSigla(?string $dsSigla): self
    {
        $this->dsSigla = $dsSigla;
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
}

<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\SigaTipoTabelaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SigaTipoTabelaRepository::class)]
#[ORM\Table(
    name: 'siga_tipo_tabela',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class SigaTipoTabela
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTipo = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, nullable: true)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $dsTipo = null,
        ?string $dsChave = null
    ) {
        $this->dsTipo = $dsTipo;
        $this->dsChave = $dsChave;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
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

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }
}

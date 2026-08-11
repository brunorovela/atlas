<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\DiarioProvasTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioProvasTiposRepository::class)]
#[ORM\Table(
    name: 'diario_provas_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
class DiarioProvasTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_tipo', type: 'integer')]
    private ?int $cdProvaTipo = null;

    #[ORM\Column(name: 'ds_prova_tipo', type: 'string', length: 100)]
    private ?string $dsProvaTipo = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'sn_escolha_online', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snEscolhaOnline = 0;

    public function __construct(
        ?string $dsProvaTipo = null,
        ?string $dsChave = null,
        int $snEscolhaOnline = 0
    ) {
        $this->dsProvaTipo = $dsProvaTipo;
        $this->dsChave = $dsChave;
        $this->snEscolhaOnline = $snEscolhaOnline;
    }

    public function getCdProvaTipo(): ?int
    {
        return $this->cdProvaTipo;
    }

    public function getDsProvaTipo(): ?string
    {
        return $this->dsProvaTipo;
    }

    public function setDsProvaTipo(?string $dsProvaTipo): self
    {
        $this->dsProvaTipo = $dsProvaTipo;
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

    public function getSnEscolhaOnline(): int
    {
        return $this->snEscolhaOnline;
    }

    public function setSnEscolhaOnline(int $snEscolhaOnline): self
    {
        $this->snEscolhaOnline = $snEscolhaOnline;
        return $this;
    }
}

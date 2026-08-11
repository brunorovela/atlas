<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinAcoesAutomaticasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinAcoesAutomaticasRepository::class)]
#[ORM\Table(
    name: 'fin_acoes_automaticas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_acao_auto', columns: ['cd_acao_auto'])]
class FinAcoesAutomaticas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_acao_auto', type: 'integer', options: ['default' => '0'])]
    private int $cdAcaoAuto = 0;

    #[ORM\Column(name: 'ds_acao', type: 'string', length: 200, nullable: true)]
    private ?string $dsAcao = null;

    public function __construct(
        int $cdAcaoAuto = 0,
        ?string $dsAcao = null
    ) {
        $this->cdAcaoAuto = $cdAcaoAuto;
        $this->dsAcao = $dsAcao;
    }

    public function getCdAcaoAuto(): int
    {
        return $this->cdAcaoAuto;
    }

    public function setCdAcaoAuto(int $cdAcaoAuto): self
    {
        $this->cdAcaoAuto = $cdAcaoAuto;
        return $this;
    }

    public function getDsAcao(): ?string
    {
        return $this->dsAcao;
    }

    public function setDsAcao(?string $dsAcao): self
    {
        $this->dsAcao = $dsAcao;
        return $this;
    }
}

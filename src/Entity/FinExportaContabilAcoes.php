<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinExportaContabilAcoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinExportaContabilAcoesRepository::class)]
#[ORM\Table(
    name: 'fin_exporta_contabil_acoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ds_acao', columns: ['ds_acao'])]
class FinExportaContabilAcoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_acao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAcao = null;

    #[ORM\Column(name: 'ds_acao', type: 'string', length: 50, nullable: true)]
    private ?string $dsAcao = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snAtivo = 0;

    #[ORM\Column(name: 'cd_origem', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdOrigem = null;

    public function __construct(
        ?string $dsAcao = null,
        ?int $snAtivo = 0,
        ?int $cdOrigem = null
    ) {
        $this->dsAcao = $dsAcao;
        $this->snAtivo = $snAtivo;
        $this->cdOrigem = $cdOrigem;
    }

    public function getCdAcao(): ?int
    {
        return $this->cdAcao;
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

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getCdOrigem(): ?int
    {
        return $this->cdOrigem;
    }

    public function setCdOrigem(?int $cdOrigem): self
    {
        $this->cdOrigem = $cdOrigem;
        return $this;
    }
}

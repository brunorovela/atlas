<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncGruposAcoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncGruposAcoesRepository::class)]
#[ORM\Table(
    name: 'estnc_grupos_acoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_estnc_ga_desc', columns: ['DS_CHAVE'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['DS_CHAVE'], options: ['lengths' => [20]])]
class EstncGruposAcoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_GRUPO_ACAO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrupoAcao = null;

    #[ORM\Column(name: 'NM_ACAO', type: 'string', length: 255, nullable: true)]
    private ?string $nmAcao = null;

    #[ORM\Column(name: 'DS_CHAVE', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $nmAcao = null,
        ?string $dsChave = null
    ) {
        $this->nmAcao = $nmAcao;
        $this->dsChave = $dsChave;
    }

    public function getCdGrupoAcao(): ?int
    {
        return $this->cdGrupoAcao;
    }

    public function getNmAcao(): ?string
    {
        return $this->nmAcao;
    }

    public function setNmAcao(?string $nmAcao): self
    {
        $this->nmAcao = $nmAcao;
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

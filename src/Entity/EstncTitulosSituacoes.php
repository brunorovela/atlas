<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncTitulosSituacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncTitulosSituacoesRepository::class)]
#[ORM\Table(
    name: 'estnc_titulos_situacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TITULOS_SITUACOES_CHAVE', columns: ['ds_chave'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
class EstncTitulosSituacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_situacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'nm_situacao', type: 'string', length: 100)]
    private ?string $nmSituacao = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $nmSituacao = null,
        ?string $dsChave = null
    ) {
        $this->nmSituacao = $nmSituacao;
        $this->dsChave = $dsChave;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function getNmSituacao(): ?string
    {
        return $this->nmSituacao;
    }

    public function setNmSituacao(?string $nmSituacao): self
    {
        $this->nmSituacao = $nmSituacao;
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

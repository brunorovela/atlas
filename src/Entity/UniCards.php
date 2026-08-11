<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UniCardsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniCardsRepository::class)]
#[ORM\Table(
    name: 'uni_cards',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave_tipo'])]
class UniCards
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_layout', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdLayout = null;

    #[ORM\Column(name: 'nm_layout', type: 'string', length: 255)]
    private ?string $nmLayout = null;

    #[ORM\Column(name: 'ds_mapeamento_projecao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsMapeamentoProjecao = null;

    #[ORM\Column(name: 'ds_mapeamento_condicoes', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsMapeamentoCondicoes = null;

    #[ORM\Column(name: 'ds_chave_tipo', type: 'enum', nullable: true, options: ['values' => ['GRAFICO', 'CARD']])]
    private ?string $dsChaveTipo = null;

    public function __construct(
        ?string $nmLayout = null,
        ?string $dsMapeamentoProjecao = null,
        ?string $dsMapeamentoCondicoes = null,
        ?string $dsChaveTipo = null
    ) {
        $this->nmLayout = $nmLayout;
        $this->dsMapeamentoProjecao = $dsMapeamentoProjecao;
        $this->dsMapeamentoCondicoes = $dsMapeamentoCondicoes;
        $this->dsChaveTipo = $dsChaveTipo;
    }

    public function getCdLayout(): ?int
    {
        return $this->cdLayout;
    }

    public function getNmLayout(): ?string
    {
        return $this->nmLayout;
    }

    public function setNmLayout(?string $nmLayout): self
    {
        $this->nmLayout = $nmLayout;
        return $this;
    }

    public function getDsMapeamentoProjecao(): ?string
    {
        return $this->dsMapeamentoProjecao;
    }

    public function setDsMapeamentoProjecao(?string $dsMapeamentoProjecao): self
    {
        $this->dsMapeamentoProjecao = $dsMapeamentoProjecao;
        return $this;
    }

    public function getDsMapeamentoCondicoes(): ?string
    {
        return $this->dsMapeamentoCondicoes;
    }

    public function setDsMapeamentoCondicoes(?string $dsMapeamentoCondicoes): self
    {
        $this->dsMapeamentoCondicoes = $dsMapeamentoCondicoes;
        return $this;
    }

    public function getDsChaveTipo(): ?string
    {
        return $this->dsChaveTipo;
    }

    public function setDsChaveTipo(?string $dsChaveTipo): self
    {
        $this->dsChaveTipo = $dsChaveTipo;
        return $this;
    }
}

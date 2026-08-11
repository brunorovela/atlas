<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BibClassificacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibClassificacoesRepository::class)]
#[ORM\Table(
    name: 'bib_classificacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ds_valor', columns: ['ds_valor'])]
#[ORM\UniqueConstraint(name: 'ChaveUnica', columns: ['ds_valor'])]
#[ORM\Index(name: 'IX_DS_VALOR', columns: ['ds_valor'], options: ['lengths' => [20]])]
class BibClassificacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_classificacao', type: 'integer')]
    private ?int $cdClassificacao = null;

    #[ORM\Column(name: 'ds_valor', type: 'string', length: 50, nullable: true)]
    private ?string $dsValor = null;

    #[ORM\Column(name: 'ds_classificacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsClassificacao = null;

    public function __construct(
        ?string $dsValor = null,
        ?string $dsClassificacao = null
    ) {
        $this->dsValor = $dsValor;
        $this->dsClassificacao = $dsClassificacao;
    }

    public function getCdClassificacao(): ?int
    {
        return $this->cdClassificacao;
    }

    public function getDsValor(): ?string
    {
        return $this->dsValor;
    }

    public function setDsValor(?string $dsValor): self
    {
        $this->dsValor = $dsValor;
        return $this;
    }

    public function getDsClassificacao(): ?string
    {
        return $this->dsClassificacao;
    }

    public function setDsClassificacao(?string $dsClassificacao): self
    {
        $this->dsClassificacao = $dsClassificacao;
        return $this;
    }
}

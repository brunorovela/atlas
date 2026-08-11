<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuTabelasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuTabelasRepository::class)]
#[ORM\Table(
    name: 'nu_tabelas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class NuTabelas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tabela', type: 'integer')]
    private ?int $cdTabela = null;

    #[ORM\Column(name: 'ds_nome_tabela', type: 'string', length: 50)]
    private ?string $dsNomeTabela = null;

    #[ORM\Column(name: 'ds_nome_traduzido', type: 'string', length: 250, nullable: true)]
    private ?string $dsNomeTraduzido = null;

    #[ORM\Column(name: 'ds_observacao', type: 'string', length: 500, nullable: true)]
    private ?string $dsObservacao = null;

    public function __construct(
        ?string $dsNomeTabela = null,
        ?string $dsNomeTraduzido = null,
        ?string $dsObservacao = null
    ) {
        $this->dsNomeTabela = $dsNomeTabela;
        $this->dsNomeTraduzido = $dsNomeTraduzido;
        $this->dsObservacao = $dsObservacao;
    }

    public function getCdTabela(): ?int
    {
        return $this->cdTabela;
    }

    public function getDsNomeTabela(): ?string
    {
        return $this->dsNomeTabela;
    }

    public function setDsNomeTabela(?string $dsNomeTabela): self
    {
        $this->dsNomeTabela = $dsNomeTabela;
        return $this;
    }

    public function getDsNomeTraduzido(): ?string
    {
        return $this->dsNomeTraduzido;
    }

    public function setDsNomeTraduzido(?string $dsNomeTraduzido): self
    {
        $this->dsNomeTraduzido = $dsNomeTraduzido;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }
}

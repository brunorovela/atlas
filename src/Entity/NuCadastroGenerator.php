<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuCadastroGeneratorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuCadastroGeneratorRepository::class)]
#[ORM\Table(
    name: 'nu_cadastro_generator',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ds_tabela', columns: ['ds_tabela', 'ds_campo'])]
#[ORM\Index(name: 'IX_DS_TABELA', columns: ['ds_tabela'])]
#[ORM\Index(name: 'IX_DS_CAMPO', columns: ['ds_campo'])]
class NuCadastroGenerator
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cadastro_generator', type: 'integer')]
    private ?int $cdCadastroGenerator = null;

    #[ORM\Column(name: 'ds_tabela', type: 'string', length: 40)]
    private ?string $dsTabela = null;

    #[ORM\Column(name: 'nr_valor', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrValor = null;

    #[ORM\Column(name: 'ds_campo', type: 'string', length: 50, nullable: true)]
    private ?string $dsCampo = null;

    public function __construct(
        ?string $dsTabela = null,
        ?int $nrValor = null,
        ?string $dsCampo = null
    ) {
        $this->dsTabela = $dsTabela;
        $this->nrValor = $nrValor;
        $this->dsCampo = $dsCampo;
    }

    public function getCdCadastroGenerator(): ?int
    {
        return $this->cdCadastroGenerator;
    }

    public function getDsTabela(): ?string
    {
        return $this->dsTabela;
    }

    public function setDsTabela(?string $dsTabela): self
    {
        $this->dsTabela = $dsTabela;
        return $this;
    }

    public function getNrValor(): ?int
    {
        return $this->nrValor;
    }

    public function setNrValor(?int $nrValor): self
    {
        $this->nrValor = $nrValor;
        return $this;
    }

    public function getDsCampo(): ?string
    {
        return $this->dsCampo;
    }

    public function setDsCampo(?string $dsCampo): self
    {
        $this->dsCampo = $dsCampo;
        return $this;
    }
}

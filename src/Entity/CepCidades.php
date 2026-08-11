<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CepCidadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CepCidadesRepository::class)]
#[ORM\Table(
    name: 'cep_cidades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CIDADE', columns: ['cd_cidade'])]
#[ORM\Index(name: 'IX_DS_UF', columns: ['ds_uf'])]
#[ORM\Index(name: 'IX_NM_CIDADE', columns: ['nm_cidade'])]
class CepCidades
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_cidade', type: 'integer', options: ['default' => '0'])]
    private int $cdCidade = 0;

    #[ORM\Column(name: 'nm_cidade', type: 'string', length: 100, options: ['fixed' => true, 'default' => ''])]
    private string $nmCidade = '';

    #[ORM\Column(name: 'ds_uf', type: 'string', length: 3, options: ['fixed' => true, 'default' => ''])]
    private string $dsUf = '';

    public function __construct(
        int $cdCidade = 0,
        string $nmCidade = '',
        string $dsUf = ''
    ) {
        $this->cdCidade = $cdCidade;
        $this->nmCidade = $nmCidade;
        $this->dsUf = $dsUf;
    }

    public function getCdCidade(): int
    {
        return $this->cdCidade;
    }

    public function setCdCidade(int $cdCidade): self
    {
        $this->cdCidade = $cdCidade;
        return $this;
    }

    public function getNmCidade(): string
    {
        return $this->nmCidade;
    }

    public function setNmCidade(string $nmCidade): self
    {
        $this->nmCidade = $nmCidade;
        return $this;
    }

    public function getDsUf(): string
    {
        return $this->dsUf;
    }

    public function setDsUf(string $dsUf): self
    {
        $this->dsUf = $dsUf;
        return $this;
    }
}

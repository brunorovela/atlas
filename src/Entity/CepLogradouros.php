<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CepLogradourosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CepLogradourosRepository::class)]
#[ORM\Table(
    name: 'cep_logradouros',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_LOGRADOURO', columns: ['cd_logradouro'])]
#[ORM\Index(name: 'IX_CD_CIDADE', columns: ['cd_cidade'])]
#[ORM\Index(name: 'IX_DS_UF', columns: ['ds_uf'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_CD_BAIRRO1', columns: ['cd_bairro1'])]
#[ORM\Index(name: 'IX_CD_BAIRRO2', columns: ['cd_bairro2'])]
#[ORM\Index(name: 'IX_DS_CEP', columns: ['ds_cep'])]
class CepLogradouros
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cep_logradouros_id', type: 'integer', options: ['unsigned' => true])]
    private ?int $cepLogradourosId = null;

    #[ORM\Column(name: 'cd_logradouro', type: 'integer', options: ['default' => '0'])]
    private int $cdLogradouro = 0;

    #[ORM\Column(name: 'nm_logradouro', type: 'string', length: 100, options: ['fixed' => true, 'default' => ''])]
    private string $nmLogradouro = '';

    #[ORM\Column(name: 'cd_cidade', type: 'integer', options: ['default' => '0'])]
    private int $cdCidade = 0;

    #[ORM\Column(name: 'cd_bairro1', type: 'integer', options: ['default' => '0'])]
    private int $cdBairro1 = 0;

    #[ORM\Column(name: 'cd_bairro2', type: 'integer', options: ['default' => '0'])]
    private int $cdBairro2 = 0;

    #[ORM\Column(name: 'ds_cep', type: 'string', length: 8, options: ['fixed' => true, 'default' => ''])]
    private string $dsCep = '';

    #[ORM\Column(name: 'ds_uf', type: 'string', length: 3, options: ['fixed' => true, 'default' => ''])]
    private string $dsUf = '';

    #[ORM\Column(name: 'cd_tipo', type: 'integer', nullable: true)]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'ds_complemento', type: 'string', length: 100, nullable: true, options: ['fixed' => true])]
    private ?string $dsComplemento = null;

    public function __construct(
        int $cdLogradouro = 0,
        string $nmLogradouro = '',
        int $cdCidade = 0,
        int $cdBairro1 = 0,
        int $cdBairro2 = 0,
        string $dsCep = '',
        string $dsUf = '',
        ?int $cdTipo = null,
        ?string $dsComplemento = null
    ) {
        $this->cdLogradouro = $cdLogradouro;
        $this->nmLogradouro = $nmLogradouro;
        $this->cdCidade = $cdCidade;
        $this->cdBairro1 = $cdBairro1;
        $this->cdBairro2 = $cdBairro2;
        $this->dsCep = $dsCep;
        $this->dsUf = $dsUf;
        $this->cdTipo = $cdTipo;
        $this->dsComplemento = $dsComplemento;
    }

    public function getCepLogradourosId(): ?int
    {
        return $this->cepLogradourosId;
    }

    public function getCdLogradouro(): int
    {
        return $this->cdLogradouro;
    }

    public function setCdLogradouro(int $cdLogradouro): self
    {
        $this->cdLogradouro = $cdLogradouro;
        return $this;
    }

    public function getNmLogradouro(): string
    {
        return $this->nmLogradouro;
    }

    public function setNmLogradouro(string $nmLogradouro): self
    {
        $this->nmLogradouro = $nmLogradouro;
        return $this;
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

    public function getCdBairro1(): int
    {
        return $this->cdBairro1;
    }

    public function setCdBairro1(int $cdBairro1): self
    {
        $this->cdBairro1 = $cdBairro1;
        return $this;
    }

    public function getCdBairro2(): int
    {
        return $this->cdBairro2;
    }

    public function setCdBairro2(int $cdBairro2): self
    {
        $this->cdBairro2 = $cdBairro2;
        return $this;
    }

    public function getDsCep(): string
    {
        return $this->dsCep;
    }

    public function setDsCep(string $dsCep): self
    {
        $this->dsCep = $dsCep;
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

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getDsComplemento(): ?string
    {
        return $this->dsComplemento;
    }

    public function setDsComplemento(?string $dsComplemento): self
    {
        $this->dsComplemento = $dsComplemento;
        return $this;
    }
}

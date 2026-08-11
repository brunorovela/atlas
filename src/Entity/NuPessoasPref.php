<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuPessoasPrefRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuPessoasPrefRepository::class)]
#[ORM\Table(
    name: 'nu_pessoas_pref',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxUnico', columns: ['cd_pessoa', 'ds_chave', 'cd_modulo'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_MODULO', columns: ['cd_modulo'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
class NuPessoasPref
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_preferencias', type: 'bigint')]
    private ?string $cdPreferencias = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_modulo', type: 'integer', nullable: true)]
    private ?int $cdModulo = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_valor', type: 'text', length: 65535, nullable: true)]
    private ?string $dsValor = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdModulo = null,
        ?string $dsChave = null,
        ?string $dsValor = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdModulo = $cdModulo;
        $this->dsChave = $dsChave;
        $this->dsValor = $dsValor;
    }

    public function getCdPreferencias(): ?string
    {
        return $this->cdPreferencias;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdModulo(): ?int
    {
        return $this->cdModulo;
    }

    public function setCdModulo(?int $cdModulo): self
    {
        $this->cdModulo = $cdModulo;
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

    public function getDsValor(): ?string
    {
        return $this->dsValor;
    }

    public function setDsValor(?string $dsValor): self
    {
        $this->dsValor = $dsValor;
        return $this;
    }
}

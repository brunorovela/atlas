<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MolProcessosPessoasConfRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MolProcessosPessoasConfRepository::class)]
#[ORM\Table(
    name: 'mol_processos_pessoas_conf',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_periodo_pessoa', columns: ['cd_processo_pessoa', 'cd_etapa', 'nm_campo'])]
#[ORM\Index(name: 'IX_CD_PROCESSO_PESSOA', columns: ['cd_processo_pessoa'])]
#[ORM\Index(name: 'IX_CD_ETAPA', columns: ['cd_etapa'])]
class MolProcessosPessoasConf
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_processo_pessoa_conf', type: 'integer')]
    private ?int $cdProcessoPessoaConf = null;

    #[ORM\Column(name: 'cd_processo_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdProcessoPessoa = 0;

    #[ORM\Column(name: 'cd_etapa', type: 'integer', options: ['default' => '0'])]
    private int $cdEtapa = 0;

    #[ORM\Column(name: 'nm_campo', type: 'string', length: 50, options: ['default' => ''])]
    private string $nmCampo = '';

    #[ORM\Column(name: 'me_valor', type: 'blob', length: 65535, nullable: true)]
    private ?string $meValor = null;

    public function __construct(
        int $cdProcessoPessoa = 0,
        int $cdEtapa = 0,
        string $nmCampo = '',
        ?string $meValor = null
    ) {
        $this->cdProcessoPessoa = $cdProcessoPessoa;
        $this->cdEtapa = $cdEtapa;
        $this->nmCampo = $nmCampo;
        $this->meValor = $meValor;
    }

    public function getCdProcessoPessoaConf(): ?int
    {
        return $this->cdProcessoPessoaConf;
    }

    public function getCdProcessoPessoa(): int
    {
        return $this->cdProcessoPessoa;
    }

    public function setCdProcessoPessoa(int $cdProcessoPessoa): self
    {
        $this->cdProcessoPessoa = $cdProcessoPessoa;
        return $this;
    }

    public function getCdEtapa(): int
    {
        return $this->cdEtapa;
    }

    public function setCdEtapa(int $cdEtapa): self
    {
        $this->cdEtapa = $cdEtapa;
        return $this;
    }

    public function getNmCampo(): string
    {
        return $this->nmCampo;
    }

    public function setNmCampo(string $nmCampo): self
    {
        $this->nmCampo = $nmCampo;
        return $this;
    }

    public function getMeValor(): ?string
    {
        return $this->meValor;
    }

    public function setMeValor(?string $meValor): self
    {
        $this->meValor = $meValor;
        return $this;
    }
}

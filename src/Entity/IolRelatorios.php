<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IolRelatoriosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IolRelatoriosRepository::class)]
#[ORM\Table(
    name: 'iol_relatorios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_relatorio', columns: ['cd_relatorio'])]
#[ORM\UniqueConstraint(name: 'IOL_RELATORIOS_CHAVE', columns: ['ds_chave'])]
#[ORM\Index(name: 'IX_CD_MODULO', columns: ['cd_modulo'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
class IolRelatorios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_relatorio', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRelatorio = null;

    #[ORM\Column(name: 'cd_modulo', type: 'integer', nullable: true)]
    private ?int $cdModulo = null;

    #[ORM\Column(name: 'nm_relatorio', type: 'string', length: 255)]
    private ?string $nmRelatorio = null;

    #[ORM\Column(name: 'me_pagina', type: 'text', length: 16777215, nullable: true)]
    private ?string $mePagina = null;

    #[ORM\Column(name: 'sn_disponivel', type: 'string', length: 1, options: ['fixed' => true])]
    private ?string $snDisponivel = null;

    #[ORM\Column(name: 'ds_link', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsLink = null;

    #[ORM\Column(name: 'me_tpl', type: 'text', length: 16777215, nullable: true)]
    private ?string $meTpl = null;

    #[ORM\Column(name: 'ds_parametros', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsParametros = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'me_css_cabecalho', type: 'text', length: 16777215, nullable: true)]
    private ?string $meCssCabecalho = null;

    #[ORM\Column(name: 'ME_PAGINA_FILTRO', type: 'text', length: 16777215, nullable: true)]
    private ?string $mePaginaFiltro = null;

    #[ORM\Column(name: 'ME_TPL_FILTRO', type: 'text', length: 16777215, nullable: true)]
    private ?string $meTplFiltro = null;

    #[ORM\Column(name: 'SN_AUTENTICAR', type: 'boolean', options: ['default' => '0'])]
    private bool $snAutenticar = false;

    #[ORM\Column(name: 'ds_hash_validacao_conteudo', type: 'string', length: 255, nullable: true)]
    private ?string $dsHashValidacaoConteudo = null;

    public function __construct(
        ?int $cdModulo = null,
        ?string $nmRelatorio = null,
        ?string $mePagina = null,
        ?string $snDisponivel = null,
        ?string $dsLink = null,
        ?string $meTpl = null,
        ?string $dsParametros = null,
        ?string $dsChave = null,
        ?string $meCssCabecalho = null,
        ?string $mePaginaFiltro = null,
        ?string $meTplFiltro = null,
        bool $snAutenticar = false,
        ?string $dsHashValidacaoConteudo = null
    ) {
        $this->cdModulo = $cdModulo;
        $this->nmRelatorio = $nmRelatorio;
        $this->mePagina = $mePagina;
        $this->snDisponivel = $snDisponivel;
        $this->dsLink = $dsLink;
        $this->meTpl = $meTpl;
        $this->dsParametros = $dsParametros;
        $this->dsChave = $dsChave;
        $this->meCssCabecalho = $meCssCabecalho;
        $this->mePaginaFiltro = $mePaginaFiltro;
        $this->meTplFiltro = $meTplFiltro;
        $this->snAutenticar = $snAutenticar;
        $this->dsHashValidacaoConteudo = $dsHashValidacaoConteudo;
    }

    public function getCdRelatorio(): ?int
    {
        return $this->cdRelatorio;
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

    public function getNmRelatorio(): ?string
    {
        return $this->nmRelatorio;
    }

    public function setNmRelatorio(?string $nmRelatorio): self
    {
        $this->nmRelatorio = $nmRelatorio;
        return $this;
    }

    public function getMePagina(): ?string
    {
        return $this->mePagina;
    }

    public function setMePagina(?string $mePagina): self
    {
        $this->mePagina = $mePagina;
        return $this;
    }

    public function getSnDisponivel(): ?string
    {
        return $this->snDisponivel;
    }

    public function setSnDisponivel(?string $snDisponivel): self
    {
        $this->snDisponivel = $snDisponivel;
        return $this;
    }

    public function getDsLink(): ?string
    {
        return $this->dsLink;
    }

    public function setDsLink(?string $dsLink): self
    {
        $this->dsLink = $dsLink;
        return $this;
    }

    public function getMeTpl(): ?string
    {
        return $this->meTpl;
    }

    public function setMeTpl(?string $meTpl): self
    {
        $this->meTpl = $meTpl;
        return $this;
    }

    public function getDsParametros(): ?string
    {
        return $this->dsParametros;
    }

    public function setDsParametros(?string $dsParametros): self
    {
        $this->dsParametros = $dsParametros;
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

    public function getMeCssCabecalho(): ?string
    {
        return $this->meCssCabecalho;
    }

    public function setMeCssCabecalho(?string $meCssCabecalho): self
    {
        $this->meCssCabecalho = $meCssCabecalho;
        return $this;
    }

    public function getMePaginaFiltro(): ?string
    {
        return $this->mePaginaFiltro;
    }

    public function setMePaginaFiltro(?string $mePaginaFiltro): self
    {
        $this->mePaginaFiltro = $mePaginaFiltro;
        return $this;
    }

    public function getMeTplFiltro(): ?string
    {
        return $this->meTplFiltro;
    }

    public function setMeTplFiltro(?string $meTplFiltro): self
    {
        $this->meTplFiltro = $meTplFiltro;
        return $this;
    }

    public function isSnAutenticar(): bool
    {
        return $this->snAutenticar;
    }

    public function setSnAutenticar(bool $snAutenticar): self
    {
        $this->snAutenticar = $snAutenticar;
        return $this;
    }

    public function getDsHashValidacaoConteudo(): ?string
    {
        return $this->dsHashValidacaoConteudo;
    }

    public function setDsHashValidacaoConteudo(?string $dsHashValidacaoConteudo): self
    {
        $this->dsHashValidacaoConteudo = $dsHashValidacaoConteudo;
        return $this;
    }
}

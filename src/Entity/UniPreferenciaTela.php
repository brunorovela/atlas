<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\UniPreferenciaTelaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniPreferenciaTelaRepository::class)]
#[ORM\Table(
    name: 'uni_preferencia_tela',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_PESSOA_TELA_COLUNA', columns: ['cd_pessoa', 'ds_chave_tela'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_DS_CHAVE_TELA', columns: ['ds_chave_tela'])]
class UniPreferenciaTela
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_preferencia_tela', type: 'bigint', options: ['unsigned' => true])]
    private ?string $cdPreferenciaTela = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'ds_chave_tela', type: 'string', length: 255)]
    private ?string $dsChaveTela = null;

    #[ORM\Column(name: 'ds_grid_col_def', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsGridColDef = null;

    #[ORM\Column(name: 'nr_registro_por_pagina', type: 'integer', nullable: true)]
    private ?int $nrRegistroPorPagina = null;

    #[ORM\Column(name: 'nr_tamanho_fonte', type: 'integer', options: ['default' => '13'])]
    private int $nrTamanhoFonte = 13;

    #[ORM\Column(name: 'sn_help', type: TinyIntType::NAME, nullable: true)]
    private ?int $snHelp = null;

    #[ORM\Column(name: 'ds_card_def', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsCardDef = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $dsChaveTela = null,
        ?string $dsGridColDef = null,
        ?int $nrRegistroPorPagina = null,
        int $nrTamanhoFonte = 13,
        ?int $snHelp = null,
        ?string $dsCardDef = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dsChaveTela = $dsChaveTela;
        $this->dsGridColDef = $dsGridColDef;
        $this->nrRegistroPorPagina = $nrRegistroPorPagina;
        $this->nrTamanhoFonte = $nrTamanhoFonte;
        $this->snHelp = $snHelp;
        $this->dsCardDef = $dsCardDef;
    }

    public function getCdPreferenciaTela(): ?string
    {
        return $this->cdPreferenciaTela;
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

    public function getDsChaveTela(): ?string
    {
        return $this->dsChaveTela;
    }

    public function setDsChaveTela(?string $dsChaveTela): self
    {
        $this->dsChaveTela = $dsChaveTela;
        return $this;
    }

    public function getDsGridColDef(): ?string
    {
        return $this->dsGridColDef;
    }

    public function setDsGridColDef(?string $dsGridColDef): self
    {
        $this->dsGridColDef = $dsGridColDef;
        return $this;
    }

    public function getNrRegistroPorPagina(): ?int
    {
        return $this->nrRegistroPorPagina;
    }

    public function setNrRegistroPorPagina(?int $nrRegistroPorPagina): self
    {
        $this->nrRegistroPorPagina = $nrRegistroPorPagina;
        return $this;
    }

    public function getNrTamanhoFonte(): int
    {
        return $this->nrTamanhoFonte;
    }

    public function setNrTamanhoFonte(int $nrTamanhoFonte): self
    {
        $this->nrTamanhoFonte = $nrTamanhoFonte;
        return $this;
    }

    public function getSnHelp(): ?int
    {
        return $this->snHelp;
    }

    public function setSnHelp(?int $snHelp): self
    {
        $this->snHelp = $snHelp;
        return $this;
    }

    public function getDsCardDef(): ?string
    {
        return $this->dsCardDef;
    }

    public function setDsCardDef(?string $dsCardDef): self
    {
        $this->dsCardDef = $dsCardDef;
        return $this;
    }
}

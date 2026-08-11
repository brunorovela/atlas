<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConConteudoAdicionalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConConteudoAdicionalRepository::class)]
#[ORM\Table(
    name: 'con_conteudo_adicional',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CONTEUDO', columns: ['cd_conteudo'])]
class ConConteudoAdicional
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_conteudo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConteudo = null;

    #[ORM\Column(name: 'ds_chave_pagina', type: 'string', length: 255, nullable: true)]
    private ?string $dsChavePagina = null;

    #[ORM\Column(name: 'me_valor', type: 'text', length: 16777215, nullable: true)]
    private ?string $meValor = null;

    public function __construct(
        ?string $dsChavePagina = null,
        ?string $meValor = null
    ) {
        $this->dsChavePagina = $dsChavePagina;
        $this->meValor = $meValor;
    }

    public function getCdConteudo(): ?int
    {
        return $this->cdConteudo;
    }

    public function getDsChavePagina(): ?string
    {
        return $this->dsChavePagina;
    }

    public function setDsChavePagina(?string $dsChavePagina): self
    {
        $this->dsChavePagina = $dsChavePagina;
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

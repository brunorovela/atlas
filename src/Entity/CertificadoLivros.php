<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\CertificadoLivrosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CertificadoLivrosRepository::class)]
#[ORM\Table(
    name: 'certificado_livros',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_certificado_livros', columns: ['nm_livro'])]
class CertificadoLivros
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cert_livro', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCertLivro = null;

    #[ORM\Column(name: 'nm_livro', type: 'string', length: 50, nullable: true)]
    private ?string $nmLivro = null;

    #[ORM\Column(name: 'cd_tipo', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $cdTipo = null;

    #[ORM\Column(name: 'nr_paginas', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrPaginas = 0;

    #[ORM\Column(name: 'nr_linhas', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrLinhas = 0;

    #[ORM\Column(name: 'pg_atual', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $pgAtual = 0;

    #[ORM\Column(name: 'sn_aberto', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snAberto = 1;

    public function __construct(
        ?string $nmLivro = null,
        ?string $cdTipo = null,
        int $nrPaginas = 0,
        int $nrLinhas = 0,
        int $pgAtual = 0,
        ?int $snAberto = 1
    ) {
        $this->nmLivro = $nmLivro;
        $this->cdTipo = $cdTipo;
        $this->nrPaginas = $nrPaginas;
        $this->nrLinhas = $nrLinhas;
        $this->pgAtual = $pgAtual;
        $this->snAberto = $snAberto;
    }

    public function getCdCertLivro(): ?int
    {
        return $this->cdCertLivro;
    }

    public function getNmLivro(): ?string
    {
        return $this->nmLivro;
    }

    public function setNmLivro(?string $nmLivro): self
    {
        $this->nmLivro = $nmLivro;
        return $this;
    }

    public function getCdTipo(): ?string
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?string $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getNrPaginas(): int
    {
        return $this->nrPaginas;
    }

    public function setNrPaginas(int $nrPaginas): self
    {
        $this->nrPaginas = $nrPaginas;
        return $this;
    }

    public function getNrLinhas(): int
    {
        return $this->nrLinhas;
    }

    public function setNrLinhas(int $nrLinhas): self
    {
        $this->nrLinhas = $nrLinhas;
        return $this;
    }

    public function getPgAtual(): int
    {
        return $this->pgAtual;
    }

    public function setPgAtual(int $pgAtual): self
    {
        $this->pgAtual = $pgAtual;
        return $this;
    }

    public function getSnAberto(): ?int
    {
        return $this->snAberto;
    }

    public function setSnAberto(?int $snAberto): self
    {
        $this->snAberto = $snAberto;
        return $this;
    }
}

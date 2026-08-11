<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PessoasImportadasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasImportadasRepository::class)]
#[ORM\Table(
    name: 'pessoas_importadas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA_UNIMESTRE', columns: ['cd_pessoa_unimestre'])]
class PessoasImportadas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_importada', type: 'integer')]
    private ?int $cdImportada = null;

    #[ORM\Column(name: 'cd_pessoa_unimestre', type: 'integer', nullable: true)]
    private ?int $cdPessoaUnimestre = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255, nullable: true)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'ds_consoantes_nome', type: 'string', length: 255, nullable: true)]
    private ?string $dsConsoantesNome = null;

    #[ORM\Column(name: 'ds_curso', type: 'string', length: 255, nullable: true)]
    private ?string $dsCurso = null;

    #[ORM\Column(name: 'nr_classificacao', type: 'integer', nullable: true)]
    private ?int $nrClassificacao = null;

    #[ORM\Column(name: 'ds_proposito', type: 'string', length: 255, nullable: true)]
    private ?string $dsProposito = null;

    #[ORM\Column(name: 'sn_encontrado', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $snEncontrado = 0;

    #[ORM\Column(name: 'ds_metodo', type: 'string', length: 255, nullable: true)]
    private ?string $dsMetodo = null;

    public function __construct(
        ?int $cdPessoaUnimestre = null,
        ?string $dsNome = null,
        ?string $dsConsoantesNome = null,
        ?string $dsCurso = null,
        ?int $nrClassificacao = null,
        ?string $dsProposito = null,
        ?int $snEncontrado = 0,
        ?string $dsMetodo = null
    ) {
        $this->cdPessoaUnimestre = $cdPessoaUnimestre;
        $this->dsNome = $dsNome;
        $this->dsConsoantesNome = $dsConsoantesNome;
        $this->dsCurso = $dsCurso;
        $this->nrClassificacao = $nrClassificacao;
        $this->dsProposito = $dsProposito;
        $this->snEncontrado = $snEncontrado;
        $this->dsMetodo = $dsMetodo;
    }

    public function getCdImportada(): ?int
    {
        return $this->cdImportada;
    }

    public function getCdPessoaUnimestre(): ?int
    {
        return $this->cdPessoaUnimestre;
    }

    public function setCdPessoaUnimestre(?int $cdPessoaUnimestre): self
    {
        $this->cdPessoaUnimestre = $cdPessoaUnimestre;
        return $this;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
        return $this;
    }

    public function getDsConsoantesNome(): ?string
    {
        return $this->dsConsoantesNome;
    }

    public function setDsConsoantesNome(?string $dsConsoantesNome): self
    {
        $this->dsConsoantesNome = $dsConsoantesNome;
        return $this;
    }

    public function getDsCurso(): ?string
    {
        return $this->dsCurso;
    }

    public function setDsCurso(?string $dsCurso): self
    {
        $this->dsCurso = $dsCurso;
        return $this;
    }

    public function getNrClassificacao(): ?int
    {
        return $this->nrClassificacao;
    }

    public function setNrClassificacao(?int $nrClassificacao): self
    {
        $this->nrClassificacao = $nrClassificacao;
        return $this;
    }

    public function getDsProposito(): ?string
    {
        return $this->dsProposito;
    }

    public function setDsProposito(?string $dsProposito): self
    {
        $this->dsProposito = $dsProposito;
        return $this;
    }

    public function getSnEncontrado(): ?int
    {
        return $this->snEncontrado;
    }

    public function setSnEncontrado(?int $snEncontrado): self
    {
        $this->snEncontrado = $snEncontrado;
        return $this;
    }

    public function getDsMetodo(): ?string
    {
        return $this->dsMetodo;
    }

    public function setDsMetodo(?string $dsMetodo): self
    {
        $this->dsMetodo = $dsMetodo;
        return $this;
    }
}

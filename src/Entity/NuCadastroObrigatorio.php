<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuCadastroObrigatorioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuCadastroObrigatorioRepository::class)]
#[ORM\Table(
    name: 'nu_cadastro_obrigatorio',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class NuCadastroObrigatorio
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cadastro', type: 'integer')]
    private ?int $cdCadastro = null;

    #[ORM\Column(name: 'nm_cadastro', type: 'string', length: 60, nullable: true)]
    private ?string $nmCadastro = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 60, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'sn_ativo_validacao', type: 'boolean', nullable: true)]
    private ?bool $snAtivoValidacao = null;

    #[ORM\Column(name: 'nr_ordem_cadastro', type: 'integer', nullable: true)]
    private ?int $nrOrdemCadastro = null;

    #[ORM\Column(name: 'ds_chave_gestao', type: 'string', length: 60, nullable: true)]
    private ?string $dsChaveGestao = null;

    public function __construct(
        ?string $nmCadastro = null,
        ?string $dsChave = null,
        ?bool $snAtivoValidacao = null,
        ?int $nrOrdemCadastro = null,
        ?string $dsChaveGestao = null
    ) {
        $this->nmCadastro = $nmCadastro;
        $this->dsChave = $dsChave;
        $this->snAtivoValidacao = $snAtivoValidacao;
        $this->nrOrdemCadastro = $nrOrdemCadastro;
        $this->dsChaveGestao = $dsChaveGestao;
    }

    public function getCdCadastro(): ?int
    {
        return $this->cdCadastro;
    }

    public function getNmCadastro(): ?string
    {
        return $this->nmCadastro;
    }

    public function setNmCadastro(?string $nmCadastro): self
    {
        $this->nmCadastro = $nmCadastro;
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

    public function isSnAtivoValidacao(): ?bool
    {
        return $this->snAtivoValidacao;
    }

    public function setSnAtivoValidacao(?bool $snAtivoValidacao): self
    {
        $this->snAtivoValidacao = $snAtivoValidacao;
        return $this;
    }

    public function getNrOrdemCadastro(): ?int
    {
        return $this->nrOrdemCadastro;
    }

    public function setNrOrdemCadastro(?int $nrOrdemCadastro): self
    {
        $this->nrOrdemCadastro = $nrOrdemCadastro;
        return $this;
    }

    public function getDsChaveGestao(): ?string
    {
        return $this->dsChaveGestao;
    }

    public function setDsChaveGestao(?string $dsChaveGestao): self
    {
        $this->dsChaveGestao = $dsChaveGestao;
        return $this;
    }
}

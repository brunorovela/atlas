<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinOrcamentosPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinOrcamentosPessoasRepository::class)]
#[ORM\Table(
    name: 'fin_orcamentos_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ORCAMENTO', columns: ['cd_orcamento'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class FinOrcamentosPessoas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_orcamentos_pessoas', type: 'integer')]
    private ?int $cdOrcamentosPessoas = null;

    #[ORM\Column(name: 'cd_orcamento', type: 'integer', nullable: true)]
    private ?int $cdOrcamento = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'sn_visualiza', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snVisualiza = false;

    #[ORM\Column(name: 'sn_cadastro', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snCadastro = false;

    public function __construct(
        ?int $cdOrcamento = null,
        ?int $cdPessoa = null,
        ?bool $snVisualiza = false,
        ?bool $snCadastro = false
    ) {
        $this->cdOrcamento = $cdOrcamento;
        $this->cdPessoa = $cdPessoa;
        $this->snVisualiza = $snVisualiza;
        $this->snCadastro = $snCadastro;
    }

    public function getCdOrcamentosPessoas(): ?int
    {
        return $this->cdOrcamentosPessoas;
    }

    public function getCdOrcamento(): ?int
    {
        return $this->cdOrcamento;
    }

    public function setCdOrcamento(?int $cdOrcamento): self
    {
        $this->cdOrcamento = $cdOrcamento;
        return $this;
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

    public function isSnVisualiza(): ?bool
    {
        return $this->snVisualiza;
    }

    public function setSnVisualiza(?bool $snVisualiza): self
    {
        $this->snVisualiza = $snVisualiza;
        return $this;
    }

    public function isSnCadastro(): ?bool
    {
        return $this->snCadastro;
    }

    public function setSnCadastro(?bool $snCadastro): self
    {
        $this->snCadastro = $snCadastro;
        return $this;
    }
}

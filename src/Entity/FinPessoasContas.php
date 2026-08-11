<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinPessoasContasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPessoasContasRepository::class)]
#[ORM\Table(
    name: 'fin_pessoas_contas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_NR_BANCO', columns: ['nr_banco'])]
#[ORM\Index(name: 'IX_NR_AGENCIA', columns: ['nr_agencia'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_NR_CONTA', columns: ['nr_conta'], options: ['lengths' => [20]])]
class FinPessoasContas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_banco', type: 'string', length: 3, options: ['default' => ''])]
    private string $nrBanco = '';

    #[ORM\Id]
    #[ORM\Column(name: 'nr_agencia', type: 'string', length: 50, options: ['default' => ''])]
    private string $nrAgencia = '';

    #[ORM\Id]
    #[ORM\Column(name: 'nr_conta', type: 'string', length: 50, options: ['default' => ''])]
    private string $nrConta = '';

    #[ORM\Column(name: 'nr_dig_agencia', type: 'string', length: 50, nullable: true)]
    private ?string $nrDigAgencia = null;

    #[ORM\Column(name: 'nr_dig_conta', type: 'string', length: 50, nullable: true)]
    private ?string $nrDigConta = null;

    #[ORM\Column(name: 'nr_dig_ag_conta', type: 'string', length: 50, nullable: true)]
    private ?string $nrDigAgConta = null;

    public function __construct(
        ?int $cdPessoa = null,
        string $nrBanco = '',
        string $nrAgencia = '',
        string $nrConta = '',
        ?string $nrDigAgencia = null,
        ?string $nrDigConta = null,
        ?string $nrDigAgConta = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->nrBanco = $nrBanco;
        $this->nrAgencia = $nrAgencia;
        $this->nrConta = $nrConta;
        $this->nrDigAgencia = $nrDigAgencia;
        $this->nrDigConta = $nrDigConta;
        $this->nrDigAgConta = $nrDigAgConta;
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

    public function getNrBanco(): string
    {
        return $this->nrBanco;
    }

    public function setNrBanco(string $nrBanco): self
    {
        $this->nrBanco = $nrBanco;
        return $this;
    }

    public function getNrAgencia(): string
    {
        return $this->nrAgencia;
    }

    public function setNrAgencia(string $nrAgencia): self
    {
        $this->nrAgencia = $nrAgencia;
        return $this;
    }

    public function getNrConta(): string
    {
        return $this->nrConta;
    }

    public function setNrConta(string $nrConta): self
    {
        $this->nrConta = $nrConta;
        return $this;
    }

    public function getNrDigAgencia(): ?string
    {
        return $this->nrDigAgencia;
    }

    public function setNrDigAgencia(?string $nrDigAgencia): self
    {
        $this->nrDigAgencia = $nrDigAgencia;
        return $this;
    }

    public function getNrDigConta(): ?string
    {
        return $this->nrDigConta;
    }

    public function setNrDigConta(?string $nrDigConta): self
    {
        $this->nrDigConta = $nrDigConta;
        return $this;
    }

    public function getNrDigAgConta(): ?string
    {
        return $this->nrDigAgConta;
    }

    public function setNrDigAgConta(?string $nrDigAgConta): self
    {
        $this->nrDigAgConta = $nrDigAgConta;
        return $this;
    }
}

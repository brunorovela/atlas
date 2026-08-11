<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PessoasDebitoAutomaticoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasDebitoAutomaticoRepository::class)]
#[ORM\Table(
    name: 'pessoas_debito_automatico',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class PessoasDebitoAutomatico
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'nr_conta_corrente', type: 'string', length: 50, nullable: true)]
    private ?string $nrContaCorrente = null;

    #[ORM\Column(name: 'ds_banco', type: 'string', length: 50, nullable: true)]
    private ?string $dsBanco = null;

    #[ORM\Column(name: 'nr_agencia', type: 'string', length: 50, nullable: true)]
    private ?string $nrAgencia = null;

    #[ORM\Column(name: 'nr_documento', type: 'string', length: 50, nullable: true)]
    private ?string $nrDocumento = null;

    #[ORM\Column(name: 'sn_autoriza_debito', type: TinyIntType::NAME, nullable: true)]
    private ?int $snAutorizaDebito = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $nrContaCorrente = null,
        ?string $dsBanco = null,
        ?string $nrAgencia = null,
        ?string $nrDocumento = null,
        ?int $snAutorizaDebito = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->nrContaCorrente = $nrContaCorrente;
        $this->dsBanco = $dsBanco;
        $this->nrAgencia = $nrAgencia;
        $this->nrDocumento = $nrDocumento;
        $this->snAutorizaDebito = $snAutorizaDebito;
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

    public function getNrContaCorrente(): ?string
    {
        return $this->nrContaCorrente;
    }

    public function setNrContaCorrente(?string $nrContaCorrente): self
    {
        $this->nrContaCorrente = $nrContaCorrente;
        return $this;
    }

    public function getDsBanco(): ?string
    {
        return $this->dsBanco;
    }

    public function setDsBanco(?string $dsBanco): self
    {
        $this->dsBanco = $dsBanco;
        return $this;
    }

    public function getNrAgencia(): ?string
    {
        return $this->nrAgencia;
    }

    public function setNrAgencia(?string $nrAgencia): self
    {
        $this->nrAgencia = $nrAgencia;
        return $this;
    }

    public function getNrDocumento(): ?string
    {
        return $this->nrDocumento;
    }

    public function setNrDocumento(?string $nrDocumento): self
    {
        $this->nrDocumento = $nrDocumento;
        return $this;
    }

    public function getSnAutorizaDebito(): ?int
    {
        return $this->snAutorizaDebito;
    }

    public function setSnAutorizaDebito(?int $snAutorizaDebito): self
    {
        $this->snAutorizaDebito = $snAutorizaDebito;
        return $this;
    }
}

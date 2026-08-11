<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MolAceiteContratoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MolAceiteContratoRepository::class)]
#[ORM\Table(
    name: 'mol_aceite_contrato',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PROCESSO', columns: ['cd_processo'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_RESP', columns: ['cd_resp'])]
class MolAceiteContrato
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_aceite', type: 'integer')]
    private ?int $cdAceite = null;

    #[ORM\Column(name: 'cd_processo', type: 'integer')]
    private ?int $cdProcesso = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_resp', type: 'integer', nullable: true)]
    private ?int $cdResp = null;

    #[ORM\Column(name: 'dt_aceite', type: 'datetime')]
    private ?\DateTimeInterface $dtAceite = null;

    #[ORM\Column(name: 'nr_ip', type: 'string', length: 50, nullable: true)]
    private ?string $nrIp = null;

    #[ORM\Column(name: 'sn_aceitou', type: 'boolean')]
    private ?bool $snAceitou = null;

    #[ORM\Column(name: 'cd_etapa', type: 'integer', nullable: true)]
    private ?int $cdEtapa = null;

    #[ORM\Column(name: 'cd_processo_pessoa', type: 'integer', nullable: true)]
    private ?int $cdProcessoPessoa = null;

    public function __construct(
        ?int $cdProcesso = null,
        ?int $cdPessoa = null,
        ?int $cdResp = null,
        ?\DateTimeInterface $dtAceite = null,
        ?string $nrIp = null,
        ?bool $snAceitou = null,
        ?int $cdEtapa = null,
        ?int $cdProcessoPessoa = null
    ) {
        $this->cdProcesso = $cdProcesso;
        $this->cdPessoa = $cdPessoa;
        $this->cdResp = $cdResp;
        $this->dtAceite = $dtAceite;
        $this->nrIp = $nrIp;
        $this->snAceitou = $snAceitou;
        $this->cdEtapa = $cdEtapa;
        $this->cdProcessoPessoa = $cdProcessoPessoa;
    }

    public function getCdAceite(): ?int
    {
        return $this->cdAceite;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
    }

    public function setCdProcesso(?int $cdProcesso): self
    {
        $this->cdProcesso = $cdProcesso;
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

    public function getCdResp(): ?int
    {
        return $this->cdResp;
    }

    public function setCdResp(?int $cdResp): self
    {
        $this->cdResp = $cdResp;
        return $this;
    }

    public function getDtAceite(): ?\DateTimeInterface
    {
        return $this->dtAceite;
    }

    public function setDtAceite(?\DateTimeInterface $dtAceite): self
    {
        $this->dtAceite = $dtAceite;
        return $this;
    }

    public function getNrIp(): ?string
    {
        return $this->nrIp;
    }

    public function setNrIp(?string $nrIp): self
    {
        $this->nrIp = $nrIp;
        return $this;
    }

    public function isSnAceitou(): ?bool
    {
        return $this->snAceitou;
    }

    public function setSnAceitou(?bool $snAceitou): self
    {
        $this->snAceitou = $snAceitou;
        return $this;
    }

    public function getCdEtapa(): ?int
    {
        return $this->cdEtapa;
    }

    public function setCdEtapa(?int $cdEtapa): self
    {
        $this->cdEtapa = $cdEtapa;
        return $this;
    }

    public function getCdProcessoPessoa(): ?int
    {
        return $this->cdProcessoPessoa;
    }

    public function setCdProcessoPessoa(?int $cdProcessoPessoa): self
    {
        $this->cdProcessoPessoa = $cdProcessoPessoa;
        return $this;
    }
}

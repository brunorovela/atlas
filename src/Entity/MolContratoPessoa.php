<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MolContratoPessoaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MolContratoPessoaRepository::class)]
#[ORM\Table(
    name: 'mol_contrato_pessoa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ETAPA', columns: ['cd_etapa'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_RESP', columns: ['cd_resp'])]
class MolContratoPessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_contrato_pessoa', type: 'integer')]
    private ?int $cdContratoPessoa = null;

    #[ORM\Column(name: 'cd_etapa', type: 'integer')]
    private ?int $cdEtapa = null;

    #[ORM\Column(name: 'cd_processo_pessoa', type: 'integer', nullable: true)]
    private ?int $cdProcessoPessoa = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_resp', type: 'integer')]
    private ?int $cdResp = null;

    #[ORM\Column(name: 'me_contrato', type: 'text')]
    private ?string $meContrato = null;

    #[ORM\Column(name: 'ds_path_documento', type: 'string', length: 100, nullable: true)]
    private ?string $dsPathDocumento = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdEtapa = null,
        ?int $cdProcessoPessoa = null,
        ?int $nrAnosemestre = null,
        ?int $cdPessoa = null,
        ?int $cdResp = null,
        ?string $meContrato = null,
        ?string $dsPathDocumento = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdEtapa = $cdEtapa;
        $this->cdProcessoPessoa = $cdProcessoPessoa;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdPessoa = $cdPessoa;
        $this->cdResp = $cdResp;
        $this->meContrato = $meContrato;
        $this->dsPathDocumento = $dsPathDocumento;
        $this->dtBase = $dtBase;
    }

    public function getCdContratoPessoa(): ?int
    {
        return $this->cdContratoPessoa;
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

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
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

    public function getMeContrato(): ?string
    {
        return $this->meContrato;
    }

    public function setMeContrato(?string $meContrato): self
    {
        $this->meContrato = $meContrato;
        return $this;
    }

    public function getDsPathDocumento(): ?string
    {
        return $this->dsPathDocumento;
    }

    public function setDsPathDocumento(?string $dsPathDocumento): self
    {
        $this->dsPathDocumento = $dsPathDocumento;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}

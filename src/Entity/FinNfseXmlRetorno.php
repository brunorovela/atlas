<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfseXmlRetornoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfseXmlRetornoRepository::class)]
#[ORM\Table(
    name: 'fin_nfse_xml_retorno',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinNfseXmlRetorno
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\Column(name: 'ds_cnpj_cpf', type: 'string', length: 14)]
    private ?string $dsCnpjCpf = null;

    #[ORM\Column(name: 'nr_rps', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrRps = null;

    #[ORM\Column(name: 'nr_serie', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrSerie = null;

    #[ORM\Column(name: 'nr_nfse', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrNfse = null;

    #[ORM\Column(name: 'ds_xml', type: 'text', nullable: true)]
    private ?string $dsXml = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsCnpjCpf = null,
        ?int $nrRps = null,
        ?int $nrSerie = null,
        ?int $nrNfse = null,
        ?string $dsXml = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsCnpjCpf = $dsCnpjCpf;
        $this->nrRps = $nrRps;
        $this->nrSerie = $nrSerie;
        $this->nrNfse = $nrNfse;
        $this->dsXml = $dsXml;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDsCnpjCpf(): ?string
    {
        return $this->dsCnpjCpf;
    }

    public function setDsCnpjCpf(?string $dsCnpjCpf): self
    {
        $this->dsCnpjCpf = $dsCnpjCpf;
        return $this;
    }

    public function getNrRps(): ?int
    {
        return $this->nrRps;
    }

    public function setNrRps(?int $nrRps): self
    {
        $this->nrRps = $nrRps;
        return $this;
    }

    public function getNrSerie(): ?int
    {
        return $this->nrSerie;
    }

    public function setNrSerie(?int $nrSerie): self
    {
        $this->nrSerie = $nrSerie;
        return $this;
    }

    public function getNrNfse(): ?int
    {
        return $this->nrNfse;
    }

    public function setNrNfse(?int $nrNfse): self
    {
        $this->nrNfse = $nrNfse;
        return $this;
    }

    public function getDsXml(): ?string
    {
        return $this->dsXml;
    }

    public function setDsXml(?string $dsXml): self
    {
        $this->dsXml = $dsXml;
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

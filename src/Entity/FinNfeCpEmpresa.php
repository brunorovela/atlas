<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfeCpEmpresaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeCpEmpresaRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_cp_empresa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinNfeCpEmpresa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_fin_nfe_cp_empresa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdFinNfeCpEmpresa = null;

    #[ORM\Column(name: 'cd_fin_nfe_convenio_plano', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdFinNfeConvenioPlano = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdFinNfeConvenioPlano = null,
        ?int $cdPessoa = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdFinNfeConvenioPlano = $cdFinNfeConvenioPlano;
        $this->cdPessoa = $cdPessoa;
        $this->dtBase = $dtBase;
    }

    public function getCdFinNfeCpEmpresa(): ?int
    {
        return $this->cdFinNfeCpEmpresa;
    }

    public function getCdFinNfeConvenioPlano(): ?int
    {
        return $this->cdFinNfeConvenioPlano;
    }

    public function setCdFinNfeConvenioPlano(?int $cdFinNfeConvenioPlano): self
    {
        $this->cdFinNfeConvenioPlano = $cdFinNfeConvenioPlano;
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

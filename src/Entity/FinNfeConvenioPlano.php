<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfeConvenioPlanoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeConvenioPlanoRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_convenio_plano',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinNfeConvenioPlano
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_fin_nfe_convenio_plano', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdFinNfeConvenioPlano = null;

    #[ORM\Column(name: 'nr_qtd_pessoas', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrQtdPessoas = null;

    #[ORM\Column(name: 'vl_valor', type: 'float', nullable: true)]
    private ?float $vlValor = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'sn_empresa', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $snEmpresa = 0;

    public function __construct(
        ?int $nrQtdPessoas = null,
        ?float $vlValor = null,
        ?\DateTimeInterface $dtBase = null,
        ?int $snEmpresa = 0
    ) {
        $this->nrQtdPessoas = $nrQtdPessoas;
        $this->vlValor = $vlValor;
        $this->dtBase = $dtBase;
        $this->snEmpresa = $snEmpresa;
    }

    public function getCdFinNfeConvenioPlano(): ?int
    {
        return $this->cdFinNfeConvenioPlano;
    }

    public function getNrQtdPessoas(): ?int
    {
        return $this->nrQtdPessoas;
    }

    public function setNrQtdPessoas(?int $nrQtdPessoas): self
    {
        $this->nrQtdPessoas = $nrQtdPessoas;
        return $this;
    }

    public function getVlValor(): ?float
    {
        return $this->vlValor;
    }

    public function setVlValor(?float $vlValor): self
    {
        $this->vlValor = $vlValor;
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

    public function getSnEmpresa(): ?int
    {
        return $this->snEmpresa;
    }

    public function setSnEmpresa(?int $snEmpresa): self
    {
        $this->snEmpresa = $snEmpresa;
        return $this;
    }
}

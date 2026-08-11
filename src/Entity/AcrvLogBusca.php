<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AcrvLogBuscaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcrvLogBuscaRepository::class)]
#[ORM\Table(
    name: 'acrv_log_busca',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class AcrvLogBusca
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_log_busca', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdLogBusca = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'ds_ip', type: 'string', length: 255, nullable: true)]
    private ?string $dsIp = null;

    #[ORM\Column(name: 'ds_json_filtro', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsJsonFiltro = null;

    #[ORM\Column(name: 'nr_qtd_registros', type: 'integer', nullable: true)]
    private ?int $nrQtdRegistros = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $dsIp = null,
        ?string $dsJsonFiltro = null,
        ?int $nrQtdRegistros = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dsIp = $dsIp;
        $this->dsJsonFiltro = $dsJsonFiltro;
        $this->nrQtdRegistros = $nrQtdRegistros;
    }

    public function getCdLogBusca(): ?int
    {
        return $this->cdLogBusca;
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

    public function getDsIp(): ?string
    {
        return $this->dsIp;
    }

    public function setDsIp(?string $dsIp): self
    {
        $this->dsIp = $dsIp;
        return $this;
    }

    public function getDsJsonFiltro(): ?string
    {
        return $this->dsJsonFiltro;
    }

    public function setDsJsonFiltro(?string $dsJsonFiltro): self
    {
        $this->dsJsonFiltro = $dsJsonFiltro;
        return $this;
    }

    public function getNrQtdRegistros(): ?int
    {
        return $this->nrQtdRegistros;
    }

    public function setNrQtdRegistros(?int $nrQtdRegistros): self
    {
        $this->nrQtdRegistros = $nrQtdRegistros;
        return $this;
    }
}

<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ExpoConsultaTabelasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpoConsultaTabelasRepository::class)]
#[ORM\Table(
    name: 'expo_consulta_tabelas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxUnico', columns: ['nm_consulta', 'nm_tabela'])]
#[ORM\Index(name: 'IX_NM_CONSULTA', columns: ['nm_consulta'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_NM_TABELA', columns: ['nm_tabela'], options: ['lengths' => [20]])]
class ExpoConsultaTabelas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_consulta_tabela', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConsultaTabela = null;

    #[ORM\Column(name: 'nm_consulta', type: 'string', length: 50, nullable: true)]
    private ?string $nmConsulta = null;

    #[ORM\Column(name: 'nm_tabela', type: 'string', length: 50, nullable: true)]
    private ?string $nmTabela = null;

    #[ORM\Column(name: 'nm_tabela_real', type: 'string', length: 50, nullable: true)]
    private ?string $nmTabelaReal = null;

    #[ORM\Column(name: 'sn_calculada', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snCalculada = 0;

    #[ORM\Column(name: 'ds_tabela_real', type: 'string', length: 255, nullable: true)]
    private ?string $dsTabelaReal = null;

    public function __construct(
        ?string $nmConsulta = null,
        ?string $nmTabela = null,
        ?string $nmTabelaReal = null,
        ?int $snCalculada = 0,
        ?string $dsTabelaReal = null
    ) {
        $this->nmConsulta = $nmConsulta;
        $this->nmTabela = $nmTabela;
        $this->nmTabelaReal = $nmTabelaReal;
        $this->snCalculada = $snCalculada;
        $this->dsTabelaReal = $dsTabelaReal;
    }

    public function getCdConsultaTabela(): ?int
    {
        return $this->cdConsultaTabela;
    }

    public function getNmConsulta(): ?string
    {
        return $this->nmConsulta;
    }

    public function setNmConsulta(?string $nmConsulta): self
    {
        $this->nmConsulta = $nmConsulta;
        return $this;
    }

    public function getNmTabela(): ?string
    {
        return $this->nmTabela;
    }

    public function setNmTabela(?string $nmTabela): self
    {
        $this->nmTabela = $nmTabela;
        return $this;
    }

    public function getNmTabelaReal(): ?string
    {
        return $this->nmTabelaReal;
    }

    public function setNmTabelaReal(?string $nmTabelaReal): self
    {
        $this->nmTabelaReal = $nmTabelaReal;
        return $this;
    }

    public function getSnCalculada(): ?int
    {
        return $this->snCalculada;
    }

    public function setSnCalculada(?int $snCalculada): self
    {
        $this->snCalculada = $snCalculada;
        return $this;
    }

    public function getDsTabelaReal(): ?string
    {
        return $this->dsTabelaReal;
    }

    public function setDsTabelaReal(?string $dsTabelaReal): self
    {
        $this->dsTabelaReal = $dsTabelaReal;
        return $this;
    }
}

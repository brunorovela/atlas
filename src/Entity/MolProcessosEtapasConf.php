<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\MolProcessosEtapasConfRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MolProcessosEtapasConfRepository::class)]
#[ORM\Table(
    name: 'mol_processos_etapas_conf',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ETAPA', columns: ['cd_etapa'])]
#[ORM\Index(name: 'IX_NM_CAMPO', columns: ['nm_campo'])]
#[ORM\Index(name: 'IX_CD_ETAPA_CONF', columns: ['cd_etapa_conf'])]
#[EsquemaFisico(
    chavesEstrangeiras: [],
    autoIncremento: ['cd_etapa_conf']
)]
class MolProcessosEtapasConf
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_etapa', type: 'integer', options: ['default' => '0'])]
    private int $cdEtapa = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'nm_campo', type: 'string', length: 50, options: ['default' => ''])]
    private string $nmCampo = '';

    #[ORM\Column(name: 'cd_etapa_conf', type: 'integer')]
    private ?int $cdEtapaConf = null;

    #[ORM\Column(name: 'me_valor', type: 'blob', length: 16777215, nullable: true)]
    private ?string $meValor = null;

    public function __construct(
        int $cdEtapa = 0,
        string $nmCampo = '',
        ?int $cdEtapaConf = null,
        ?string $meValor = null
    ) {
        $this->cdEtapa = $cdEtapa;
        $this->nmCampo = $nmCampo;
        $this->cdEtapaConf = $cdEtapaConf;
        $this->meValor = $meValor;
    }

    public function getCdEtapa(): int
    {
        return $this->cdEtapa;
    }

    public function setCdEtapa(int $cdEtapa): self
    {
        $this->cdEtapa = $cdEtapa;
        return $this;
    }

    public function getNmCampo(): string
    {
        return $this->nmCampo;
    }

    public function setNmCampo(string $nmCampo): self
    {
        $this->nmCampo = $nmCampo;
        return $this;
    }

    public function getCdEtapaConf(): ?int
    {
        return $this->cdEtapaConf;
    }

    public function setCdEtapaConf(?int $cdEtapaConf): self
    {
        $this->cdEtapaConf = $cdEtapaConf;
        return $this;
    }

    public function getMeValor(): ?string
    {
        return $this->meValor;
    }

    public function setMeValor(?string $meValor): self
    {
        $this->meValor = $meValor;
        return $this;
    }
}

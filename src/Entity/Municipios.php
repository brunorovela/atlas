<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\MunicipiosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MunicipiosRepository::class)]
#[ORM\Table(
    name: 'municipios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ESTADO', columns: ['cd_estado'])]
#[ORM\Index(name: 'IX_DS_MUNICIPIO', columns: ['ds_municipio'])]
#[ORM\Index(name: 'IX_DS_UF', columns: ['ds_uf'])]
#[ORM\Index(name: 'IX_CD_MUNICIPIO_CORREIO', columns: ['cd_municipio_correio'])]
#[EsquemaFisico(
    chavesEstrangeiras: [],
    autoIncremento: ['cd_municipio']
)]
class Municipios
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_municipio', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMunicipio = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_estado', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEstado = null;

    #[ORM\Column(name: 'nr_ano', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrAno = 0;

    #[ORM\Column(name: 'uf', type: 'string', length: 3, nullable: true, options: ['fixed' => true])]
    private ?string $uf = null;

    #[ORM\Column(name: 'ds_municipio', type: 'string', length: 120, nullable: true, options: ['default' => '0'])]
    private ?string $dsMunicipio = '0';

    #[ORM\Column(name: 'nr_cep_ini', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrCepIni = 0;

    #[ORM\Column(name: 'nr_cep_fim', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrCepFim = 0;

    #[ORM\Column(name: 'nr_praca', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrPraca = null;

    #[ORM\Column(name: 'cd_municipio_correio', type: 'integer', nullable: true)]
    private ?int $cdMunicipioCorreio = null;

    #[ORM\Column(name: 'ch_municipio', type: 'integer', nullable: true)]
    private ?int $chMunicipio = null;

    #[ORM\Column(name: 'ds_uf', type: 'string', length: 3, nullable: true, options: ['fixed' => true])]
    private ?string $dsUf = null;

    #[ORM\Column(name: 'ds_municipio_sem_acento', type: 'string', length: 250, nullable: true)]
    private ?string $dsMunicipioSemAcento = null;

    public function __construct(
        ?int $cdMunicipio = null,
        ?int $cdEstado = null,
        ?int $nrAno = 0,
        ?string $uf = null,
        ?string $dsMunicipio = '0',
        ?int $nrCepIni = 0,
        ?int $nrCepFim = 0,
        ?int $nrPraca = null,
        ?int $cdMunicipioCorreio = null,
        ?int $chMunicipio = null,
        ?string $dsUf = null,
        ?string $dsMunicipioSemAcento = null
    ) {
        $this->cdMunicipio = $cdMunicipio;
        $this->cdEstado = $cdEstado;
        $this->nrAno = $nrAno;
        $this->uf = $uf;
        $this->dsMunicipio = $dsMunicipio;
        $this->nrCepIni = $nrCepIni;
        $this->nrCepFim = $nrCepFim;
        $this->nrPraca = $nrPraca;
        $this->cdMunicipioCorreio = $cdMunicipioCorreio;
        $this->chMunicipio = $chMunicipio;
        $this->dsUf = $dsUf;
        $this->dsMunicipioSemAcento = $dsMunicipioSemAcento;
    }

    public function getCdMunicipio(): ?int
    {
        return $this->cdMunicipio;
    }

    public function setCdMunicipio(?int $cdMunicipio): self
    {
        $this->cdMunicipio = $cdMunicipio;
        return $this;
    }

    public function getCdEstado(): ?int
    {
        return $this->cdEstado;
    }

    public function setCdEstado(?int $cdEstado): self
    {
        $this->cdEstado = $cdEstado;
        return $this;
    }

    public function getNrAno(): ?int
    {
        return $this->nrAno;
    }

    public function setNrAno(?int $nrAno): self
    {
        $this->nrAno = $nrAno;
        return $this;
    }

    public function getUf(): ?string
    {
        return $this->uf;
    }

    public function setUf(?string $uf): self
    {
        $this->uf = $uf;
        return $this;
    }

    public function getDsMunicipio(): ?string
    {
        return $this->dsMunicipio;
    }

    public function setDsMunicipio(?string $dsMunicipio): self
    {
        $this->dsMunicipio = $dsMunicipio;
        return $this;
    }

    public function getNrCepIni(): ?int
    {
        return $this->nrCepIni;
    }

    public function setNrCepIni(?int $nrCepIni): self
    {
        $this->nrCepIni = $nrCepIni;
        return $this;
    }

    public function getNrCepFim(): ?int
    {
        return $this->nrCepFim;
    }

    public function setNrCepFim(?int $nrCepFim): self
    {
        $this->nrCepFim = $nrCepFim;
        return $this;
    }

    public function getNrPraca(): ?int
    {
        return $this->nrPraca;
    }

    public function setNrPraca(?int $nrPraca): self
    {
        $this->nrPraca = $nrPraca;
        return $this;
    }

    public function getCdMunicipioCorreio(): ?int
    {
        return $this->cdMunicipioCorreio;
    }

    public function setCdMunicipioCorreio(?int $cdMunicipioCorreio): self
    {
        $this->cdMunicipioCorreio = $cdMunicipioCorreio;
        return $this;
    }

    public function getChMunicipio(): ?int
    {
        return $this->chMunicipio;
    }

    public function setChMunicipio(?int $chMunicipio): self
    {
        $this->chMunicipio = $chMunicipio;
        return $this;
    }

    public function getDsUf(): ?string
    {
        return $this->dsUf;
    }

    public function setDsUf(?string $dsUf): self
    {
        $this->dsUf = $dsUf;
        return $this;
    }

    public function getDsMunicipioSemAcento(): ?string
    {
        return $this->dsMunicipioSemAcento;
    }

    public function setDsMunicipioSemAcento(?string $dsMunicipioSemAcento): self
    {
        $this->dsMunicipioSemAcento = $dsMunicipioSemAcento;
        return $this;
    }
}

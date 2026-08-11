<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\LeitoraProvasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LeitoraProvasRepository::class)]
#[ORM\Table(
    name: 'leitora_provas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_prova', columns: ['cd_prova'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class LeitoraProvas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova', type: 'integer')]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'nr_prova', type: 'smallint', nullable: true)]
    private ?int $nrProva = null;

    #[ORM\Column(name: 'ds_prova', type: 'string', length: 100, nullable: true)]
    private ?string $dsProva = null;

    #[ORM\Column(name: 'nr_correcoes', type: 'smallint', nullable: true)]
    private ?int $nrCorrecoes = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_chave', type: 'integer', options: ['default' => '0'])]
    private int $cdChave = 0;

    #[ORM\Column(name: 'sn_permitir_maior', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snPermitirMaior = 0;

    #[ORM\Column(name: 'sn_simulado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snSimulado = 0;

    #[ORM\Column(name: 'cd_proxima_prova', type: 'integer', nullable: true)]
    private ?int $cdProximaProva = null;

    #[ORM\Column(name: 'sn_prova_varios_cartoes', type: 'smallint', options: ['default' => '0'])]
    private int $snProvaVariosCartoes = 0;

    #[ORM\Column(name: 'sn_tipo_prova', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snTipoProva = 0;

    #[ORM\Column(name: 'sn_nota_compartilhada', type: 'boolean', options: ['default' => '0', 'comment' => 'Configuração para informar se as notas das disciplinas serão compartilhadas'])]
    private bool $snNotaCompartilhada = false;

    #[ORM\Column(name: 'nr_qtd_partes_gabarito', type: TinyIntType::NAME, options: ['default' => '1', 'comment' => 'Quantidade de partes que os gabaritos das provas vão possuir'])]
    private int $nrQtdPartesGabarito = 1;

    public function __construct(
        ?int $nrProva = null,
        ?string $dsProva = null,
        ?int $nrCorrecoes = null,
        ?int $nrAnosemestre = null,
        int $cdChave = 0,
        ?int $snPermitirMaior = 0,
        ?int $snSimulado = 0,
        ?int $cdProximaProva = null,
        int $snProvaVariosCartoes = 0,
        ?int $snTipoProva = 0,
        bool $snNotaCompartilhada = false,
        int $nrQtdPartesGabarito = 1
    ) {
        $this->nrProva = $nrProva;
        $this->dsProva = $dsProva;
        $this->nrCorrecoes = $nrCorrecoes;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdChave = $cdChave;
        $this->snPermitirMaior = $snPermitirMaior;
        $this->snSimulado = $snSimulado;
        $this->cdProximaProva = $cdProximaProva;
        $this->snProvaVariosCartoes = $snProvaVariosCartoes;
        $this->snTipoProva = $snTipoProva;
        $this->snNotaCompartilhada = $snNotaCompartilhada;
        $this->nrQtdPartesGabarito = $nrQtdPartesGabarito;
    }

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function getNrProva(): ?int
    {
        return $this->nrProva;
    }

    public function setNrProva(?int $nrProva): self
    {
        $this->nrProva = $nrProva;
        return $this;
    }

    public function getDsProva(): ?string
    {
        return $this->dsProva;
    }

    public function setDsProva(?string $dsProva): self
    {
        $this->dsProva = $dsProva;
        return $this;
    }

    public function getNrCorrecoes(): ?int
    {
        return $this->nrCorrecoes;
    }

    public function setNrCorrecoes(?int $nrCorrecoes): self
    {
        $this->nrCorrecoes = $nrCorrecoes;
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

    public function getCdChave(): int
    {
        return $this->cdChave;
    }

    public function setCdChave(int $cdChave): self
    {
        $this->cdChave = $cdChave;
        return $this;
    }

    public function getSnPermitirMaior(): ?int
    {
        return $this->snPermitirMaior;
    }

    public function setSnPermitirMaior(?int $snPermitirMaior): self
    {
        $this->snPermitirMaior = $snPermitirMaior;
        return $this;
    }

    public function getSnSimulado(): ?int
    {
        return $this->snSimulado;
    }

    public function setSnSimulado(?int $snSimulado): self
    {
        $this->snSimulado = $snSimulado;
        return $this;
    }

    public function getCdProximaProva(): ?int
    {
        return $this->cdProximaProva;
    }

    public function setCdProximaProva(?int $cdProximaProva): self
    {
        $this->cdProximaProva = $cdProximaProva;
        return $this;
    }

    public function getSnProvaVariosCartoes(): int
    {
        return $this->snProvaVariosCartoes;
    }

    public function setSnProvaVariosCartoes(int $snProvaVariosCartoes): self
    {
        $this->snProvaVariosCartoes = $snProvaVariosCartoes;
        return $this;
    }

    public function getSnTipoProva(): ?int
    {
        return $this->snTipoProva;
    }

    public function setSnTipoProva(?int $snTipoProva): self
    {
        $this->snTipoProva = $snTipoProva;
        return $this;
    }

    public function isSnNotaCompartilhada(): bool
    {
        return $this->snNotaCompartilhada;
    }

    public function setSnNotaCompartilhada(bool $snNotaCompartilhada): self
    {
        $this->snNotaCompartilhada = $snNotaCompartilhada;
        return $this;
    }

    public function getNrQtdPartesGabarito(): int
    {
        return $this->nrQtdPartesGabarito;
    }

    public function setNrQtdPartesGabarito(int $nrQtdPartesGabarito): self
    {
        $this->nrQtdPartesGabarito = $nrQtdPartesGabarito;
        return $this;
    }
}

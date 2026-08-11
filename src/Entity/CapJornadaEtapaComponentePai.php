<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CapJornadaEtapaComponentePaiRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapJornadaEtapaComponentePaiRepository::class)]
#[ORM\Table(
    name: 'cap_jornada_etapa_componente_pai',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UN_cap_jornada_etapa_componente_pai', columns: ['cd_jornada_etapa_componente_id'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_cap_jornada_etapa_componente_pai', 'colunas' => ['cd_jornada_etapa_componente_id'], 'tabelaAlvo' => 'cap_jornada_etapa_componente', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CapJornadaEtapaComponentePai
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: CapJornadaEtapaComponente::class)]
    #[ORM\JoinColumn(name: 'cd_jornada_etapa_componente_id', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null;

    #[ORM\Column(name: 'sn_pode_incluir_novo', type: 'boolean', options: ['default' => '0'])]
    private bool $snPodeIncluirNovo = false;

    #[ORM\Column(name: 'sn_in_memoriam', type: 'boolean', options: ['default' => '0'])]
    private bool $snInMemoriam = false;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null,
        bool $snPodeIncluirNovo = false,
        bool $snInMemoriam = false,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
        $this->snPodeIncluirNovo = $snPodeIncluirNovo;
        $this->snInMemoriam = $snInMemoriam;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdJornadaEtapaComponenteId(): ?CapJornadaEtapaComponente
    {
        return $this->cdJornadaEtapaComponenteId;
    }

    public function setCdJornadaEtapaComponenteId(?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId): self
    {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
        return $this;
    }

    public function isSnPodeIncluirNovo(): bool
    {
        return $this->snPodeIncluirNovo;
    }

    public function setSnPodeIncluirNovo(bool $snPodeIncluirNovo): self
    {
        $this->snPodeIncluirNovo = $snPodeIncluirNovo;
        return $this;
    }

    public function isSnInMemoriam(): bool
    {
        return $this->snInMemoriam;
    }

    public function setSnInMemoriam(bool $snInMemoriam): self
    {
        $this->snInMemoriam = $snInMemoriam;
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

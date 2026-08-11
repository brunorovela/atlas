<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CompKitsTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompKitsTurmasRepository::class)]
#[ORM\Table(
    name: 'comp_kits_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Tabela para ligação dos kits com as turmas.']
)]
#[ORM\Index(name: 'IX_CD_KIT', columns: ['cd_kit'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'IX_CD_ANOSEMESTRE', columns: ['cd_anosemestre'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_KITS_TURMAS', 'colunas' => ['cd_kit'], 'tabelaAlvo' => 'comp_kits', 'colunasAlvo' => ['cd_kit'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CompKitsTurmas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_kit_turmas', type: 'integer')]
    private ?int $cdKitTurmas = null;

    #[ORM\ManyToOne(targetEntity: CompKits::class)]
    #[ORM\JoinColumn(name: 'cd_kit', referencedColumnName: 'cd_kit', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CompKits $cdKit = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_anosemestre', type: 'smallint')]
    private ?int $cdAnosemestre = null;

    #[ORM\Column(name: 'nr_etapa', type: 'smallint', nullable: true)]
    private ?int $nrEtapa = null;

    public function __construct(
        ?CompKits $cdKit = null,
        ?string $cdTurma = null,
        ?int $cdAnosemestre = null,
        ?int $nrEtapa = null
    ) {
        $this->cdKit = $cdKit;
        $this->cdTurma = $cdTurma;
        $this->cdAnosemestre = $cdAnosemestre;
        $this->nrEtapa = $nrEtapa;
    }

    public function getCdKitTurmas(): ?int
    {
        return $this->cdKitTurmas;
    }

    public function getCdKit(): ?CompKits
    {
        return $this->cdKit;
    }

    public function setCdKit(?CompKits $cdKit): self
    {
        $this->cdKit = $cdKit;
        return $this;
    }

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getCdAnosemestre(): ?int
    {
        return $this->cdAnosemestre;
    }

    public function setCdAnosemestre(?int $cdAnosemestre): self
    {
        $this->cdAnosemestre = $cdAnosemestre;
        return $this;
    }

    public function getNrEtapa(): ?int
    {
        return $this->nrEtapa;
    }

    public function setNrEtapa(?int $nrEtapa): self
    {
        $this->nrEtapa = $nrEtapa;
        return $this;
    }
}

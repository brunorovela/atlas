<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UnimGaleriaFotosTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimGaleriaFotosTurmasRepository::class)]
#[ORM\Table(
    name: 'unim_galeria_fotos_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_galeria', columns: ['cd_galeria'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'unim_galeria_fotos_turmas_ibfk_1', 'colunas' => ['cd_galeria'], 'tabelaAlvo' => 'unim_galeria_fotos', 'colunasAlvo' => ['cd_galeria'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimGaleriaFotosTurmas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_galeria_turma', type: 'integer')]
    private ?int $cdGaleriaTurma = null;

    #[ORM\ManyToOne(targetEntity: UnimGaleriaFotos::class)]
    #[ORM\JoinColumn(name: 'cd_galeria', referencedColumnName: 'cd_galeria', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnimGaleriaFotos $cdGaleria = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50, nullable: true)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?UnimGaleriaFotos $cdGaleria = null,
        ?string $cdTurma = null,
        ?int $nrAnosemestre = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdGaleria = $cdGaleria;
        $this->cdTurma = $cdTurma;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->dtBase = $dtBase;
    }

    public function getCdGaleriaTurma(): ?int
    {
        return $this->cdGaleriaTurma;
    }

    public function getCdGaleria(): ?UnimGaleriaFotos
    {
        return $this->cdGaleria;
    }

    public function setCdGaleria(?UnimGaleriaFotos $cdGaleria): self
    {
        $this->cdGaleria = $cdGaleria;
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

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
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

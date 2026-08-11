<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UnimPoloTurmaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimPoloTurmaRepository::class)]
#[ORM\Table(
    name: 'unim_polo_turma',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_CD_POLO_ID_TURMA', columns: ['cd_polo', 'id_turma'])]
#[ORM\Index(name: 'IX_CD_POLO', columns: ['cd_polo'])]
#[ORM\Index(name: 'IX_ID_TURMA', columns: ['id_turma'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_unim_polo_turma_turmas', 'colunas' => ['id_turma'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['id_turma'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_unim_polo_turma_unim_polo', 'colunas' => ['cd_polo'], 'tabelaAlvo' => 'unim_polo', 'colunasAlvo' => ['cd_polo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimPoloTurma
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: UnimPolo::class)]
    #[ORM\JoinColumn(name: 'cd_polo', referencedColumnName: 'cd_polo', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnimPolo $cdPolo = null;

    #[ORM\ManyToOne(targetEntity: Turmas::class)]
    #[ORM\JoinColumn(name: 'id_turma', referencedColumnName: 'id_turma', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Turmas $idTurma = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?UnimPolo $cdPolo = null,
        ?Turmas $idTurma = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPolo = $cdPolo;
        $this->idTurma = $idTurma;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdPolo(): ?UnimPolo
    {
        return $this->cdPolo;
    }

    public function setCdPolo(?UnimPolo $cdPolo): self
    {
        $this->cdPolo = $cdPolo;
        return $this;
    }

    public function getIdTurma(): ?Turmas
    {
        return $this->idTurma;
    }

    public function setIdTurma(?Turmas $idTurma): self
    {
        $this->idTurma = $idTurma;
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

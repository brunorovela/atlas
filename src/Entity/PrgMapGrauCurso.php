<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PrgMapGrauCursoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrgMapGrauCursoRepository::class)]
#[ORM\Table(
    name: 'prg_map_grau_curso',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_general_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_situacao_grau_curso', columns: ['cd_situacao', 'cd_prg_grau_curso'])]
#[ORM\Index(name: 'idx_cd_situacao', columns: ['cd_situacao'])]
#[ORM\Index(name: 'idx_cd_prg_grau_curso', columns: ['cd_prg_grau_curso'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_map_grau_curso_situacao', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'situacoes', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => null, 'onUpdate' => null]],
        ['nome' => 'fk_map_prg_grau_curso', 'colunas' => ['cd_prg_grau_curso'], 'tabelaAlvo' => 'prg_grau_curso', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => null, 'onUpdate' => null]]
    ],
    autoIncremento: []
)]
class PrgMapGrauCurso
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer')]
    private ?int $cdSituacao = null;

    #[ORM\ManyToOne(targetEntity: PrgGrauCurso::class)]
    #[ORM\JoinColumn(name: 'cd_prg_grau_curso', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PrgGrauCurso $cdPrgGrauCurso = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdSituacao = null,
        ?PrgGrauCurso $cdPrgGrauCurso = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdSituacao = $cdSituacao;
        $this->cdPrgGrauCurso = $cdPrgGrauCurso;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getCdPrgGrauCurso(): ?PrgGrauCurso
    {
        return $this->cdPrgGrauCurso;
    }

    public function setCdPrgGrauCurso(?PrgGrauCurso $cdPrgGrauCurso): self
    {
        $this->cdPrgGrauCurso = $cdPrgGrauCurso;
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

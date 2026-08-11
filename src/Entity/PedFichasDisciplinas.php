<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PedFichasDisciplinasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedFichasDisciplinasRepository::class)]
#[ORM\Table(
    name: 'ped_fichas_disciplinas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_ped_fichas_disciplinas_cd_ficha', columns: ['cd_ficha'])]
#[ORM\Index(name: 'IX_ped_fichas_disciplinas_cd_curso', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_ped_fichas_disciplinas_cd_disciplina', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'ped_fichas_disciplinas_ibfk_2', columns: ['cd_disciplina', 'cd_curso'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'ped_fichas_disciplinas_ibfk_1', 'colunas' => ['cd_ficha'], 'tabelaAlvo' => 'ped_fichas', 'colunasAlvo' => ['cd_ficha'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'ped_fichas_disciplinas_ibfk_2', 'colunas' => ['cd_disciplina', 'cd_curso'], 'tabelaAlvo' => 'disciplinas', 'colunasAlvo' => ['codigo', 'curso'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PedFichasDisciplinas
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: PedFichas::class)]
    #[ORM\JoinColumn(name: 'cd_ficha', referencedColumnName: 'cd_ficha', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PedFichas $cdFicha = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    public function __construct(
        ?PedFichas $cdFicha = null,
        ?string $cdCurso = null,
        ?int $cdDisciplina = null
    ) {
        $this->cdFicha = $cdFicha;
        $this->cdCurso = $cdCurso;
        $this->cdDisciplina = $cdDisciplina;
    }

    public function getCdFicha(): ?PedFichas
    {
        return $this->cdFicha;
    }

    public function setCdFicha(?PedFichas $cdFicha): self
    {
        $this->cdFicha = $cdFicha;
        return $this;
    }

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }
}

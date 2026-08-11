<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PedFichasTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedFichasTurmasRepository::class)]
#[ORM\Table(
    name: 'ped_fichas_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_ped_fichas_turmas_cd_ficha', columns: ['cd_ficha'])]
#[ORM\Index(name: 'IX_ped_fichas_turmas_cd_processo', columns: ['cd_processo'])]
#[ORM\Index(name: 'IX_ped_fichas_turmas_nr_anosemestre', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_ped_fichas_turmas_cd_turma', columns: ['cd_turma'])]
#[ORM\Index(name: 'ped_fichas_turmas_ibfk_2', columns: ['nr_anosemestre', 'cd_turma'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'ped_fichas_turmas_ibfk_1', 'colunas' => ['cd_ficha'], 'tabelaAlvo' => 'ped_fichas', 'colunasAlvo' => ['cd_ficha'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'ped_fichas_turmas_ibfk_2', 'colunas' => ['nr_anosemestre', 'cd_turma'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['anosemestre', 'codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'ped_fichas_turmas_ibfk_3', 'colunas' => ['cd_processo'], 'tabelaAlvo' => 'ped_processos', 'colunasAlvo' => ['cd_processo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PedFichasTurmas
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: PedFichas::class)]
    #[ORM\JoinColumn(name: 'cd_ficha', referencedColumnName: 'cd_ficha', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PedFichas $cdFicha = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: PedProcessos::class)]
    #[ORM\JoinColumn(name: 'cd_processo', referencedColumnName: 'cd_processo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PedProcessos $cdProcesso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    public function __construct(
        ?PedFichas $cdFicha = null,
        ?PedProcessos $cdProcesso = null,
        ?int $nrAnosemestre = null,
        ?string $cdTurma = null
    ) {
        $this->cdFicha = $cdFicha;
        $this->cdProcesso = $cdProcesso;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
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

    public function getCdProcesso(): ?PedProcessos
    {
        return $this->cdProcesso;
    }

    public function setCdProcesso(?PedProcessos $cdProcesso): self
    {
        $this->cdProcesso = $cdProcesso;
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

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }
}

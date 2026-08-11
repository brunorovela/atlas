<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\EstncCursosEmecSetoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncCursosEmecSetoresRepository::class)]
#[ORM\Table(
    name: 'estnc_cursos_emec_setores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'IDX_CURSO_SETOR', columns: ['cd_curso_emec', 'cd_setor'])]
#[ORM\Index(name: 'IX_CD_CURSO_EMEC', columns: ['cd_curso_emec'])]
#[ORM\Index(name: 'IX_CD_SETOR', columns: ['cd_setor'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CURSO_EMEC', 'colunas' => ['cd_curso_emec'], 'tabelaAlvo' => 'estnc_cursos_emec', 'colunasAlvo' => ['cd_curso_emec'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_SETOR', 'colunas' => ['cd_setor'], 'tabelaAlvo' => 'estnc_setores', 'colunasAlvo' => ['cd_setor'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncCursosEmecSetores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_curso_emec_setores', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCursoEmecSetores = null;

    #[ORM\ManyToOne(targetEntity: EstncCursosEmec::class)]
    #[ORM\JoinColumn(name: 'cd_curso_emec', referencedColumnName: 'cd_curso_emec', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncCursosEmec $cdCursoEmec = null;

    #[ORM\ManyToOne(targetEntity: EstncSetores::class)]
    #[ORM\JoinColumn(name: 'cd_setor', referencedColumnName: 'cd_setor', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncSetores $cdSetor = null;

    public function __construct(
        ?EstncCursosEmec $cdCursoEmec = null,
        ?EstncSetores $cdSetor = null
    ) {
        $this->cdCursoEmec = $cdCursoEmec;
        $this->cdSetor = $cdSetor;
    }

    public function getCdCursoEmecSetores(): ?int
    {
        return $this->cdCursoEmecSetores;
    }

    public function getCdCursoEmec(): ?EstncCursosEmec
    {
        return $this->cdCursoEmec;
    }

    public function setCdCursoEmec(?EstncCursosEmec $cdCursoEmec): self
    {
        $this->cdCursoEmec = $cdCursoEmec;
        return $this;
    }

    public function getCdSetor(): ?EstncSetores
    {
        return $this->cdSetor;
    }

    public function setCdSetor(?EstncSetores $cdSetor): self
    {
        $this->cdSetor = $cdSetor;
        return $this;
    }
}

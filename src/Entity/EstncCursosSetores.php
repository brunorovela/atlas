<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\EstncCursosSetoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncCursosSetoresRepository::class)]
#[ORM\Table(
    name: 'estnc_cursos_setores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_SETOR', columns: ['cd_setor'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_NC_CURSOS_SETORES_CD_CURSO', 'colunas' => ['cd_curso'], 'tabelaAlvo' => 'estnc_cursos', 'colunasAlvo' => ['cd_curso'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_CURSOS_SETORES_CD_SETOR', 'colunas' => ['cd_setor'], 'tabelaAlvo' => 'estnc_setores', 'colunasAlvo' => ['cd_setor'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncCursosSetores
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: EstncCursos::class)]
    #[ORM\JoinColumn(name: 'cd_curso', referencedColumnName: 'cd_curso', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncCursos $cdCurso = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: EstncSetores::class)]
    #[ORM\JoinColumn(name: 'cd_setor', referencedColumnName: 'cd_setor', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncSetores $cdSetor = null;

    public function __construct(
        ?EstncCursos $cdCurso = null,
        ?EstncSetores $cdSetor = null
    ) {
        $this->cdCurso = $cdCurso;
        $this->cdSetor = $cdSetor;
    }

    public function getCdCurso(): ?EstncCursos
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?EstncCursos $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
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

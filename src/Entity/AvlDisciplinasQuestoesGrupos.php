<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvlDisciplinasQuestoesGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlDisciplinasQuestoesGruposRepository::class)]
#[ORM\Table(
    name: 'avl_disciplinas_questoes_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_ID_DISCIPLINA', columns: ['id_disciplina'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
class AvlDisciplinasQuestoesGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_questao_grupo_disciplina', type: 'integer')]
    private ?int $cdQuestaoGrupoDisciplina = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer')]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'id_disciplina', type: 'integer')]
    private ?int $idDisciplina = null;

    public function __construct(
        ?int $cdGrupo = null,
        ?int $idDisciplina = null
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->idDisciplina = $idDisciplina;
    }

    public function getCdQuestaoGrupoDisciplina(): ?int
    {
        return $this->cdQuestaoGrupoDisciplina;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getIdDisciplina(): ?int
    {
        return $this->idDisciplina;
    }

    public function setIdDisciplina(?int $idDisciplina): self
    {
        $this->idDisciplina = $idDisciplina;
        return $this;
    }
}

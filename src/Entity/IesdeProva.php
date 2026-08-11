<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IesdeProvaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IesdeProvaRepository::class)]
#[ORM\Table(
    name: 'iesde_prova',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_ID_CURSO_IESDE', columns: ['cd_curso_iesde'])]
#[ORM\Index(name: 'IX_ID_DISCIPLINA_IESDE', columns: ['cd_disciplina_iesde'])]
class IesdeProva
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_iesde', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProvaIesde = null;

    #[ORM\Column(name: 'cd_curso_iesde', type: 'integer')]
    private ?int $cdCursoIesde = null;

    #[ORM\Column(name: 'cd_disciplina_iesde', type: 'integer')]
    private ?int $cdDisciplinaIesde = null;

    #[ORM\Column(name: 'ds_avaliacao', type: 'string', length: 255)]
    private ?string $dsAvaliacao = null;

    #[ORM\Column(name: 'sn_processado', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snProcessado = false;

    public function __construct(
        ?int $cdCursoIesde = null,
        ?int $cdDisciplinaIesde = null,
        ?string $dsAvaliacao = null,
        ?bool $snProcessado = false
    ) {
        $this->cdCursoIesde = $cdCursoIesde;
        $this->cdDisciplinaIesde = $cdDisciplinaIesde;
        $this->dsAvaliacao = $dsAvaliacao;
        $this->snProcessado = $snProcessado;
    }

    public function getCdProvaIesde(): ?int
    {
        return $this->cdProvaIesde;
    }

    public function getCdCursoIesde(): ?int
    {
        return $this->cdCursoIesde;
    }

    public function setCdCursoIesde(?int $cdCursoIesde): self
    {
        $this->cdCursoIesde = $cdCursoIesde;
        return $this;
    }

    public function getCdDisciplinaIesde(): ?int
    {
        return $this->cdDisciplinaIesde;
    }

    public function setCdDisciplinaIesde(?int $cdDisciplinaIesde): self
    {
        $this->cdDisciplinaIesde = $cdDisciplinaIesde;
        return $this;
    }

    public function getDsAvaliacao(): ?string
    {
        return $this->dsAvaliacao;
    }

    public function setDsAvaliacao(?string $dsAvaliacao): self
    {
        $this->dsAvaliacao = $dsAvaliacao;
        return $this;
    }

    public function isSnProcessado(): ?bool
    {
        return $this->snProcessado;
    }

    public function setSnProcessado(?bool $snProcessado): self
    {
        $this->snProcessado = $snProcessado;
        return $this;
    }
}

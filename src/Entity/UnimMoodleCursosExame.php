<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnimMoodleCursosExameRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimMoodleCursosExameRepository::class)]
#[ORM\Table(
    name: 'unim_moodle_cursos_exame',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
class UnimMoodleCursosExame
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_moodle_curso_exame', type: 'integer')]
    private ?int $cdMoodleCursoExame = null;

    #[ORM\Column(name: 'cd_moodle_curso', type: 'integer', nullable: true)]
    private ?int $cdMoodleCurso = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdMoodleCurso = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdMoodleCurso = $cdMoodleCurso;
        $this->dtBase = $dtBase;
    }

    public function getCdMoodleCursoExame(): ?int
    {
        return $this->cdMoodleCursoExame;
    }

    public function getCdMoodleCurso(): ?int
    {
        return $this->cdMoodleCurso;
    }

    public function setCdMoodleCurso(?int $cdMoodleCurso): self
    {
        $this->cdMoodleCurso = $cdMoodleCurso;
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

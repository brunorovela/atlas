<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UnimMoodleCursosPlataformaaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimMoodleCursosPlataformaaRepository::class)]
#[ORM\Table(
    name: 'unim_moodle_cursos_plataformaa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'unim_moodle_cursos_plataformaa_cd_moodle_curso_IDX', columns: ['cd_moodle_curso', 'plataformaa_ambiente_id'])]
#[ORM\Index(name: 'unim_moodle_cursos_plataformaa_plataformaa_ambiente_FK', columns: ['plataformaa_ambiente_id'])]
#[ORM\Index(name: 'IDX_E4F35C13C4A29523', columns: ['cd_moodle_curso'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'unim_moodle_cursos_plataformaa_plataformaa_ambiente_FK', 'colunas' => ['plataformaa_ambiente_id'], 'tabelaAlvo' => 'integracao_plataformaa_ambiente', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'unim_moodle_cursos_plataformaa_unim_moodle_cursos_FK', 'colunas' => ['cd_moodle_curso'], 'tabelaAlvo' => 'unim_moodle_cursos', 'colunasAlvo' => ['cd_moodle_curso'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimMoodleCursosPlataformaa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: UnimMoodleCursos::class)]
    #[ORM\JoinColumn(name: 'cd_moodle_curso', referencedColumnName: 'cd_moodle_curso', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimMoodleCursos $cdMoodleCurso = null;

    #[ORM\ManyToOne(targetEntity: IntegracaoPlataformaaAmbiente::class)]
    #[ORM\JoinColumn(name: 'plataformaa_ambiente_id', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?IntegracaoPlataformaaAmbiente $plataformaaAmbienteId = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?UnimMoodleCursos $cdMoodleCurso = null,
        ?IntegracaoPlataformaaAmbiente $plataformaaAmbienteId = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdMoodleCurso = $cdMoodleCurso;
        $this->plataformaaAmbienteId = $plataformaaAmbienteId;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdMoodleCurso(): ?UnimMoodleCursos
    {
        return $this->cdMoodleCurso;
    }

    public function setCdMoodleCurso(?UnimMoodleCursos $cdMoodleCurso): self
    {
        $this->cdMoodleCurso = $cdMoodleCurso;
        return $this;
    }

    public function getPlataformaaAmbienteId(): ?IntegracaoPlataformaaAmbiente
    {
        return $this->plataformaaAmbienteId;
    }

    public function setPlataformaaAmbienteId(?IntegracaoPlataformaaAmbiente $plataformaaAmbienteId): self
    {
        $this->plataformaaAmbienteId = $plataformaaAmbienteId;
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

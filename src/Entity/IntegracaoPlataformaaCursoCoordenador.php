<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\IntegracaoPlataformaaCursoCoordenadorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoPlataformaaCursoCoordenadorRepository::class)]
#[ORM\Table(
    name: 'integracao_plataformaa_curso_coordenador',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_CD_MOODLE_CURSO_CD_PESSOA', columns: ['cd_moodle_curso', 'cd_pessoa'])]
#[ORM\Index(name: 'FK_integracao_plataformaa_curso_coordenador_pessoas', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'integracao_plataformaa_curso_coordenador_ambiente_FK', columns: ['plataformaa_ambiente_id'])]
#[ORM\Index(name: 'IDX_532B782C4A29523', columns: ['cd_moodle_curso'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_integracao_plataformaa_curso_coordenador_pessoas', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_integracao_plataformaa_curso_coordenador_unim_moodle_cursos', 'colunas' => ['cd_moodle_curso'], 'tabelaAlvo' => 'unim_moodle_cursos', 'colunasAlvo' => ['cd_moodle_curso'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'integracao_plataformaa_curso_coordenador_ambiente_FK', 'colunas' => ['plataformaa_ambiente_id'], 'tabelaAlvo' => 'integracao_plataformaa_ambiente', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class IntegracaoPlataformaaCursoCoordenador
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: IntegracaoPlataformaaAmbiente::class)]
    #[ORM\JoinColumn(name: 'plataformaa_ambiente_id', referencedColumnName: 'id', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?IntegracaoPlataformaaAmbiente $plataformaaAmbienteId = null;

    #[ORM\ManyToOne(targetEntity: UnimMoodleCursos::class)]
    #[ORM\JoinColumn(name: 'cd_moodle_curso', referencedColumnName: 'cd_moodle_curso', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimMoodleCursos $cdMoodleCurso = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?IntegracaoPlataformaaAmbiente $plataformaaAmbienteId = null,
        ?UnimMoodleCursos $cdMoodleCurso = null,
        ?Pessoas $cdPessoa = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->plataformaaAmbienteId = $plataformaaAmbienteId;
        $this->cdMoodleCurso = $cdMoodleCurso;
        $this->cdPessoa = $cdPessoa;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCdMoodleCurso(): ?UnimMoodleCursos
    {
        return $this->cdMoodleCurso;
    }

    public function setCdMoodleCurso(?UnimMoodleCursos $cdMoodleCurso): self
    {
        $this->cdMoodleCurso = $cdMoodleCurso;
        return $this;
    }

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
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

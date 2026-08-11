<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\KonvivaCursosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KonvivaCursosRepository::class)]
#[ORM\Table(
    name: 'konviva_cursos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'fk_konviva_cursos_avaliacoes_tipos_cd_avaliacao_tipo', columns: ['cd_avaliacao_tipo'])]
#[ORM\Index(name: 'IX_CD_KONVIVA_CURSO', columns: ['cd_konviva_curso'])]
#[ORM\Index(name: 'IX_CD_MOODLE_CURSO', columns: ['cd_moodle_curso'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_konviva_cursos_avaliacoes_tipos_cd_avaliacao_tipo', 'colunas' => ['cd_avaliacao_tipo'], 'tabelaAlvo' => 'avaliacoes_tipos', 'colunasAlvo' => ['cd_avaliacao_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class KonvivaCursos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_konviva_curso', type: 'string', length: 64)]
    private ?string $cdKonvivaCurso = null;

    #[ORM\Column(name: 'cd_moodle_curso', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMoodleCurso = null;

    #[ORM\Column(name: 'dt_alteracao', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtAlteracao = null;

    #[ORM\Column(name: 'ds_metodo_importacao', type: 'string', length: 32, options: ['default' => 'final'])]
    private string $dsMetodoImportacao = 'final';

    #[ORM\ManyToOne(targetEntity: AvaliacoesTipos::class)]
    #[ORM\JoinColumn(name: 'cd_avaliacao_tipo', referencedColumnName: 'cd_avaliacao_tipo', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?AvaliacoesTipos $cdAvaliacaoTipo = null;

    public function __construct(
        ?string $cdKonvivaCurso = null,
        ?int $cdMoodleCurso = null,
        ?\DateTimeInterface $dtAlteracao = null,
        string $dsMetodoImportacao = 'final',
        ?AvaliacoesTipos $cdAvaliacaoTipo = null
    ) {
        $this->cdKonvivaCurso = $cdKonvivaCurso;
        $this->cdMoodleCurso = $cdMoodleCurso;
        $this->dtAlteracao = $dtAlteracao;
        $this->dsMetodoImportacao = $dsMetodoImportacao;
        $this->cdAvaliacaoTipo = $cdAvaliacaoTipo;
    }

    public function getCdKonvivaCurso(): ?string
    {
        return $this->cdKonvivaCurso;
    }

    public function setCdKonvivaCurso(?string $cdKonvivaCurso): self
    {
        $this->cdKonvivaCurso = $cdKonvivaCurso;
        return $this;
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

    public function getDtAlteracao(): ?\DateTimeInterface
    {
        return $this->dtAlteracao;
    }

    public function setDtAlteracao(?\DateTimeInterface $dtAlteracao): self
    {
        $this->dtAlteracao = $dtAlteracao;
        return $this;
    }

    public function getDsMetodoImportacao(): string
    {
        return $this->dsMetodoImportacao;
    }

    public function setDsMetodoImportacao(string $dsMetodoImportacao): self
    {
        $this->dsMetodoImportacao = $dsMetodoImportacao;
        return $this;
    }

    public function getCdAvaliacaoTipo(): ?AvaliacoesTipos
    {
        return $this->cdAvaliacaoTipo;
    }

    public function setCdAvaliacaoTipo(?AvaliacoesTipos $cdAvaliacaoTipo): self
    {
        $this->cdAvaliacaoTipo = $cdAvaliacaoTipo;
        return $this;
    }
}

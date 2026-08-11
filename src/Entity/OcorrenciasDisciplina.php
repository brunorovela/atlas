<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\OcorrenciasDisciplinaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OcorrenciasDisciplinaRepository::class)]
#[ORM\Table(
    name: 'ocorrencias_disciplina',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Irá substituir a tabela ocorrencias_tipos_disciplinas quando for implementada a versão definitiva ']
)]
#[ORM\UniqueConstraint(name: 'UK_disciplina_grade_etapa', columns: ['id_disciplina', 'cd_grade', 'cd_etapa'])]
#[ORM\Index(name: 'FK_ocorrencias_disciplina_grades', columns: ['cd_grade'])]
#[ORM\Index(name: 'IDX_A8E68E6ED759AAF1', columns: ['id_disciplina'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_ocorrencias_disciplina_disciplinas', 'colunas' => ['id_disciplina'], 'tabelaAlvo' => 'disciplinas', 'colunasAlvo' => ['id_disciplina'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_ocorrencias_disciplina_grades', 'colunas' => ['cd_grade'], 'tabelaAlvo' => 'grades', 'colunasAlvo' => ['CD_GRADE'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class OcorrenciasDisciplina
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ocorrencia_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdOcorrenciaDisciplina = null;

    #[ORM\ManyToOne(targetEntity: Disciplinas::class)]
    #[ORM\JoinColumn(name: 'id_disciplina', referencedColumnName: 'id_disciplina', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => 'chave com disciplinas'])]
    private ?Disciplinas $idDisciplina = null;

    #[ORM\Column(name: 'cd_grade', type: 'integer', options: ['unsigned' => true, 'comment' => 'chave com grades'])]
    private ?int $cdGrade = null;

    #[ORM\Column(name: 'cd_etapa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEtapa = null;

    #[ORM\Column(name: 'vl_nota_inicial', type: 'smallfloat', nullable: true, options: ['comment' => 'nota inicial na disciplina'])]
    private ?float $vlNotaInicial = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Disciplinas $idDisciplina = null,
        ?int $cdGrade = null,
        ?int $cdEtapa = null,
        ?float $vlNotaInicial = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->idDisciplina = $idDisciplina;
        $this->cdGrade = $cdGrade;
        $this->cdEtapa = $cdEtapa;
        $this->vlNotaInicial = $vlNotaInicial;
        $this->dtBase = $dtBase;
    }

    public function getCdOcorrenciaDisciplina(): ?int
    {
        return $this->cdOcorrenciaDisciplina;
    }

    public function getIdDisciplina(): ?Disciplinas
    {
        return $this->idDisciplina;
    }

    public function setIdDisciplina(?Disciplinas $idDisciplina): self
    {
        $this->idDisciplina = $idDisciplina;
        return $this;
    }

    public function getCdGrade(): ?int
    {
        return $this->cdGrade;
    }

    public function setCdGrade(?int $cdGrade): self
    {
        $this->cdGrade = $cdGrade;
        return $this;
    }

    public function getCdEtapa(): ?int
    {
        return $this->cdEtapa;
    }

    public function setCdEtapa(?int $cdEtapa): self
    {
        $this->cdEtapa = $cdEtapa;
        return $this;
    }

    public function getVlNotaInicial(): ?float
    {
        return $this->vlNotaInicial;
    }

    public function setVlNotaInicial(?float $vlNotaInicial): self
    {
        $this->vlNotaInicial = $vlNotaInicial;
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

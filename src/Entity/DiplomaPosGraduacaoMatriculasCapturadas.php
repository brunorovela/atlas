<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\DiplomaPosGraduacaoMatriculasCapturadasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiplomaPosGraduacaoMatriculasCapturadasRepository::class)]
#[ORM\Table(
    name: 'diploma_pos_graduacao_matriculas_capturadas',
    options: ['charset' => 'utf8mb3', 'collation' => 'utf8mb3_general_ci', 'comment' => 'Armazena todas a matriculas capturadas para diplomação no modulo "Diploma Pos Graduação" da IBF-POS']
)]
#[ORM\Index(name: 'diploma_pos_graduacao_matriculas_capturadas_FK_1', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'diploma_pos_graduacao_matriculas_capturadas_FK', 'colunas' => ['cd_matricula_curso'], 'tabelaAlvo' => 'matriculas_curso', 'colunasAlvo' => ['cd_matricula_curso'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'diploma_pos_graduacao_matriculas_capturadas_FK_1', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class DiplomaPosGraduacaoMatriculasCapturadas
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: MatriculasCurso::class)]
    #[ORM\JoinColumn(name: 'cd_matricula_curso', referencedColumnName: 'cd_matricula_curso', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => 'Codigo da matricula do aluno a ser diplomado'])]
    private ?MatriculasCurso $cdMatriculaCurso = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => 'Codigo da pessoa que está acompanhando o processo de diplomação dessa matricula'])]
    private ?Pessoas $cdPessoa = null;

    public function __construct(
        ?MatriculasCurso $cdMatriculaCurso = null,
        ?Pessoas $cdPessoa = null
    ) {
        $this->cdMatriculaCurso = $cdMatriculaCurso;
        $this->cdPessoa = $cdPessoa;
    }

    public function getCdMatriculaCurso(): ?MatriculasCurso
    {
        return $this->cdMatriculaCurso;
    }

    public function setCdMatriculaCurso(?MatriculasCurso $cdMatriculaCurso): self
    {
        $this->cdMatriculaCurso = $cdMatriculaCurso;
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
}

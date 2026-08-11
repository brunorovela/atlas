<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\TamInscricaoGeAlunosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TamInscricaoGeAlunosRepository::class)]
#[ORM\Table(
    name: 'tam_inscricao_ge_alunos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TAM_INSCRICAO_GE_ALUNOS', columns: ['cd_inscricao', 'cd_ge_aluno'])]
#[ORM\Index(name: 'IX_CD_GE_ALUNO', columns: ['cd_ge_aluno'])]
#[ORM\Index(name: 'IX_CD_INSCRICAO', columns: ['cd_inscricao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'tam_inscricao_ge_alunos_ibfk_1', 'colunas' => ['cd_inscricao'], 'tabelaAlvo' => 'tam_inscricoes', 'colunasAlvo' => ['CD_INSCRICAO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class TamInscricaoGeAlunos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'codigo', type: 'integer')]
    private ?int $codigo = null;

    #[ORM\Column(name: 'cd_ge_aluno', type: 'integer', nullable: true)]
    private ?int $cdGeAluno = null;

    #[ORM\ManyToOne(targetEntity: TamInscricoes::class)]
    #[ORM\JoinColumn(name: 'cd_inscricao', referencedColumnName: 'CD_INSCRICAO', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?TamInscricoes $cdInscricao = null;

    public function __construct(
        ?int $cdGeAluno = null,
        ?TamInscricoes $cdInscricao = null
    ) {
        $this->cdGeAluno = $cdGeAluno;
        $this->cdInscricao = $cdInscricao;
    }

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function getCdGeAluno(): ?int
    {
        return $this->cdGeAluno;
    }

    public function setCdGeAluno(?int $cdGeAluno): self
    {
        $this->cdGeAluno = $cdGeAluno;
        return $this;
    }

    public function getCdInscricao(): ?TamInscricoes
    {
        return $this->cdInscricao;
    }

    public function setCdInscricao(?TamInscricoes $cdInscricao): self
    {
        $this->cdInscricao = $cdInscricao;
        return $this;
    }
}

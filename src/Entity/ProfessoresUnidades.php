<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\ProfessoresUnidadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfessoresUnidadesRepository::class)]
#[ORM\Table(
    name: 'professores_unidades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PROFESSOR', columns: ['CD_PROFESSOR'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['CD_COLIGADA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_PROFESSORES_UNIDADES_CD_COLIGADA_COLIGADAS_CD_COLIGADA', 'colunas' => ['CD_COLIGADA'], 'tabelaAlvo' => 'coligadas', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_PROFESSORES_UNIDADES_CD_PROFESSOR_PROFESSORES_CD_PESSOA', 'colunas' => ['CD_PROFESSOR'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ProfessoresUnidades
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Coligadas::class)]
    #[ORM\JoinColumn(name: 'CD_COLIGADA', referencedColumnName: 'cd_coligada', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Coligadas $cdColigada = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'CD_PROFESSOR', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdProfessor = null;

    #[ORM\Column(name: 'sn_funcionario', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snFuncionario = null;

    #[ORM\Column(name: 'sn_professor', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snProfessor = null;

    #[ORM\Column(name: 'sn_orientador', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snOrientador = null;

    public function __construct(
        ?Coligadas $cdColigada = null,
        ?Pessoas $cdProfessor = null,
        ?int $snFuncionario = null,
        ?int $snProfessor = null,
        ?int $snOrientador = null
    ) {
        $this->cdColigada = $cdColigada;
        $this->cdProfessor = $cdProfessor;
        $this->snFuncionario = $snFuncionario;
        $this->snProfessor = $snProfessor;
        $this->snOrientador = $snOrientador;
    }

    public function getCdColigada(): ?Coligadas
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?Coligadas $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getCdProfessor(): ?Pessoas
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(?Pessoas $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getSnFuncionario(): ?int
    {
        return $this->snFuncionario;
    }

    public function setSnFuncionario(?int $snFuncionario): self
    {
        $this->snFuncionario = $snFuncionario;
        return $this;
    }

    public function getSnProfessor(): ?int
    {
        return $this->snProfessor;
    }

    public function setSnProfessor(?int $snProfessor): self
    {
        $this->snProfessor = $snProfessor;
        return $this;
    }

    public function getSnOrientador(): ?int
    {
        return $this->snOrientador;
    }

    public function setSnOrientador(?int $snOrientador): self
    {
        $this->snOrientador = $snOrientador;
        return $this;
    }
}

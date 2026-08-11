<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ArvoreLivroTurmaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArvoreLivroTurmaRepository::class)]
#[ORM\Table(
    name: 'arvore_livro_turma',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UN_arvore_livro_turma_id_turma', columns: ['id_turma'])]
#[ORM\UniqueConstraint(name: 'UN_arvore_livro_turma_turma_arvore', columns: ['turma_arvore'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_arvore_livro_turma_turmas', 'colunas' => ['id_turma'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['id_turma'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ArvoreLivroTurma
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Turmas::class)]
    #[ORM\JoinColumn(name: 'id_turma', referencedColumnName: 'id_turma', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Turmas $idTurma = null;

    #[ORM\Column(name: 'turma_arvore', type: 'string', length: 255, options: ['default' => ''])]
    private string $turmaArvore = '';

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Turmas $idTurma = null,
        string $turmaArvore = '',
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->idTurma = $idTurma;
        $this->turmaArvore = $turmaArvore;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTurma(): ?Turmas
    {
        return $this->idTurma;
    }

    public function setIdTurma(?Turmas $idTurma): self
    {
        $this->idTurma = $idTurma;
        return $this;
    }

    public function getTurmaArvore(): string
    {
        return $this->turmaArvore;
    }

    public function setTurmaArvore(string $turmaArvore): self
    {
        $this->turmaArvore = $turmaArvore;
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

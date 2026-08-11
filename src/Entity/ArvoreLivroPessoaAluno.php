<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ArvoreLivroPessoaAlunoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArvoreLivroPessoaAlunoRepository::class)]
#[ORM\Table(
    name: 'arvore_livro_pessoa_aluno',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UN_arvore_livro_pessoa_aluno', columns: ['arvore_livro_pessoa_id', 'turma_id'])]
#[ORM\Index(name: 'FK_arvore_livro_pessoa_aluno_turmas', columns: ['turma_id'])]
#[ORM\Index(name: 'IDX_FCC177B1A1A15F8', columns: ['arvore_livro_pessoa_id'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_arvore_livro_pessoa_aluno_arvore_livro_pessoa', 'colunas' => ['arvore_livro_pessoa_id'], 'tabelaAlvo' => 'arvore_livro_pessoa', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_arvore_livro_pessoa_aluno_turmas', 'colunas' => ['turma_id'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['id_turma'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ArvoreLivroPessoaAluno
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: ArvoreLivroPessoa::class)]
    #[ORM\JoinColumn(name: 'arvore_livro_pessoa_id', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ArvoreLivroPessoa $arvoreLivroPessoaId = null;

    #[ORM\ManyToOne(targetEntity: Turmas::class)]
    #[ORM\JoinColumn(name: 'turma_id', referencedColumnName: 'id_turma', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Turmas $turmaId = null;

    #[ORM\Column(name: 'enum_situacao', type: 'enum', options: ['default' => 'ATIVO', 'values' => ['ATIVO', 'INATIVO']])]
    private string $enumSituacao = 'ATIVO';

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime')]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?ArvoreLivroPessoa $arvoreLivroPessoaId = null,
        ?Turmas $turmaId = null,
        string $enumSituacao = 'ATIVO',
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->arvoreLivroPessoaId = $arvoreLivroPessoaId;
        $this->turmaId = $turmaId;
        $this->enumSituacao = $enumSituacao;
        $this->dtCadastro = $dtCadastro;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArvoreLivroPessoaId(): ?ArvoreLivroPessoa
    {
        return $this->arvoreLivroPessoaId;
    }

    public function setArvoreLivroPessoaId(?ArvoreLivroPessoa $arvoreLivroPessoaId): self
    {
        $this->arvoreLivroPessoaId = $arvoreLivroPessoaId;
        return $this;
    }

    public function getTurmaId(): ?Turmas
    {
        return $this->turmaId;
    }

    public function setTurmaId(?Turmas $turmaId): self
    {
        $this->turmaId = $turmaId;
        return $this;
    }

    public function getEnumSituacao(): string
    {
        return $this->enumSituacao;
    }

    public function setEnumSituacao(string $enumSituacao): self
    {
        $this->enumSituacao = $enumSituacao;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
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

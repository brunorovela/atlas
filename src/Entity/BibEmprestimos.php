<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\BibEmprestimosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibEmprestimosRepository::class)]
#[ORM\Table(
    name: 'bib_emprestimos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_exemplar', columns: ['cd_exemplar'])]
#[ORM\Index(name: 'cd_situacao', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_EXEMPLAR', columns: ['cd_exemplar'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_RENOVACAO', columns: ['cd_renovacao'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'fk_bib_emp_pessoa_emp', columns: ['cd_pessoa_emprestimo'])]
#[ORM\Index(name: 'fk_bib_emp_pessoa_dev', columns: ['cd_pessoa_devolucao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_emprestimos_ibfk_1', 'colunas' => ['cd_exemplar'], 'tabelaAlvo' => 'bib_titulos_exemplares', 'colunasAlvo' => ['cd_exemplar'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'bib_emprestimos_ibfk_2', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'bib_situacoes', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'SET NULL', 'onUpdate' => 'SET NULL']],
        ['nome' => 'bib_emprestimos_ibfk_3', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'bib_situacoes', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'SET NULL', 'onUpdate' => 'SET NULL']],
        ['nome' => 'bib_emprestimos_ibfk_4', 'colunas' => ['cd_pessoa_emprestimo'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'bib_emprestimos_ibfk_5', 'colunas' => ['cd_pessoa_devolucao'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibEmprestimos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_emprestimo', type: 'integer')]
    private ?int $cdEmprestimo = null;

    #[ORM\ManyToOne(targetEntity: BibTitulosExemplares::class)]
    #[ORM\JoinColumn(name: 'cd_exemplar', referencedColumnName: 'cd_exemplar', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibTitulosExemplares $cdExemplar = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'dt_emprestimo', type: 'datetime')]
    private ?\DateTimeInterface $dtEmprestimo = null;

    #[ORM\Column(name: 'cd_renovacao', type: 'integer', nullable: true)]
    private ?int $cdRenovacao = null;

    #[ORM\Column(name: 'dt_devolucao', type: 'datetime')]
    private ?\DateTimeInterface $dtDevolucao = null;

    #[ORM\Column(name: 'dt_entrega', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEntrega = null;

    #[ORM\ManyToOne(targetEntity: BibSituacoes::class)]
    #[ORM\JoinColumn(name: 'cd_situacao', referencedColumnName: 'cd_situacao', nullable: true, options: ['default' => '1', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibSituacoes $cdSituacao = null;

    #[ORM\Column(name: 'sn_mov_interna', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snMovInterna = null;

    #[ORM\Column(name: 'SN_ESPECIAL', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snEspecial = 0;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_emprestimo', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaEmprestimo = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_devolucao', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaDevolucao = null;

    public function __construct(
        ?BibTitulosExemplares $cdExemplar = null,
        ?int $cdPessoa = null,
        ?\DateTimeInterface $dtEmprestimo = null,
        ?int $cdRenovacao = null,
        ?\DateTimeInterface $dtDevolucao = null,
        ?\DateTimeInterface $dtEntrega = null,
        ?BibSituacoes $cdSituacao = null,
        ?int $snMovInterna = null,
        int $snEspecial = 0,
        ?Pessoas $cdPessoaEmprestimo = null,
        ?Pessoas $cdPessoaDevolucao = null
    ) {
        $this->cdExemplar = $cdExemplar;
        $this->cdPessoa = $cdPessoa;
        $this->dtEmprestimo = $dtEmprestimo;
        $this->cdRenovacao = $cdRenovacao;
        $this->dtDevolucao = $dtDevolucao;
        $this->dtEntrega = $dtEntrega;
        $this->cdSituacao = $cdSituacao;
        $this->snMovInterna = $snMovInterna;
        $this->snEspecial = $snEspecial;
        $this->cdPessoaEmprestimo = $cdPessoaEmprestimo;
        $this->cdPessoaDevolucao = $cdPessoaDevolucao;
    }

    public function getCdEmprestimo(): ?int
    {
        return $this->cdEmprestimo;
    }

    public function getCdExemplar(): ?BibTitulosExemplares
    {
        return $this->cdExemplar;
    }

    public function setCdExemplar(?BibTitulosExemplares $cdExemplar): self
    {
        $this->cdExemplar = $cdExemplar;
        return $this;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getDtEmprestimo(): ?\DateTimeInterface
    {
        return $this->dtEmprestimo;
    }

    public function setDtEmprestimo(?\DateTimeInterface $dtEmprestimo): self
    {
        $this->dtEmprestimo = $dtEmprestimo;
        return $this;
    }

    public function getCdRenovacao(): ?int
    {
        return $this->cdRenovacao;
    }

    public function setCdRenovacao(?int $cdRenovacao): self
    {
        $this->cdRenovacao = $cdRenovacao;
        return $this;
    }

    public function getDtDevolucao(): ?\DateTimeInterface
    {
        return $this->dtDevolucao;
    }

    public function setDtDevolucao(?\DateTimeInterface $dtDevolucao): self
    {
        $this->dtDevolucao = $dtDevolucao;
        return $this;
    }

    public function getDtEntrega(): ?\DateTimeInterface
    {
        return $this->dtEntrega;
    }

    public function setDtEntrega(?\DateTimeInterface $dtEntrega): self
    {
        $this->dtEntrega = $dtEntrega;
        return $this;
    }

    public function getCdSituacao(): ?BibSituacoes
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?BibSituacoes $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getSnMovInterna(): ?int
    {
        return $this->snMovInterna;
    }

    public function setSnMovInterna(?int $snMovInterna): self
    {
        $this->snMovInterna = $snMovInterna;
        return $this;
    }

    public function getSnEspecial(): int
    {
        return $this->snEspecial;
    }

    public function setSnEspecial(int $snEspecial): self
    {
        $this->snEspecial = $snEspecial;
        return $this;
    }

    public function getCdPessoaEmprestimo(): ?Pessoas
    {
        return $this->cdPessoaEmprestimo;
    }

    public function setCdPessoaEmprestimo(?Pessoas $cdPessoaEmprestimo): self
    {
        $this->cdPessoaEmprestimo = $cdPessoaEmprestimo;
        return $this;
    }

    public function getCdPessoaDevolucao(): ?Pessoas
    {
        return $this->cdPessoaDevolucao;
    }

    public function setCdPessoaDevolucao(?Pessoas $cdPessoaDevolucao): self
    {
        $this->cdPessoaDevolucao = $cdPessoaDevolucao;
        return $this;
    }
}

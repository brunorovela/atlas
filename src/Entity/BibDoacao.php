<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibDoacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibDoacaoRepository::class)]
#[ORM\Table(
    name: 'bib_doacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_TITULOS_EXEMPLARES_CD_EXEMPLAR_DOACAO_CD_EXEMPLAR', columns: ['CD_EXEMPLAR'])]
#[ORM\Index(name: 'FK_PESSOAS_CD_PESSOA_DOACAO_CD_PESSOA', columns: ['CD_PESSOA'])]
#[ORM\Index(name: 'FK_SITUACOES_CD_SITUACAO_DOACAO_CD_SITUACAO', columns: ['CD_SITUACAO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_PESSOAS_CD_PESSOA_DOACAO_CD_PESSOA', 'colunas' => ['CD_PESSOA'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_SITUACOES_CD_SITUACAO_DOACAO_CD_SITUACAO', 'colunas' => ['CD_SITUACAO'], 'tabelaAlvo' => 'situacoes', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_TITULOS_EXEMPLARES_CD_EXEMPLAR_DOACAO_CD_EXEMPLAR', 'colunas' => ['CD_EXEMPLAR'], 'tabelaAlvo' => 'bib_titulos_exemplares', 'colunasAlvo' => ['cd_exemplar'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibDoacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_DOACAO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDoacao = null;

    #[ORM\ManyToOne(targetEntity: BibTitulosExemplares::class)]
    #[ORM\JoinColumn(name: 'CD_EXEMPLAR', referencedColumnName: 'cd_exemplar', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibTitulosExemplares $cdExemplar = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'CD_PESSOA', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'CD_SITUACAO', type: 'integer')]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'DT_EMPRESTIMO', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtEmprestimo = null;

    #[ORM\Column(name: 'DT_DEVOLUCAO', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtDevolucao = null;

    #[ORM\Column(name: 'DT_ENTREGA', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtEntrega = null;

    public function __construct(
        ?BibTitulosExemplares $cdExemplar = null,
        ?Pessoas $cdPessoa = null,
        ?int $cdSituacao = null,
        ?\DateTimeInterface $dtEmprestimo = null,
        ?\DateTimeInterface $dtDevolucao = null,
        ?\DateTimeInterface $dtEntrega = null
    ) {
        $this->cdExemplar = $cdExemplar;
        $this->cdPessoa = $cdPessoa;
        $this->cdSituacao = $cdSituacao;
        $this->dtEmprestimo = $dtEmprestimo;
        $this->dtDevolucao = $dtDevolucao;
        $this->dtEntrega = $dtEntrega;
    }

    public function getCdDoacao(): ?int
    {
        return $this->cdDoacao;
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

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
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
}

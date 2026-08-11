<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\RecibosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecibosRepository::class)]
#[ORM\Table(
    name: 'recibos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'RECIBOS_PESSOAS_EXECUCAO', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
#[ORM\Index(name: 'IX_CD_ALUNO', columns: ['cd_aluno'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'IX_NR_PARCELA', columns: ['nr_parcela'])]
#[ORM\Index(name: 'IX_DT_VENCIMENTO', columns: ['dt_vencimento'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'recibos_ibfk_1', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class Recibos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_recibo', type: 'integer')]
    private ?int $cdRecibo = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer')]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'cd_aluno', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAluno = null;

    #[ORM\Column(name: 'nr_parcela', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrParcela = null;

    #[ORM\Column(name: 'dt_vencimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtVencimento = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50, nullable: true)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'dt_impressao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtImpressao = null;

    #[ORM\Column(name: 'ds_extenso', type: 'string', length: 250, nullable: true)]
    private ?string $dsExtenso = null;

    #[ORM\Column(name: 'nr_recibo', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrRecibo = null;

    #[ORM\Column(name: 'sn_estorno', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snEstorno = 0;

    #[ORM\Column(name: 'dt_recibo', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRecibo = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'nr_impressoes', type: 'integer', options: ['unsigned' => true, 'default' => '1'])]
    private int $nrImpressoes = 1;

    public function __construct(
        ?int $cdMensalidade = null,
        ?int $cdAluno = null,
        ?int $nrParcela = null,
        ?\DateTimeInterface $dtVencimento = null,
        ?string $cdTurma = null,
        ?\DateTimeInterface $dtImpressao = null,
        ?string $dsExtenso = null,
        ?int $nrRecibo = null,
        ?int $snEstorno = 0,
        ?\DateTimeInterface $dtRecibo = null,
        ?Pessoas $cdPessoa = null,
        int $nrImpressoes = 1
    ) {
        $this->cdMensalidade = $cdMensalidade;
        $this->cdAluno = $cdAluno;
        $this->nrParcela = $nrParcela;
        $this->dtVencimento = $dtVencimento;
        $this->cdTurma = $cdTurma;
        $this->dtImpressao = $dtImpressao;
        $this->dsExtenso = $dsExtenso;
        $this->nrRecibo = $nrRecibo;
        $this->snEstorno = $snEstorno;
        $this->dtRecibo = $dtRecibo;
        $this->cdPessoa = $cdPessoa;
        $this->nrImpressoes = $nrImpressoes;
    }

    public function getCdRecibo(): ?int
    {
        return $this->cdRecibo;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getCdAluno(): ?int
    {
        return $this->cdAluno;
    }

    public function setCdAluno(?int $cdAluno): self
    {
        $this->cdAluno = $cdAluno;
        return $this;
    }

    public function getNrParcela(): ?int
    {
        return $this->nrParcela;
    }

    public function setNrParcela(?int $nrParcela): self
    {
        $this->nrParcela = $nrParcela;
        return $this;
    }

    public function getDtVencimento(): ?\DateTimeInterface
    {
        return $this->dtVencimento;
    }

    public function setDtVencimento(?\DateTimeInterface $dtVencimento): self
    {
        $this->dtVencimento = $dtVencimento;
        return $this;
    }

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getDtImpressao(): ?\DateTimeInterface
    {
        return $this->dtImpressao;
    }

    public function setDtImpressao(?\DateTimeInterface $dtImpressao): self
    {
        $this->dtImpressao = $dtImpressao;
        return $this;
    }

    public function getDsExtenso(): ?string
    {
        return $this->dsExtenso;
    }

    public function setDsExtenso(?string $dsExtenso): self
    {
        $this->dsExtenso = $dsExtenso;
        return $this;
    }

    public function getNrRecibo(): ?int
    {
        return $this->nrRecibo;
    }

    public function setNrRecibo(?int $nrRecibo): self
    {
        $this->nrRecibo = $nrRecibo;
        return $this;
    }

    public function getSnEstorno(): ?int
    {
        return $this->snEstorno;
    }

    public function setSnEstorno(?int $snEstorno): self
    {
        $this->snEstorno = $snEstorno;
        return $this;
    }

    public function getDtRecibo(): ?\DateTimeInterface
    {
        return $this->dtRecibo;
    }

    public function setDtRecibo(?\DateTimeInterface $dtRecibo): self
    {
        $this->dtRecibo = $dtRecibo;
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

    public function getNrImpressoes(): int
    {
        return $this->nrImpressoes;
    }

    public function setNrImpressoes(int $nrImpressoes): self
    {
        $this->nrImpressoes = $nrImpressoes;
        return $this;
    }
}

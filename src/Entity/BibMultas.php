<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibMultasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibMultasRepository::class)]
#[ORM\Table(
    name: 'bib_multas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_emprestimo', columns: ['cd_emprestimo'])]
#[ORM\Index(name: 'cd_mensalidade', columns: ['cd_mensalidade'])]
#[ORM\Index(name: 'cd_situacao', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_EMPRESTIMO', columns: ['cd_emprestimo'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_USUARIO_PAGAMENTO', columns: ['cd_usuario_pagamento'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_multas_ibfk_1', 'colunas' => ['cd_emprestimo'], 'tabelaAlvo' => 'bib_emprestimos', 'colunasAlvo' => ['cd_emprestimo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'bib_multas_ibfk_2', 'colunas' => ['cd_mensalidade'], 'tabelaAlvo' => 'mensalidades', 'colunasAlvo' => ['cd_mensalidade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'bib_multas_ibfk_3', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'bib_situacoes', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'SET NULL', 'onUpdate' => 'SET NULL']],
        ['nome' => 'bib_multas_ibfk_4', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'bib_situacoes', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'SET NULL', 'onUpdate' => 'SET NULL']]
    ],
    autoIncremento: []
)]
class BibMultas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_multa', type: 'integer')]
    private ?int $cdMulta = null;

    #[ORM\ManyToOne(targetEntity: BibEmprestimos::class)]
    #[ORM\JoinColumn(name: 'cd_emprestimo', referencedColumnName: 'cd_emprestimo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibEmprestimos $cdEmprestimo = null;

    #[ORM\Column(name: 'dt_multa', type: 'datetime')]
    private ?\DateTimeInterface $dtMulta = null;

    #[ORM\Column(name: 'db_valor', type: 'float')]
    private ?float $dbValor = null;

    #[ORM\Column(name: 'db_valor_pago', type: 'float', nullable: true)]
    private ?float $dbValorPago = null;

    #[ORM\Column(name: 'dt_pagamento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPagamento = null;

    #[ORM\ManyToOne(targetEntity: BibSituacoes::class)]
    #[ORM\JoinColumn(name: 'cd_situacao', referencedColumnName: 'cd_situacao', nullable: true, options: ['default' => '1', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibSituacoes $cdSituacao = null;

    #[ORM\ManyToOne(targetEntity: Mensalidades::class)]
    #[ORM\JoinColumn(name: 'cd_mensalidade', referencedColumnName: 'cd_mensalidade', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Mensalidades $cdMensalidade = null;

    #[ORM\Column(name: 'tx_motivo_isencao', type: 'text', length: 65535, nullable: true)]
    private ?string $txMotivoIsencao = null;

    #[ORM\Column(name: 'cd_usuario_pagamento', type: 'integer', nullable: true)]
    private ?int $cdUsuarioPagamento = null;

    #[ORM\Column(name: 'dt_vencimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtVencimento = null;

    #[ORM\Column(name: 'db_valor_unitario', type: 'float', options: ['comment' => 'Campo que guardará o valor original da multa. O campo db_multa é sempre atualizado com o valor atualizado da multa quando ela é agrupada'])]
    private ?float $dbValorUnitario = null;

    public function __construct(
        ?BibEmprestimos $cdEmprestimo = null,
        ?\DateTimeInterface $dtMulta = null,
        ?float $dbValor = null,
        ?float $dbValorPago = null,
        ?\DateTimeInterface $dtPagamento = null,
        ?BibSituacoes $cdSituacao = null,
        ?Mensalidades $cdMensalidade = null,
        ?string $txMotivoIsencao = null,
        ?int $cdUsuarioPagamento = null,
        ?\DateTimeInterface $dtVencimento = null,
        ?float $dbValorUnitario = null
    ) {
        $this->cdEmprestimo = $cdEmprestimo;
        $this->dtMulta = $dtMulta;
        $this->dbValor = $dbValor;
        $this->dbValorPago = $dbValorPago;
        $this->dtPagamento = $dtPagamento;
        $this->cdSituacao = $cdSituacao;
        $this->cdMensalidade = $cdMensalidade;
        $this->txMotivoIsencao = $txMotivoIsencao;
        $this->cdUsuarioPagamento = $cdUsuarioPagamento;
        $this->dtVencimento = $dtVencimento;
        $this->dbValorUnitario = $dbValorUnitario;
    }

    public function getCdMulta(): ?int
    {
        return $this->cdMulta;
    }

    public function getCdEmprestimo(): ?BibEmprestimos
    {
        return $this->cdEmprestimo;
    }

    public function setCdEmprestimo(?BibEmprestimos $cdEmprestimo): self
    {
        $this->cdEmprestimo = $cdEmprestimo;
        return $this;
    }

    public function getDtMulta(): ?\DateTimeInterface
    {
        return $this->dtMulta;
    }

    public function setDtMulta(?\DateTimeInterface $dtMulta): self
    {
        $this->dtMulta = $dtMulta;
        return $this;
    }

    public function getDbValor(): ?float
    {
        return $this->dbValor;
    }

    public function setDbValor(?float $dbValor): self
    {
        $this->dbValor = $dbValor;
        return $this;
    }

    public function getDbValorPago(): ?float
    {
        return $this->dbValorPago;
    }

    public function setDbValorPago(?float $dbValorPago): self
    {
        $this->dbValorPago = $dbValorPago;
        return $this;
    }

    public function getDtPagamento(): ?\DateTimeInterface
    {
        return $this->dtPagamento;
    }

    public function setDtPagamento(?\DateTimeInterface $dtPagamento): self
    {
        $this->dtPagamento = $dtPagamento;
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

    public function getCdMensalidade(): ?Mensalidades
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?Mensalidades $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getTxMotivoIsencao(): ?string
    {
        return $this->txMotivoIsencao;
    }

    public function setTxMotivoIsencao(?string $txMotivoIsencao): self
    {
        $this->txMotivoIsencao = $txMotivoIsencao;
        return $this;
    }

    public function getCdUsuarioPagamento(): ?int
    {
        return $this->cdUsuarioPagamento;
    }

    public function setCdUsuarioPagamento(?int $cdUsuarioPagamento): self
    {
        $this->cdUsuarioPagamento = $cdUsuarioPagamento;
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

    public function getDbValorUnitario(): ?float
    {
        return $this->dbValorUnitario;
    }

    public function setDbValorUnitario(?float $dbValorUnitario): self
    {
        $this->dbValorUnitario = $dbValorUnitario;
        return $this;
    }
}

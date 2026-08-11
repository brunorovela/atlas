<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CtnMovimentacaoCreditoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CtnMovimentacaoCreditoRepository::class)]
#[ORM\Table(
    name: 'ctn_movimentacao_credito',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_USUARIO', columns: ['cd_usuario'])]
#[ORM\Index(name: 'ix_dt_base', columns: ['dt_base'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CANTINA_CREDITO_CD_PESSOA', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CtnMovimentacaoCredito
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_movimentacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMovimentacao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer')]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'tp_entrada_saida', type: 'enum', nullable: true, options: ['values' => ['1', '2']])]
    private ?string $tpEntradaSaida = null;

    #[ORM\Column(name: 'vl_valor', type: 'float', nullable: true)]
    private ?float $vlValor = null;

    #[ORM\Column(name: 'dt_acao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAcao = null;

    #[ORM\Column(name: 'tp_forma_pagamento', type: 'enum', nullable: true, options: ['default' => '1', 'values' => ['0', '1', '2']])]
    private ?string $tpFormaPagamento = '1';

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?int $cdUsuario = null,
        ?string $tpEntradaSaida = null,
        ?float $vlValor = null,
        ?\DateTimeInterface $dtAcao = null,
        ?string $tpFormaPagamento = '1',
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdUsuario = $cdUsuario;
        $this->tpEntradaSaida = $tpEntradaSaida;
        $this->vlValor = $vlValor;
        $this->dtAcao = $dtAcao;
        $this->tpFormaPagamento = $tpFormaPagamento;
        $this->dtBase = $dtBase;
    }

    public function getCdMovimentacao(): ?int
    {
        return $this->cdMovimentacao;
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

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    public function getTpEntradaSaida(): ?string
    {
        return $this->tpEntradaSaida;
    }

    public function setTpEntradaSaida(?string $tpEntradaSaida): self
    {
        $this->tpEntradaSaida = $tpEntradaSaida;
        return $this;
    }

    public function getVlValor(): ?float
    {
        return $this->vlValor;
    }

    public function setVlValor(?float $vlValor): self
    {
        $this->vlValor = $vlValor;
        return $this;
    }

    public function getDtAcao(): ?\DateTimeInterface
    {
        return $this->dtAcao;
    }

    public function setDtAcao(?\DateTimeInterface $dtAcao): self
    {
        $this->dtAcao = $dtAcao;
        return $this;
    }

    public function getTpFormaPagamento(): ?string
    {
        return $this->tpFormaPagamento;
    }

    public function setTpFormaPagamento(?string $tpFormaPagamento): self
    {
        $this->tpFormaPagamento = $tpFormaPagamento;
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

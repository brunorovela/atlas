<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CtnVendasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CtnVendasRepository::class)]
#[ORM\Table(
    name: 'ctn_vendas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_USUARIO', columns: ['cd_usuario'])]
#[ORM\Index(name: 'IX_CD_VENDA', columns: ['cd_venda'])]
#[ORM\Index(name: 'IX_CD_MOVIMENTACAO', columns: ['cd_movimentacao'])]
#[ORM\Index(name: 'ix_dt_base', columns: ['dt_base'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CANTINA_VENDA_CD_PESSOA', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CtnVendas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_venda', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdVenda = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer')]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'vl_total', type: 'float', nullable: true)]
    private ?float $vlTotal = null;

    #[ORM\Column(name: 'dt_operacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtOperacao = null;

    #[ORM\Column(name: 'sn_credito', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snCredito = true;

    #[ORM\Column(name: 'cd_movimentacao', type: 'integer', nullable: true)]
    private ?int $cdMovimentacao = null;

    #[ORM\Column(name: 'dt_check_operacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCheckOperacao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?int $cdUsuario = null,
        ?float $vlTotal = null,
        ?\DateTimeInterface $dtOperacao = null,
        ?bool $snCredito = true,
        ?int $cdMovimentacao = null,
        ?\DateTimeInterface $dtCheckOperacao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdUsuario = $cdUsuario;
        $this->vlTotal = $vlTotal;
        $this->dtOperacao = $dtOperacao;
        $this->snCredito = $snCredito;
        $this->cdMovimentacao = $cdMovimentacao;
        $this->dtCheckOperacao = $dtCheckOperacao;
        $this->dtBase = $dtBase;
    }

    public function getCdVenda(): ?int
    {
        return $this->cdVenda;
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

    public function getVlTotal(): ?float
    {
        return $this->vlTotal;
    }

    public function setVlTotal(?float $vlTotal): self
    {
        $this->vlTotal = $vlTotal;
        return $this;
    }

    public function getDtOperacao(): ?\DateTimeInterface
    {
        return $this->dtOperacao;
    }

    public function setDtOperacao(?\DateTimeInterface $dtOperacao): self
    {
        $this->dtOperacao = $dtOperacao;
        return $this;
    }

    public function isSnCredito(): ?bool
    {
        return $this->snCredito;
    }

    public function setSnCredito(?bool $snCredito): self
    {
        $this->snCredito = $snCredito;
        return $this;
    }

    public function getCdMovimentacao(): ?int
    {
        return $this->cdMovimentacao;
    }

    public function setCdMovimentacao(?int $cdMovimentacao): self
    {
        $this->cdMovimentacao = $cdMovimentacao;
        return $this;
    }

    public function getDtCheckOperacao(): ?\DateTimeInterface
    {
        return $this->dtCheckOperacao;
    }

    public function setDtCheckOperacao(?\DateTimeInterface $dtCheckOperacao): self
    {
        $this->dtCheckOperacao = $dtCheckOperacao;
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

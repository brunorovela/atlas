<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinMovTesourariaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinMovTesourariaRepository::class)]
#[ORM\Table(
    name: 'fin_mov_tesouraria',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TRANSFERE', columns: ['cd_transfere'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_CD_CAIXA', columns: ['cd_caixa'])]
#[ORM\Index(name: 'IX_CD_ABERTURA_CAIXA', columns: ['cd_abertura_caixa'])]
#[ORM\Index(name: 'IX_DT_MOVIMENTO', columns: ['dt_movimento'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
#[ORM\Index(name: 'IX_DT_COMPENSACAO', columns: ['dt_compensacao'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_MOEDA', columns: ['cd_moeda'])]
#[ORM\Index(name: 'IX_CD_CHEQUE', columns: ['cd_cheque'])]
#[ORM\Index(name: 'IX_CD_USUARIO', columns: ['cd_usuario'])]
#[ORM\Index(name: 'IX_CD_CARTAO', columns: ['cd_cartao'])]
class FinMovTesouraria
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_movimento_te', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMovimentoTe = null;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdColigada = 1;

    #[ORM\Column(name: 'cd_caixa', type: 'integer', nullable: true)]
    private ?int $cdCaixa = null;

    #[ORM\Column(name: 'cd_abertura_caixa', type: 'integer', nullable: true)]
    private ?int $cdAberturaCaixa = null;

    #[ORM\Column(name: 'dt_movimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtMovimento = null;

    #[ORM\Column(name: 'cd_acao', type: 'integer', nullable: true)]
    private ?int $cdAcao = null;

    #[ORM\Column(name: 'nr_documento', type: 'string', length: 50, nullable: true)]
    private ?string $nrDocumento = null;

    #[ORM\Column(name: 'ds_movimento', type: 'string', length: 255, nullable: true)]
    private ?string $dsMovimento = null;

    #[ORM\Column(name: 'dt_liberacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLiberacao = null;

    #[ORM\Column(name: 'cd_origem', type: 'boolean', nullable: true)]
    private ?bool $cdOrigem = null;

    #[ORM\Column(name: 'ds_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'tp_entrada_saida', type: 'boolean', nullable: true)]
    private ?bool $tpEntradaSaida = null;

    #[ORM\Column(name: 'vl_movimento', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $vlMovimento = 0.0;

    #[ORM\Column(name: 'cd_moeda', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdMoeda = 0;

    #[ORM\Column(name: 'vl_moeda', type: 'float', nullable: true)]
    private ?float $vlMoeda = null;

    #[ORM\Column(name: 'vl_saldo', type: 'float', nullable: true)]
    private ?float $vlSaldo = null;

    #[ORM\Column(name: 'vl_dinheiro', type: 'float', nullable: true)]
    private ?float $vlDinheiro = null;

    #[ORM\Column(name: 'vl_cheque', type: 'float', nullable: true)]
    private ?float $vlCheque = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdMensalidade = 0;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdUsuario = 0;

    #[ORM\Column(name: 'sn_compensado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snCompensado = 0;

    #[ORM\Column(name: 'dt_compensacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCompensacao = null;

    #[ORM\Column(name: 'cd_forma_pgto', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdFormaPgto = 0;

    #[ORM\Column(name: 'dt_registro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRegistro = null;

    #[ORM\Column(name: 'nr_cheque', type: 'integer', nullable: true)]
    private ?int $nrCheque = null;

    #[ORM\Column(name: 'vl_saldo_compensado', type: 'float', nullable: true)]
    private ?float $vlSaldoCompensado = null;

    #[ORM\Column(name: 'cd_titulo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTitulo = null;

    #[ORM\Column(name: 'nr_estorno', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrEstorno = 0;

    #[ORM\Column(name: 'cd_transfere', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdTransfere = 0;

    #[ORM\Column(name: 'cd_cheque', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdCheque = 0;

    #[ORM\Column(name: 'cd_cartao', type: 'integer', nullable: true)]
    private ?int $cdCartao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    // Sem construtor: 31 propriedades. Use os setters encadeados.

    public function getCdMovimentoTe(): ?int
    {
        return $this->cdMovimentoTe;
    }

    public function getCdColigada(): int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getCdCaixa(): ?int
    {
        return $this->cdCaixa;
    }

    public function setCdCaixa(?int $cdCaixa): self
    {
        $this->cdCaixa = $cdCaixa;
        return $this;
    }

    public function getCdAberturaCaixa(): ?int
    {
        return $this->cdAberturaCaixa;
    }

    public function setCdAberturaCaixa(?int $cdAberturaCaixa): self
    {
        $this->cdAberturaCaixa = $cdAberturaCaixa;
        return $this;
    }

    public function getDtMovimento(): ?\DateTimeInterface
    {
        return $this->dtMovimento;
    }

    public function setDtMovimento(?\DateTimeInterface $dtMovimento): self
    {
        $this->dtMovimento = $dtMovimento;
        return $this;
    }

    public function getCdAcao(): ?int
    {
        return $this->cdAcao;
    }

    public function setCdAcao(?int $cdAcao): self
    {
        $this->cdAcao = $cdAcao;
        return $this;
    }

    public function getNrDocumento(): ?string
    {
        return $this->nrDocumento;
    }

    public function setNrDocumento(?string $nrDocumento): self
    {
        $this->nrDocumento = $nrDocumento;
        return $this;
    }

    public function getDsMovimento(): ?string
    {
        return $this->dsMovimento;
    }

    public function setDsMovimento(?string $dsMovimento): self
    {
        $this->dsMovimento = $dsMovimento;
        return $this;
    }

    public function getDtLiberacao(): ?\DateTimeInterface
    {
        return $this->dtLiberacao;
    }

    public function setDtLiberacao(?\DateTimeInterface $dtLiberacao): self
    {
        $this->dtLiberacao = $dtLiberacao;
        return $this;
    }

    public function isCdOrigem(): ?bool
    {
        return $this->cdOrigem;
    }

    public function setCdOrigem(?bool $cdOrigem): self
    {
        $this->cdOrigem = $cdOrigem;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }

    public function isTpEntradaSaida(): ?bool
    {
        return $this->tpEntradaSaida;
    }

    public function setTpEntradaSaida(?bool $tpEntradaSaida): self
    {
        $this->tpEntradaSaida = $tpEntradaSaida;
        return $this;
    }

    public function getVlMovimento(): ?float
    {
        return $this->vlMovimento;
    }

    public function setVlMovimento(?float $vlMovimento): self
    {
        $this->vlMovimento = $vlMovimento;
        return $this;
    }

    public function getCdMoeda(): ?int
    {
        return $this->cdMoeda;
    }

    public function setCdMoeda(?int $cdMoeda): self
    {
        $this->cdMoeda = $cdMoeda;
        return $this;
    }

    public function getVlMoeda(): ?float
    {
        return $this->vlMoeda;
    }

    public function setVlMoeda(?float $vlMoeda): self
    {
        $this->vlMoeda = $vlMoeda;
        return $this;
    }

    public function getVlSaldo(): ?float
    {
        return $this->vlSaldo;
    }

    public function setVlSaldo(?float $vlSaldo): self
    {
        $this->vlSaldo = $vlSaldo;
        return $this;
    }

    public function getVlDinheiro(): ?float
    {
        return $this->vlDinheiro;
    }

    public function setVlDinheiro(?float $vlDinheiro): self
    {
        $this->vlDinheiro = $vlDinheiro;
        return $this;
    }

    public function getVlCheque(): ?float
    {
        return $this->vlCheque;
    }

    public function setVlCheque(?float $vlCheque): self
    {
        $this->vlCheque = $vlCheque;
        return $this;
    }

    public function getCdMensalidade(): int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getCdUsuario(): int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    public function getSnCompensado(): ?int
    {
        return $this->snCompensado;
    }

    public function setSnCompensado(?int $snCompensado): self
    {
        $this->snCompensado = $snCompensado;
        return $this;
    }

    public function getDtCompensacao(): ?\DateTimeInterface
    {
        return $this->dtCompensacao;
    }

    public function setDtCompensacao(?\DateTimeInterface $dtCompensacao): self
    {
        $this->dtCompensacao = $dtCompensacao;
        return $this;
    }

    public function getCdFormaPgto(): ?int
    {
        return $this->cdFormaPgto;
    }

    public function setCdFormaPgto(?int $cdFormaPgto): self
    {
        $this->cdFormaPgto = $cdFormaPgto;
        return $this;
    }

    public function getDtRegistro(): ?\DateTimeInterface
    {
        return $this->dtRegistro;
    }

    public function setDtRegistro(?\DateTimeInterface $dtRegistro): self
    {
        $this->dtRegistro = $dtRegistro;
        return $this;
    }

    public function getNrCheque(): ?int
    {
        return $this->nrCheque;
    }

    public function setNrCheque(?int $nrCheque): self
    {
        $this->nrCheque = $nrCheque;
        return $this;
    }

    public function getVlSaldoCompensado(): ?float
    {
        return $this->vlSaldoCompensado;
    }

    public function setVlSaldoCompensado(?float $vlSaldoCompensado): self
    {
        $this->vlSaldoCompensado = $vlSaldoCompensado;
        return $this;
    }

    public function getCdTitulo(): ?int
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(?int $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
        return $this;
    }

    public function getNrEstorno(): ?int
    {
        return $this->nrEstorno;
    }

    public function setNrEstorno(?int $nrEstorno): self
    {
        $this->nrEstorno = $nrEstorno;
        return $this;
    }

    public function getCdTransfere(): ?int
    {
        return $this->cdTransfere;
    }

    public function setCdTransfere(?int $cdTransfere): self
    {
        $this->cdTransfere = $cdTransfere;
        return $this;
    }

    public function getCdCheque(): ?int
    {
        return $this->cdCheque;
    }

    public function setCdCheque(?int $cdCheque): self
    {
        $this->cdCheque = $cdCheque;
        return $this;
    }

    public function getCdCartao(): ?int
    {
        return $this->cdCartao;
    }

    public function setCdCartao(?int $cdCartao): self
    {
        $this->cdCartao = $cdCartao;
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

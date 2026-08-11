<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinContabilRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinContabilRepository::class)]
#[ORM\Table(
    name: 'fin_contabil',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Armazena os lancamentos contabeis']
)]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_DT_MOVIMENTO', columns: ['dt_movimento'])]
#[ORM\Index(name: 'IX_CD_DEBITO', columns: ['cd_debito'])]
#[ORM\Index(name: 'IX_CD_CREDITO', columns: ['cd_credito'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
class FinContabil
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_lancamento', type: 'integer', options: ['unsigned' => true, 'comment' => 'Chave primaria de controle'])]
    private ?int $cdLancamento = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', options: ['unsigned' => true, 'comment' => 'Coligada dos lancamentos'])]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'cd_chave', type: 'integer', options: ['unsigned' => true, 'comment' => 'Chave de agrupamento'])]
    private ?int $cdChave = null;

    #[ORM\Column(name: 'dt_movimento', type: 'date', options: ['comment' => 'Data do movimento contabil'])]
    private ?\DateTimeInterface $dtMovimento = null;

    #[ORM\Column(name: 'cd_debito', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'Conta debito'])]
    private ?int $cdDebito = null;

    #[ORM\Column(name: 'cd_credito', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'Conta credito'])]
    private ?int $cdCredito = null;

    #[ORM\Column(name: 'vl_movimento', type: 'float', options: ['comment' => 'Valor do Movimento'])]
    private ?float $vlMovimento = null;

    #[ORM\Column(name: 'cd_historico', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'Codigo do Historico'])]
    private ?int $cdHistorico = null;

    #[ORM\Column(name: 'ds_historico', type: 'string', length: 250, nullable: true, options: ['comment' => 'Complemento do Historico'])]
    private ?string $dsHistorico = null;

    #[ORM\Column(name: 'cd_origem', type: 'string', length: 2, options: ['fixed' => true, 'comment' => 'CR = Contas a Receber; CP = Contas Pagar; TE = Tesouraria e CO = Manual Contabil'])]
    private ?string $cdOrigem = null;

    #[ORM\Column(name: 'cd_operacao', type: 'string', length: 2, options: ['fixed' => true, 'comment' => 'FAturamento; BAixa; DEsconto; CAncelamento'])]
    private ?string $cdOperacao = null;

    #[ORM\Column(name: 'cd_titulo', type: 'integer', options: ['comment' => 'Chave de ligacao com a origem'])]
    private ?int $cdTitulo = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true, options: ['comment' => 'Código so usuário que inseriu o lançamento manual'])]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'cd_criterio_apropria', type: 'integer', nullable: true)]
    private ?int $cdCriterioApropria = null;

    #[ORM\Column(name: 'cd_chave_aux', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdChaveAux = null;

    public function __construct(
        ?int $cdColigada = null,
        ?int $cdChave = null,
        ?\DateTimeInterface $dtMovimento = null,
        ?int $cdDebito = null,
        ?int $cdCredito = null,
        ?float $vlMovimento = null,
        ?int $cdHistorico = null,
        ?string $dsHistorico = null,
        ?string $cdOrigem = null,
        ?string $cdOperacao = null,
        ?int $cdTitulo = null,
        ?int $cdUsuario = null,
        ?int $cdCriterioApropria = null,
        ?int $cdChaveAux = null
    ) {
        $this->cdColigada = $cdColigada;
        $this->cdChave = $cdChave;
        $this->dtMovimento = $dtMovimento;
        $this->cdDebito = $cdDebito;
        $this->cdCredito = $cdCredito;
        $this->vlMovimento = $vlMovimento;
        $this->cdHistorico = $cdHistorico;
        $this->dsHistorico = $dsHistorico;
        $this->cdOrigem = $cdOrigem;
        $this->cdOperacao = $cdOperacao;
        $this->cdTitulo = $cdTitulo;
        $this->cdUsuario = $cdUsuario;
        $this->cdCriterioApropria = $cdCriterioApropria;
        $this->cdChaveAux = $cdChaveAux;
    }

    public function getCdLancamento(): ?int
    {
        return $this->cdLancamento;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getCdChave(): ?int
    {
        return $this->cdChave;
    }

    public function setCdChave(?int $cdChave): self
    {
        $this->cdChave = $cdChave;
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

    public function getCdDebito(): ?int
    {
        return $this->cdDebito;
    }

    public function setCdDebito(?int $cdDebito): self
    {
        $this->cdDebito = $cdDebito;
        return $this;
    }

    public function getCdCredito(): ?int
    {
        return $this->cdCredito;
    }

    public function setCdCredito(?int $cdCredito): self
    {
        $this->cdCredito = $cdCredito;
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

    public function getCdHistorico(): ?int
    {
        return $this->cdHistorico;
    }

    public function setCdHistorico(?int $cdHistorico): self
    {
        $this->cdHistorico = $cdHistorico;
        return $this;
    }

    public function getDsHistorico(): ?string
    {
        return $this->dsHistorico;
    }

    public function setDsHistorico(?string $dsHistorico): self
    {
        $this->dsHistorico = $dsHistorico;
        return $this;
    }

    public function getCdOrigem(): ?string
    {
        return $this->cdOrigem;
    }

    public function setCdOrigem(?string $cdOrigem): self
    {
        $this->cdOrigem = $cdOrigem;
        return $this;
    }

    public function getCdOperacao(): ?string
    {
        return $this->cdOperacao;
    }

    public function setCdOperacao(?string $cdOperacao): self
    {
        $this->cdOperacao = $cdOperacao;
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

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    public function getCdCriterioApropria(): ?int
    {
        return $this->cdCriterioApropria;
    }

    public function setCdCriterioApropria(?int $cdCriterioApropria): self
    {
        $this->cdCriterioApropria = $cdCriterioApropria;
        return $this;
    }

    public function getCdChaveAux(): ?int
    {
        return $this->cdChaveAux;
    }

    public function setCdChaveAux(?int $cdChaveAux): self
    {
        $this->cdChaveAux = $cdChaveAux;
        return $this;
    }
}

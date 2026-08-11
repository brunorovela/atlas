<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinContasPagarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinContasPagarRepository::class)]
#[ORM\Table(
    name: 'fin_contas_pagar',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_AUTORIZA', columns: ['cd_autoriza'])]
#[ORM\Index(name: 'IX_DT_PROVAVEL_PGTO', columns: ['dt_provavel_pgto'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_DT_PAGAMENTO', columns: ['dt_pagamento'])]
#[ORM\Index(name: 'IX_CD_TITULO_ORIGEM', columns: ['cd_titulo_origem'])]
#[ORM\Index(name: 'IX_CD_TITULO_PRINCIPAL', columns: ['cd_titulo_principal'])]
#[EsquemaFisico(
    chavesEstrangeiras: [],
    autoIncremento: ['cd_titulo']
)]
class FinContasPagar
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_titulo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTitulo = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['default' => '1'])]
    private int $cdColigada = 1;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'ds_despesa', type: 'string', length: 255, nullable: true)]
    private ?string $dsDespesa = null;

    #[ORM\Column(name: 'nr_documento', type: 'string', length: 50, nullable: true)]
    private ?string $nrDocumento = null;

    #[ORM\Column(name: 'nr_parcela', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrParcela = null;

    #[ORM\Column(name: 'dt_emissao_nota', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEmissaoNota = null;

    #[ORM\Column(name: 'dt_lancamento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLancamento = null;

    #[ORM\Column(name: 'dt_competencia', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCompetencia = null;

    #[ORM\Column(name: 'dt_vencimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtVencimento = null;

    #[ORM\Column(name: 'dt_provavel_pgto', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtProvavelPgto = null;

    #[ORM\Column(name: 'dt_pagamento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPagamento = null;

    #[ORM\Column(name: 'vl_despesa', type: 'float', nullable: true)]
    private ?float $vlDespesa = null;

    #[ORM\Column(name: 'cd_situacao', type: 'smallint', nullable: true)]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'sn_previsao', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snPrevisao = 'N';

    #[ORM\Column(name: 'cd_tipo_titulo', type: 'smallint', nullable: true)]
    private ?int $cdTipoTitulo = null;

    #[ORM\Column(name: 'tp_entrada_saida', type: 'smallint', nullable: true)]
    private ?int $tpEntradaSaida = null;

    #[ORM\Column(name: 'cd_forma_pgto', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdFormaPgto = 0;

    #[ORM\Column(name: 'nr_cheque', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrCheque = null;

    #[ORM\Column(name: 'cd_caixa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCaixa = null;

    #[ORM\Column(name: 'cd_titulo_origem', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdTituloOrigem = 0;

    #[ORM\Column(name: 'cd_autoriza', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdAutoriza = 0;

    #[ORM\Column(name: 'ds_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'cd_titulo_principal', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTituloPrincipal = null;

    #[ORM\Column(name: 'sn_nf_entregue', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snNfEntregue = false;

    #[ORM\Column(name: 'vl_abatimento', type: 'float', nullable: true)]
    private ?float $vlAbatimento = null;

    #[ORM\Column(name: 'vl_desconto', type: 'float', nullable: true)]
    private ?float $vlDesconto = null;

    #[ORM\Column(name: 'vl_mora', type: 'float', nullable: true)]
    private ?float $vlMora = null;

    #[ORM\Column(name: 'vl_multa', type: 'float', nullable: true)]
    private ?float $vlMulta = null;

    #[ORM\Column(name: 'ds_historico', type: 'string', length: 255, nullable: true)]
    private ?string $dsHistorico = null;

    #[ORM\Column(name: 'nr_banco', type: 'string', length: 3, nullable: true)]
    private ?string $nrBanco = null;

    #[ORM\Column(name: 'nr_agencia', type: 'string', length: 50, nullable: true)]
    private ?string $nrAgencia = null;

    #[ORM\Column(name: 'nr_conta', type: 'string', length: 50, nullable: true)]
    private ?string $nrConta = null;

    #[ORM\Column(name: 'ds_receita_tributo', type: 'string', length: 50, nullable: true)]
    private ?string $dsReceitaTributo = null;

    #[ORM\Column(name: 'ds_referencia', type: 'string', length: 50, nullable: true)]
    private ?string $dsReferencia = null;

    #[ORM\Column(name: 'vl_previsto_pgto_inss', type: 'float', nullable: true)]
    private ?float $vlPrevistoPgtoInss = null;

    #[ORM\Column(name: 'vl_outras_entidades', type: 'float', nullable: true)]
    private ?float $vlOutrasEntidades = null;

    #[ORM\Column(name: 'vl_atualizacao_motenaria', type: 'float', nullable: true)]
    private ?float $vlAtualizacaoMotenaria = null;

    #[ORM\Column(name: 'vl_total_despesa', type: 'float', nullable: true)]
    private ?float $vlTotalDespesa = null;

    #[ORM\Column(name: 'ds_cod_barras', type: 'string', length: 50, nullable: true)]
    private ?string $dsCodBarras = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50, nullable: true)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', nullable: true)]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'nr_anosemestre_disciplina', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestreDisciplina = null;

    #[ORM\Column(name: 'cd_remessa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdRemessa = null;

    #[ORM\Column(name: 'cd_historico', type: 'integer', nullable: true)]
    private ?int $cdHistorico = null;

    // Sem construtor: 45 propriedades. Use os setters encadeados.

    public function getCdTitulo(): ?int
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(?int $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
        return $this;
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

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getDsDespesa(): ?string
    {
        return $this->dsDespesa;
    }

    public function setDsDespesa(?string $dsDespesa): self
    {
        $this->dsDespesa = $dsDespesa;
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

    public function getNrParcela(): ?int
    {
        return $this->nrParcela;
    }

    public function setNrParcela(?int $nrParcela): self
    {
        $this->nrParcela = $nrParcela;
        return $this;
    }

    public function getDtEmissaoNota(): ?\DateTimeInterface
    {
        return $this->dtEmissaoNota;
    }

    public function setDtEmissaoNota(?\DateTimeInterface $dtEmissaoNota): self
    {
        $this->dtEmissaoNota = $dtEmissaoNota;
        return $this;
    }

    public function getDtLancamento(): ?\DateTimeInterface
    {
        return $this->dtLancamento;
    }

    public function setDtLancamento(?\DateTimeInterface $dtLancamento): self
    {
        $this->dtLancamento = $dtLancamento;
        return $this;
    }

    public function getDtCompetencia(): ?\DateTimeInterface
    {
        return $this->dtCompetencia;
    }

    public function setDtCompetencia(?\DateTimeInterface $dtCompetencia): self
    {
        $this->dtCompetencia = $dtCompetencia;
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

    public function getDtProvavelPgto(): ?\DateTimeInterface
    {
        return $this->dtProvavelPgto;
    }

    public function setDtProvavelPgto(?\DateTimeInterface $dtProvavelPgto): self
    {
        $this->dtProvavelPgto = $dtProvavelPgto;
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

    public function getVlDespesa(): ?float
    {
        return $this->vlDespesa;
    }

    public function setVlDespesa(?float $vlDespesa): self
    {
        $this->vlDespesa = $vlDespesa;
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

    public function getSnPrevisao(): ?string
    {
        return $this->snPrevisao;
    }

    public function setSnPrevisao(?string $snPrevisao): self
    {
        $this->snPrevisao = $snPrevisao;
        return $this;
    }

    public function getCdTipoTitulo(): ?int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(?int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
        return $this;
    }

    public function getTpEntradaSaida(): ?int
    {
        return $this->tpEntradaSaida;
    }

    public function setTpEntradaSaida(?int $tpEntradaSaida): self
    {
        $this->tpEntradaSaida = $tpEntradaSaida;
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

    public function getNrCheque(): ?int
    {
        return $this->nrCheque;
    }

    public function setNrCheque(?int $nrCheque): self
    {
        $this->nrCheque = $nrCheque;
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

    public function getCdTituloOrigem(): int
    {
        return $this->cdTituloOrigem;
    }

    public function setCdTituloOrigem(int $cdTituloOrigem): self
    {
        $this->cdTituloOrigem = $cdTituloOrigem;
        return $this;
    }

    public function getCdAutoriza(): ?int
    {
        return $this->cdAutoriza;
    }

    public function setCdAutoriza(?int $cdAutoriza): self
    {
        $this->cdAutoriza = $cdAutoriza;
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

    public function getCdTituloPrincipal(): ?int
    {
        return $this->cdTituloPrincipal;
    }

    public function setCdTituloPrincipal(?int $cdTituloPrincipal): self
    {
        $this->cdTituloPrincipal = $cdTituloPrincipal;
        return $this;
    }

    public function isSnNfEntregue(): ?bool
    {
        return $this->snNfEntregue;
    }

    public function setSnNfEntregue(?bool $snNfEntregue): self
    {
        $this->snNfEntregue = $snNfEntregue;
        return $this;
    }

    public function getVlAbatimento(): ?float
    {
        return $this->vlAbatimento;
    }

    public function setVlAbatimento(?float $vlAbatimento): self
    {
        $this->vlAbatimento = $vlAbatimento;
        return $this;
    }

    public function getVlDesconto(): ?float
    {
        return $this->vlDesconto;
    }

    public function setVlDesconto(?float $vlDesconto): self
    {
        $this->vlDesconto = $vlDesconto;
        return $this;
    }

    public function getVlMora(): ?float
    {
        return $this->vlMora;
    }

    public function setVlMora(?float $vlMora): self
    {
        $this->vlMora = $vlMora;
        return $this;
    }

    public function getVlMulta(): ?float
    {
        return $this->vlMulta;
    }

    public function setVlMulta(?float $vlMulta): self
    {
        $this->vlMulta = $vlMulta;
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

    public function getNrBanco(): ?string
    {
        return $this->nrBanco;
    }

    public function setNrBanco(?string $nrBanco): self
    {
        $this->nrBanco = $nrBanco;
        return $this;
    }

    public function getNrAgencia(): ?string
    {
        return $this->nrAgencia;
    }

    public function setNrAgencia(?string $nrAgencia): self
    {
        $this->nrAgencia = $nrAgencia;
        return $this;
    }

    public function getNrConta(): ?string
    {
        return $this->nrConta;
    }

    public function setNrConta(?string $nrConta): self
    {
        $this->nrConta = $nrConta;
        return $this;
    }

    public function getDsReceitaTributo(): ?string
    {
        return $this->dsReceitaTributo;
    }

    public function setDsReceitaTributo(?string $dsReceitaTributo): self
    {
        $this->dsReceitaTributo = $dsReceitaTributo;
        return $this;
    }

    public function getDsReferencia(): ?string
    {
        return $this->dsReferencia;
    }

    public function setDsReferencia(?string $dsReferencia): self
    {
        $this->dsReferencia = $dsReferencia;
        return $this;
    }

    public function getVlPrevistoPgtoInss(): ?float
    {
        return $this->vlPrevistoPgtoInss;
    }

    public function setVlPrevistoPgtoInss(?float $vlPrevistoPgtoInss): self
    {
        $this->vlPrevistoPgtoInss = $vlPrevistoPgtoInss;
        return $this;
    }

    public function getVlOutrasEntidades(): ?float
    {
        return $this->vlOutrasEntidades;
    }

    public function setVlOutrasEntidades(?float $vlOutrasEntidades): self
    {
        $this->vlOutrasEntidades = $vlOutrasEntidades;
        return $this;
    }

    public function getVlAtualizacaoMotenaria(): ?float
    {
        return $this->vlAtualizacaoMotenaria;
    }

    public function setVlAtualizacaoMotenaria(?float $vlAtualizacaoMotenaria): self
    {
        $this->vlAtualizacaoMotenaria = $vlAtualizacaoMotenaria;
        return $this;
    }

    public function getVlTotalDespesa(): ?float
    {
        return $this->vlTotalDespesa;
    }

    public function setVlTotalDespesa(?float $vlTotalDespesa): self
    {
        $this->vlTotalDespesa = $vlTotalDespesa;
        return $this;
    }

    public function getDsCodBarras(): ?string
    {
        return $this->dsCodBarras;
    }

    public function setDsCodBarras(?string $dsCodBarras): self
    {
        $this->dsCodBarras = $dsCodBarras;
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

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function getNrAnosemestreDisciplina(): ?int
    {
        return $this->nrAnosemestreDisciplina;
    }

    public function setNrAnosemestreDisciplina(?int $nrAnosemestreDisciplina): self
    {
        $this->nrAnosemestreDisciplina = $nrAnosemestreDisciplina;
        return $this;
    }

    public function getCdRemessa(): ?int
    {
        return $this->cdRemessa;
    }

    public function setCdRemessa(?int $cdRemessa): self
    {
        $this->cdRemessa = $cdRemessa;
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
}

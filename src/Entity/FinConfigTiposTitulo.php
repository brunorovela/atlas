<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\FinConfigTiposTituloRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinConfigTiposTituloRepository::class)]
#[ORM\Table(
    name: 'fin_config_tipos_titulo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_CD_TIPO_TITULO_CD_COLIGADA_MATRIZ', columns: ['cd_tipo_titulo', 'cd_coligada_matriz'])]
#[ORM\Index(name: 'IX_CD_TIPO_TITULO', columns: ['cd_tipo_titulo'])]
#[ORM\Index(name: 'IX_CD_COLIGADA_MATRIZ', columns: ['cd_coligada_matriz'])]
#[ORM\Index(name: 'IX_CD_CONTA', columns: ['cd_conta'])]
#[ORM\Index(name: 'IX_CD_PADRAO', columns: ['cd_padrao'])]
#[ORM\Index(name: 'cd_responsavel', columns: ['cd_responsavel'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fin_config_tipos_titulo_ibfk_1', 'colunas' => ['cd_responsavel'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinConfigTiposTitulo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_tipo_titulo', type: 'integer')]
    private ?int $idTipoTitulo = null;

    #[ORM\Column(name: 'cd_tipo_titulo', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdTipoTitulo = null;

    #[ORM\Column(name: 'cd_coligada_matriz', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdColigadaMatriz = null;

    #[ORM\Column(name: 'ds_tipo_titulo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTipoTitulo = null;

    #[ORM\Column(name: 'ct_tipo_titulo', type: 'smallint', nullable: true)]
    private ?int $ctTipoTitulo = null;

    #[ORM\Column(name: 'cd_conta', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdConta = 0;

    #[ORM\Column(name: 'cd_padrao', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdPadrao = 0;

    #[ORM\Column(name: 'vl_padrao', type: 'float', nullable: true)]
    private ?float $vlPadrao = null;

    #[ORM\Column(name: 'cd_conta_debito', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdContaDebito = 0;

    #[ORM\Column(name: 'nr_parcela', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $nrParcela = 1;

    #[ORM\Column(name: 'sn_faturamento', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snFaturamento = 1;

    #[ORM\Column(name: 'ds_grupo_boleto', type: 'string', length: 5, nullable: true, options: ['default' => 'A'])]
    private ?string $dsGrupoBoleto = 'A';

    #[ORM\Column(name: 'sn_libera_juros', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snLiberaJuros = 0;

    #[ORM\Column(name: 'dt_padrao_geracao', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtPadraoGeracao = null;

    #[ORM\Column(name: 'cd_titulo_banco', type: 'string', length: 50, nullable: true)]
    private ?string $cdTituloBanco = null;

    #[ORM\Column(name: 'cd_nfe_g2ka_servico_titulo', type: 'integer', nullable: true)]
    private ?int $cdNfeG2kaServicoTitulo = null;

    #[ORM\Column(name: 'cd_servico_iss', type: 'string', length: 20, nullable: true)]
    private ?string $cdServicoIss = null;

    #[ORM\Column(name: 'cd_conta_cancel', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $cdContaCancel = 1;

    #[ORM\Column(name: 'cd_historico_fatura', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdHistoricoFatura = null;

    #[ORM\Column(name: 'ds_historico_fatura', type: 'string', length: 250, nullable: true)]
    private ?string $dsHistoricoFatura = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', options: ['default' => '1'])]
    private bool $snAtivo = true;

    #[ORM\Column(name: 'sn_cobranca_unica', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snCobrancaUnica = 0;

    #[ORM\Column(name: 'SN_MANTER_NUMERO_PARCELA', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snManterNumeroParcela = 0;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_responsavel', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdResponsavel = null;

    #[ORM\Column(name: 'sn_numero_doc_distinto', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snNumeroDocDistinto = false;

    #[ORM\Column(name: 'sn_libera_regra_lms', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snLiberaRegraLms = 0;

    #[ORM\Column(name: 'sn_mostra_imposto_renda', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snMostraImpostoRenda = false;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    // Sem construtor: 27 propriedades. Use os setters encadeados.

    public function getIdTipoTitulo(): ?int
    {
        return $this->idTipoTitulo;
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

    public function getCdColigadaMatriz(): ?int
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?int $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }

    public function getDsTipoTitulo(): ?string
    {
        return $this->dsTipoTitulo;
    }

    public function setDsTipoTitulo(?string $dsTipoTitulo): self
    {
        $this->dsTipoTitulo = $dsTipoTitulo;
        return $this;
    }

    public function getCtTipoTitulo(): ?int
    {
        return $this->ctTipoTitulo;
    }

    public function setCtTipoTitulo(?int $ctTipoTitulo): self
    {
        $this->ctTipoTitulo = $ctTipoTitulo;
        return $this;
    }

    public function getCdConta(): ?int
    {
        return $this->cdConta;
    }

    public function setCdConta(?int $cdConta): self
    {
        $this->cdConta = $cdConta;
        return $this;
    }

    public function getCdPadrao(): ?int
    {
        return $this->cdPadrao;
    }

    public function setCdPadrao(?int $cdPadrao): self
    {
        $this->cdPadrao = $cdPadrao;
        return $this;
    }

    public function getVlPadrao(): ?float
    {
        return $this->vlPadrao;
    }

    public function setVlPadrao(?float $vlPadrao): self
    {
        $this->vlPadrao = $vlPadrao;
        return $this;
    }

    public function getCdContaDebito(): ?int
    {
        return $this->cdContaDebito;
    }

    public function setCdContaDebito(?int $cdContaDebito): self
    {
        $this->cdContaDebito = $cdContaDebito;
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

    public function getSnFaturamento(): ?int
    {
        return $this->snFaturamento;
    }

    public function setSnFaturamento(?int $snFaturamento): self
    {
        $this->snFaturamento = $snFaturamento;
        return $this;
    }

    public function getDsGrupoBoleto(): ?string
    {
        return $this->dsGrupoBoleto;
    }

    public function setDsGrupoBoleto(?string $dsGrupoBoleto): self
    {
        $this->dsGrupoBoleto = $dsGrupoBoleto;
        return $this;
    }

    public function getSnLiberaJuros(): ?int
    {
        return $this->snLiberaJuros;
    }

    public function setSnLiberaJuros(?int $snLiberaJuros): self
    {
        $this->snLiberaJuros = $snLiberaJuros;
        return $this;
    }

    public function getDtPadraoGeracao(): ?\DateTimeInterface
    {
        return $this->dtPadraoGeracao;
    }

    public function setDtPadraoGeracao(?\DateTimeInterface $dtPadraoGeracao): self
    {
        $this->dtPadraoGeracao = $dtPadraoGeracao;
        return $this;
    }

    public function getCdTituloBanco(): ?string
    {
        return $this->cdTituloBanco;
    }

    public function setCdTituloBanco(?string $cdTituloBanco): self
    {
        $this->cdTituloBanco = $cdTituloBanco;
        return $this;
    }

    public function getCdNfeG2kaServicoTitulo(): ?int
    {
        return $this->cdNfeG2kaServicoTitulo;
    }

    public function setCdNfeG2kaServicoTitulo(?int $cdNfeG2kaServicoTitulo): self
    {
        $this->cdNfeG2kaServicoTitulo = $cdNfeG2kaServicoTitulo;
        return $this;
    }

    public function getCdServicoIss(): ?string
    {
        return $this->cdServicoIss;
    }

    public function setCdServicoIss(?string $cdServicoIss): self
    {
        $this->cdServicoIss = $cdServicoIss;
        return $this;
    }

    public function getCdContaCancel(): ?int
    {
        return $this->cdContaCancel;
    }

    public function setCdContaCancel(?int $cdContaCancel): self
    {
        $this->cdContaCancel = $cdContaCancel;
        return $this;
    }

    public function getCdHistoricoFatura(): ?int
    {
        return $this->cdHistoricoFatura;
    }

    public function setCdHistoricoFatura(?int $cdHistoricoFatura): self
    {
        $this->cdHistoricoFatura = $cdHistoricoFatura;
        return $this;
    }

    public function getDsHistoricoFatura(): ?string
    {
        return $this->dsHistoricoFatura;
    }

    public function setDsHistoricoFatura(?string $dsHistoricoFatura): self
    {
        $this->dsHistoricoFatura = $dsHistoricoFatura;
        return $this;
    }

    public function isSnAtivo(): bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getSnCobrancaUnica(): int
    {
        return $this->snCobrancaUnica;
    }

    public function setSnCobrancaUnica(int $snCobrancaUnica): self
    {
        $this->snCobrancaUnica = $snCobrancaUnica;
        return $this;
    }

    public function getSnManterNumeroParcela(): ?int
    {
        return $this->snManterNumeroParcela;
    }

    public function setSnManterNumeroParcela(?int $snManterNumeroParcela): self
    {
        $this->snManterNumeroParcela = $snManterNumeroParcela;
        return $this;
    }

    public function getCdResponsavel(): ?Pessoas
    {
        return $this->cdResponsavel;
    }

    public function setCdResponsavel(?Pessoas $cdResponsavel): self
    {
        $this->cdResponsavel = $cdResponsavel;
        return $this;
    }

    public function isSnNumeroDocDistinto(): ?bool
    {
        return $this->snNumeroDocDistinto;
    }

    public function setSnNumeroDocDistinto(?bool $snNumeroDocDistinto): self
    {
        $this->snNumeroDocDistinto = $snNumeroDocDistinto;
        return $this;
    }

    public function getSnLiberaRegraLms(): ?int
    {
        return $this->snLiberaRegraLms;
    }

    public function setSnLiberaRegraLms(?int $snLiberaRegraLms): self
    {
        $this->snLiberaRegraLms = $snLiberaRegraLms;
        return $this;
    }

    public function isSnMostraImpostoRenda(): ?bool
    {
        return $this->snMostraImpostoRenda;
    }

    public function setSnMostraImpostoRenda(?bool $snMostraImpostoRenda): self
    {
        $this->snMostraImpostoRenda = $snMostraImpostoRenda;
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

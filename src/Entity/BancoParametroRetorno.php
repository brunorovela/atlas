<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BancoParametroRetornoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BancoParametroRetornoRepository::class)]
#[ORM\Table(
    name: 'banco_parametro_retorno',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_BANCO', columns: ['cd_banco'])]
#[ORM\Index(name: 'IX_DS_LAYOUT', columns: ['ds_layout'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'])]
class BancoParametroRetorno
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_banco', type: 'string', length: 3, options: ['fixed' => true, 'default' => ''])]
    private string $cdBanco = '';

    #[ORM\Id]
    #[ORM\Column(name: 'ds_layout', type: 'string', length: 20, options: ['default' => ''])]
    private string $dsLayout = '';

    #[ORM\Column(name: 'layout_inicio', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $layoutInicio = 0;

    #[ORM\Column(name: 'layout_tam', type: 'smallint', options: ['default' => '0'])]
    private int $layoutTam = 0;

    #[ORM\Column(name: 'nm_banco', type: 'string', length: 50, nullable: true)]
    private ?string $nmBanco = null;

    #[ORM\Column(name: 'nn_inicio', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $nnInicio = 0;

    #[ORM\Column(name: 'nn_tam', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nnTam = 0;

    #[ORM\Column(name: 'banco_inicio', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $bancoInicio = 0;

    #[ORM\Column(name: 'banco_tam', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $bancoTam = 0;

    #[ORM\Column(name: 'retorno_inicio', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $retornoInicio = 0;

    #[ORM\Column(name: 'ocorre_inicio', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $ocorreInicio = 0;

    #[ORM\Column(name: 'ocorre_tam', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $ocorreTam = 0;

    #[ORM\Column(name: 'vl_titulo_inicio', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $vlTituloInicio = 0;

    #[ORM\Column(name: 'vl_titulo_tam', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $vlTituloTam = 0;

    #[ORM\Column(name: 'vl_pago_inicio', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $vlPagoInicio = 0;

    #[ORM\Column(name: 'vl_pago_tam', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $vlPagoTam = 0;

    #[ORM\Column(name: 'vl_acresc_inicio', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $vlAcrescInicio = 0;

    #[ORM\Column(name: 'vl_acresc_tam', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $vlAcrescTam = 0;

    #[ORM\Column(name: 'sequencia_inicio', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $sequenciaInicio = 0;

    #[ORM\Column(name: 'sequencia_tam', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $sequenciaTam = 0;

    #[ORM\Column(name: 'dt_pgto_inicio', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $dtPgtoInicio = 0;

    #[ORM\Column(name: 'dt_pgto_tam', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $dtPgtoTam = 0;

    #[ORM\Column(name: 'nr_linha_header', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrLinhaHeader = 0;

    #[ORM\Column(name: 'nr_linha_trailer', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrLinhaTrailer = 0;

    #[ORM\Column(name: 'nr_linha_registro', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrLinhaRegistro = 0;

    #[ORM\Column(name: 'conta_inicio', type: 'smallint', nullable: true)]
    private ?int $contaInicio = null;

    #[ORM\Column(name: 'conta_tam', type: 'smallint', nullable: true)]
    private ?int $contaTam = null;

    #[ORM\Column(name: 'motivo_inicio', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $motivoInicio = 0;

    #[ORM\Column(name: 'motivo_tam', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $motivoTam = 0;

    #[ORM\Column(name: 'tarifa_inicio', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $tarifaInicio = 0;

    #[ORM\Column(name: 'tarifa_inicio2', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $tarifaInicio2 = 0;

    #[ORM\Column(name: 'tarifa_tam', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $tarifaTam = 0;

    #[ORM\Column(name: 'tarifa_tam2', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $tarifaTam2 = 0;

    #[ORM\Column(name: 'sn_acrescimo_separado', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $snAcrescimoSeparado = 0;

    #[ORM\Column(name: 'dt_pgto_formado', type: 'string', length: 3, nullable: true, options: ['fixed' => true, 'default' => 'dma'])]
    private ?string $dtPgtoFormado = 'dma';

    #[ORM\Column(name: 'dt_credito_inicio', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $dtCreditoInicio = 0;

    #[ORM\Column(name: 'dt_credito_tam', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $dtCreditoTam = 0;

    #[ORM\Column(name: 'dt_credito_formato', type: 'string', length: 3, nullable: true, options: ['fixed' => true, 'default' => 'dma'])]
    private ?string $dtCreditoFormato = 'dma';

    #[ORM\Column(name: 'nn_inicio_barras', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nnInicioBarras = 0;

    #[ORM\Column(name: 'nn_tam_barras', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nnTamBarras = 0;

    #[ORM\Column(name: 'linha_ignorar_inicio', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $linhaIgnorarInicio = 0;

    #[ORM\Column(name: 'linha_ignorar_tamanho', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $linhaIgnorarTamanho = null;

    #[ORM\Column(name: 'linha_ignorar_texto', type: 'string', length: 100, nullable: true)]
    private ?string $linhaIgnorarTexto = null;

    #[ORM\Column(name: 'carteira_inicio', type: 'smallint', nullable: true)]
    private ?int $carteiraInicio = null;

    #[ORM\Column(name: 'cateira_tam', type: 'smallint', nullable: true)]
    private ?int $cateiraTam = null;

    #[ORM\Column(name: 'nn_inicio2', type: 'smallint', nullable: true)]
    private ?int $nnInicio2 = null;

    #[ORM\Column(name: 'nn_tam2', type: 'smallint', nullable: true)]
    private ?int $nnTam2 = null;

    #[ORM\Column(name: 'carteira_nn1', type: 'string', length: 10, nullable: true)]
    private ?string $carteiraNn1 = null;

    #[ORM\Column(name: 'carteira_nn2', type: 'string', length: 10, nullable: true)]
    private ?string $carteiraNn2 = null;

    #[ORM\Column(name: 'fl_dt_pgto_inicio', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $flDtPgtoInicio = 0;

    #[ORM\Column(name: 'fl_dt_pgto', type: 'string', length: 10, nullable: true, options: ['comment' => 'Se encontrar este valor, baixar na data de pagamento'])]
    private ?string $flDtPgto = null;

    #[ORM\Column(name: 'ds_separador_colunas', type: 'string', length: 5, nullable: true, options: ['fixed' => true, 'comment' => 'Define se terá algum separador de colunas. Exemplo: Se o arquivo for CSV, separado por ponto e virgula, colocar o valor ";". Mantenha em branco para arquivos com tamanho fixo de coluna.'])]
    private ?string $dsSeparadorColunas = null;

    #[ORM\Column(name: 'sn_liberar_juros', type: 'boolean', options: ['default' => '0', 'comment' => 'Define se deve ser liberado o juros de todos os registros processados pelo retorno'])]
    private bool $snLiberarJuros = false;

    #[ORM\Column(name: 'nr_cpf_inicio', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrCpfInicio = 0;

    #[ORM\Column(name: 'nr_cpf_tam', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrCpfTam = 0;

    #[ORM\Column(name: 'dt_venc_inicio', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $dtVencInicio = 0;

    #[ORM\Column(name: 'dt_venc_tam', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $dtVencTam = 0;

    #[ORM\Column(name: 'dt_venc_formato', type: 'string', length: 3, options: ['fixed' => true, 'default' => 'dma'])]
    private string $dtVencFormato = 'dma';

    #[ORM\Column(name: 'sn_baixa_por_saldo', type: 'smallint', nullable: true, options: ['default' => '0', 'comment' => 'Se sn_baixa_por_saldo for SIM, percorrerá as mensalidades pelo cpf do aluno ordenando pelo vencimento ASC.'])]
    private ?int $snBaixaPorSaldo = 0;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    // Sem construtor: 60 propriedades. Use os setters encadeados.

    public function getCdBanco(): string
    {
        return $this->cdBanco;
    }

    public function setCdBanco(string $cdBanco): self
    {
        $this->cdBanco = $cdBanco;
        return $this;
    }

    public function getDsLayout(): string
    {
        return $this->dsLayout;
    }

    public function setDsLayout(string $dsLayout): self
    {
        $this->dsLayout = $dsLayout;
        return $this;
    }

    public function getLayoutInicio(): int
    {
        return $this->layoutInicio;
    }

    public function setLayoutInicio(int $layoutInicio): self
    {
        $this->layoutInicio = $layoutInicio;
        return $this;
    }

    public function getLayoutTam(): int
    {
        return $this->layoutTam;
    }

    public function setLayoutTam(int $layoutTam): self
    {
        $this->layoutTam = $layoutTam;
        return $this;
    }

    public function getNmBanco(): ?string
    {
        return $this->nmBanco;
    }

    public function setNmBanco(?string $nmBanco): self
    {
        $this->nmBanco = $nmBanco;
        return $this;
    }

    public function getNnInicio(): ?int
    {
        return $this->nnInicio;
    }

    public function setNnInicio(?int $nnInicio): self
    {
        $this->nnInicio = $nnInicio;
        return $this;
    }

    public function getNnTam(): ?int
    {
        return $this->nnTam;
    }

    public function setNnTam(?int $nnTam): self
    {
        $this->nnTam = $nnTam;
        return $this;
    }

    public function getBancoInicio(): ?int
    {
        return $this->bancoInicio;
    }

    public function setBancoInicio(?int $bancoInicio): self
    {
        $this->bancoInicio = $bancoInicio;
        return $this;
    }

    public function getBancoTam(): ?int
    {
        return $this->bancoTam;
    }

    public function setBancoTam(?int $bancoTam): self
    {
        $this->bancoTam = $bancoTam;
        return $this;
    }

    public function getRetornoInicio(): ?int
    {
        return $this->retornoInicio;
    }

    public function setRetornoInicio(?int $retornoInicio): self
    {
        $this->retornoInicio = $retornoInicio;
        return $this;
    }

    public function getOcorreInicio(): ?int
    {
        return $this->ocorreInicio;
    }

    public function setOcorreInicio(?int $ocorreInicio): self
    {
        $this->ocorreInicio = $ocorreInicio;
        return $this;
    }

    public function getOcorreTam(): ?int
    {
        return $this->ocorreTam;
    }

    public function setOcorreTam(?int $ocorreTam): self
    {
        $this->ocorreTam = $ocorreTam;
        return $this;
    }

    public function getVlTituloInicio(): ?int
    {
        return $this->vlTituloInicio;
    }

    public function setVlTituloInicio(?int $vlTituloInicio): self
    {
        $this->vlTituloInicio = $vlTituloInicio;
        return $this;
    }

    public function getVlTituloTam(): ?int
    {
        return $this->vlTituloTam;
    }

    public function setVlTituloTam(?int $vlTituloTam): self
    {
        $this->vlTituloTam = $vlTituloTam;
        return $this;
    }

    public function getVlPagoInicio(): ?int
    {
        return $this->vlPagoInicio;
    }

    public function setVlPagoInicio(?int $vlPagoInicio): self
    {
        $this->vlPagoInicio = $vlPagoInicio;
        return $this;
    }

    public function getVlPagoTam(): ?int
    {
        return $this->vlPagoTam;
    }

    public function setVlPagoTam(?int $vlPagoTam): self
    {
        $this->vlPagoTam = $vlPagoTam;
        return $this;
    }

    public function getVlAcrescInicio(): ?int
    {
        return $this->vlAcrescInicio;
    }

    public function setVlAcrescInicio(?int $vlAcrescInicio): self
    {
        $this->vlAcrescInicio = $vlAcrescInicio;
        return $this;
    }

    public function getVlAcrescTam(): ?int
    {
        return $this->vlAcrescTam;
    }

    public function setVlAcrescTam(?int $vlAcrescTam): self
    {
        $this->vlAcrescTam = $vlAcrescTam;
        return $this;
    }

    public function getSequenciaInicio(): ?int
    {
        return $this->sequenciaInicio;
    }

    public function setSequenciaInicio(?int $sequenciaInicio): self
    {
        $this->sequenciaInicio = $sequenciaInicio;
        return $this;
    }

    public function getSequenciaTam(): ?int
    {
        return $this->sequenciaTam;
    }

    public function setSequenciaTam(?int $sequenciaTam): self
    {
        $this->sequenciaTam = $sequenciaTam;
        return $this;
    }

    public function getDtPgtoInicio(): ?int
    {
        return $this->dtPgtoInicio;
    }

    public function setDtPgtoInicio(?int $dtPgtoInicio): self
    {
        $this->dtPgtoInicio = $dtPgtoInicio;
        return $this;
    }

    public function getDtPgtoTam(): ?int
    {
        return $this->dtPgtoTam;
    }

    public function setDtPgtoTam(?int $dtPgtoTam): self
    {
        $this->dtPgtoTam = $dtPgtoTam;
        return $this;
    }

    public function getNrLinhaHeader(): int
    {
        return $this->nrLinhaHeader;
    }

    public function setNrLinhaHeader(int $nrLinhaHeader): self
    {
        $this->nrLinhaHeader = $nrLinhaHeader;
        return $this;
    }

    public function getNrLinhaTrailer(): int
    {
        return $this->nrLinhaTrailer;
    }

    public function setNrLinhaTrailer(int $nrLinhaTrailer): self
    {
        $this->nrLinhaTrailer = $nrLinhaTrailer;
        return $this;
    }

    public function getNrLinhaRegistro(): int
    {
        return $this->nrLinhaRegistro;
    }

    public function setNrLinhaRegistro(int $nrLinhaRegistro): self
    {
        $this->nrLinhaRegistro = $nrLinhaRegistro;
        return $this;
    }

    public function getContaInicio(): ?int
    {
        return $this->contaInicio;
    }

    public function setContaInicio(?int $contaInicio): self
    {
        $this->contaInicio = $contaInicio;
        return $this;
    }

    public function getContaTam(): ?int
    {
        return $this->contaTam;
    }

    public function setContaTam(?int $contaTam): self
    {
        $this->contaTam = $contaTam;
        return $this;
    }

    public function getMotivoInicio(): ?int
    {
        return $this->motivoInicio;
    }

    public function setMotivoInicio(?int $motivoInicio): self
    {
        $this->motivoInicio = $motivoInicio;
        return $this;
    }

    public function getMotivoTam(): ?int
    {
        return $this->motivoTam;
    }

    public function setMotivoTam(?int $motivoTam): self
    {
        $this->motivoTam = $motivoTam;
        return $this;
    }

    public function getTarifaInicio(): ?int
    {
        return $this->tarifaInicio;
    }

    public function setTarifaInicio(?int $tarifaInicio): self
    {
        $this->tarifaInicio = $tarifaInicio;
        return $this;
    }

    public function getTarifaInicio2(): ?int
    {
        return $this->tarifaInicio2;
    }

    public function setTarifaInicio2(?int $tarifaInicio2): self
    {
        $this->tarifaInicio2 = $tarifaInicio2;
        return $this;
    }

    public function getTarifaTam(): ?int
    {
        return $this->tarifaTam;
    }

    public function setTarifaTam(?int $tarifaTam): self
    {
        $this->tarifaTam = $tarifaTam;
        return $this;
    }

    public function getTarifaTam2(): ?int
    {
        return $this->tarifaTam2;
    }

    public function setTarifaTam2(?int $tarifaTam2): self
    {
        $this->tarifaTam2 = $tarifaTam2;
        return $this;
    }

    public function getSnAcrescimoSeparado(): int
    {
        return $this->snAcrescimoSeparado;
    }

    public function setSnAcrescimoSeparado(int $snAcrescimoSeparado): self
    {
        $this->snAcrescimoSeparado = $snAcrescimoSeparado;
        return $this;
    }

    public function getDtPgtoFormado(): ?string
    {
        return $this->dtPgtoFormado;
    }

    public function setDtPgtoFormado(?string $dtPgtoFormado): self
    {
        $this->dtPgtoFormado = $dtPgtoFormado;
        return $this;
    }

    public function getDtCreditoInicio(): ?int
    {
        return $this->dtCreditoInicio;
    }

    public function setDtCreditoInicio(?int $dtCreditoInicio): self
    {
        $this->dtCreditoInicio = $dtCreditoInicio;
        return $this;
    }

    public function getDtCreditoTam(): ?int
    {
        return $this->dtCreditoTam;
    }

    public function setDtCreditoTam(?int $dtCreditoTam): self
    {
        $this->dtCreditoTam = $dtCreditoTam;
        return $this;
    }

    public function getDtCreditoFormato(): ?string
    {
        return $this->dtCreditoFormato;
    }

    public function setDtCreditoFormato(?string $dtCreditoFormato): self
    {
        $this->dtCreditoFormato = $dtCreditoFormato;
        return $this;
    }

    public function getNnInicioBarras(): ?int
    {
        return $this->nnInicioBarras;
    }

    public function setNnInicioBarras(?int $nnInicioBarras): self
    {
        $this->nnInicioBarras = $nnInicioBarras;
        return $this;
    }

    public function getNnTamBarras(): ?int
    {
        return $this->nnTamBarras;
    }

    public function setNnTamBarras(?int $nnTamBarras): self
    {
        $this->nnTamBarras = $nnTamBarras;
        return $this;
    }

    public function getLinhaIgnorarInicio(): ?int
    {
        return $this->linhaIgnorarInicio;
    }

    public function setLinhaIgnorarInicio(?int $linhaIgnorarInicio): self
    {
        $this->linhaIgnorarInicio = $linhaIgnorarInicio;
        return $this;
    }

    public function getLinhaIgnorarTamanho(): ?int
    {
        return $this->linhaIgnorarTamanho;
    }

    public function setLinhaIgnorarTamanho(?int $linhaIgnorarTamanho): self
    {
        $this->linhaIgnorarTamanho = $linhaIgnorarTamanho;
        return $this;
    }

    public function getLinhaIgnorarTexto(): ?string
    {
        return $this->linhaIgnorarTexto;
    }

    public function setLinhaIgnorarTexto(?string $linhaIgnorarTexto): self
    {
        $this->linhaIgnorarTexto = $linhaIgnorarTexto;
        return $this;
    }

    public function getCarteiraInicio(): ?int
    {
        return $this->carteiraInicio;
    }

    public function setCarteiraInicio(?int $carteiraInicio): self
    {
        $this->carteiraInicio = $carteiraInicio;
        return $this;
    }

    public function getCateiraTam(): ?int
    {
        return $this->cateiraTam;
    }

    public function setCateiraTam(?int $cateiraTam): self
    {
        $this->cateiraTam = $cateiraTam;
        return $this;
    }

    public function getNnInicio2(): ?int
    {
        return $this->nnInicio2;
    }

    public function setNnInicio2(?int $nnInicio2): self
    {
        $this->nnInicio2 = $nnInicio2;
        return $this;
    }

    public function getNnTam2(): ?int
    {
        return $this->nnTam2;
    }

    public function setNnTam2(?int $nnTam2): self
    {
        $this->nnTam2 = $nnTam2;
        return $this;
    }

    public function getCarteiraNn1(): ?string
    {
        return $this->carteiraNn1;
    }

    public function setCarteiraNn1(?string $carteiraNn1): self
    {
        $this->carteiraNn1 = $carteiraNn1;
        return $this;
    }

    public function getCarteiraNn2(): ?string
    {
        return $this->carteiraNn2;
    }

    public function setCarteiraNn2(?string $carteiraNn2): self
    {
        $this->carteiraNn2 = $carteiraNn2;
        return $this;
    }

    public function getFlDtPgtoInicio(): ?int
    {
        return $this->flDtPgtoInicio;
    }

    public function setFlDtPgtoInicio(?int $flDtPgtoInicio): self
    {
        $this->flDtPgtoInicio = $flDtPgtoInicio;
        return $this;
    }

    public function getFlDtPgto(): ?string
    {
        return $this->flDtPgto;
    }

    public function setFlDtPgto(?string $flDtPgto): self
    {
        $this->flDtPgto = $flDtPgto;
        return $this;
    }

    public function getDsSeparadorColunas(): ?string
    {
        return $this->dsSeparadorColunas;
    }

    public function setDsSeparadorColunas(?string $dsSeparadorColunas): self
    {
        $this->dsSeparadorColunas = $dsSeparadorColunas;
        return $this;
    }

    public function isSnLiberarJuros(): bool
    {
        return $this->snLiberarJuros;
    }

    public function setSnLiberarJuros(bool $snLiberarJuros): self
    {
        $this->snLiberarJuros = $snLiberarJuros;
        return $this;
    }

    public function getNrCpfInicio(): int
    {
        return $this->nrCpfInicio;
    }

    public function setNrCpfInicio(int $nrCpfInicio): self
    {
        $this->nrCpfInicio = $nrCpfInicio;
        return $this;
    }

    public function getNrCpfTam(): int
    {
        return $this->nrCpfTam;
    }

    public function setNrCpfTam(int $nrCpfTam): self
    {
        $this->nrCpfTam = $nrCpfTam;
        return $this;
    }

    public function getDtVencInicio(): int
    {
        return $this->dtVencInicio;
    }

    public function setDtVencInicio(int $dtVencInicio): self
    {
        $this->dtVencInicio = $dtVencInicio;
        return $this;
    }

    public function getDtVencTam(): int
    {
        return $this->dtVencTam;
    }

    public function setDtVencTam(int $dtVencTam): self
    {
        $this->dtVencTam = $dtVencTam;
        return $this;
    }

    public function getDtVencFormato(): string
    {
        return $this->dtVencFormato;
    }

    public function setDtVencFormato(string $dtVencFormato): self
    {
        $this->dtVencFormato = $dtVencFormato;
        return $this;
    }

    public function getSnBaixaPorSaldo(): ?int
    {
        return $this->snBaixaPorSaldo;
    }

    public function setSnBaixaPorSaldo(?int $snBaixaPorSaldo): self
    {
        $this->snBaixaPorSaldo = $snBaixaPorSaldo;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }
}

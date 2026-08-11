<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\RemLayoutsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemLayoutsRepository::class)]
#[ORM\Table(
    name: 'rem_layouts',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_layout', columns: ['cd_layout'])]
#[ORM\Index(name: 'IX_CD_CAIXA', columns: ['cd_caixa'])]
#[ORM\Index(name: 'IX_SN_ATIVO', columns: ['sn_ativo'])]
class RemLayouts
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_layout', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdLayout = null;

    #[ORM\Column(name: 'cd_caixa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCaixa = null;

    #[ORM\Column(name: 'nm_layout', type: 'string', length: 255, nullable: true)]
    private ?string $nmLayout = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snAtivo = 0;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['default' => '1'])]
    private int $cdColigada = 1;

    #[ORM\Column(name: 'nr_remessa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrRemessa = null;

    #[ORM\Column(name: 'nm_arquivo', type: 'string', length: 200, options: ['default' => ''])]
    private string $nmArquivo = '';

    #[ORM\Column(name: 'sn_sempre_reenviar', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snSempreReenviar = true;

    #[ORM\Column(name: 'cd_origem', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $cdOrigem = true;

    #[ORM\Column(name: 'ret_conta_inicio', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'Posicao inicial da conta no arquivo de retorno'])]
    private ?int $retContaInicio = null;

    #[ORM\Column(name: 'ret_conta', type: 'string', length: 50, nullable: true, options: ['comment' => 'Número da conta no arquivo de retorno'])]
    private ?string $retConta = null;

    #[ORM\Column(name: 'ret_banco_inicio', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'Posicao inicial do numero do banco no arquivo de retorno'])]
    private ?int $retBancoInicio = null;

    #[ORM\Column(name: 'ret_banco', type: 'string', length: 50, nullable: true, options: ['comment' => 'Número do banco no arquivo de retorno'])]
    private ?string $retBanco = null;

    #[ORM\Column(name: 'ds_reg_det', type: 'string', length: 50, options: ['comment' => 'Identificador de registro de detalhe'])]
    private ?string $dsRegDet = null;

    #[ORM\Column(name: 'nr_reg_det_ini', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'Posicao inicial do identificador de registro de detalhe'])]
    private ?int $nrRegDetIni = null;

    #[ORM\Column(name: 'nr_seg_ini', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'Posicao inicial do segmento'])]
    private ?int $nrSegIni = null;

    #[ORM\Column(name: 'cd_caixa_nn', type: 'integer', nullable: true)]
    private ?int $cdCaixaNn = null;

    #[ORM\Column(name: 'sn_fies', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0', 'comment' => 'Define se a remessa pode incluir títulos cujo responsável é o FIES. É verificado título do FIES quando pessoas.sn_nao_bloquear_financeiro=1; 0 = não incluir quando sn_nao_bloquear = 1; 1 = incluir quando sn_nao_bloquear in (0,1); 2 = incluir somente quando sn_nao_bloquear = 1'])]
    private ?int $snFies = 0;

    #[ORM\Column(name: 'sn_cobranca_bancaria', type: 'boolean', options: ['default' => '1'])]
    private bool $snCobrancaBancaria = true;

    #[ORM\Column(name: 'SN_AUTO_GERAR', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snAutoGerar = 0;

    #[ORM\Column(name: 'NR_INTERVALO_AUTO_GERAR', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrIntervaloAutoGerar = 0;

    #[ORM\Column(name: 'DT_ULTIMA_AUTO_GERAR', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtUltimaAutoGerar = null;

    #[ORM\Column(name: 'NR_ARQUIVOS_GERADOS_DIA', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrArquivosGeradosDia = 0;

    #[ORM\Column(name: 'NR_MAXIMO_ARQUIVOS_DIA', type: 'smallint', options: ['unsigned' => true, 'default' => '9'])]
    private int $nrMaximoArquivosDia = 9;

    #[ORM\Column(name: 'sn_alterar_vencidos', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1', 'comment' => 'Define se quando um título estiver registrado e houver uma troca de informações que deve ser enviada ao banco, caso o vencimento de título seja menor ou igual a data atual, seja baixado o registro e registrado novamente. 1 = Permite instruções de alteração após o vencimento, 0 = Manda baixar e registrar novamente'])]
    private ?int $snAlterarVencidos = 1;

    // Sem construtor: 24 propriedades. Use os setters encadeados.

    public function getCdLayout(): ?int
    {
        return $this->cdLayout;
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

    public function getNmLayout(): ?string
    {
        return $this->nmLayout;
    }

    public function setNmLayout(?string $nmLayout): self
    {
        $this->nmLayout = $nmLayout;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
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

    public function getNrRemessa(): ?int
    {
        return $this->nrRemessa;
    }

    public function setNrRemessa(?int $nrRemessa): self
    {
        $this->nrRemessa = $nrRemessa;
        return $this;
    }

    public function getNmArquivo(): string
    {
        return $this->nmArquivo;
    }

    public function setNmArquivo(string $nmArquivo): self
    {
        $this->nmArquivo = $nmArquivo;
        return $this;
    }

    public function isSnSempreReenviar(): ?bool
    {
        return $this->snSempreReenviar;
    }

    public function setSnSempreReenviar(?bool $snSempreReenviar): self
    {
        $this->snSempreReenviar = $snSempreReenviar;
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

    public function getRetContaInicio(): ?int
    {
        return $this->retContaInicio;
    }

    public function setRetContaInicio(?int $retContaInicio): self
    {
        $this->retContaInicio = $retContaInicio;
        return $this;
    }

    public function getRetConta(): ?string
    {
        return $this->retConta;
    }

    public function setRetConta(?string $retConta): self
    {
        $this->retConta = $retConta;
        return $this;
    }

    public function getRetBancoInicio(): ?int
    {
        return $this->retBancoInicio;
    }

    public function setRetBancoInicio(?int $retBancoInicio): self
    {
        $this->retBancoInicio = $retBancoInicio;
        return $this;
    }

    public function getRetBanco(): ?string
    {
        return $this->retBanco;
    }

    public function setRetBanco(?string $retBanco): self
    {
        $this->retBanco = $retBanco;
        return $this;
    }

    public function getDsRegDet(): ?string
    {
        return $this->dsRegDet;
    }

    public function setDsRegDet(?string $dsRegDet): self
    {
        $this->dsRegDet = $dsRegDet;
        return $this;
    }

    public function getNrRegDetIni(): ?int
    {
        return $this->nrRegDetIni;
    }

    public function setNrRegDetIni(?int $nrRegDetIni): self
    {
        $this->nrRegDetIni = $nrRegDetIni;
        return $this;
    }

    public function getNrSegIni(): ?int
    {
        return $this->nrSegIni;
    }

    public function setNrSegIni(?int $nrSegIni): self
    {
        $this->nrSegIni = $nrSegIni;
        return $this;
    }

    public function getCdCaixaNn(): ?int
    {
        return $this->cdCaixaNn;
    }

    public function setCdCaixaNn(?int $cdCaixaNn): self
    {
        $this->cdCaixaNn = $cdCaixaNn;
        return $this;
    }

    public function getSnFies(): ?int
    {
        return $this->snFies;
    }

    public function setSnFies(?int $snFies): self
    {
        $this->snFies = $snFies;
        return $this;
    }

    public function isSnCobrancaBancaria(): bool
    {
        return $this->snCobrancaBancaria;
    }

    public function setSnCobrancaBancaria(bool $snCobrancaBancaria): self
    {
        $this->snCobrancaBancaria = $snCobrancaBancaria;
        return $this;
    }

    public function getSnAutoGerar(): int
    {
        return $this->snAutoGerar;
    }

    public function setSnAutoGerar(int $snAutoGerar): self
    {
        $this->snAutoGerar = $snAutoGerar;
        return $this;
    }

    public function getNrIntervaloAutoGerar(): int
    {
        return $this->nrIntervaloAutoGerar;
    }

    public function setNrIntervaloAutoGerar(int $nrIntervaloAutoGerar): self
    {
        $this->nrIntervaloAutoGerar = $nrIntervaloAutoGerar;
        return $this;
    }

    public function getDtUltimaAutoGerar(): ?\DateTimeInterface
    {
        return $this->dtUltimaAutoGerar;
    }

    public function setDtUltimaAutoGerar(?\DateTimeInterface $dtUltimaAutoGerar): self
    {
        $this->dtUltimaAutoGerar = $dtUltimaAutoGerar;
        return $this;
    }

    public function getNrArquivosGeradosDia(): int
    {
        return $this->nrArquivosGeradosDia;
    }

    public function setNrArquivosGeradosDia(int $nrArquivosGeradosDia): self
    {
        $this->nrArquivosGeradosDia = $nrArquivosGeradosDia;
        return $this;
    }

    public function getNrMaximoArquivosDia(): int
    {
        return $this->nrMaximoArquivosDia;
    }

    public function setNrMaximoArquivosDia(int $nrMaximoArquivosDia): self
    {
        $this->nrMaximoArquivosDia = $nrMaximoArquivosDia;
        return $this;
    }

    public function getSnAlterarVencidos(): ?int
    {
        return $this->snAlterarVencidos;
    }

    public function setSnAlterarVencidos(?int $snAlterarVencidos): self
    {
        $this->snAlterarVencidos = $snAlterarVencidos;
        return $this;
    }
}

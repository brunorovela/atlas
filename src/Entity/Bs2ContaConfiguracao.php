<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\Bs2ContaConfiguracaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Bs2ContaConfiguracaoRepository::class)]
#[ORM\Table(
    name: 'bs2_conta_configuracao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_cd_caixa', columns: ['cd_caixa'])]
#[ORM\Index(name: 'fk_bs2_estados', columns: ['ds_uf_sacador'])]
#[ORM\Index(name: 'fk_bs2_municipios', columns: ['cd_cidade_sacador'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_bs2_estados', 'colunas' => ['ds_uf_sacador'], 'tabelaAlvo' => 'estados', 'colunasAlvo' => ['ds_uf'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_bs2_fin_cadastro_contas', 'colunas' => ['cd_caixa'], 'tabelaAlvo' => 'fin_cadastro_contas', 'colunasAlvo' => ['cd_caixa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_bs2_municipios', 'colunas' => ['cd_cidade_sacador'], 'tabelaAlvo' => 'municipios', 'colunasAlvo' => ['cd_municipio'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class Bs2ContaConfiguracao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_bs2_conta_configuracao', type: 'integer')]
    private ?int $cdBs2ContaConfiguracao = null;

    #[ORM\ManyToOne(targetEntity: FinCadastroContas::class)]
    #[ORM\JoinColumn(name: 'cd_caixa', referencedColumnName: 'cd_caixa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?FinCadastroContas $cdCaixa = null;

    #[ORM\Column(name: 'ds_api_key', type: 'string', length: 1000)]
    private ?string $dsApiKey = null;

    #[ORM\Column(name: 'ds_api_secret', type: 'string', length: 1000)]
    private ?string $dsApiSecret = null;

    #[ORM\Column(name: 'ds_api_refresh_token', type: 'string', length: 1000, nullable: true)]
    private ?string $dsApiRefreshToken = null;

    #[ORM\Column(name: 'ds_api_usuario', type: 'string', length: 1000, nullable: true)]
    private ?string $dsApiUsuario = null;

    #[ORM\Column(name: 'ds_api_senha', type: 'string', length: 1000, nullable: true)]
    private ?string $dsApiSenha = null;

    #[ORM\Column(name: 'ds_api_token', type: 'string', length: 1000, nullable: true)]
    private ?string $dsApiToken = null;

    #[ORM\Column(name: 'dt_api_token_validade', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtApiTokenValidade = null;

    #[ORM\Column(name: 'sn_api_endpoint_producao', type: 'boolean', options: ['default' => '1'])]
    private bool $snApiEndpointProducao = true;

    #[ORM\Column(name: 'ds_tipo_conta_sacador', type: 'string', length: 1, options: ['fixed' => true])]
    private ?string $dsTipoContaSacador = null;

    #[ORM\Column(name: 'ds_documento_sacador', type: 'string', length: 14)]
    private ?string $dsDocumentoSacador = null;

    #[ORM\Column(name: 'ds_nome_sacador', type: 'string', length: 255)]
    private ?string $dsNomeSacador = null;

    #[ORM\Column(name: 'ds_cep_sacador', type: 'string', length: 8)]
    private ?string $dsCepSacador = null;

    #[ORM\Column(name: 'ds_uf_sacador', type: 'string', length: 3, options: ['fixed' => true])]
    private ?string $dsUfSacador = null;

    #[ORM\Column(name: 'cd_cidade_sacador', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCidadeSacador = null;

    #[ORM\Column(name: 'ds_bairro_sacador', type: 'string', length: 50)]
    private ?string $dsBairroSacador = null;

    #[ORM\Column(name: 'ds_logradouro_sacador', type: 'string', length: 150)]
    private ?string $dsLogradouroSacador = null;

    #[ORM\Column(name: 'ds_nr_logradouro_sacador', type: 'string', length: 10, nullable: true)]
    private ?string $dsNrLogradouroSacador = null;

    #[ORM\Column(name: 'ds_complemento_sacador', type: 'string', length: 150, nullable: true)]
    private ?string $dsComplementoSacador = null;

    #[ORM\Column(name: 'ds_api_pix_client_id', type: 'string', length: 1000, nullable: true)]
    private ?string $dsApiPixClientId = null;

    #[ORM\Column(name: 'ds_api_pix_client_secret', type: 'string', length: 1000, nullable: true)]
    private ?string $dsApiPixClientSecret = null;

    #[ORM\Column(name: 'ds_api_pix_token', type: 'string', length: 1000, nullable: true)]
    private ?string $dsApiPixToken = null;

    #[ORM\Column(name: 'ds_pix_chave_evp', type: 'string', length: 1000, nullable: true)]
    private ?string $dsPixChaveEvp = null;

    #[ORM\Column(name: 'ds_pix_chave_evp_apelido', type: 'string', length: 1000, nullable: true)]
    private ?string $dsPixChaveEvpApelido = null;

    #[ORM\Column(name: 'ds_pix_chave_evp_valor', type: 'string', length: 1000, nullable: true)]
    private ?string $dsPixChaveEvpValor = null;

    #[ORM\Column(name: 'ds_api_pix_token_validade', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dsApiPixTokenValidade = null;

    #[ORM\Column(name: 'sn_api_pix_endpoint_producao', type: TinyIntType::NAME, nullable: true, options: ['default' => '1'])]
    private ?int $snApiPixEndpointProducao = 1;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    // Sem construtor: 28 propriedades. Use os setters encadeados.

    public function getCdBs2ContaConfiguracao(): ?int
    {
        return $this->cdBs2ContaConfiguracao;
    }

    public function getCdCaixa(): ?FinCadastroContas
    {
        return $this->cdCaixa;
    }

    public function setCdCaixa(?FinCadastroContas $cdCaixa): self
    {
        $this->cdCaixa = $cdCaixa;
        return $this;
    }

    public function getDsApiKey(): ?string
    {
        return $this->dsApiKey;
    }

    public function setDsApiKey(?string $dsApiKey): self
    {
        $this->dsApiKey = $dsApiKey;
        return $this;
    }

    public function getDsApiSecret(): ?string
    {
        return $this->dsApiSecret;
    }

    public function setDsApiSecret(?string $dsApiSecret): self
    {
        $this->dsApiSecret = $dsApiSecret;
        return $this;
    }

    public function getDsApiRefreshToken(): ?string
    {
        return $this->dsApiRefreshToken;
    }

    public function setDsApiRefreshToken(?string $dsApiRefreshToken): self
    {
        $this->dsApiRefreshToken = $dsApiRefreshToken;
        return $this;
    }

    public function getDsApiUsuario(): ?string
    {
        return $this->dsApiUsuario;
    }

    public function setDsApiUsuario(?string $dsApiUsuario): self
    {
        $this->dsApiUsuario = $dsApiUsuario;
        return $this;
    }

    public function getDsApiSenha(): ?string
    {
        return $this->dsApiSenha;
    }

    public function setDsApiSenha(?string $dsApiSenha): self
    {
        $this->dsApiSenha = $dsApiSenha;
        return $this;
    }

    public function getDsApiToken(): ?string
    {
        return $this->dsApiToken;
    }

    public function setDsApiToken(?string $dsApiToken): self
    {
        $this->dsApiToken = $dsApiToken;
        return $this;
    }

    public function getDtApiTokenValidade(): ?\DateTimeInterface
    {
        return $this->dtApiTokenValidade;
    }

    public function setDtApiTokenValidade(?\DateTimeInterface $dtApiTokenValidade): self
    {
        $this->dtApiTokenValidade = $dtApiTokenValidade;
        return $this;
    }

    public function isSnApiEndpointProducao(): bool
    {
        return $this->snApiEndpointProducao;
    }

    public function setSnApiEndpointProducao(bool $snApiEndpointProducao): self
    {
        $this->snApiEndpointProducao = $snApiEndpointProducao;
        return $this;
    }

    public function getDsTipoContaSacador(): ?string
    {
        return $this->dsTipoContaSacador;
    }

    public function setDsTipoContaSacador(?string $dsTipoContaSacador): self
    {
        $this->dsTipoContaSacador = $dsTipoContaSacador;
        return $this;
    }

    public function getDsDocumentoSacador(): ?string
    {
        return $this->dsDocumentoSacador;
    }

    public function setDsDocumentoSacador(?string $dsDocumentoSacador): self
    {
        $this->dsDocumentoSacador = $dsDocumentoSacador;
        return $this;
    }

    public function getDsNomeSacador(): ?string
    {
        return $this->dsNomeSacador;
    }

    public function setDsNomeSacador(?string $dsNomeSacador): self
    {
        $this->dsNomeSacador = $dsNomeSacador;
        return $this;
    }

    public function getDsCepSacador(): ?string
    {
        return $this->dsCepSacador;
    }

    public function setDsCepSacador(?string $dsCepSacador): self
    {
        $this->dsCepSacador = $dsCepSacador;
        return $this;
    }

    public function getDsUfSacador(): ?string
    {
        return $this->dsUfSacador;
    }

    public function setDsUfSacador(?string $dsUfSacador): self
    {
        $this->dsUfSacador = $dsUfSacador;
        return $this;
    }

    public function getCdCidadeSacador(): ?int
    {
        return $this->cdCidadeSacador;
    }

    public function setCdCidadeSacador(?int $cdCidadeSacador): self
    {
        $this->cdCidadeSacador = $cdCidadeSacador;
        return $this;
    }

    public function getDsBairroSacador(): ?string
    {
        return $this->dsBairroSacador;
    }

    public function setDsBairroSacador(?string $dsBairroSacador): self
    {
        $this->dsBairroSacador = $dsBairroSacador;
        return $this;
    }

    public function getDsLogradouroSacador(): ?string
    {
        return $this->dsLogradouroSacador;
    }

    public function setDsLogradouroSacador(?string $dsLogradouroSacador): self
    {
        $this->dsLogradouroSacador = $dsLogradouroSacador;
        return $this;
    }

    public function getDsNrLogradouroSacador(): ?string
    {
        return $this->dsNrLogradouroSacador;
    }

    public function setDsNrLogradouroSacador(?string $dsNrLogradouroSacador): self
    {
        $this->dsNrLogradouroSacador = $dsNrLogradouroSacador;
        return $this;
    }

    public function getDsComplementoSacador(): ?string
    {
        return $this->dsComplementoSacador;
    }

    public function setDsComplementoSacador(?string $dsComplementoSacador): self
    {
        $this->dsComplementoSacador = $dsComplementoSacador;
        return $this;
    }

    public function getDsApiPixClientId(): ?string
    {
        return $this->dsApiPixClientId;
    }

    public function setDsApiPixClientId(?string $dsApiPixClientId): self
    {
        $this->dsApiPixClientId = $dsApiPixClientId;
        return $this;
    }

    public function getDsApiPixClientSecret(): ?string
    {
        return $this->dsApiPixClientSecret;
    }

    public function setDsApiPixClientSecret(?string $dsApiPixClientSecret): self
    {
        $this->dsApiPixClientSecret = $dsApiPixClientSecret;
        return $this;
    }

    public function getDsApiPixToken(): ?string
    {
        return $this->dsApiPixToken;
    }

    public function setDsApiPixToken(?string $dsApiPixToken): self
    {
        $this->dsApiPixToken = $dsApiPixToken;
        return $this;
    }

    public function getDsPixChaveEvp(): ?string
    {
        return $this->dsPixChaveEvp;
    }

    public function setDsPixChaveEvp(?string $dsPixChaveEvp): self
    {
        $this->dsPixChaveEvp = $dsPixChaveEvp;
        return $this;
    }

    public function getDsPixChaveEvpApelido(): ?string
    {
        return $this->dsPixChaveEvpApelido;
    }

    public function setDsPixChaveEvpApelido(?string $dsPixChaveEvpApelido): self
    {
        $this->dsPixChaveEvpApelido = $dsPixChaveEvpApelido;
        return $this;
    }

    public function getDsPixChaveEvpValor(): ?string
    {
        return $this->dsPixChaveEvpValor;
    }

    public function setDsPixChaveEvpValor(?string $dsPixChaveEvpValor): self
    {
        $this->dsPixChaveEvpValor = $dsPixChaveEvpValor;
        return $this;
    }

    public function getDsApiPixTokenValidade(): ?\DateTimeInterface
    {
        return $this->dsApiPixTokenValidade;
    }

    public function setDsApiPixTokenValidade(?\DateTimeInterface $dsApiPixTokenValidade): self
    {
        $this->dsApiPixTokenValidade = $dsApiPixTokenValidade;
        return $this;
    }

    public function getSnApiPixEndpointProducao(): ?int
    {
        return $this->snApiPixEndpointProducao;
    }

    public function setSnApiPixEndpointProducao(?int $snApiPixEndpointProducao): self
    {
        $this->snApiPixEndpointProducao = $snApiPixEndpointProducao;
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

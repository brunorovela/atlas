<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ItauContaConfiguracaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItauContaConfiguracaoRepository::class)]
#[ORM\Table(
    name: 'itau_conta_configuracao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ix_itau_conta_configuracao_conta', columns: ['cd_caixa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_itau_conta_configuracao_conta', 'colunas' => ['cd_caixa'], 'tabelaAlvo' => 'fin_cadastro_contas', 'colunasAlvo' => ['cd_caixa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ItauContaConfiguracao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_itau_conta_configuracao', type: 'integer')]
    private ?int $cdItauContaConfiguracao = null;

    #[ORM\ManyToOne(targetEntity: FinCadastroContas::class)]
    #[ORM\JoinColumn(name: 'cd_caixa', referencedColumnName: 'cd_caixa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?FinCadastroContas $cdCaixa = null;

    #[ORM\Column(name: 'ds_chave_evp_pix', type: 'string', length: 255)]
    private ?string $dsChaveEvpPix = null;

    #[ORM\Column(name: 'ds_client_id_pix', type: 'text', length: 65535)]
    private ?string $dsClientIdPix = null;

    #[ORM\Column(name: 'ds_client_secret_pix', type: 'text', length: 65535)]
    private ?string $dsClientSecretPix = null;

    #[ORM\Column(name: 'dt_cadastro_csr_pix', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastroCsrPix = null;

    #[ORM\Column(name: 'dt_falha_renovacao_crt_pix', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFalhaRenovacaoCrtPix = null;

    #[ORM\Column(name: 'me_certificado_csr_pix', type: 'text', length: 65535, nullable: true)]
    private ?string $meCertificadoCsrPix = null;

    #[ORM\Column(name: 'me_certificado_crt_pix', type: 'text', length: 65535)]
    private ?string $meCertificadoCrtPix = null;

    #[ORM\Column(name: 'me_certificado_ssl_key_pix', type: 'text', length: 65535)]
    private ?string $meCertificadoSslKeyPix = null;

    #[ORM\Column(name: 'ds_client_id_boleto', type: 'text', length: 65535)]
    private ?string $dsClientIdBoleto = null;

    #[ORM\Column(name: 'ds_client_secret_boleto', type: 'text', length: 65535)]
    private ?string $dsClientSecretBoleto = null;

    #[ORM\Column(name: 'dt_cadastro_csr_boleto', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastroCsrBoleto = null;

    #[ORM\Column(name: 'dt_falha_renovacao_crt_boleto', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFalhaRenovacaoCrtBoleto = null;

    #[ORM\Column(name: 'me_certificado_csr_boleto', type: 'text', length: 65535, nullable: true)]
    private ?string $meCertificadoCsrBoleto = null;

    #[ORM\Column(name: 'me_certificado_crt_boleto', type: 'text', length: 65535)]
    private ?string $meCertificadoCrtBoleto = null;

    #[ORM\Column(name: 'me_certificado_ssl_key_boleto', type: 'text', length: 65535)]
    private ?string $meCertificadoSslKeyBoleto = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?FinCadastroContas $cdCaixa = null,
        ?string $dsChaveEvpPix = null,
        ?string $dsClientIdPix = null,
        ?string $dsClientSecretPix = null,
        ?\DateTimeInterface $dtCadastroCsrPix = null,
        ?\DateTimeInterface $dtFalhaRenovacaoCrtPix = null,
        ?string $meCertificadoCsrPix = null,
        ?string $meCertificadoCrtPix = null,
        ?string $meCertificadoSslKeyPix = null,
        ?string $dsClientIdBoleto = null,
        ?string $dsClientSecretBoleto = null,
        ?\DateTimeInterface $dtCadastroCsrBoleto = null,
        ?\DateTimeInterface $dtFalhaRenovacaoCrtBoleto = null,
        ?string $meCertificadoCsrBoleto = null,
        ?string $meCertificadoCrtBoleto = null,
        ?string $meCertificadoSslKeyBoleto = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdCaixa = $cdCaixa;
        $this->dsChaveEvpPix = $dsChaveEvpPix;
        $this->dsClientIdPix = $dsClientIdPix;
        $this->dsClientSecretPix = $dsClientSecretPix;
        $this->dtCadastroCsrPix = $dtCadastroCsrPix;
        $this->dtFalhaRenovacaoCrtPix = $dtFalhaRenovacaoCrtPix;
        $this->meCertificadoCsrPix = $meCertificadoCsrPix;
        $this->meCertificadoCrtPix = $meCertificadoCrtPix;
        $this->meCertificadoSslKeyPix = $meCertificadoSslKeyPix;
        $this->dsClientIdBoleto = $dsClientIdBoleto;
        $this->dsClientSecretBoleto = $dsClientSecretBoleto;
        $this->dtCadastroCsrBoleto = $dtCadastroCsrBoleto;
        $this->dtFalhaRenovacaoCrtBoleto = $dtFalhaRenovacaoCrtBoleto;
        $this->meCertificadoCsrBoleto = $meCertificadoCsrBoleto;
        $this->meCertificadoCrtBoleto = $meCertificadoCrtBoleto;
        $this->meCertificadoSslKeyBoleto = $meCertificadoSslKeyBoleto;
        $this->dtCadastro = $dtCadastro;
        $this->dtBase = $dtBase;
    }

    public function getCdItauContaConfiguracao(): ?int
    {
        return $this->cdItauContaConfiguracao;
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

    public function getDsChaveEvpPix(): ?string
    {
        return $this->dsChaveEvpPix;
    }

    public function setDsChaveEvpPix(?string $dsChaveEvpPix): self
    {
        $this->dsChaveEvpPix = $dsChaveEvpPix;
        return $this;
    }

    public function getDsClientIdPix(): ?string
    {
        return $this->dsClientIdPix;
    }

    public function setDsClientIdPix(?string $dsClientIdPix): self
    {
        $this->dsClientIdPix = $dsClientIdPix;
        return $this;
    }

    public function getDsClientSecretPix(): ?string
    {
        return $this->dsClientSecretPix;
    }

    public function setDsClientSecretPix(?string $dsClientSecretPix): self
    {
        $this->dsClientSecretPix = $dsClientSecretPix;
        return $this;
    }

    public function getDtCadastroCsrPix(): ?\DateTimeInterface
    {
        return $this->dtCadastroCsrPix;
    }

    public function setDtCadastroCsrPix(?\DateTimeInterface $dtCadastroCsrPix): self
    {
        $this->dtCadastroCsrPix = $dtCadastroCsrPix;
        return $this;
    }

    public function getDtFalhaRenovacaoCrtPix(): ?\DateTimeInterface
    {
        return $this->dtFalhaRenovacaoCrtPix;
    }

    public function setDtFalhaRenovacaoCrtPix(?\DateTimeInterface $dtFalhaRenovacaoCrtPix): self
    {
        $this->dtFalhaRenovacaoCrtPix = $dtFalhaRenovacaoCrtPix;
        return $this;
    }

    public function getMeCertificadoCsrPix(): ?string
    {
        return $this->meCertificadoCsrPix;
    }

    public function setMeCertificadoCsrPix(?string $meCertificadoCsrPix): self
    {
        $this->meCertificadoCsrPix = $meCertificadoCsrPix;
        return $this;
    }

    public function getMeCertificadoCrtPix(): ?string
    {
        return $this->meCertificadoCrtPix;
    }

    public function setMeCertificadoCrtPix(?string $meCertificadoCrtPix): self
    {
        $this->meCertificadoCrtPix = $meCertificadoCrtPix;
        return $this;
    }

    public function getMeCertificadoSslKeyPix(): ?string
    {
        return $this->meCertificadoSslKeyPix;
    }

    public function setMeCertificadoSslKeyPix(?string $meCertificadoSslKeyPix): self
    {
        $this->meCertificadoSslKeyPix = $meCertificadoSslKeyPix;
        return $this;
    }

    public function getDsClientIdBoleto(): ?string
    {
        return $this->dsClientIdBoleto;
    }

    public function setDsClientIdBoleto(?string $dsClientIdBoleto): self
    {
        $this->dsClientIdBoleto = $dsClientIdBoleto;
        return $this;
    }

    public function getDsClientSecretBoleto(): ?string
    {
        return $this->dsClientSecretBoleto;
    }

    public function setDsClientSecretBoleto(?string $dsClientSecretBoleto): self
    {
        $this->dsClientSecretBoleto = $dsClientSecretBoleto;
        return $this;
    }

    public function getDtCadastroCsrBoleto(): ?\DateTimeInterface
    {
        return $this->dtCadastroCsrBoleto;
    }

    public function setDtCadastroCsrBoleto(?\DateTimeInterface $dtCadastroCsrBoleto): self
    {
        $this->dtCadastroCsrBoleto = $dtCadastroCsrBoleto;
        return $this;
    }

    public function getDtFalhaRenovacaoCrtBoleto(): ?\DateTimeInterface
    {
        return $this->dtFalhaRenovacaoCrtBoleto;
    }

    public function setDtFalhaRenovacaoCrtBoleto(?\DateTimeInterface $dtFalhaRenovacaoCrtBoleto): self
    {
        $this->dtFalhaRenovacaoCrtBoleto = $dtFalhaRenovacaoCrtBoleto;
        return $this;
    }

    public function getMeCertificadoCsrBoleto(): ?string
    {
        return $this->meCertificadoCsrBoleto;
    }

    public function setMeCertificadoCsrBoleto(?string $meCertificadoCsrBoleto): self
    {
        $this->meCertificadoCsrBoleto = $meCertificadoCsrBoleto;
        return $this;
    }

    public function getMeCertificadoCrtBoleto(): ?string
    {
        return $this->meCertificadoCrtBoleto;
    }

    public function setMeCertificadoCrtBoleto(?string $meCertificadoCrtBoleto): self
    {
        $this->meCertificadoCrtBoleto = $meCertificadoCrtBoleto;
        return $this;
    }

    public function getMeCertificadoSslKeyBoleto(): ?string
    {
        return $this->meCertificadoSslKeyBoleto;
    }

    public function setMeCertificadoSslKeyBoleto(?string $meCertificadoSslKeyBoleto): self
    {
        $this->meCertificadoSslKeyBoleto = $meCertificadoSslKeyBoleto;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
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

<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\SicrediContaConfiguracaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SicrediContaConfiguracaoRepository::class)]
#[ORM\Table(
    name: 'sicredi_conta_configuracao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ix_sicredi_conta_configuracao_conta', columns: ['cd_caixa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_sicredi_conta_configuracao_conta', 'colunas' => ['cd_caixa'], 'tabelaAlvo' => 'fin_cadastro_contas', 'colunasAlvo' => ['cd_caixa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class SicrediContaConfiguracao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: FinCadastroContas::class)]
    #[ORM\JoinColumn(name: 'cd_caixa', referencedColumnName: 'cd_caixa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?FinCadastroContas $cdCaixa = null;

    #[ORM\Column(name: 'ds_chave_evp_pix', type: 'string', length: 255)]
    private ?string $dsChaveEvpPix = null;

    #[ORM\Column(name: 'ds_client_id_pix', type: 'text', length: 65535)]
    private ?string $dsClientIdPix = null;

    #[ORM\Column(name: 'ds_client_secret_pix', type: 'text', length: 65535)]
    private ?string $dsClientSecretPix = null;

    #[ORM\Column(name: 'me_certificado_cer_pix', type: 'text', length: 65535)]
    private ?string $meCertificadoCerPix = null;

    #[ORM\Column(name: 'me_chave_key_pix', type: 'text', length: 65535)]
    private ?string $meChaveKeyPix = null;

    #[ORM\Column(name: 'ds_username_boleto', type: 'text', length: 65535)]
    private ?string $dsUsernameBoleto = null;

    #[ORM\Column(name: 'ds_password_boleto', type: 'text', length: 65535)]
    private ?string $dsPasswordBoleto = null;

    #[ORM\Column(name: 'ds_token_boleto', type: 'text', length: 65535)]
    private ?string $dsTokenBoleto = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?FinCadastroContas $cdCaixa = null,
        ?string $dsChaveEvpPix = null,
        ?string $dsClientIdPix = null,
        ?string $dsClientSecretPix = null,
        ?string $meCertificadoCerPix = null,
        ?string $meChaveKeyPix = null,
        ?string $dsUsernameBoleto = null,
        ?string $dsPasswordBoleto = null,
        ?string $dsTokenBoleto = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdCaixa = $cdCaixa;
        $this->dsChaveEvpPix = $dsChaveEvpPix;
        $this->dsClientIdPix = $dsClientIdPix;
        $this->dsClientSecretPix = $dsClientSecretPix;
        $this->meCertificadoCerPix = $meCertificadoCerPix;
        $this->meChaveKeyPix = $meChaveKeyPix;
        $this->dsUsernameBoleto = $dsUsernameBoleto;
        $this->dsPasswordBoleto = $dsPasswordBoleto;
        $this->dsTokenBoleto = $dsTokenBoleto;
        $this->dtCadastro = $dtCadastro;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMeCertificadoCerPix(): ?string
    {
        return $this->meCertificadoCerPix;
    }

    public function setMeCertificadoCerPix(?string $meCertificadoCerPix): self
    {
        $this->meCertificadoCerPix = $meCertificadoCerPix;
        return $this;
    }

    public function getMeChaveKeyPix(): ?string
    {
        return $this->meChaveKeyPix;
    }

    public function setMeChaveKeyPix(?string $meChaveKeyPix): self
    {
        $this->meChaveKeyPix = $meChaveKeyPix;
        return $this;
    }

    public function getDsUsernameBoleto(): ?string
    {
        return $this->dsUsernameBoleto;
    }

    public function setDsUsernameBoleto(?string $dsUsernameBoleto): self
    {
        $this->dsUsernameBoleto = $dsUsernameBoleto;
        return $this;
    }

    public function getDsPasswordBoleto(): ?string
    {
        return $this->dsPasswordBoleto;
    }

    public function setDsPasswordBoleto(?string $dsPasswordBoleto): self
    {
        $this->dsPasswordBoleto = $dsPasswordBoleto;
        return $this;
    }

    public function getDsTokenBoleto(): ?string
    {
        return $this->dsTokenBoleto;
    }

    public function setDsTokenBoleto(?string $dsTokenBoleto): self
    {
        $this->dsTokenBoleto = $dsTokenBoleto;
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

<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\SicoobContaConfiguracaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SicoobContaConfiguracaoRepository::class)]
#[ORM\Table(
    name: 'sicoob_conta_configuracao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ix_sicoob_conta_configuracao_conta', columns: ['cd_caixa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_sicoob_conta_configuracao_conta', 'colunas' => ['cd_caixa'], 'tabelaAlvo' => 'fin_cadastro_contas', 'colunasAlvo' => ['cd_caixa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class SicoobContaConfiguracao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: FinCadastroContas::class)]
    #[ORM\JoinColumn(name: 'cd_caixa', referencedColumnName: 'cd_caixa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?FinCadastroContas $cdCaixa = null;

    #[ORM\Column(name: 'ds_client_id', type: 'text', length: 65535)]
    private ?string $dsClientId = null;

    #[ORM\Column(name: 'ds_frase_secreta', type: 'text', length: 65535)]
    private ?string $dsFraseSecreta = null;

    #[ORM\Column(name: 'me_certificado_pfx', type: 'text', length: 65535)]
    private ?string $meCertificadoPfx = null;

    #[ORM\Column(name: 'me_certificado_key', type: 'text', length: 65535, nullable: true)]
    private ?string $meCertificadoKey = null;

    #[ORM\Column(name: 'me_certificado_senha', type: 'text', length: 65535, nullable: true)]
    private ?string $meCertificadoSenha = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?FinCadastroContas $cdCaixa = null,
        ?string $dsClientId = null,
        ?string $dsFraseSecreta = null,
        ?string $meCertificadoPfx = null,
        ?string $meCertificadoKey = null,
        ?string $meCertificadoSenha = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdCaixa = $cdCaixa;
        $this->dsClientId = $dsClientId;
        $this->dsFraseSecreta = $dsFraseSecreta;
        $this->meCertificadoPfx = $meCertificadoPfx;
        $this->meCertificadoKey = $meCertificadoKey;
        $this->meCertificadoSenha = $meCertificadoSenha;
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

    public function getDsClientId(): ?string
    {
        return $this->dsClientId;
    }

    public function setDsClientId(?string $dsClientId): self
    {
        $this->dsClientId = $dsClientId;
        return $this;
    }

    public function getDsFraseSecreta(): ?string
    {
        return $this->dsFraseSecreta;
    }

    public function setDsFraseSecreta(?string $dsFraseSecreta): self
    {
        $this->dsFraseSecreta = $dsFraseSecreta;
        return $this;
    }

    public function getMeCertificadoPfx(): ?string
    {
        return $this->meCertificadoPfx;
    }

    public function setMeCertificadoPfx(?string $meCertificadoPfx): self
    {
        $this->meCertificadoPfx = $meCertificadoPfx;
        return $this;
    }

    public function getMeCertificadoKey(): ?string
    {
        return $this->meCertificadoKey;
    }

    public function setMeCertificadoKey(?string $meCertificadoKey): self
    {
        $this->meCertificadoKey = $meCertificadoKey;
        return $this;
    }

    public function getMeCertificadoSenha(): ?string
    {
        return $this->meCertificadoSenha;
    }

    public function setMeCertificadoSenha(?string $meCertificadoSenha): self
    {
        $this->meCertificadoSenha = $meCertificadoSenha;
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

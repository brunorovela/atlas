<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BancoDoBrasilContaConfiguracaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BancoDoBrasilContaConfiguracaoRepository::class)]
#[ORM\Table(
    name: 'banco_do_brasil_conta_configuracao',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_general_ci']
)]
#[ORM\UniqueConstraint(name: 'ix_bb_conta_configuracao_conta', columns: ['cd_caixa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_bb_conta_configuracao_conta', 'colunas' => ['cd_caixa'], 'tabelaAlvo' => 'fin_cadastro_contas', 'colunasAlvo' => ['cd_caixa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BancoDoBrasilContaConfiguracao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: FinCadastroContas::class)]
    #[ORM\JoinColumn(name: 'cd_caixa', referencedColumnName: 'cd_caixa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?FinCadastroContas $cdCaixa = null;

    #[ORM\Column(name: 'ds_client_id_boleto', type: 'text', length: 65535)]
    private ?string $dsClientIdBoleto = null;

    #[ORM\Column(name: 'ds_client_secret_boleto', type: 'text', length: 65535)]
    private ?string $dsClientSecretBoleto = null;

    #[ORM\Column(name: 'ds_app_key_boleto', type: 'text', length: 65535)]
    private ?string $dsAppKeyBoleto = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?FinCadastroContas $cdCaixa = null,
        ?string $dsClientIdBoleto = null,
        ?string $dsClientSecretBoleto = null,
        ?string $dsAppKeyBoleto = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdCaixa = $cdCaixa;
        $this->dsClientIdBoleto = $dsClientIdBoleto;
        $this->dsClientSecretBoleto = $dsClientSecretBoleto;
        $this->dsAppKeyBoleto = $dsAppKeyBoleto;
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

    public function getDsAppKeyBoleto(): ?string
    {
        return $this->dsAppKeyBoleto;
    }

    public function setDsAppKeyBoleto(?string $dsAppKeyBoleto): self
    {
        $this->dsAppKeyBoleto = $dsAppKeyBoleto;
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

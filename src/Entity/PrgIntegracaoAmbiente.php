<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PrgIntegracaoAmbienteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrgIntegracaoAmbienteRepository::class)]
#[ORM\Table(
    name: 'prg_integracao_ambiente',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_general_ci']
)]
#[ORM\UniqueConstraint(name: 'prg_integracao_ambiente_ds_chave_IDX', columns: ['ds_chave', 'cd_integracao_externa'])]
#[ORM\Index(name: 'fk_prg_integracao_externa', columns: ['cd_integracao_externa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_prg_integracao_externa', 'colunas' => ['cd_integracao_externa'], 'tabelaAlvo' => 'nu_integracao_externa', 'colunasAlvo' => ['cd_sistema'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class PrgIntegracaoAmbiente
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: NuIntegracaoExterna::class)]
    #[ORM\JoinColumn(name: 'cd_integracao_externa', referencedColumnName: 'cd_sistema', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuIntegracaoExterna $cdIntegracaoExterna = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'ds_api_key', type: 'string', length: 255, nullable: true)]
    private ?string $dsApiKey = null;

    #[ORM\Column(name: 'ds_sso_api_key', type: 'string', length: 255, nullable: true)]
    private ?string $dsSsoApiKey = null;

    #[ORM\Column(name: 'ds_sso_api_token', type: 'text', length: 65535, nullable: true, options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci'])]
    private ?string $dsSsoApiToken = null;

    #[ORM\Column(name: 'ds_sso_url', type: 'string', length: 255, nullable: true)]
    private ?string $dsSsoUrl = null;

    #[ORM\Column(name: 'ds_conta_financeiro', type: 'string', length: 255, nullable: true)]
    private ?string $dsContaFinanceiro = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'nr_limite_lote', type: 'integer', nullable: true)]
    private ?int $nrLimiteLote = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'sn_homologacao', type: 'boolean', options: ['default' => '0'])]
    private bool $snHomologacao = false;

    public function __construct(
        ?NuIntegracaoExterna $cdIntegracaoExterna = null,
        ?string $dsTitulo = null,
        ?string $dsApiKey = null,
        ?string $dsSsoApiKey = null,
        ?string $dsSsoApiToken = null,
        ?string $dsSsoUrl = null,
        ?string $dsContaFinanceiro = null,
        ?string $dsChave = null,
        ?int $nrLimiteLote = null,
        ?\DateTimeInterface $dtBase = null,
        bool $snHomologacao = false
    ) {
        $this->cdIntegracaoExterna = $cdIntegracaoExterna;
        $this->dsTitulo = $dsTitulo;
        $this->dsApiKey = $dsApiKey;
        $this->dsSsoApiKey = $dsSsoApiKey;
        $this->dsSsoApiToken = $dsSsoApiToken;
        $this->dsSsoUrl = $dsSsoUrl;
        $this->dsContaFinanceiro = $dsContaFinanceiro;
        $this->dsChave = $dsChave;
        $this->nrLimiteLote = $nrLimiteLote;
        $this->dtBase = $dtBase;
        $this->snHomologacao = $snHomologacao;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdIntegracaoExterna(): ?NuIntegracaoExterna
    {
        return $this->cdIntegracaoExterna;
    }

    public function setCdIntegracaoExterna(?NuIntegracaoExterna $cdIntegracaoExterna): self
    {
        $this->cdIntegracaoExterna = $cdIntegracaoExterna;
        return $this;
    }

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
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

    public function getDsSsoApiKey(): ?string
    {
        return $this->dsSsoApiKey;
    }

    public function setDsSsoApiKey(?string $dsSsoApiKey): self
    {
        $this->dsSsoApiKey = $dsSsoApiKey;
        return $this;
    }

    public function getDsSsoApiToken(): ?string
    {
        return $this->dsSsoApiToken;
    }

    public function setDsSsoApiToken(?string $dsSsoApiToken): self
    {
        $this->dsSsoApiToken = $dsSsoApiToken;
        return $this;
    }

    public function getDsSsoUrl(): ?string
    {
        return $this->dsSsoUrl;
    }

    public function setDsSsoUrl(?string $dsSsoUrl): self
    {
        $this->dsSsoUrl = $dsSsoUrl;
        return $this;
    }

    public function getDsContaFinanceiro(): ?string
    {
        return $this->dsContaFinanceiro;
    }

    public function setDsContaFinanceiro(?string $dsContaFinanceiro): self
    {
        $this->dsContaFinanceiro = $dsContaFinanceiro;
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

    public function getNrLimiteLote(): ?int
    {
        return $this->nrLimiteLote;
    }

    public function setNrLimiteLote(?int $nrLimiteLote): self
    {
        $this->nrLimiteLote = $nrLimiteLote;
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

    public function isSnHomologacao(): bool
    {
        return $this->snHomologacao;
    }

    public function setSnHomologacao(bool $snHomologacao): self
    {
        $this->snHomologacao = $snHomologacao;
        return $this;
    }
}

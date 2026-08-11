<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\RgoOpcoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RgoOpcoesRepository::class)]
#[ORM\Table(
    name: 'rgo_opcoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_DS_CHAVE', columns: ['ds_chave'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[ORM\Index(name: 'IX_CD_RELATORIO', columns: ['cd_relatorio'])]
#[ORM\Index(name: 'IX_CD_OPCAO_TIPO', columns: ['cd_opcao_tipo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_rgo_opcoes_rgo_opcoes_tipos', 'colunas' => ['cd_opcao_tipo'], 'tabelaAlvo' => 'rgo_opcoes_tipos', 'colunasAlvo' => ['cd_opcao_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_rgo_opcoes_rgo_relatorios', 'colunas' => ['cd_relatorio'], 'tabelaAlvo' => 'rgo_relatorios', 'colunasAlvo' => ['cd_relatorio'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RgoOpcoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_opcao', type: 'integer')]
    private ?int $cdOpcao = null;

    #[ORM\ManyToOne(targetEntity: RgoRelatorios::class)]
    #[ORM\JoinColumn(name: 'cd_relatorio', referencedColumnName: 'cd_relatorio', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?RgoRelatorios $cdRelatorio = null;

    #[ORM\ManyToOne(targetEntity: RgoOpcoesTipos::class)]
    #[ORM\JoinColumn(name: 'cd_opcao_tipo', referencedColumnName: 'cd_opcao_tipo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?RgoOpcoesTipos $cdOpcaoTipo = null;

    #[ORM\Column(name: 'sn_padrao', type: 'boolean', options: ['default' => '0'])]
    private bool $snPadrao = false;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', options: ['default' => '1'])]
    private bool $snAtivo = true;

    #[ORM\Column(name: 'ds_opcao', type: 'string', length: 255)]
    private ?string $dsOpcao = null;

    #[ORM\Column(name: 'me_configuracao', type: 'text', length: 16777215)]
    private ?string $meConfiguracao = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?RgoRelatorios $cdRelatorio = null,
        ?RgoOpcoesTipos $cdOpcaoTipo = null,
        bool $snPadrao = false,
        bool $snAtivo = true,
        ?string $dsOpcao = null,
        ?string $meConfiguracao = null,
        ?string $dsChave = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdRelatorio = $cdRelatorio;
        $this->cdOpcaoTipo = $cdOpcaoTipo;
        $this->snPadrao = $snPadrao;
        $this->snAtivo = $snAtivo;
        $this->dsOpcao = $dsOpcao;
        $this->meConfiguracao = $meConfiguracao;
        $this->dsChave = $dsChave;
        $this->dtBase = $dtBase;
    }

    public function getCdOpcao(): ?int
    {
        return $this->cdOpcao;
    }

    public function getCdRelatorio(): ?RgoRelatorios
    {
        return $this->cdRelatorio;
    }

    public function setCdRelatorio(?RgoRelatorios $cdRelatorio): self
    {
        $this->cdRelatorio = $cdRelatorio;
        return $this;
    }

    public function getCdOpcaoTipo(): ?RgoOpcoesTipos
    {
        return $this->cdOpcaoTipo;
    }

    public function setCdOpcaoTipo(?RgoOpcoesTipos $cdOpcaoTipo): self
    {
        $this->cdOpcaoTipo = $cdOpcaoTipo;
        return $this;
    }

    public function isSnPadrao(): bool
    {
        return $this->snPadrao;
    }

    public function setSnPadrao(bool $snPadrao): self
    {
        $this->snPadrao = $snPadrao;
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

    public function getDsOpcao(): ?string
    {
        return $this->dsOpcao;
    }

    public function setDsOpcao(?string $dsOpcao): self
    {
        $this->dsOpcao = $dsOpcao;
        return $this;
    }

    public function getMeConfiguracao(): ?string
    {
        return $this->meConfiguracao;
    }

    public function setMeConfiguracao(?string $meConfiguracao): self
    {
        $this->meConfiguracao = $meConfiguracao;
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

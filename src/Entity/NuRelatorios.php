<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\NuRelatoriosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuRelatoriosRepository::class)]
#[ORM\Table(
    name: 'nu_relatorios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ds_chave_relatorio', columns: ['ds_chave_relatorio'])]
#[ORM\Index(name: 'IX_DS_CHAVE_RELATORIO', columns: ['ds_chave_relatorio'], options: ['lengths' => [20]])]
class NuRelatorios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_relatorio', type: 'integer')]
    private ?int $cdRelatorio = null;

    #[ORM\Column(name: 'ds_relatorio', type: 'string', length: 100)]
    private ?string $dsRelatorio = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'cd_cabecalho', type: 'integer', options: ['default' => '-1'])]
    private int $cdCabecalho = -1;

    #[ORM\Column(name: 'ds_valores_formulas', type: 'string', length: 255, nullable: true)]
    private ?string $dsValoresFormulas = null;

    #[ORM\Column(name: 'ds_parametros_fixos', type: 'string', length: 255, nullable: true)]
    private ?string $dsParametrosFixos = null;

    #[ORM\Column(name: 'ds_formula_grupo', type: 'string', length: 255, nullable: true)]
    private ?string $dsFormulaGrupo = null;

    #[ORM\Column(name: 'ds_ordem', type: 'string', length: 255, nullable: true)]
    private ?string $dsOrdem = null;

    #[ORM\Column(name: 'ds_sql_pre_execucao', type: 'text', length: 65535, nullable: true)]
    private ?string $dsSqlPreExecucao = null;

    #[ORM\Column(name: 'ds_sql_pos_execucao', type: 'text', length: 65535, nullable: true)]
    private ?string $dsSqlPosExecucao = null;

    #[ORM\Column(name: 'sn_registra_impressoes', type: 'boolean', options: ['default' => '0'])]
    private bool $snRegistraImpressoes = false;

    #[ORM\Column(name: 'bb_arquivo', type: 'blob', length: 16777215, nullable: true)]
    private ?string $bbArquivo = null;

    #[ORM\Column(name: 'sn_disponivel', type: 'boolean', options: ['default' => '1'])]
    private bool $snDisponivel = true;

    #[ORM\Column(name: 'ds_chave_relatorio', type: 'string', length: 255, nullable: true)]
    private ?string $dsChaveRelatorio = null;

    #[ORM\Column(name: 'ds_chave_relatorio_pai', type: 'string', length: 255, nullable: true)]
    private ?string $dsChaveRelatorioPai = null;

    #[ORM\Column(name: 'sn_mostrar_config', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snMostrarConfig = null;

    #[ORM\Column(name: 'sn_sempre_visualizar', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snSempreVisualizar = null;

    public function __construct(
        ?string $dsRelatorio = null,
        ?string $dsDescricao = null,
        int $cdCabecalho = -1,
        ?string $dsValoresFormulas = null,
        ?string $dsParametrosFixos = null,
        ?string $dsFormulaGrupo = null,
        ?string $dsOrdem = null,
        ?string $dsSqlPreExecucao = null,
        ?string $dsSqlPosExecucao = null,
        bool $snRegistraImpressoes = false,
        ?string $bbArquivo = null,
        bool $snDisponivel = true,
        ?string $dsChaveRelatorio = null,
        ?string $dsChaveRelatorioPai = null,
        ?int $snMostrarConfig = null,
        ?int $snSempreVisualizar = null
    ) {
        $this->dsRelatorio = $dsRelatorio;
        $this->dsDescricao = $dsDescricao;
        $this->cdCabecalho = $cdCabecalho;
        $this->dsValoresFormulas = $dsValoresFormulas;
        $this->dsParametrosFixos = $dsParametrosFixos;
        $this->dsFormulaGrupo = $dsFormulaGrupo;
        $this->dsOrdem = $dsOrdem;
        $this->dsSqlPreExecucao = $dsSqlPreExecucao;
        $this->dsSqlPosExecucao = $dsSqlPosExecucao;
        $this->snRegistraImpressoes = $snRegistraImpressoes;
        $this->bbArquivo = $bbArquivo;
        $this->snDisponivel = $snDisponivel;
        $this->dsChaveRelatorio = $dsChaveRelatorio;
        $this->dsChaveRelatorioPai = $dsChaveRelatorioPai;
        $this->snMostrarConfig = $snMostrarConfig;
        $this->snSempreVisualizar = $snSempreVisualizar;
    }

    public function getCdRelatorio(): ?int
    {
        return $this->cdRelatorio;
    }

    public function getDsRelatorio(): ?string
    {
        return $this->dsRelatorio;
    }

    public function setDsRelatorio(?string $dsRelatorio): self
    {
        $this->dsRelatorio = $dsRelatorio;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }

    public function getCdCabecalho(): int
    {
        return $this->cdCabecalho;
    }

    public function setCdCabecalho(int $cdCabecalho): self
    {
        $this->cdCabecalho = $cdCabecalho;
        return $this;
    }

    public function getDsValoresFormulas(): ?string
    {
        return $this->dsValoresFormulas;
    }

    public function setDsValoresFormulas(?string $dsValoresFormulas): self
    {
        $this->dsValoresFormulas = $dsValoresFormulas;
        return $this;
    }

    public function getDsParametrosFixos(): ?string
    {
        return $this->dsParametrosFixos;
    }

    public function setDsParametrosFixos(?string $dsParametrosFixos): self
    {
        $this->dsParametrosFixos = $dsParametrosFixos;
        return $this;
    }

    public function getDsFormulaGrupo(): ?string
    {
        return $this->dsFormulaGrupo;
    }

    public function setDsFormulaGrupo(?string $dsFormulaGrupo): self
    {
        $this->dsFormulaGrupo = $dsFormulaGrupo;
        return $this;
    }

    public function getDsOrdem(): ?string
    {
        return $this->dsOrdem;
    }

    public function setDsOrdem(?string $dsOrdem): self
    {
        $this->dsOrdem = $dsOrdem;
        return $this;
    }

    public function getDsSqlPreExecucao(): ?string
    {
        return $this->dsSqlPreExecucao;
    }

    public function setDsSqlPreExecucao(?string $dsSqlPreExecucao): self
    {
        $this->dsSqlPreExecucao = $dsSqlPreExecucao;
        return $this;
    }

    public function getDsSqlPosExecucao(): ?string
    {
        return $this->dsSqlPosExecucao;
    }

    public function setDsSqlPosExecucao(?string $dsSqlPosExecucao): self
    {
        $this->dsSqlPosExecucao = $dsSqlPosExecucao;
        return $this;
    }

    public function isSnRegistraImpressoes(): bool
    {
        return $this->snRegistraImpressoes;
    }

    public function setSnRegistraImpressoes(bool $snRegistraImpressoes): self
    {
        $this->snRegistraImpressoes = $snRegistraImpressoes;
        return $this;
    }

    public function getBbArquivo(): ?string
    {
        return $this->bbArquivo;
    }

    public function setBbArquivo(?string $bbArquivo): self
    {
        $this->bbArquivo = $bbArquivo;
        return $this;
    }

    public function isSnDisponivel(): bool
    {
        return $this->snDisponivel;
    }

    public function setSnDisponivel(bool $snDisponivel): self
    {
        $this->snDisponivel = $snDisponivel;
        return $this;
    }

    public function getDsChaveRelatorio(): ?string
    {
        return $this->dsChaveRelatorio;
    }

    public function setDsChaveRelatorio(?string $dsChaveRelatorio): self
    {
        $this->dsChaveRelatorio = $dsChaveRelatorio;
        return $this;
    }

    public function getDsChaveRelatorioPai(): ?string
    {
        return $this->dsChaveRelatorioPai;
    }

    public function setDsChaveRelatorioPai(?string $dsChaveRelatorioPai): self
    {
        $this->dsChaveRelatorioPai = $dsChaveRelatorioPai;
        return $this;
    }

    public function getSnMostrarConfig(): ?int
    {
        return $this->snMostrarConfig;
    }

    public function setSnMostrarConfig(?int $snMostrarConfig): self
    {
        $this->snMostrarConfig = $snMostrarConfig;
        return $this;
    }

    public function getSnSempreVisualizar(): ?int
    {
        return $this->snSempreVisualizar;
    }

    public function setSnSempreVisualizar(?int $snSempreVisualizar): self
    {
        $this->snSempreVisualizar = $snSempreVisualizar;
        return $this;
    }
}

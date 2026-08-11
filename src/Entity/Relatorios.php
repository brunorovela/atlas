<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RelatoriosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RelatoriosRepository::class)]
#[ORM\Table(
    name: 'relatorios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxChave', columns: ['ds_chave'])]
#[ORM\Index(name: 'IX_CD_MODULO', columns: ['cd_modulo'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
class Relatorios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_relatorio', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRelatorio = null;

    #[ORM\Column(name: 'nm_relatorio', type: 'string', length: 70, nullable: true)]
    private ?string $nmRelatorio = null;

    #[ORM\Column(name: 'cd_modulo', type: 'integer', nullable: true)]
    private ?int $cdModulo = null;

    #[ORM\Column(name: 'cd_cabecalho', type: 'integer', nullable: true, options: ['default' => '-1'])]
    private ?int $cdCabecalho = -1;

    #[ORM\Column(name: 'ds_grupo', type: 'string', length: 50, nullable: true)]
    private ?string $dsGrupo = null;

    #[ORM\Column(name: 'nm_arquivo', type: 'string', length: 50, nullable: true)]
    private ?string $nmArquivo = null;

    #[ORM\Column(name: 'ds_parametros', type: 'string', length: 255, nullable: true)]
    private ?string $dsParametros = null;

    #[ORM\Column(name: 'ds_formula', type: 'text', length: 65535, nullable: true)]
    private ?string $dsFormula = null;

    #[ORM\Column(name: 'ds_sql_exp', type: 'text', length: 65535, nullable: true)]
    private ?string $dsSqlExp = null;

    #[ORM\Column(name: 'ds_especial', type: 'text', length: 65535, nullable: true)]
    private ?string $dsEspecial = null;

    #[ORM\Column(name: 'ds_ordem', type: 'string', length: 255, nullable: true)]
    private ?string $dsOrdem = null;

    #[ORM\Column(name: 'sn_disponivel', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snDisponivel = null;

    #[ORM\Column(name: 'ds_formula_grupo', type: 'string', length: 255, nullable: true)]
    private ?string $dsFormulaGrupo = null;

    #[ORM\Column(name: 'ds_sql', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsSql = null;

    #[ORM\Column(name: 'ds_sql_ordem', type: 'string', length: 255, nullable: true)]
    private ?string $dsSqlOrdem = null;

    #[ORM\Column(name: 'sn_impressao_numero', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snImpressaoNumero = 'N';

    #[ORM\Column(name: 'ds_variaveis', type: 'string', length: 255, nullable: true)]
    private ?string $dsVariaveis = null;

    #[ORM\Column(name: 'sn_pode_exportar', type: 'boolean', options: ['default' => '1'])]
    private bool $snPodeExportar = true;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_sql_apos_relatorio', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsSqlAposRelatorio = null;

    #[ORM\Column(name: 'ds_mensagem_apos_relatorio', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsMensagemAposRelatorio = null;

    #[ORM\Column(name: 'ds_filtro_bloquetos', type: 'string', length: 255, nullable: true)]
    private ?string $dsFiltroBloquetos = null;

    // Sem construtor: 21 propriedades. Use os setters encadeados.

    public function getCdRelatorio(): ?int
    {
        return $this->cdRelatorio;
    }

    public function getNmRelatorio(): ?string
    {
        return $this->nmRelatorio;
    }

    public function setNmRelatorio(?string $nmRelatorio): self
    {
        $this->nmRelatorio = $nmRelatorio;
        return $this;
    }

    public function getCdModulo(): ?int
    {
        return $this->cdModulo;
    }

    public function setCdModulo(?int $cdModulo): self
    {
        $this->cdModulo = $cdModulo;
        return $this;
    }

    public function getCdCabecalho(): ?int
    {
        return $this->cdCabecalho;
    }

    public function setCdCabecalho(?int $cdCabecalho): self
    {
        $this->cdCabecalho = $cdCabecalho;
        return $this;
    }

    public function getDsGrupo(): ?string
    {
        return $this->dsGrupo;
    }

    public function setDsGrupo(?string $dsGrupo): self
    {
        $this->dsGrupo = $dsGrupo;
        return $this;
    }

    public function getNmArquivo(): ?string
    {
        return $this->nmArquivo;
    }

    public function setNmArquivo(?string $nmArquivo): self
    {
        $this->nmArquivo = $nmArquivo;
        return $this;
    }

    public function getDsParametros(): ?string
    {
        return $this->dsParametros;
    }

    public function setDsParametros(?string $dsParametros): self
    {
        $this->dsParametros = $dsParametros;
        return $this;
    }

    public function getDsFormula(): ?string
    {
        return $this->dsFormula;
    }

    public function setDsFormula(?string $dsFormula): self
    {
        $this->dsFormula = $dsFormula;
        return $this;
    }

    public function getDsSqlExp(): ?string
    {
        return $this->dsSqlExp;
    }

    public function setDsSqlExp(?string $dsSqlExp): self
    {
        $this->dsSqlExp = $dsSqlExp;
        return $this;
    }

    public function getDsEspecial(): ?string
    {
        return $this->dsEspecial;
    }

    public function setDsEspecial(?string $dsEspecial): self
    {
        $this->dsEspecial = $dsEspecial;
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

    public function getSnDisponivel(): ?string
    {
        return $this->snDisponivel;
    }

    public function setSnDisponivel(?string $snDisponivel): self
    {
        $this->snDisponivel = $snDisponivel;
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

    public function getDsSql(): ?string
    {
        return $this->dsSql;
    }

    public function setDsSql(?string $dsSql): self
    {
        $this->dsSql = $dsSql;
        return $this;
    }

    public function getDsSqlOrdem(): ?string
    {
        return $this->dsSqlOrdem;
    }

    public function setDsSqlOrdem(?string $dsSqlOrdem): self
    {
        $this->dsSqlOrdem = $dsSqlOrdem;
        return $this;
    }

    public function getSnImpressaoNumero(): ?string
    {
        return $this->snImpressaoNumero;
    }

    public function setSnImpressaoNumero(?string $snImpressaoNumero): self
    {
        $this->snImpressaoNumero = $snImpressaoNumero;
        return $this;
    }

    public function getDsVariaveis(): ?string
    {
        return $this->dsVariaveis;
    }

    public function setDsVariaveis(?string $dsVariaveis): self
    {
        $this->dsVariaveis = $dsVariaveis;
        return $this;
    }

    public function isSnPodeExportar(): bool
    {
        return $this->snPodeExportar;
    }

    public function setSnPodeExportar(bool $snPodeExportar): self
    {
        $this->snPodeExportar = $snPodeExportar;
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

    public function getDsSqlAposRelatorio(): ?string
    {
        return $this->dsSqlAposRelatorio;
    }

    public function setDsSqlAposRelatorio(?string $dsSqlAposRelatorio): self
    {
        $this->dsSqlAposRelatorio = $dsSqlAposRelatorio;
        return $this;
    }

    public function getDsMensagemAposRelatorio(): ?string
    {
        return $this->dsMensagemAposRelatorio;
    }

    public function setDsMensagemAposRelatorio(?string $dsMensagemAposRelatorio): self
    {
        $this->dsMensagemAposRelatorio = $dsMensagemAposRelatorio;
        return $this;
    }

    public function getDsFiltroBloquetos(): ?string
    {
        return $this->dsFiltroBloquetos;
    }

    public function setDsFiltroBloquetos(?string $dsFiltroBloquetos): self
    {
        $this->dsFiltroBloquetos = $dsFiltroBloquetos;
        return $this;
    }
}

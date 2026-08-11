<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinDemonstrativoConfigRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinDemonstrativoConfigRepository::class)]
#[ORM\Table(
    name: 'fin_demonstrativo_config',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_DEMONSTRATIVO', columns: ['cd_demonstrativo'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_DEM_CFG_CD_DEMONSTRATIVO', 'colunas' => ['cd_demonstrativo'], 'tabelaAlvo' => 'fin_demonstrativos', 'colunasAlvo' => ['cd_demonstrativo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: ['cd_demonstrativo']
)]
class FinDemonstrativoConfig
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: FinDemonstrativos::class)]
    #[ORM\JoinColumn(name: 'cd_demonstrativo', referencedColumnName: 'cd_demonstrativo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?FinDemonstrativos $cdDemonstrativo = null;

    #[ORM\Id]
    #[ORM\Column(name: 'ds_chave', type: 'string', length: 30, options: ['default' => ''])]
    private string $dsChave = '';

    #[ORM\Column(name: 'ds_grupo', type: 'string', length: 100, nullable: true)]
    private ?string $dsGrupo = null;

    #[ORM\Column(name: 'ds_chave_tabela', type: 'string', length: 50, nullable: true)]
    private ?string $dsChaveTabela = null;

    #[ORM\Column(name: 'ds_filtro', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsFiltro = null;

    #[ORM\Column(name: 'ds_coluna_sql', type: 'string', length: 255, nullable: true, options: ['comment' => 'Apenas aplicado para os campos de desconto'])]
    private ?string $dsColunaSql = null;

    #[ORM\Column(name: 'nr_ordem_contas', type: 'integer', nullable: true)]
    private ?int $nrOrdemContas = null;

    #[ORM\Column(name: 'ds_formula', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsFormula = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'nr_receita', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $nrReceita = false;

    #[ORM\Column(name: 'sn_abrir_contas', type: 'boolean', options: ['default' => '0'])]
    private bool $snAbrirContas = false;

    #[ORM\Column(name: 'sn_estilo_conta', type: 'boolean', nullable: true, options: ['default' => '0', 'comment' => 'Mostrar os totalizadores como conta'])]
    private ?bool $snEstiloConta = false;

    #[ORM\Column(name: 'sn_mostrar_valores', type: 'boolean', nullable: true, options: ['default' => '1', 'comment' => 'Mostrar os valores dos totalizadores'])]
    private ?bool $snMostrarValores = true;

    #[ORM\Column(name: 'sn_mostrar_sig', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $snMostrarSig = 0;

    public function __construct(
        ?FinDemonstrativos $cdDemonstrativo = null,
        string $dsChave = '',
        ?string $dsGrupo = null,
        ?string $dsChaveTabela = null,
        ?string $dsFiltro = null,
        ?string $dsColunaSql = null,
        ?int $nrOrdemContas = null,
        ?string $dsFormula = null,
        ?int $nrOrdem = null,
        ?bool $nrReceita = false,
        bool $snAbrirContas = false,
        ?bool $snEstiloConta = false,
        ?bool $snMostrarValores = true,
        ?int $snMostrarSig = 0
    ) {
        $this->cdDemonstrativo = $cdDemonstrativo;
        $this->dsChave = $dsChave;
        $this->dsGrupo = $dsGrupo;
        $this->dsChaveTabela = $dsChaveTabela;
        $this->dsFiltro = $dsFiltro;
        $this->dsColunaSql = $dsColunaSql;
        $this->nrOrdemContas = $nrOrdemContas;
        $this->dsFormula = $dsFormula;
        $this->nrOrdem = $nrOrdem;
        $this->nrReceita = $nrReceita;
        $this->snAbrirContas = $snAbrirContas;
        $this->snEstiloConta = $snEstiloConta;
        $this->snMostrarValores = $snMostrarValores;
        $this->snMostrarSig = $snMostrarSig;
    }

    public function getCdDemonstrativo(): ?FinDemonstrativos
    {
        return $this->cdDemonstrativo;
    }

    public function setCdDemonstrativo(?FinDemonstrativos $cdDemonstrativo): self
    {
        $this->cdDemonstrativo = $cdDemonstrativo;
        return $this;
    }

    public function getDsChave(): string
    {
        return $this->dsChave;
    }

    public function setDsChave(string $dsChave): self
    {
        $this->dsChave = $dsChave;
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

    public function getDsChaveTabela(): ?string
    {
        return $this->dsChaveTabela;
    }

    public function setDsChaveTabela(?string $dsChaveTabela): self
    {
        $this->dsChaveTabela = $dsChaveTabela;
        return $this;
    }

    public function getDsFiltro(): ?string
    {
        return $this->dsFiltro;
    }

    public function setDsFiltro(?string $dsFiltro): self
    {
        $this->dsFiltro = $dsFiltro;
        return $this;
    }

    public function getDsColunaSql(): ?string
    {
        return $this->dsColunaSql;
    }

    public function setDsColunaSql(?string $dsColunaSql): self
    {
        $this->dsColunaSql = $dsColunaSql;
        return $this;
    }

    public function getNrOrdemContas(): ?int
    {
        return $this->nrOrdemContas;
    }

    public function setNrOrdemContas(?int $nrOrdemContas): self
    {
        $this->nrOrdemContas = $nrOrdemContas;
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

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function isNrReceita(): ?bool
    {
        return $this->nrReceita;
    }

    public function setNrReceita(?bool $nrReceita): self
    {
        $this->nrReceita = $nrReceita;
        return $this;
    }

    public function isSnAbrirContas(): bool
    {
        return $this->snAbrirContas;
    }

    public function setSnAbrirContas(bool $snAbrirContas): self
    {
        $this->snAbrirContas = $snAbrirContas;
        return $this;
    }

    public function isSnEstiloConta(): ?bool
    {
        return $this->snEstiloConta;
    }

    public function setSnEstiloConta(?bool $snEstiloConta): self
    {
        $this->snEstiloConta = $snEstiloConta;
        return $this;
    }

    public function isSnMostrarValores(): ?bool
    {
        return $this->snMostrarValores;
    }

    public function setSnMostrarValores(?bool $snMostrarValores): self
    {
        $this->snMostrarValores = $snMostrarValores;
        return $this;
    }

    public function getSnMostrarSig(): ?int
    {
        return $this->snMostrarSig;
    }

    public function setSnMostrarSig(?int $snMostrarSig): self
    {
        $this->snMostrarSig = $snMostrarSig;
        return $this;
    }
}

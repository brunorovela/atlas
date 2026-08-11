<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\RelFiltrosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RelFiltrosRepository::class)]
#[ORM\Table(
    name: 'rel_filtros',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'fk_relatorio_cd_relatorio', columns: ['cd_relatorio'])]
#[ORM\Index(name: 'fk_tipo_cd_tipo', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_CD_RELATORIO', columns: ['cd_relatorio'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_relatorio_cd_relatorio', 'colunas' => ['cd_relatorio'], 'tabelaAlvo' => 'rel_relatorios', 'colunasAlvo' => ['cd_relatorio'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_tipo_cd_tipo', 'colunas' => ['cd_tipo'], 'tabelaAlvo' => 'rel_tipos', 'colunasAlvo' => ['cd_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RelFiltros
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_filtro', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdFiltro = null;

    #[ORM\ManyToOne(targetEntity: RelRelatorios::class)]
    #[ORM\JoinColumn(name: 'cd_relatorio', referencedColumnName: 'cd_relatorio', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?RelRelatorios $cdRelatorio = null;

    #[ORM\ManyToOne(targetEntity: RelTipos::class)]
    #[ORM\JoinColumn(name: 'cd_tipo', referencedColumnName: 'cd_tipo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?RelTipos $cdTipo = null;

    #[ORM\Column(name: 'ds_campo', type: 'string', length: 100, nullable: true)]
    private ?string $dsCampo = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 100)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'ds_valor', type: 'text', length: 65535, nullable: true)]
    private ?string $dsValor = null;

    #[ORM\Column(name: 'sn_obrigatorio', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snObrigatorio = 0;

    #[ORM\Column(name: 'nr_modos', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrModos = null;

    #[ORM\Column(name: 'nr_modo', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrModo = null;

    #[ORM\Column(name: 'sn_exibe', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snExibe = 1;

    #[ORM\Column(name: 'sn_formula', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snFormula = 0;

    public function __construct(
        ?RelRelatorios $cdRelatorio = null,
        ?RelTipos $cdTipo = null,
        ?string $dsCampo = null,
        ?string $dsNome = null,
        ?string $dsDescricao = null,
        ?string $dsValor = null,
        ?int $snObrigatorio = 0,
        ?int $nrModos = null,
        ?int $nrModo = null,
        ?int $snExibe = 1,
        ?int $snFormula = 0
    ) {
        $this->cdRelatorio = $cdRelatorio;
        $this->cdTipo = $cdTipo;
        $this->dsCampo = $dsCampo;
        $this->dsNome = $dsNome;
        $this->dsDescricao = $dsDescricao;
        $this->dsValor = $dsValor;
        $this->snObrigatorio = $snObrigatorio;
        $this->nrModos = $nrModos;
        $this->nrModo = $nrModo;
        $this->snExibe = $snExibe;
        $this->snFormula = $snFormula;
    }

    public function getCdFiltro(): ?int
    {
        return $this->cdFiltro;
    }

    public function getCdRelatorio(): ?RelRelatorios
    {
        return $this->cdRelatorio;
    }

    public function setCdRelatorio(?RelRelatorios $cdRelatorio): self
    {
        $this->cdRelatorio = $cdRelatorio;
        return $this;
    }

    public function getCdTipo(): ?RelTipos
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?RelTipos $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getDsCampo(): ?string
    {
        return $this->dsCampo;
    }

    public function setDsCampo(?string $dsCampo): self
    {
        $this->dsCampo = $dsCampo;
        return $this;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
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

    public function getDsValor(): ?string
    {
        return $this->dsValor;
    }

    public function setDsValor(?string $dsValor): self
    {
        $this->dsValor = $dsValor;
        return $this;
    }

    public function getSnObrigatorio(): ?int
    {
        return $this->snObrigatorio;
    }

    public function setSnObrigatorio(?int $snObrigatorio): self
    {
        $this->snObrigatorio = $snObrigatorio;
        return $this;
    }

    public function getNrModos(): ?int
    {
        return $this->nrModos;
    }

    public function setNrModos(?int $nrModos): self
    {
        $this->nrModos = $nrModos;
        return $this;
    }

    public function getNrModo(): ?int
    {
        return $this->nrModo;
    }

    public function setNrModo(?int $nrModo): self
    {
        $this->nrModo = $nrModo;
        return $this;
    }

    public function getSnExibe(): ?int
    {
        return $this->snExibe;
    }

    public function setSnExibe(?int $snExibe): self
    {
        $this->snExibe = $snExibe;
        return $this;
    }

    public function getSnFormula(): ?int
    {
        return $this->snFormula;
    }

    public function setSnFormula(?int $snFormula): self
    {
        $this->snFormula = $snFormula;
        return $this;
    }
}

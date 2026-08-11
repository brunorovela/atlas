<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\NuRelatoriosCamposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuRelatoriosCamposRepository::class)]
#[ORM\Table(
    name: 'nu_relatorios_campos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'IdxUnica', columns: ['cd_relatorio', 'cd_cadastro_campo'])]
#[ORM\Index(name: 'cd_relatorio', columns: ['cd_relatorio'])]
#[ORM\Index(name: 'cd_relatorio_2', columns: ['cd_relatorio'])]
#[ORM\Index(name: 'IX_CD_RELATORIO', columns: ['cd_relatorio'])]
#[ORM\Index(name: 'IX_CD_CADASTRO_CAMPO', columns: ['cd_cadastro_campo'])]
#[ORM\Index(name: 'IX_CD_TIPO_FILTRO', columns: ['cd_tipo_filtro'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'nu_relatorios_campos_ibfk_1', 'colunas' => ['cd_relatorio'], 'tabelaAlvo' => 'nu_relatorios', 'colunasAlvo' => ['cd_relatorio'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']],
        ['nome' => 'nu_relatorios_campos_ibfk_3', 'colunas' => ['cd_relatorio'], 'tabelaAlvo' => 'nu_relatorios', 'colunasAlvo' => ['cd_relatorio'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class NuRelatoriosCampos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_relatorio_campo', type: 'integer')]
    private ?int $cdRelatorioCampo = null;

    #[ORM\ManyToOne(targetEntity: NuRelatorios::class)]
    #[ORM\JoinColumn(name: 'cd_relatorio', referencedColumnName: 'cd_relatorio', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuRelatorios $cdRelatorio = null;

    #[ORM\Column(name: 'cd_cadastro_campo', type: 'integer')]
    private ?int $cdCadastroCampo = null;

    #[ORM\Column(name: 'cd_tipo_filtro', type: 'integer', options: ['default' => '1'])]
    private int $cdTipoFiltro = 1;

    #[ORM\Column(name: 'ds_formula', type: 'string', length: 255, nullable: true)]
    private ?string $dsFormula = null;

    #[ORM\Column(name: 'cd_AND_OR', type: 'integer', options: ['default' => '1'])]
    private int $cdAndOr = 1;

    public function __construct(
        ?NuRelatorios $cdRelatorio = null,
        ?int $cdCadastroCampo = null,
        int $cdTipoFiltro = 1,
        ?string $dsFormula = null,
        int $cdAndOr = 1
    ) {
        $this->cdRelatorio = $cdRelatorio;
        $this->cdCadastroCampo = $cdCadastroCampo;
        $this->cdTipoFiltro = $cdTipoFiltro;
        $this->dsFormula = $dsFormula;
        $this->cdAndOr = $cdAndOr;
    }

    public function getCdRelatorioCampo(): ?int
    {
        return $this->cdRelatorioCampo;
    }

    public function getCdRelatorio(): ?NuRelatorios
    {
        return $this->cdRelatorio;
    }

    public function setCdRelatorio(?NuRelatorios $cdRelatorio): self
    {
        $this->cdRelatorio = $cdRelatorio;
        return $this;
    }

    public function getCdCadastroCampo(): ?int
    {
        return $this->cdCadastroCampo;
    }

    public function setCdCadastroCampo(?int $cdCadastroCampo): self
    {
        $this->cdCadastroCampo = $cdCadastroCampo;
        return $this;
    }

    public function getCdTipoFiltro(): int
    {
        return $this->cdTipoFiltro;
    }

    public function setCdTipoFiltro(int $cdTipoFiltro): self
    {
        $this->cdTipoFiltro = $cdTipoFiltro;
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

    public function getCdAndOr(): int
    {
        return $this->cdAndOr;
    }

    public function setCdAndOr(int $cdAndOr): self
    {
        $this->cdAndOr = $cdAndOr;
        return $this;
    }
}

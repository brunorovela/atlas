<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\NuRelatoriosRelGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuRelatoriosRelGruposRepository::class)]
#[ORM\Table(
    name: 'nu_relatorios_rel_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_relatorio', columns: ['cd_relatorio'])]
#[ORM\Index(name: 'cd_relatorio_grupo', columns: ['cd_relatorio_grupo'])]
#[ORM\Index(name: 'cd_relatorio_2', columns: ['cd_relatorio'])]
#[ORM\Index(name: 'cd_relatorio_grupo_2', columns: ['cd_relatorio_grupo'])]
#[ORM\Index(name: 'IX_CD_RELATORIO', columns: ['cd_relatorio'])]
#[ORM\Index(name: 'IX_CD_RELATORIO_GRUPO', columns: ['cd_relatorio_grupo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'nu_relatorios_rel_grupos_ibfk_1', 'colunas' => ['cd_relatorio'], 'tabelaAlvo' => 'nu_relatorios', 'colunasAlvo' => ['cd_relatorio'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']],
        ['nome' => 'nu_relatorios_rel_grupos_ibfk_2', 'colunas' => ['cd_relatorio_grupo'], 'tabelaAlvo' => 'nu_relatorios_grupos', 'colunasAlvo' => ['cd_relatorio_grupo'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']],
        ['nome' => 'nu_relatorios_rel_grupos_ibfk_3', 'colunas' => ['cd_relatorio'], 'tabelaAlvo' => 'nu_relatorios', 'colunasAlvo' => ['cd_relatorio'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']],
        ['nome' => 'nu_relatorios_rel_grupos_ibfk_4', 'colunas' => ['cd_relatorio_grupo'], 'tabelaAlvo' => 'nu_relatorios_grupos', 'colunasAlvo' => ['cd_relatorio_grupo'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class NuRelatoriosRelGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_relatorio_rel_grupo', type: 'integer')]
    private ?int $cdRelatorioRelGrupo = null;

    #[ORM\ManyToOne(targetEntity: NuRelatorios::class)]
    #[ORM\JoinColumn(name: 'cd_relatorio', referencedColumnName: 'cd_relatorio', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuRelatorios $cdRelatorio = null;

    #[ORM\ManyToOne(targetEntity: NuRelatoriosGrupos::class)]
    #[ORM\JoinColumn(name: 'cd_relatorio_grupo', referencedColumnName: 'cd_relatorio_grupo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuRelatoriosGrupos $cdRelatorioGrupo = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrOrdem = null;

    public function __construct(
        ?NuRelatorios $cdRelatorio = null,
        ?NuRelatoriosGrupos $cdRelatorioGrupo = null,
        ?int $nrOrdem = null
    ) {
        $this->cdRelatorio = $cdRelatorio;
        $this->cdRelatorioGrupo = $cdRelatorioGrupo;
        $this->nrOrdem = $nrOrdem;
    }

    public function getCdRelatorioRelGrupo(): ?int
    {
        return $this->cdRelatorioRelGrupo;
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

    public function getCdRelatorioGrupo(): ?NuRelatoriosGrupos
    {
        return $this->cdRelatorioGrupo;
    }

    public function setCdRelatorioGrupo(?NuRelatoriosGrupos $cdRelatorioGrupo): self
    {
        $this->cdRelatorioGrupo = $cdRelatorioGrupo;
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
}

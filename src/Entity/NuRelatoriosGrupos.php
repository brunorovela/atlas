<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\NuRelatoriosGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuRelatoriosGruposRepository::class)]
#[ORM\Table(
    name: 'nu_relatorios_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_modulo', columns: ['cd_modulo'])]
#[ORM\Index(name: 'cd_relatorio_grupo_pai', columns: ['cd_relatorio_grupo_pai'])]
#[ORM\Index(name: 'cd_modulo_2', columns: ['cd_modulo'])]
#[ORM\Index(name: 'cd_relatorio_grupo_pai_2', columns: ['cd_relatorio_grupo_pai'])]
#[ORM\Index(name: 'IX_CD_MODULO', columns: ['cd_modulo'])]
#[ORM\Index(name: 'IX_CD_RELATORIO_GRUPO_PAI', columns: ['cd_relatorio_grupo_pai'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'nu_relatorios_grupos_ibfk_1', 'colunas' => ['cd_modulo'], 'tabelaAlvo' => 'nu_modulos', 'colunasAlvo' => ['cd_modulo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'nu_relatorios_grupos_ibfk_3', 'colunas' => ['cd_relatorio_grupo_pai'], 'tabelaAlvo' => 'nu_relatorios_grupos', 'colunasAlvo' => ['cd_relatorio_grupo_pai'], 'opcoes' => ['onDelete' => 'SET NULL', 'onUpdate' => 'SET NULL']]
    ],
    autoIncremento: []
)]
class NuRelatoriosGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_relatorio_grupo', type: 'integer')]
    private ?int $cdRelatorioGrupo = null;

    #[ORM\Column(name: 'ds_grupo', type: 'string', length: 100)]
    private ?string $dsGrupo = null;

    #[ORM\ManyToOne(targetEntity: NuModulos::class)]
    #[ORM\JoinColumn(name: 'cd_modulo', referencedColumnName: 'cd_modulo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuModulos $cdModulo = null;

    #[ORM\Column(name: 'cd_relatorio_grupo_pai', type: 'integer', nullable: true)]
    private ?int $cdRelatorioGrupoPai = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', options: ['unsigned' => true, 'default' => '1'])]
    private int $nrOrdem = 1;

    #[ORM\Column(name: 'sn_disponivel', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snDisponivel = 1;

    public function __construct(
        ?string $dsGrupo = null,
        ?NuModulos $cdModulo = null,
        ?int $cdRelatorioGrupoPai = null,
        int $nrOrdem = 1,
        int $snDisponivel = 1
    ) {
        $this->dsGrupo = $dsGrupo;
        $this->cdModulo = $cdModulo;
        $this->cdRelatorioGrupoPai = $cdRelatorioGrupoPai;
        $this->nrOrdem = $nrOrdem;
        $this->snDisponivel = $snDisponivel;
    }

    public function getCdRelatorioGrupo(): ?int
    {
        return $this->cdRelatorioGrupo;
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

    public function getCdModulo(): ?NuModulos
    {
        return $this->cdModulo;
    }

    public function setCdModulo(?NuModulos $cdModulo): self
    {
        $this->cdModulo = $cdModulo;
        return $this;
    }

    public function getCdRelatorioGrupoPai(): ?int
    {
        return $this->cdRelatorioGrupoPai;
    }

    public function setCdRelatorioGrupoPai(?int $cdRelatorioGrupoPai): self
    {
        $this->cdRelatorioGrupoPai = $cdRelatorioGrupoPai;
        return $this;
    }

    public function getNrOrdem(): int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getSnDisponivel(): int
    {
        return $this->snDisponivel;
    }

    public function setSnDisponivel(int $snDisponivel): self
    {
        $this->snDisponivel = $snDisponivel;
        return $this;
    }
}

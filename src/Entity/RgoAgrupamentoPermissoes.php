<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\RgoAgrupamentoPermissoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RgoAgrupamentoPermissoesRepository::class)]
#[ORM\Table(
    name: 'rgo_agrupamento_permissoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[ORM\Index(name: 'IX_CD_AGRUPAMENTO', columns: ['cd_agrupamento'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_rgo_agrupamento_permissoes_nu_grupos', 'colunas' => ['cd_grupo'], 'tabelaAlvo' => 'nu_grupos', 'colunasAlvo' => ['cd_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_rgo_agrupamento_permissoes_rgo_agrupamentos', 'colunas' => ['cd_agrupamento'], 'tabelaAlvo' => 'rgo_agrupamentos', 'colunasAlvo' => ['cd_agrupamento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RgoAgrupamentoPermissoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_permissao', type: 'integer')]
    private ?int $cdPermissao = null;

    #[ORM\ManyToOne(targetEntity: RgoAgrupamentos::class)]
    #[ORM\JoinColumn(name: 'cd_agrupamento', referencedColumnName: 'cd_agrupamento', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?RgoAgrupamentos $cdAgrupamento = null;

    #[ORM\ManyToOne(targetEntity: NuGrupos::class)]
    #[ORM\JoinColumn(name: 'cd_grupo', referencedColumnName: 'cd_grupo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuGrupos $cdGrupo = null;

    #[ORM\Column(name: 'sn_visualiza', type: 'boolean', options: ['default' => '0'])]
    private bool $snVisualiza = false;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?RgoAgrupamentos $cdAgrupamento = null,
        ?NuGrupos $cdGrupo = null,
        bool $snVisualiza = false,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdAgrupamento = $cdAgrupamento;
        $this->cdGrupo = $cdGrupo;
        $this->snVisualiza = $snVisualiza;
        $this->dtBase = $dtBase;
    }

    public function getCdPermissao(): ?int
    {
        return $this->cdPermissao;
    }

    public function getCdAgrupamento(): ?RgoAgrupamentos
    {
        return $this->cdAgrupamento;
    }

    public function setCdAgrupamento(?RgoAgrupamentos $cdAgrupamento): self
    {
        $this->cdAgrupamento = $cdAgrupamento;
        return $this;
    }

    public function getCdGrupo(): ?NuGrupos
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?NuGrupos $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function isSnVisualiza(): bool
    {
        return $this->snVisualiza;
    }

    public function setSnVisualiza(bool $snVisualiza): self
    {
        $this->snVisualiza = $snVisualiza;
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

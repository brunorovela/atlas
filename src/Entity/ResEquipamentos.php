<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ResEquipamentosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResEquipamentosRepository::class)]
#[ORM\Table(
    name: 'res_equipamentos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_equipamento', columns: ['cd_equipamento'])]
#[ORM\Index(name: 'res_equipamentos_tipos_fk', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'res_equipamentos_tipos_fk', 'colunas' => ['cd_tipo'], 'tabelaAlvo' => 'res_tipos', 'colunasAlvo' => ['cd_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ResEquipamentos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_equipamento', type: 'integer')]
    private ?int $cdEquipamento = null;

    #[ORM\ManyToOne(targetEntity: ResTipos::class)]
    #[ORM\JoinColumn(name: 'cd_tipo', referencedColumnName: 'cd_tipo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ResTipos $cdTipo = null;

    #[ORM\Column(name: 'ds_equipamento', type: 'string', length: 75)]
    private ?string $dsEquipamento = null;

    #[ORM\Column(name: 'me_observacao', type: 'text', length: 65535, nullable: true)]
    private ?string $meObservacao = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', options: ['default' => '1'])]
    private bool $snAtivo = true;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', nullable: true)]
    private ?int $cdColigada = null;

    public function __construct(
        ?ResTipos $cdTipo = null,
        ?string $dsEquipamento = null,
        ?string $meObservacao = null,
        bool $snAtivo = true,
        ?int $cdColigada = null
    ) {
        $this->cdTipo = $cdTipo;
        $this->dsEquipamento = $dsEquipamento;
        $this->meObservacao = $meObservacao;
        $this->snAtivo = $snAtivo;
        $this->cdColigada = $cdColigada;
    }

    public function getCdEquipamento(): ?int
    {
        return $this->cdEquipamento;
    }

    public function getCdTipo(): ?ResTipos
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?ResTipos $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getDsEquipamento(): ?string
    {
        return $this->dsEquipamento;
    }

    public function setDsEquipamento(?string $dsEquipamento): self
    {
        $this->dsEquipamento = $dsEquipamento;
        return $this;
    }

    public function getMeObservacao(): ?string
    {
        return $this->meObservacao;
    }

    public function setMeObservacao(?string $meObservacao): self
    {
        $this->meObservacao = $meObservacao;
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

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }
}

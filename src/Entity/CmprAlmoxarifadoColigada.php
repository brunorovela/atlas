<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CmprAlmoxarifadoColigadaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprAlmoxarifadoColigadaRepository::class)]
#[ORM\Table(
    name: 'cmpr_almoxarifado_coligada',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idx_almoxarifado_coligada', columns: ['cd_almoxarifado', 'cd_coligada'])]
#[ORM\Index(name: 'fk_cac_coligada', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IDX_24A8555E7A998406', columns: ['cd_almoxarifado'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_cac_almoxarifado', 'colunas' => ['cd_almoxarifado'], 'tabelaAlvo' => 'cmpr_almoxarifado', 'colunasAlvo' => ['cd_almoxarifado'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_cac_coligada', 'colunas' => ['cd_coligada'], 'tabelaAlvo' => 'coligadas', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprAlmoxarifadoColigada
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_almoxarifado_coligada', type: 'integer')]
    private ?int $cdAlmoxarifadoColigada = null;

    #[ORM\ManyToOne(targetEntity: CmprAlmoxarifado::class)]
    #[ORM\JoinColumn(name: 'cd_almoxarifado', referencedColumnName: 'cd_almoxarifado', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CmprAlmoxarifado $cdAlmoxarifado = null;

    #[ORM\ManyToOne(targetEntity: Coligadas::class)]
    #[ORM\JoinColumn(name: 'cd_coligada', referencedColumnName: 'cd_coligada', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Coligadas $cdColigada = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?CmprAlmoxarifado $cdAlmoxarifado = null,
        ?Coligadas $cdColigada = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdAlmoxarifado = $cdAlmoxarifado;
        $this->cdColigada = $cdColigada;
        $this->dtBase = $dtBase;
    }

    public function getCdAlmoxarifadoColigada(): ?int
    {
        return $this->cdAlmoxarifadoColigada;
    }

    public function getCdAlmoxarifado(): ?CmprAlmoxarifado
    {
        return $this->cdAlmoxarifado;
    }

    public function setCdAlmoxarifado(?CmprAlmoxarifado $cdAlmoxarifado): self
    {
        $this->cdAlmoxarifado = $cdAlmoxarifado;
        return $this;
    }

    public function getCdColigada(): ?Coligadas
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?Coligadas $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
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

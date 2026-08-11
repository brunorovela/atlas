<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\RgoColigadasCabecalhosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RgoColigadasCabecalhosRepository::class)]
#[ORM\Table(
    name: 'rgo_coligadas_cabecalhos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_COL_CAB_COLIGADAS_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IDX_4D958022DD58AC50', columns: ['cd_cabecalho'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_COL_CAB_COLIGADAS_CD_COLIGADA', 'colunas' => ['cd_coligada'], 'tabelaAlvo' => 'coligadas', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_COL_CAB_RGO_CABECALHOS_CD_CABECALHO', 'colunas' => ['cd_cabecalho'], 'tabelaAlvo' => 'rgo_cabecalhos', 'colunasAlvo' => ['cd_cabecalho'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RgoColigadasCabecalhos
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: RgoCabecalhos::class)]
    #[ORM\JoinColumn(name: 'cd_cabecalho', referencedColumnName: 'cd_cabecalho', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?RgoCabecalhos $cdCabecalho = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Coligadas::class)]
    #[ORM\JoinColumn(name: 'cd_coligada', referencedColumnName: 'cd_coligada', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Coligadas $cdColigada = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?RgoCabecalhos $cdCabecalho = null,
        ?Coligadas $cdColigada = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdCabecalho = $cdCabecalho;
        $this->cdColigada = $cdColigada;
        $this->dtBase = $dtBase;
    }

    public function getCdCabecalho(): ?RgoCabecalhos
    {
        return $this->cdCabecalho;
    }

    public function setCdCabecalho(?RgoCabecalhos $cdCabecalho): self
    {
        $this->cdCabecalho = $cdCabecalho;
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

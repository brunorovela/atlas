<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\RgoRelatoriosCabecalhosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RgoRelatoriosCabecalhosRepository::class)]
#[ORM\Table(
    name: 'rgo_relatorios_cabecalhos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_RGO_REL_CAB_RELATORIOS_CD_RELATORIO', columns: ['cd_relatorio'])]
#[ORM\Index(name: 'IDX_F748DC9BDD58AC50', columns: ['cd_cabecalho'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_RGO_REL_CAB_CABECALHOS_CD_CABECALHO', 'colunas' => ['cd_cabecalho'], 'tabelaAlvo' => 'rgo_cabecalhos', 'colunasAlvo' => ['cd_cabecalho'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_RGO_REL_CAB_RELATORIOS_CD_RELATORIO', 'colunas' => ['cd_relatorio'], 'tabelaAlvo' => 'rgo_relatorios', 'colunasAlvo' => ['cd_relatorio'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RgoRelatoriosCabecalhos
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: RgoCabecalhos::class)]
    #[ORM\JoinColumn(name: 'cd_cabecalho', referencedColumnName: 'cd_cabecalho', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?RgoCabecalhos $cdCabecalho = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: RgoRelatorios::class)]
    #[ORM\JoinColumn(name: 'cd_relatorio', referencedColumnName: 'cd_relatorio', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?RgoRelatorios $cdRelatorio = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?RgoCabecalhos $cdCabecalho = null,
        ?RgoRelatorios $cdRelatorio = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdCabecalho = $cdCabecalho;
        $this->cdRelatorio = $cdRelatorio;
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

    public function getCdRelatorio(): ?RgoRelatorios
    {
        return $this->cdRelatorio;
    }

    public function setCdRelatorio(?RgoRelatorios $cdRelatorio): self
    {
        $this->cdRelatorio = $cdRelatorio;
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

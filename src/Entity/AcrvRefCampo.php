<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\AcrvRefCampoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcrvRefCampoRepository::class)]
#[ORM\Table(
    name: 'acrv_ref_campo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_referencia', columns: ['cd_referencia'])]
#[ORM\Index(name: 'cd_campo', columns: ['cd_campo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'acrv_ref_campo_ibfk_1', 'colunas' => ['cd_referencia'], 'tabelaAlvo' => 'acrv_referencia', 'colunasAlvo' => ['cd_referencia'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'acrv_ref_campo_ibfk_2', 'colunas' => ['cd_campo'], 'tabelaAlvo' => 'acrv_campo', 'colunasAlvo' => ['cd_campo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AcrvRefCampo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ref_campo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRefCampo = null;

    #[ORM\ManyToOne(targetEntity: AcrvReferencia::class)]
    #[ORM\JoinColumn(name: 'cd_referencia', referencedColumnName: 'cd_referencia', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?AcrvReferencia $cdReferencia = null;

    #[ORM\ManyToOne(targetEntity: AcrvCampo::class)]
    #[ORM\JoinColumn(name: 'cd_campo', referencedColumnName: 'cd_campo', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?AcrvCampo $cdCampo = null;

    #[ORM\Column(name: 'ds_label', type: 'string', length: 255, nullable: true)]
    private ?string $dsLabel = null;

    #[ORM\Column(name: 'sn_obrigatorio', type: 'integer', nullable: true)]
    private ?int $snObrigatorio = null;

    #[ORM\Column(name: 'nr_ordem', type: TinyIntType::NAME, nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?AcrvReferencia $cdReferencia = null,
        ?AcrvCampo $cdCampo = null,
        ?string $dsLabel = null,
        ?int $snObrigatorio = null,
        ?int $nrOrdem = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdReferencia = $cdReferencia;
        $this->cdCampo = $cdCampo;
        $this->dsLabel = $dsLabel;
        $this->snObrigatorio = $snObrigatorio;
        $this->nrOrdem = $nrOrdem;
        $this->dtBase = $dtBase;
    }

    public function getCdRefCampo(): ?int
    {
        return $this->cdRefCampo;
    }

    public function getCdReferencia(): ?AcrvReferencia
    {
        return $this->cdReferencia;
    }

    public function setCdReferencia(?AcrvReferencia $cdReferencia): self
    {
        $this->cdReferencia = $cdReferencia;
        return $this;
    }

    public function getCdCampo(): ?AcrvCampo
    {
        return $this->cdCampo;
    }

    public function setCdCampo(?AcrvCampo $cdCampo): self
    {
        $this->cdCampo = $cdCampo;
        return $this;
    }

    public function getDsLabel(): ?string
    {
        return $this->dsLabel;
    }

    public function setDsLabel(?string $dsLabel): self
    {
        $this->dsLabel = $dsLabel;
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

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
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

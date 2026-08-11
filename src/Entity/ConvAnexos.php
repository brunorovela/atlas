<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ConvAnexosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConvAnexosRepository::class)]
#[ORM\Table(
    name: 'conv_anexos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CONV_ANEXOS_CD_CONTRATO_CONV_CONTRATOS_CD_CONTRATO', 'colunas' => ['CD_CONTRATO'], 'tabelaAlvo' => 'conv_contratos', 'colunasAlvo' => ['CD_CONTRATO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ConvAnexos
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: ConvContratos::class)]
    #[ORM\JoinColumn(name: 'CD_CONTRATO', referencedColumnName: 'CD_CONTRATO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?ConvContratos $cdContrato = null;

    #[ORM\Column(name: 'ME_ANEXO', type: 'blob', length: 16777215)]
    private ?string $meAnexo = null;

    #[ORM\Column(name: 'NM_ANEXO', type: 'string', length: 255)]
    private ?string $nmAnexo = null;

    public function __construct(
        ?ConvContratos $cdContrato = null,
        ?string $meAnexo = null,
        ?string $nmAnexo = null
    ) {
        $this->cdContrato = $cdContrato;
        $this->meAnexo = $meAnexo;
        $this->nmAnexo = $nmAnexo;
    }

    public function getCdContrato(): ?ConvContratos
    {
        return $this->cdContrato;
    }

    public function setCdContrato(?ConvContratos $cdContrato): self
    {
        $this->cdContrato = $cdContrato;
        return $this;
    }

    public function getMeAnexo(): ?string
    {
        return $this->meAnexo;
    }

    public function setMeAnexo(?string $meAnexo): self
    {
        $this->meAnexo = $meAnexo;
        return $this;
    }

    public function getNmAnexo(): ?string
    {
        return $this->nmAnexo;
    }

    public function setNmAnexo(?string $nmAnexo): self
    {
        $this->nmAnexo = $nmAnexo;
        return $this;
    }
}

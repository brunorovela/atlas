<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\PlauReqMaterialRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlauReqMaterialRepository::class)]
#[ORM\Table(
    name: 'plau_req_material',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_CD_PLANO', columns: ['cd_plano'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'plau_req_material_ibfk_1', 'colunas' => ['cd_plano'], 'tabelaAlvo' => 'plau_plano', 'colunasAlvo' => ['cd_plano'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_req_material_ibfk_2', 'colunas' => ['cd_tipo'], 'tabelaAlvo' => 'plau_req_material_tipo', 'colunasAlvo' => ['cd_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PlauReqMaterial
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_req_material', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdReqMaterial = null;

    #[ORM\ManyToOne(targetEntity: PlauPlano::class)]
    #[ORM\JoinColumn(name: 'cd_plano', referencedColumnName: 'cd_plano', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlauPlano $cdPlano = null;

    #[ORM\ManyToOne(targetEntity: PlauReqMaterialTipo::class)]
    #[ORM\JoinColumn(name: 'cd_tipo', referencedColumnName: 'cd_tipo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlauReqMaterialTipo $cdTipo = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'nr_quantidade', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrQuantidade = null;

    #[ORM\Column(name: 'ds_previsao_uso', type: 'string', length: 255, nullable: true)]
    private ?string $dsPrevisaoUso = null;

    #[ORM\Column(name: 'me_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObservacao = null;

    #[ORM\Column(name: 'sn_realizado', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snRealizado = 0;

    public function __construct(
        ?PlauPlano $cdPlano = null,
        ?PlauReqMaterialTipo $cdTipo = null,
        ?string $dsDescricao = null,
        ?int $nrQuantidade = null,
        ?string $dsPrevisaoUso = null,
        ?string $meObservacao = null,
        int $snRealizado = 0
    ) {
        $this->cdPlano = $cdPlano;
        $this->cdTipo = $cdTipo;
        $this->dsDescricao = $dsDescricao;
        $this->nrQuantidade = $nrQuantidade;
        $this->dsPrevisaoUso = $dsPrevisaoUso;
        $this->meObservacao = $meObservacao;
        $this->snRealizado = $snRealizado;
    }

    public function getCdReqMaterial(): ?int
    {
        return $this->cdReqMaterial;
    }

    public function getCdPlano(): ?PlauPlano
    {
        return $this->cdPlano;
    }

    public function setCdPlano(?PlauPlano $cdPlano): self
    {
        $this->cdPlano = $cdPlano;
        return $this;
    }

    public function getCdTipo(): ?PlauReqMaterialTipo
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?PlauReqMaterialTipo $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }

    public function getNrQuantidade(): ?int
    {
        return $this->nrQuantidade;
    }

    public function setNrQuantidade(?int $nrQuantidade): self
    {
        $this->nrQuantidade = $nrQuantidade;
        return $this;
    }

    public function getDsPrevisaoUso(): ?string
    {
        return $this->dsPrevisaoUso;
    }

    public function setDsPrevisaoUso(?string $dsPrevisaoUso): self
    {
        $this->dsPrevisaoUso = $dsPrevisaoUso;
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

    public function getSnRealizado(): int
    {
        return $this->snRealizado;
    }

    public function setSnRealizado(int $snRealizado): self
    {
        $this->snRealizado = $snRealizado;
        return $this;
    }
}

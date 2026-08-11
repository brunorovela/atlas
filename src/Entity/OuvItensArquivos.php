<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\OuvItensArquivosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OuvItensArquivosRepository::class)]
#[ORM\Table(
    name: 'ouv_itens_arquivos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'ix_ouv_ia_cd_item', columns: ['CD_ITEM'])]
#[ORM\Index(name: 'IX_CD_ITEM', columns: ['CD_ITEM'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_OIA_ITEM_OOI_ITEM', 'colunas' => ['CD_ITEM'], 'tabelaAlvo' => 'ouv_ouvidorias_itens', 'colunasAlvo' => ['CD_ITEM'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class OuvItensArquivos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_ARQUIVO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdArquivo = null;

    #[ORM\ManyToOne(targetEntity: OuvOuvidoriasItens::class)]
    #[ORM\JoinColumn(name: 'CD_ITEM', referencedColumnName: 'CD_ITEM', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?OuvOuvidoriasItens $cdItem = null;

    #[ORM\Column(name: 'NM_ARQUIVO', type: 'string', length: 255, nullable: true)]
    private ?string $nmArquivo = null;

    #[ORM\Column(name: 'NR_TAMANHO', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrTamanho = null;

    #[ORM\Column(name: 'ME_ARQUIVO', type: 'blob', length: 16777215, nullable: true)]
    private ?string $meArquivo = null;

    public function __construct(
        ?OuvOuvidoriasItens $cdItem = null,
        ?string $nmArquivo = null,
        ?int $nrTamanho = null,
        ?string $meArquivo = null
    ) {
        $this->cdItem = $cdItem;
        $this->nmArquivo = $nmArquivo;
        $this->nrTamanho = $nrTamanho;
        $this->meArquivo = $meArquivo;
    }

    public function getCdArquivo(): ?int
    {
        return $this->cdArquivo;
    }

    public function getCdItem(): ?OuvOuvidoriasItens
    {
        return $this->cdItem;
    }

    public function setCdItem(?OuvOuvidoriasItens $cdItem): self
    {
        $this->cdItem = $cdItem;
        return $this;
    }

    public function getNmArquivo(): ?string
    {
        return $this->nmArquivo;
    }

    public function setNmArquivo(?string $nmArquivo): self
    {
        $this->nmArquivo = $nmArquivo;
        return $this;
    }

    public function getNrTamanho(): ?int
    {
        return $this->nrTamanho;
    }

    public function setNrTamanho(?int $nrTamanho): self
    {
        $this->nrTamanho = $nrTamanho;
        return $this;
    }

    public function getMeArquivo(): ?string
    {
        return $this->meArquivo;
    }

    public function setMeArquivo(?string $meArquivo): self
    {
        $this->meArquivo = $meArquivo;
        return $this;
    }
}

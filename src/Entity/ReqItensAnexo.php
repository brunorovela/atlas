<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ReqItensAnexoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReqItensAnexoRepository::class)]
#[ORM\Table(
    name: 'req_itens_anexo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ITEM', columns: ['cd_item'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_itens_anexo_item', 'colunas' => ['cd_item'], 'tabelaAlvo' => 'req_registro_itens', 'colunasAlvo' => ['cd_item'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ReqItensAnexo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: ReqRegistroItens::class)]
    #[ORM\JoinColumn(name: 'cd_item', referencedColumnName: 'cd_item', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?ReqRegistroItens $cdItem = null;

    #[ORM\Column(name: 'nm_anexo', type: 'string', length: 255, nullable: true)]
    private ?string $nmAnexo = null;

    #[ORM\Column(name: 'nm_original', type: 'string', length: 255, nullable: true)]
    private ?string $nmOriginal = null;

    #[ORM\Column(name: 'ds_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsArquivo = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'dt_excluido', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtExcluido = null;

    #[ORM\Column(name: 'dt_enfileirado', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEnfileirado = null;

    public function __construct(
        ?ReqRegistroItens $cdItem = null,
        ?string $nmAnexo = null,
        ?string $nmOriginal = null,
        ?string $dsArquivo = null,
        ?string $dsChave = null,
        ?\DateTimeInterface $dtBase = null,
        ?\DateTimeInterface $dtExcluido = null,
        ?\DateTimeInterface $dtEnfileirado = null
    ) {
        $this->cdItem = $cdItem;
        $this->nmAnexo = $nmAnexo;
        $this->nmOriginal = $nmOriginal;
        $this->dsArquivo = $dsArquivo;
        $this->dsChave = $dsChave;
        $this->dtBase = $dtBase;
        $this->dtExcluido = $dtExcluido;
        $this->dtEnfileirado = $dtEnfileirado;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdItem(): ?ReqRegistroItens
    {
        return $this->cdItem;
    }

    public function setCdItem(?ReqRegistroItens $cdItem): self
    {
        $this->cdItem = $cdItem;
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

    public function getNmOriginal(): ?string
    {
        return $this->nmOriginal;
    }

    public function setNmOriginal(?string $nmOriginal): self
    {
        $this->nmOriginal = $nmOriginal;
        return $this;
    }

    public function getDsArquivo(): ?string
    {
        return $this->dsArquivo;
    }

    public function setDsArquivo(?string $dsArquivo): self
    {
        $this->dsArquivo = $dsArquivo;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
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

    public function getDtExcluido(): ?\DateTimeInterface
    {
        return $this->dtExcluido;
    }

    public function setDtExcluido(?\DateTimeInterface $dtExcluido): self
    {
        $this->dtExcluido = $dtExcluido;
        return $this;
    }

    public function getDtEnfileirado(): ?\DateTimeInterface
    {
        return $this->dtEnfileirado;
    }

    public function setDtEnfileirado(?\DateTimeInterface $dtEnfileirado): self
    {
        $this->dtEnfileirado = $dtEnfileirado;
        return $this;
    }
}

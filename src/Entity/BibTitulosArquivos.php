<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\BibTitulosArquivosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibTitulosArquivosRepository::class)]
#[ORM\Table(
    name: 'bib_titulos_arquivos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_titulo', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_titulos_arquivos_ibfk_1', 'colunas' => ['cd_titulo'], 'tabelaAlvo' => 'bib_titulos', 'colunasAlvo' => ['cd_titulo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class BibTitulosArquivos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_titulo_arquivo', type: 'integer')]
    private ?int $cdTituloArquivo = null;

    #[ORM\ManyToOne(targetEntity: BibTitulos::class)]
    #[ORM\JoinColumn(name: 'cd_titulo', referencedColumnName: 'cd_titulo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibTitulos $cdTitulo = null;

    #[ORM\Column(name: 'sn_capa', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snCapa = 0;

    #[ORM\Column(name: 'ds_nome_original', type: 'string', length: 255)]
    private ?string $dsNomeOriginal = null;

    #[ORM\Column(name: 'ds_nome_servidor', type: 'string', length: 40, nullable: true)]
    private ?string $dsNomeServidor = null;

    #[ORM\Column(name: 'bb_arquivo', type: 'blob', nullable: true)]
    private ?string $bbArquivo = null;

    #[ORM\Column(name: 'ds_extensao_arquivo', type: 'string', length: 10, nullable: true)]
    private ?string $dsExtensaoArquivo = null;

    public function __construct(
        ?BibTitulos $cdTitulo = null,
        int $snCapa = 0,
        ?string $dsNomeOriginal = null,
        ?string $dsNomeServidor = null,
        ?string $bbArquivo = null,
        ?string $dsExtensaoArquivo = null
    ) {
        $this->cdTitulo = $cdTitulo;
        $this->snCapa = $snCapa;
        $this->dsNomeOriginal = $dsNomeOriginal;
        $this->dsNomeServidor = $dsNomeServidor;
        $this->bbArquivo = $bbArquivo;
        $this->dsExtensaoArquivo = $dsExtensaoArquivo;
    }

    public function getCdTituloArquivo(): ?int
    {
        return $this->cdTituloArquivo;
    }

    public function getCdTitulo(): ?BibTitulos
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(?BibTitulos $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
        return $this;
    }

    public function getSnCapa(): int
    {
        return $this->snCapa;
    }

    public function setSnCapa(int $snCapa): self
    {
        $this->snCapa = $snCapa;
        return $this;
    }

    public function getDsNomeOriginal(): ?string
    {
        return $this->dsNomeOriginal;
    }

    public function setDsNomeOriginal(?string $dsNomeOriginal): self
    {
        $this->dsNomeOriginal = $dsNomeOriginal;
        return $this;
    }

    public function getDsNomeServidor(): ?string
    {
        return $this->dsNomeServidor;
    }

    public function setDsNomeServidor(?string $dsNomeServidor): self
    {
        $this->dsNomeServidor = $dsNomeServidor;
        return $this;
    }

    public function getBbArquivo(): ?string
    {
        return $this->bbArquivo;
    }

    public function setBbArquivo(?string $bbArquivo): self
    {
        $this->bbArquivo = $bbArquivo;
        return $this;
    }

    public function getDsExtensaoArquivo(): ?string
    {
        return $this->dsExtensaoArquivo;
    }

    public function setDsExtensaoArquivo(?string $dsExtensaoArquivo): self
    {
        $this->dsExtensaoArquivo = $dsExtensaoArquivo;
        return $this;
    }
}

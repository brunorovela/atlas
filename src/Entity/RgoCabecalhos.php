<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\RgoCabecalhosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RgoCabecalhosRepository::class)]
#[ORM\Table(
    name: 'rgo_cabecalhos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[ORM\Index(name: 'FK_COLIGADAS_MATRIZ_CD_COLIGADA', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_COLIGADAS_MATRIZ_CD_COLIGADA', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RgoCabecalhos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cabecalho', type: 'integer')]
    private ?int $cdCabecalho = null;

    #[ORM\Column(name: 'ds_cabecalho', type: 'string', length: 255)]
    private ?string $dsCabecalho = null;

    #[ORM\Column(name: 'ds_arquivo_original', type: 'string', length: 255)]
    private ?string $dsArquivoOriginal = null;

    #[ORM\Column(name: 'ds_arquivo', type: 'string', length: 255)]
    private ?string $dsArquivo = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    #[ORM\Column(name: 'sn_todas_coligadas', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snTodasColigadas = 0;

    #[ORM\Column(name: 'sn_todos_relatorios', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snTodosRelatorios = 0;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $snAtivo = 1;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsCabecalho = null,
        ?string $dsArquivoOriginal = null,
        ?string $dsArquivo = null,
        ?ColigadasMatriz $cdColigadaMatriz = null,
        int $snTodasColigadas = 0,
        int $snTodosRelatorios = 0,
        int $snAtivo = 1,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsCabecalho = $dsCabecalho;
        $this->dsArquivoOriginal = $dsArquivoOriginal;
        $this->dsArquivo = $dsArquivo;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        $this->snTodasColigadas = $snTodasColigadas;
        $this->snTodosRelatorios = $snTodosRelatorios;
        $this->snAtivo = $snAtivo;
        $this->dtBase = $dtBase;
    }

    public function getCdCabecalho(): ?int
    {
        return $this->cdCabecalho;
    }

    public function getDsCabecalho(): ?string
    {
        return $this->dsCabecalho;
    }

    public function setDsCabecalho(?string $dsCabecalho): self
    {
        $this->dsCabecalho = $dsCabecalho;
        return $this;
    }

    public function getDsArquivoOriginal(): ?string
    {
        return $this->dsArquivoOriginal;
    }

    public function setDsArquivoOriginal(?string $dsArquivoOriginal): self
    {
        $this->dsArquivoOriginal = $dsArquivoOriginal;
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

    public function getCdColigadaMatriz(): ?ColigadasMatriz
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?ColigadasMatriz $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }

    public function getSnTodasColigadas(): int
    {
        return $this->snTodasColigadas;
    }

    public function setSnTodasColigadas(int $snTodasColigadas): self
    {
        $this->snTodasColigadas = $snTodasColigadas;
        return $this;
    }

    public function getSnTodosRelatorios(): int
    {
        return $this->snTodosRelatorios;
    }

    public function setSnTodosRelatorios(int $snTodosRelatorios): self
    {
        $this->snTodosRelatorios = $snTodosRelatorios;
        return $this;
    }

    public function getSnAtivo(): int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
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

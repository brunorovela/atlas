<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\NuCoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuCoresRepository::class)]
#[ORM\Table(
    name: 'nu_cores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_CD_COR_CD_COLIGADA', columns: ['CD_COR', 'cd_coligada_matriz'])]
#[ORM\Index(name: 'FK_nu_cores_coligadas_matriz_cd_coligada_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_nu_cores_coligadas_matriz_cd_coligada_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class NuCores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_nu_cor', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdNuCor = null;

    #[ORM\Column(name: 'CD_COR', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCor = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    #[ORM\Column(name: 'DS_TITULO', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'DS_CHAVE', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'DS_COR', type: 'string', length: 7, nullable: true)]
    private ?string $dsCor = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdCor = null,
        ?ColigadasMatriz $cdColigadaMatriz = null,
        ?string $dsTitulo = null,
        ?string $dsChave = null,
        ?string $dsCor = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdCor = $cdCor;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        $this->dsTitulo = $dsTitulo;
        $this->dsChave = $dsChave;
        $this->dsCor = $dsCor;
        $this->dtBase = $dtBase;
    }

    public function getCdNuCor(): ?int
    {
        return $this->cdNuCor;
    }

    public function getCdCor(): ?int
    {
        return $this->cdCor;
    }

    public function setCdCor(?int $cdCor): self
    {
        $this->cdCor = $cdCor;
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

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
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

    public function getDsCor(): ?string
    {
        return $this->dsCor;
    }

    public function setDsCor(?string $dsCor): self
    {
        $this->dsCor = $dsCor;
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

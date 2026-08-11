<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibGenerosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibGenerosRepository::class)]
#[ORM\Table(
    name: 'bib_generos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ds_sigla', columns: ['ds_sigla'])]
#[ORM\Index(name: 'IX_DS_SIGLA', columns: ['ds_sigla'])]
#[ORM\Index(name: 'FK_bib_generos_coligadas_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_bib_generos_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibGeneros
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_genero', type: 'integer')]
    private ?int $cdGenero = null;

    #[ORM\Column(name: 'ds_genero', type: 'string', length: 100, options: ['default' => ''])]
    private string $dsGenero = '';

    #[ORM\Column(name: 'tx_formato_referencia', type: 'text', length: 65535, nullable: true)]
    private ?string $txFormatoReferencia = null;

    #[ORM\Column(name: 'ds_sigla', type: 'string', length: 15, nullable: true)]
    private ?string $dsSigla = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    public function __construct(
        string $dsGenero = '',
        ?string $txFormatoReferencia = null,
        ?string $dsSigla = null,
        ?ColigadasMatriz $cdColigadaMatriz = null
    ) {
        $this->dsGenero = $dsGenero;
        $this->txFormatoReferencia = $txFormatoReferencia;
        $this->dsSigla = $dsSigla;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdGenero(): ?int
    {
        return $this->cdGenero;
    }

    public function getDsGenero(): string
    {
        return $this->dsGenero;
    }

    public function setDsGenero(string $dsGenero): self
    {
        $this->dsGenero = $dsGenero;
        return $this;
    }

    public function getTxFormatoReferencia(): ?string
    {
        return $this->txFormatoReferencia;
    }

    public function setTxFormatoReferencia(?string $txFormatoReferencia): self
    {
        $this->txFormatoReferencia = $txFormatoReferencia;
        return $this;
    }

    public function getDsSigla(): ?string
    {
        return $this->dsSigla;
    }

    public function setDsSigla(?string $dsSigla): self
    {
        $this->dsSigla = $dsSigla;
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
}

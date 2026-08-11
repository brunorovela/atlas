<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibTitulosNotasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibTitulosNotasRepository::class)]
#[ORM\Table(
    name: 'bib_titulos_notas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_titulo', columns: ['cd_titulo'])]
#[ORM\Index(name: 'cd_nota_tipo', columns: ['cd_nota_tipo'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_NOTA_TIPO', columns: ['cd_nota_tipo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_titulos_notas_ibfk_1', 'colunas' => ['cd_titulo'], 'tabelaAlvo' => 'bib_titulos', 'colunasAlvo' => ['cd_titulo'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']],
        ['nome' => 'bib_titulos_notas_ibfk_2', 'colunas' => ['cd_nota_tipo'], 'tabelaAlvo' => 'bib_notas_tipos', 'colunasAlvo' => ['cd_nota_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibTitulosNotas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_titulo_nota', type: 'integer')]
    private ?int $cdTituloNota = null;

    #[ORM\ManyToOne(targetEntity: BibTitulos::class)]
    #[ORM\JoinColumn(name: 'cd_titulo', referencedColumnName: 'cd_titulo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibTitulos $cdTitulo = null;

    #[ORM\ManyToOne(targetEntity: BibNotasTipos::class)]
    #[ORM\JoinColumn(name: 'cd_nota_tipo', referencedColumnName: 'cd_nota_tipo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibNotasTipos $cdNotaTipo = null;

    #[ORM\Column(name: 'tx_nota', type: 'text', length: 65535, nullable: true)]
    private ?string $txNota = null;

    public function __construct(
        ?BibTitulos $cdTitulo = null,
        ?BibNotasTipos $cdNotaTipo = null,
        ?string $txNota = null
    ) {
        $this->cdTitulo = $cdTitulo;
        $this->cdNotaTipo = $cdNotaTipo;
        $this->txNota = $txNota;
    }

    public function getCdTituloNota(): ?int
    {
        return $this->cdTituloNota;
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

    public function getCdNotaTipo(): ?BibNotasTipos
    {
        return $this->cdNotaTipo;
    }

    public function setCdNotaTipo(?BibNotasTipos $cdNotaTipo): self
    {
        $this->cdNotaTipo = $cdNotaTipo;
        return $this;
    }

    public function getTxNota(): ?string
    {
        return $this->txNota;
    }

    public function setTxNota(?string $txNota): self
    {
        $this->txNota = $txNota;
        return $this;
    }
}

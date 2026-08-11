<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BancoCpRetornoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BancoCpRetornoRepository::class)]
#[ORM\Table(
    name: 'banco_cp_retorno',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_LAYOUT', columns: ['cd_layout'])]
#[ORM\Index(name: 'IX_DS_SEG', columns: ['ds_seg'], options: ['lengths' => [20]])]
class BancoCpRetorno
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_layout', type: 'integer', options: ['comment' => 'Código do Layout'])]
    private ?int $cdLayout = null;

    #[ORM\Id]
    #[ORM\Column(name: 'ds_seg', type: 'string', length: 50, options: ['comment' => 'Identificador de Segmento'])]
    private ?string $dsSeg = null;

    #[ORM\Column(name: 'nr_tit_ini', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'posicao inicial do numero do titulo'])]
    private ?int $nrTitIni = null;

    #[ORM\Column(name: 'nr_tit_tam', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'tamanho do codigo do titulo'])]
    private ?int $nrTitTam = null;

    #[ORM\Column(name: 'nr_val_ini', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'posicao inicial do valor'])]
    private ?int $nrValIni = null;

    #[ORM\Column(name: 'nr_val_tam', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'tamanho do valor'])]
    private ?int $nrValTam = null;

    #[ORM\Column(name: 'nr_dat_ini', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'posicao inicial da data de pagamento'])]
    private ?int $nrDatIni = null;

    #[ORM\Column(name: 'nr_dat_tam', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'tamanho da data de pagamento "6" ou "8"'])]
    private ?int $nrDatTam = null;

    #[ORM\Column(name: 'ds_dat_formato', type: 'string', length: 3, options: ['fixed' => true, 'default' => 'dma', 'comment' => 'formato da data de pagamento'])]
    private string $dsDatFormato = 'dma';

    #[ORM\Column(name: 'nr_oco_ini', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'posicao inicial do codigo das ocorrencias'])]
    private ?int $nrOcoIni = null;

    #[ORM\Column(name: 'nr_oco_tam', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'tamanho de uma unica ocorrencia'])]
    private ?int $nrOcoTam = null;

    #[ORM\Column(name: 'nr_oco_qtd', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'quantidade possivel de ocorrencias'])]
    private ?int $nrOcoQtd = null;

    #[ORM\Column(name: 'nr_autentica_inicio', type: 'integer', nullable: true)]
    private ?int $nrAutenticaInicio = null;

    #[ORM\Column(name: 'nr_autentica_tamanho', type: 'integer', nullable: true)]
    private ?int $nrAutenticaTamanho = null;

    public function __construct(
        ?int $cdLayout = null,
        ?string $dsSeg = null,
        ?int $nrTitIni = null,
        ?int $nrTitTam = null,
        ?int $nrValIni = null,
        ?int $nrValTam = null,
        ?int $nrDatIni = null,
        ?int $nrDatTam = null,
        string $dsDatFormato = 'dma',
        ?int $nrOcoIni = null,
        ?int $nrOcoTam = null,
        ?int $nrOcoQtd = null,
        ?int $nrAutenticaInicio = null,
        ?int $nrAutenticaTamanho = null
    ) {
        $this->cdLayout = $cdLayout;
        $this->dsSeg = $dsSeg;
        $this->nrTitIni = $nrTitIni;
        $this->nrTitTam = $nrTitTam;
        $this->nrValIni = $nrValIni;
        $this->nrValTam = $nrValTam;
        $this->nrDatIni = $nrDatIni;
        $this->nrDatTam = $nrDatTam;
        $this->dsDatFormato = $dsDatFormato;
        $this->nrOcoIni = $nrOcoIni;
        $this->nrOcoTam = $nrOcoTam;
        $this->nrOcoQtd = $nrOcoQtd;
        $this->nrAutenticaInicio = $nrAutenticaInicio;
        $this->nrAutenticaTamanho = $nrAutenticaTamanho;
    }

    public function getCdLayout(): ?int
    {
        return $this->cdLayout;
    }

    public function setCdLayout(?int $cdLayout): self
    {
        $this->cdLayout = $cdLayout;
        return $this;
    }

    public function getDsSeg(): ?string
    {
        return $this->dsSeg;
    }

    public function setDsSeg(?string $dsSeg): self
    {
        $this->dsSeg = $dsSeg;
        return $this;
    }

    public function getNrTitIni(): ?int
    {
        return $this->nrTitIni;
    }

    public function setNrTitIni(?int $nrTitIni): self
    {
        $this->nrTitIni = $nrTitIni;
        return $this;
    }

    public function getNrTitTam(): ?int
    {
        return $this->nrTitTam;
    }

    public function setNrTitTam(?int $nrTitTam): self
    {
        $this->nrTitTam = $nrTitTam;
        return $this;
    }

    public function getNrValIni(): ?int
    {
        return $this->nrValIni;
    }

    public function setNrValIni(?int $nrValIni): self
    {
        $this->nrValIni = $nrValIni;
        return $this;
    }

    public function getNrValTam(): ?int
    {
        return $this->nrValTam;
    }

    public function setNrValTam(?int $nrValTam): self
    {
        $this->nrValTam = $nrValTam;
        return $this;
    }

    public function getNrDatIni(): ?int
    {
        return $this->nrDatIni;
    }

    public function setNrDatIni(?int $nrDatIni): self
    {
        $this->nrDatIni = $nrDatIni;
        return $this;
    }

    public function getNrDatTam(): ?int
    {
        return $this->nrDatTam;
    }

    public function setNrDatTam(?int $nrDatTam): self
    {
        $this->nrDatTam = $nrDatTam;
        return $this;
    }

    public function getDsDatFormato(): string
    {
        return $this->dsDatFormato;
    }

    public function setDsDatFormato(string $dsDatFormato): self
    {
        $this->dsDatFormato = $dsDatFormato;
        return $this;
    }

    public function getNrOcoIni(): ?int
    {
        return $this->nrOcoIni;
    }

    public function setNrOcoIni(?int $nrOcoIni): self
    {
        $this->nrOcoIni = $nrOcoIni;
        return $this;
    }

    public function getNrOcoTam(): ?int
    {
        return $this->nrOcoTam;
    }

    public function setNrOcoTam(?int $nrOcoTam): self
    {
        $this->nrOcoTam = $nrOcoTam;
        return $this;
    }

    public function getNrOcoQtd(): ?int
    {
        return $this->nrOcoQtd;
    }

    public function setNrOcoQtd(?int $nrOcoQtd): self
    {
        $this->nrOcoQtd = $nrOcoQtd;
        return $this;
    }

    public function getNrAutenticaInicio(): ?int
    {
        return $this->nrAutenticaInicio;
    }

    public function setNrAutenticaInicio(?int $nrAutenticaInicio): self
    {
        $this->nrAutenticaInicio = $nrAutenticaInicio;
        return $this;
    }

    public function getNrAutenticaTamanho(): ?int
    {
        return $this->nrAutenticaTamanho;
    }

    public function setNrAutenticaTamanho(?int $nrAutenticaTamanho): self
    {
        $this->nrAutenticaTamanho = $nrAutenticaTamanho;
        return $this;
    }
}

<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibReservasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibReservasRepository::class)]
#[ORM\Table(
    name: 'bib_reservas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_pessoa', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'cd_titulo', columns: ['cd_titulo'])]
#[ORM\Index(name: 'cd_situacao', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_BIBLIOTECA', columns: ['cd_biblioteca'])]
#[ORM\Index(name: 'IX_NR_FILA', columns: ['nr_fila'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_reservas_ibfk_1', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'bib_reservas_ibfk_2', 'colunas' => ['cd_titulo'], 'tabelaAlvo' => 'bib_titulos', 'colunasAlvo' => ['cd_titulo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'bib_reservas_ibfk_3', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'bib_situacoes', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'SET NULL', 'onUpdate' => 'SET NULL']],
        ['nome' => 'bib_reservas_ibfk_4', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'bib_situacoes', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'SET NULL', 'onUpdate' => 'SET NULL']]
    ],
    autoIncremento: []
)]
class BibReservas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_reserva', type: 'integer')]
    private ?int $cdReserva = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\ManyToOne(targetEntity: BibTitulos::class)]
    #[ORM\JoinColumn(name: 'cd_titulo', referencedColumnName: 'cd_titulo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibTitulos $cdTitulo = null;

    #[ORM\Column(name: 'dt_reserva', type: 'datetime')]
    private ?\DateTimeInterface $dtReserva = null;

    #[ORM\Column(name: 'dt_disponivel', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtDisponivel = null;

    #[ORM\ManyToOne(targetEntity: BibSituacoes::class)]
    #[ORM\JoinColumn(name: 'cd_situacao', referencedColumnName: 'cd_situacao', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibSituacoes $cdSituacao = null;

    #[ORM\Column(name: 'nr_fila', type: 'integer', options: ['unsigned' => true, 'default' => '1'])]
    private int $nrFila = 1;

    #[ORM\Column(name: 'cd_biblioteca', type: 'integer')]
    private ?int $cdBiblioteca = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?BibTitulos $cdTitulo = null,
        ?\DateTimeInterface $dtReserva = null,
        ?\DateTimeInterface $dtDisponivel = null,
        ?BibSituacoes $cdSituacao = null,
        int $nrFila = 1,
        ?int $cdBiblioteca = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdTitulo = $cdTitulo;
        $this->dtReserva = $dtReserva;
        $this->dtDisponivel = $dtDisponivel;
        $this->cdSituacao = $cdSituacao;
        $this->nrFila = $nrFila;
        $this->cdBiblioteca = $cdBiblioteca;
    }

    public function getCdReserva(): ?int
    {
        return $this->cdReserva;
    }

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
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

    public function getDtReserva(): ?\DateTimeInterface
    {
        return $this->dtReserva;
    }

    public function setDtReserva(?\DateTimeInterface $dtReserva): self
    {
        $this->dtReserva = $dtReserva;
        return $this;
    }

    public function getDtDisponivel(): ?\DateTimeInterface
    {
        return $this->dtDisponivel;
    }

    public function setDtDisponivel(?\DateTimeInterface $dtDisponivel): self
    {
        $this->dtDisponivel = $dtDisponivel;
        return $this;
    }

    public function getCdSituacao(): ?BibSituacoes
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?BibSituacoes $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getNrFila(): int
    {
        return $this->nrFila;
    }

    public function setNrFila(int $nrFila): self
    {
        $this->nrFila = $nrFila;
        return $this;
    }

    public function getCdBiblioteca(): ?int
    {
        return $this->cdBiblioteca;
    }

    public function setCdBiblioteca(?int $cdBiblioteca): self
    {
        $this->cdBiblioteca = $cdBiblioteca;
        return $this;
    }
}

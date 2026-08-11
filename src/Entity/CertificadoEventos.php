<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CertificadoEventosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CertificadoEventosRepository::class)]
#[ORM\Table(
    name: 'certificado_eventos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'ix_registro', columns: ['nr_registro'])]
#[ORM\Index(name: 'IX_CD_EVENTO', columns: ['cd_evento'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_LIVRO', columns: ['cd_livro'])]
#[EsquemaFisico(
    chavesEstrangeiras: [],
    autoIncremento: ['nr_registro']
)]
class CertificadoEventos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_evento', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdEvento = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Column(name: 'cd_livro', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdLivro = null;

    #[ORM\Column(name: 'nr_folha', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrFolha = null;

    #[ORM\Column(name: 'nr_registro', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrRegistro = null;

    #[ORM\Column(name: 'dt_registro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRegistro = null;

    public function __construct(
        int $cdEvento = 0,
        int $cdPessoa = 0,
        ?int $cdLivro = null,
        ?int $nrFolha = null,
        ?int $nrRegistro = null,
        ?\DateTimeInterface $dtRegistro = null
    ) {
        $this->cdEvento = $cdEvento;
        $this->cdPessoa = $cdPessoa;
        $this->cdLivro = $cdLivro;
        $this->nrFolha = $nrFolha;
        $this->nrRegistro = $nrRegistro;
        $this->dtRegistro = $dtRegistro;
    }

    public function getCdEvento(): int
    {
        return $this->cdEvento;
    }

    public function setCdEvento(int $cdEvento): self
    {
        $this->cdEvento = $cdEvento;
        return $this;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdLivro(): ?int
    {
        return $this->cdLivro;
    }

    public function setCdLivro(?int $cdLivro): self
    {
        $this->cdLivro = $cdLivro;
        return $this;
    }

    public function getNrFolha(): ?int
    {
        return $this->nrFolha;
    }

    public function setNrFolha(?int $nrFolha): self
    {
        $this->nrFolha = $nrFolha;
        return $this;
    }

    public function getNrRegistro(): ?int
    {
        return $this->nrRegistro;
    }

    public function setNrRegistro(?int $nrRegistro): self
    {
        $this->nrRegistro = $nrRegistro;
        return $this;
    }

    public function getDtRegistro(): ?\DateTimeInterface
    {
        return $this->dtRegistro;
    }

    public function setDtRegistro(?\DateTimeInterface $dtRegistro): self
    {
        $this->dtRegistro = $dtRegistro;
        return $this;
    }
}

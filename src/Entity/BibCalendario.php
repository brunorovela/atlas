<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\BibCalendarioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibCalendarioRepository::class)]
#[ORM\Table(
    name: 'bib_calendario',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'dt_data', columns: ['dt_data', 'cd_biblioteca'])]
#[ORM\Index(name: 'cd_biblioteca', columns: ['cd_biblioteca'])]
#[ORM\Index(name: 'IX_CD_BIBLIOTECA', columns: ['cd_biblioteca'])]
#[ORM\Index(name: 'IX_DT_DATA', columns: ['dt_data'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_calendario_ibfk_1', 'colunas' => ['cd_biblioteca'], 'tabelaAlvo' => 'bib_bibliotecas', 'colunasAlvo' => ['cd_biblioteca'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibCalendario
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_calendario', type: 'integer')]
    private ?int $cdCalendario = null;

    #[ORM\ManyToOne(targetEntity: BibBibliotecas::class)]
    #[ORM\JoinColumn(name: 'cd_biblioteca', referencedColumnName: 'cd_biblioteca', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibBibliotecas $cdBiblioteca = null;

    #[ORM\Column(name: 'sn_atendimento', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snAtendimento = 0;

    #[ORM\Column(name: 'sn_emprestimos', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snEmprestimos = 0;

    #[ORM\Column(name: 'sn_devolucoes', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snDevolucoes = 0;

    #[ORM\Column(name: 'sn_renovacoes', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snRenovacoes = 0;

    #[ORM\Column(name: 'sn_contabiliza_multas', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snContabilizaMultas = 0;

    #[ORM\Column(name: 'dt_data', type: 'date')]
    private ?\DateTimeInterface $dtData = null;

    public function __construct(
        ?BibBibliotecas $cdBiblioteca = null,
        int $snAtendimento = 0,
        int $snEmprestimos = 0,
        int $snDevolucoes = 0,
        int $snRenovacoes = 0,
        ?int $snContabilizaMultas = 0,
        ?\DateTimeInterface $dtData = null
    ) {
        $this->cdBiblioteca = $cdBiblioteca;
        $this->snAtendimento = $snAtendimento;
        $this->snEmprestimos = $snEmprestimos;
        $this->snDevolucoes = $snDevolucoes;
        $this->snRenovacoes = $snRenovacoes;
        $this->snContabilizaMultas = $snContabilizaMultas;
        $this->dtData = $dtData;
    }

    public function getCdCalendario(): ?int
    {
        return $this->cdCalendario;
    }

    public function getCdBiblioteca(): ?BibBibliotecas
    {
        return $this->cdBiblioteca;
    }

    public function setCdBiblioteca(?BibBibliotecas $cdBiblioteca): self
    {
        $this->cdBiblioteca = $cdBiblioteca;
        return $this;
    }

    public function getSnAtendimento(): int
    {
        return $this->snAtendimento;
    }

    public function setSnAtendimento(int $snAtendimento): self
    {
        $this->snAtendimento = $snAtendimento;
        return $this;
    }

    public function getSnEmprestimos(): int
    {
        return $this->snEmprestimos;
    }

    public function setSnEmprestimos(int $snEmprestimos): self
    {
        $this->snEmprestimos = $snEmprestimos;
        return $this;
    }

    public function getSnDevolucoes(): int
    {
        return $this->snDevolucoes;
    }

    public function setSnDevolucoes(int $snDevolucoes): self
    {
        $this->snDevolucoes = $snDevolucoes;
        return $this;
    }

    public function getSnRenovacoes(): int
    {
        return $this->snRenovacoes;
    }

    public function setSnRenovacoes(int $snRenovacoes): self
    {
        $this->snRenovacoes = $snRenovacoes;
        return $this;
    }

    public function getSnContabilizaMultas(): ?int
    {
        return $this->snContabilizaMultas;
    }

    public function setSnContabilizaMultas(?int $snContabilizaMultas): self
    {
        $this->snContabilizaMultas = $snContabilizaMultas;
        return $this;
    }

    public function getDtData(): ?\DateTimeInterface
    {
        return $this->dtData;
    }

    public function setDtData(?\DateTimeInterface $dtData): self
    {
        $this->dtData = $dtData;
        return $this;
    }
}

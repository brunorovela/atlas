<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CalendarioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CalendarioRepository::class)]
#[ORM\Table(
    name: 'calendario',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'IX_UNIQUE_KEY', columns: ['nr_dia', 'nr_mes', 'nr_ano', 'cd_coligada'])]
#[ORM\Index(name: 'IX_NR_DIA', columns: ['nr_dia'])]
#[ORM\Index(name: 'IX_NR_MES', columns: ['nr_mes'])]
#[ORM\Index(name: 'IX_NR_ANO', columns: ['nr_ano'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
class Calendario
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_calendario', type: 'integer')]
    private ?int $cdCalendario = null;

    #[ORM\Column(name: 'nr_dia', type: 'smallint', options: ['default' => '0'])]
    private int $nrDia = 0;

    #[ORM\Column(name: 'nr_mes', type: 'smallint', options: ['default' => '0'])]
    private int $nrMes = 0;

    #[ORM\Column(name: 'nr_ano', type: 'smallint', options: ['default' => '0'])]
    private int $nrAno = 0;

    #[ORM\Column(name: 'descricao', type: 'string', length: 200, nullable: true, options: ['default' => ''])]
    private ?string $descricao = '';

    #[ORM\Column(name: 'sn_biblioteca', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'S'])]
    private ?string $snBiblioteca = 'S';

    #[ORM\Column(name: 'sn_financeiro', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'S'])]
    private ?string $snFinanceiro = 'S';

    #[ORM\Column(name: 'sn_secretaria', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'S'])]
    private ?string $snSecretaria = 'S';

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdColigada = 0;

    #[ORM\Column(name: 'dt_alteracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAlteracao = null;

    #[ORM\Column(name: 'cd_categoria', type: 'integer', nullable: true)]
    private ?int $cdCategoria = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        int $nrDia = 0,
        int $nrMes = 0,
        int $nrAno = 0,
        ?string $descricao = '',
        ?string $snBiblioteca = 'S',
        ?string $snFinanceiro = 'S',
        ?string $snSecretaria = 'S',
        int $cdColigada = 0,
        ?\DateTimeInterface $dtAlteracao = null,
        ?int $cdCategoria = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->nrDia = $nrDia;
        $this->nrMes = $nrMes;
        $this->nrAno = $nrAno;
        $this->descricao = $descricao;
        $this->snBiblioteca = $snBiblioteca;
        $this->snFinanceiro = $snFinanceiro;
        $this->snSecretaria = $snSecretaria;
        $this->cdColigada = $cdColigada;
        $this->dtAlteracao = $dtAlteracao;
        $this->cdCategoria = $cdCategoria;
        $this->dtBase = $dtBase;
    }

    public function getCdCalendario(): ?int
    {
        return $this->cdCalendario;
    }

    public function getNrDia(): int
    {
        return $this->nrDia;
    }

    public function setNrDia(int $nrDia): self
    {
        $this->nrDia = $nrDia;
        return $this;
    }

    public function getNrMes(): int
    {
        return $this->nrMes;
    }

    public function setNrMes(int $nrMes): self
    {
        $this->nrMes = $nrMes;
        return $this;
    }

    public function getNrAno(): int
    {
        return $this->nrAno;
    }

    public function setNrAno(int $nrAno): self
    {
        $this->nrAno = $nrAno;
        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): self
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getSnBiblioteca(): ?string
    {
        return $this->snBiblioteca;
    }

    public function setSnBiblioteca(?string $snBiblioteca): self
    {
        $this->snBiblioteca = $snBiblioteca;
        return $this;
    }

    public function getSnFinanceiro(): ?string
    {
        return $this->snFinanceiro;
    }

    public function setSnFinanceiro(?string $snFinanceiro): self
    {
        $this->snFinanceiro = $snFinanceiro;
        return $this;
    }

    public function getSnSecretaria(): ?string
    {
        return $this->snSecretaria;
    }

    public function setSnSecretaria(?string $snSecretaria): self
    {
        $this->snSecretaria = $snSecretaria;
        return $this;
    }

    public function getCdColigada(): int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getDtAlteracao(): ?\DateTimeInterface
    {
        return $this->dtAlteracao;
    }

    public function setDtAlteracao(?\DateTimeInterface $dtAlteracao): self
    {
        $this->dtAlteracao = $dtAlteracao;
        return $this;
    }

    public function getCdCategoria(): ?int
    {
        return $this->cdCategoria;
    }

    public function setCdCategoria(?int $cdCategoria): self
    {
        $this->cdCategoria = $cdCategoria;
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

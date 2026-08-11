<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CursosCoordenadoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursosCoordenadoresRepository::class)]
#[ORM\Table(
    name: 'cursos_coordenadores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_PESSOA', columns: ['cd_pessoa', 'cd_curso', 'CD_COLIGADA'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['CD_COLIGADA'])]
class CursosCoordenadores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_coordenador', type: 'integer')]
    private ?int $cdCoordenador = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, options: ['default' => ''])]
    private string $cdCurso = '';

    #[ORM\Column(name: 'cd_tipo', type: 'integer', options: ['default' => '1'])]
    private int $cdTipo = 1;

    #[ORM\Column(name: 'nr_permissao', type: 'boolean', options: ['default' => '3'])]
    private bool $nrPermissao = false;

    #[ORM\Column(name: 'CD_COLIGADA', type: 'integer', nullable: true)]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        int $cdPessoa = 0,
        string $cdCurso = '',
        int $cdTipo = 1,
        bool $nrPermissao = false,
        ?int $cdColigada = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdCurso = $cdCurso;
        $this->cdTipo = $cdTipo;
        $this->nrPermissao = $nrPermissao;
        $this->cdColigada = $cdColigada;
        $this->dtBase = $dtBase;
    }

    public function getCdCoordenador(): ?int
    {
        return $this->cdCoordenador;
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

    public function getCdCurso(): string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdTipo(): int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function isNrPermissao(): bool
    {
        return $this->nrPermissao;
    }

    public function setNrPermissao(bool $nrPermissao): self
    {
        $this->nrPermissao = $nrPermissao;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
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

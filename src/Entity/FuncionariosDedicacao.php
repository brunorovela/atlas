<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FuncionariosDedicacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FuncionariosDedicacaoRepository::class)]
#[ORM\Table(
    name: 'funcionarios_dedicacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_DEDICACAO', columns: ['cd_dedicacao'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_TIPO_ATUACAO', columns: ['cd_tipo_atuacao'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
class FuncionariosDedicacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_dedicacao', type: 'integer')]
    private ?int $cdDedicacao = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_tipo_atuacao', type: 'smallint', nullable: true)]
    private ?int $cdTipoAtuacao = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'ds_atividade', type: 'string', length: 50, nullable: true)]
    private ?string $dsAtividade = null;

    #[ORM\Column(name: 'vl_horas', type: 'float', nullable: true)]
    private ?float $vlHoras = null;

    #[ORM\Column(name: 'vl_anosemestre', type: 'smallint', nullable: true)]
    private ?int $vlAnosemestre = null;

    #[ORM\Column(name: 'cd_atividade', type: 'smallint', nullable: true)]
    private ?int $cdAtividade = null;

    #[ORM\Column(name: 'cd_instituicao', type: 'integer', nullable: true)]
    private ?int $cdInstituicao = null;

    #[ORM\Column(name: 'ds_local', type: 'string', length: 100, nullable: true, options: ['default' => ''])]
    private ?string $dsLocal = '';

    #[ORM\Column(name: 'dt_inicial_periodo', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicialPeriodo = null;

    #[ORM\Column(name: 'dt_final_periodo', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFinalPeriodo = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdTipoAtuacao = null,
        ?string $cdCurso = null,
        ?string $dsAtividade = null,
        ?float $vlHoras = null,
        ?int $vlAnosemestre = null,
        ?int $cdAtividade = null,
        ?int $cdInstituicao = null,
        ?string $dsLocal = '',
        ?\DateTimeInterface $dtInicialPeriodo = null,
        ?\DateTimeInterface $dtFinalPeriodo = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdTipoAtuacao = $cdTipoAtuacao;
        $this->cdCurso = $cdCurso;
        $this->dsAtividade = $dsAtividade;
        $this->vlHoras = $vlHoras;
        $this->vlAnosemestre = $vlAnosemestre;
        $this->cdAtividade = $cdAtividade;
        $this->cdInstituicao = $cdInstituicao;
        $this->dsLocal = $dsLocal;
        $this->dtInicialPeriodo = $dtInicialPeriodo;
        $this->dtFinalPeriodo = $dtFinalPeriodo;
    }

    public function getCdDedicacao(): ?int
    {
        return $this->cdDedicacao;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdTipoAtuacao(): ?int
    {
        return $this->cdTipoAtuacao;
    }

    public function setCdTipoAtuacao(?int $cdTipoAtuacao): self
    {
        $this->cdTipoAtuacao = $cdTipoAtuacao;
        return $this;
    }

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getDsAtividade(): ?string
    {
        return $this->dsAtividade;
    }

    public function setDsAtividade(?string $dsAtividade): self
    {
        $this->dsAtividade = $dsAtividade;
        return $this;
    }

    public function getVlHoras(): ?float
    {
        return $this->vlHoras;
    }

    public function setVlHoras(?float $vlHoras): self
    {
        $this->vlHoras = $vlHoras;
        return $this;
    }

    public function getVlAnosemestre(): ?int
    {
        return $this->vlAnosemestre;
    }

    public function setVlAnosemestre(?int $vlAnosemestre): self
    {
        $this->vlAnosemestre = $vlAnosemestre;
        return $this;
    }

    public function getCdAtividade(): ?int
    {
        return $this->cdAtividade;
    }

    public function setCdAtividade(?int $cdAtividade): self
    {
        $this->cdAtividade = $cdAtividade;
        return $this;
    }

    public function getCdInstituicao(): ?int
    {
        return $this->cdInstituicao;
    }

    public function setCdInstituicao(?int $cdInstituicao): self
    {
        $this->cdInstituicao = $cdInstituicao;
        return $this;
    }

    public function getDsLocal(): ?string
    {
        return $this->dsLocal;
    }

    public function setDsLocal(?string $dsLocal): self
    {
        $this->dsLocal = $dsLocal;
        return $this;
    }

    public function getDtInicialPeriodo(): ?\DateTimeInterface
    {
        return $this->dtInicialPeriodo;
    }

    public function setDtInicialPeriodo(?\DateTimeInterface $dtInicialPeriodo): self
    {
        $this->dtInicialPeriodo = $dtInicialPeriodo;
        return $this;
    }

    public function getDtFinalPeriodo(): ?\DateTimeInterface
    {
        return $this->dtFinalPeriodo;
    }

    public function setDtFinalPeriodo(?\DateTimeInterface $dtFinalPeriodo): self
    {
        $this->dtFinalPeriodo = $dtFinalPeriodo;
        return $this;
    }
}

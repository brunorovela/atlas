<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PessoasPassosInscricaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasPassosInscricaoRepository::class)]
#[ORM\Table(
    name: 'pessoas_passos_inscricao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'IX_PASSO_PESSOA', columns: ['cd_passo_inscricao', 'cd_pessoa', 'cd_curso', 'cd_turma', 'anosemestre'])]
class PessoasPassosInscricao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_pessoa_passo_inscricao', type: 'integer')]
    private ?int $cdPessoaPassoInscricao = null;

    #[ORM\Column(name: 'cd_passo_inscricao', type: 'integer', nullable: true)]
    private ?int $cdPassoInscricao = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 50, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50, nullable: true)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'anosemestre', type: 'smallint', nullable: true)]
    private ?int $anosemestre = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPassoInscricao = null,
        ?int $cdPessoa = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?int $anosemestre = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPassoInscricao = $cdPassoInscricao;
        $this->cdPessoa = $cdPessoa;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->anosemestre = $anosemestre;
        $this->dtCadastro = $dtCadastro;
        $this->dtBase = $dtBase;
    }

    public function getCdPessoaPassoInscricao(): ?int
    {
        return $this->cdPessoaPassoInscricao;
    }

    public function getCdPassoInscricao(): ?int
    {
        return $this->cdPassoInscricao;
    }

    public function setCdPassoInscricao(?int $cdPassoInscricao): self
    {
        $this->cdPassoInscricao = $cdPassoInscricao;
        return $this;
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

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getAnosemestre(): ?int
    {
        return $this->anosemestre;
    }

    public function setAnosemestre(?int $anosemestre): self
    {
        $this->anosemestre = $anosemestre;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
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

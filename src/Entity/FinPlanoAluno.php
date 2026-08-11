<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinPlanoAlunoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanoAlunoRepository::class)]
#[ORM\Table(
    name: 'fin_plano_aluno',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PLANO', columns: ['cd_plano'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma_atual'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_NR_ANOSEM', columns: ['nr_anosem_atual'])]
class FinPlanoAluno
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_plano', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPlano = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma_atual', type: 'string', length: 50)]
    private ?string $cdTurmaAtual = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosem_atual', type: 'smallint')]
    private ?int $nrAnosemAtual = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdPlano = null,
        ?string $cdTurmaAtual = null,
        ?int $nrAnosemAtual = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdPlano = $cdPlano;
        $this->cdTurmaAtual = $cdTurmaAtual;
        $this->nrAnosemAtual = $nrAnosemAtual;
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

    public function getCdPlano(): ?int
    {
        return $this->cdPlano;
    }

    public function setCdPlano(?int $cdPlano): self
    {
        $this->cdPlano = $cdPlano;
        return $this;
    }

    public function getCdTurmaAtual(): ?string
    {
        return $this->cdTurmaAtual;
    }

    public function setCdTurmaAtual(?string $cdTurmaAtual): self
    {
        $this->cdTurmaAtual = $cdTurmaAtual;
        return $this;
    }

    public function getNrAnosemAtual(): ?int
    {
        return $this->nrAnosemAtual;
    }

    public function setNrAnosemAtual(?int $nrAnosemAtual): self
    {
        $this->nrAnosemAtual = $nrAnosemAtual;
        return $this;
    }
}

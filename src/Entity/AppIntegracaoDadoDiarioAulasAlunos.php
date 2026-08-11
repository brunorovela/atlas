<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoDiarioAulasAlunosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoDiarioAulasAlunosRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_diario_aulas_alunos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'idx_app_integracao_diario_aulas_alunos_integracao', columns: ['sn_integrado', 'sn_excluido'])]
#[ORM\Index(name: 'idx_app_integracao_diario_aulas_alunos_pk', columns: ['cd_aula_aluno'])]
class AppIntegracaoDadoDiarioAulasAlunos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_aula_aluno', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAulaAluno = null;

    #[ORM\Column(name: 'dt_insercao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInsercao = null;

    #[ORM\Column(name: 'sn_integrado', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegrado = false;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', options: ['default' => '0'])]
    private bool $snExcluido = false;

    public function __construct(
        ?int $cdAulaAluno = null,
        ?\DateTimeInterface $dtInsercao = null,
        bool $snIntegrado = false,
        bool $snExcluido = false
    ) {
        $this->cdAulaAluno = $cdAulaAluno;
        $this->dtInsercao = $dtInsercao;
        $this->snIntegrado = $snIntegrado;
        $this->snExcluido = $snExcluido;
    }

    public function getCdAulaAluno(): ?int
    {
        return $this->cdAulaAluno;
    }

    public function setCdAulaAluno(?int $cdAulaAluno): self
    {
        $this->cdAulaAluno = $cdAulaAluno;
        return $this;
    }

    public function getDtInsercao(): ?\DateTimeInterface
    {
        return $this->dtInsercao;
    }

    public function setDtInsercao(?\DateTimeInterface $dtInsercao): self
    {
        $this->dtInsercao = $dtInsercao;
        return $this;
    }

    public function isSnIntegrado(): bool
    {
        return $this->snIntegrado;
    }

    public function setSnIntegrado(bool $snIntegrado): self
    {
        $this->snIntegrado = $snIntegrado;
        return $this;
    }

    public function isSnExcluido(): bool
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(bool $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
        return $this;
    }
}

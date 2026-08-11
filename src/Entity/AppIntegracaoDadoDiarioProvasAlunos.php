<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoDiarioProvasAlunosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoDiarioProvasAlunosRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_diario_provas_alunos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'idx_app_integracao_diario_provas_alunos_sn_integrado_sn_excluido', columns: ['sn_integrado', 'sn_excluido'])]
#[ORM\Index(name: 'idx_app_integracao_diario_provas_alunos_pks', columns: ['cd_prova_aluno', 'cd_prova'])]
class AppIntegracaoDadoDiarioProvasAlunos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_prova_aluno', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProvaAluno = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_prova', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'dt_insercao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInsercao = null;

    #[ORM\Column(name: 'sn_integrado', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegrado = false;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', options: ['default' => '0'])]
    private bool $snExcluido = false;

    public function __construct(
        ?int $cdProvaAluno = null,
        ?int $cdProva = null,
        ?\DateTimeInterface $dtInsercao = null,
        bool $snIntegrado = false,
        bool $snExcluido = false
    ) {
        $this->cdProvaAluno = $cdProvaAluno;
        $this->cdProva = $cdProva;
        $this->dtInsercao = $dtInsercao;
        $this->snIntegrado = $snIntegrado;
        $this->snExcluido = $snExcluido;
    }

    public function getCdProvaAluno(): ?int
    {
        return $this->cdProvaAluno;
    }

    public function setCdProvaAluno(?int $cdProvaAluno): self
    {
        $this->cdProvaAluno = $cdProvaAluno;
        return $this;
    }

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
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

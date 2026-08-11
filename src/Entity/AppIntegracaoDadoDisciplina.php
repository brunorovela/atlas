<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoDisciplinaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoDisciplinaRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_disciplina',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'idx_app_integracao_disciplina_sn_integrado_sn_excluido', columns: ['sn_integrado', 'sn_excluido'])]
#[ORM\Index(name: 'idx_app_integracao_disciplina_id_disciplina', columns: ['id_disciplina'])]
#[ORM\Index(name: 'idx_app_integracao_disciplina_cd_curso', columns: ['cd_curso'])]
#[ORM\Index(name: 'idx_app_integracao_disciplina_cd_disciplina', columns: ['cd_disciplina'])]
class AppIntegracaoDadoDisciplina
{
    #[ORM\Id]
    #[ORM\Column(name: 'id_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $idDisciplina = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'dt_insercao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInsercao = null;

    #[ORM\Column(name: 'sn_integrado', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegrado = false;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', options: ['default' => '0'])]
    private bool $snExcluido = false;

    public function __construct(
        ?int $idDisciplina = null,
        ?int $cdDisciplina = null,
        ?string $cdCurso = null,
        ?\DateTimeInterface $dtInsercao = null,
        bool $snIntegrado = false,
        bool $snExcluido = false
    ) {
        $this->idDisciplina = $idDisciplina;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdCurso = $cdCurso;
        $this->dtInsercao = $dtInsercao;
        $this->snIntegrado = $snIntegrado;
        $this->snExcluido = $snExcluido;
    }

    public function getIdDisciplina(): ?int
    {
        return $this->idDisciplina;
    }

    public function setIdDisciplina(?int $idDisciplina): self
    {
        $this->idDisciplina = $idDisciplina;
        return $this;
    }

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
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

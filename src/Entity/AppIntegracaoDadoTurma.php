<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoTurmaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoTurmaRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_turma',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'idx_app_integracao_turma_sn_integrado_sn_excluido', columns: ['sn_integrado', 'sn_excluido'])]
#[ORM\Index(name: 'idx_app_integracao_turma_id_turma', columns: ['id_turma'])]
#[ORM\Index(name: 'idx_app_integracao_turma_cd_turma', columns: ['cd_turma'])]
#[ORM\Index(name: 'idx_app_integracao_turma_anosemestre', columns: ['anosemestre'])]
#[ORM\Index(name: 'idx_app_integracao_turma_cd_curso', columns: ['cd_curso'])]
class AppIntegracaoDadoTurma
{
    #[ORM\Id]
    #[ORM\Column(name: 'id_turma', type: 'integer', options: ['unsigned' => true])]
    private ?int $idTurma = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'anosemestre', type: 'smallint')]
    private ?int $anosemestre = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'dt_insercao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInsercao = null;

    #[ORM\Column(name: 'sn_integrado', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegrado = false;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', options: ['default' => '0'])]
    private bool $snExcluido = false;

    public function __construct(
        ?int $idTurma = null,
        ?string $cdTurma = null,
        ?int $anosemestre = null,
        ?string $cdCurso = null,
        ?\DateTimeInterface $dtInsercao = null,
        bool $snIntegrado = false,
        bool $snExcluido = false
    ) {
        $this->idTurma = $idTurma;
        $this->cdTurma = $cdTurma;
        $this->anosemestre = $anosemestre;
        $this->cdCurso = $cdCurso;
        $this->dtInsercao = $dtInsercao;
        $this->snIntegrado = $snIntegrado;
        $this->snExcluido = $snExcluido;
    }

    public function getIdTurma(): ?int
    {
        return $this->idTurma;
    }

    public function setIdTurma(?int $idTurma): self
    {
        $this->idTurma = $idTurma;
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

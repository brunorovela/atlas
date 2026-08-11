<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConAreasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConAreasRepository::class)]
#[ORM\Table(
    name: 'con_areas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_area', columns: ['cd_area'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
class ConAreas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_area', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdArea = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdGrupo = 0;

    #[ORM\Column(name: 'ds_area', type: 'string', length: 255, nullable: true)]
    private ?string $dsArea = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 20, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'nr_vagas', type: 'integer', nullable: true)]
    private ?int $nrVagas = null;

    #[ORM\Column(name: 'nr_vagas_especial', type: 'integer', nullable: true)]
    private ?int $nrVagasEspecial = null;

    #[ORM\Column(name: 'nr_valor_inscricao', type: 'float', options: ['unsigned' => true, 'default' => '0.00'])]
    private float $nrValorInscricao = 0.0;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'turno', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $turno = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snAtivo = true;

    public function __construct(
        int $cdGrupo = 0,
        ?string $dsArea = null,
        ?string $dsChave = null,
        ?int $nrVagas = null,
        ?int $nrVagasEspecial = null,
        float $nrValorInscricao = 0.0,
        ?string $cdCurso = null,
        ?string $turno = null,
        ?bool $snAtivo = true
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->dsArea = $dsArea;
        $this->dsChave = $dsChave;
        $this->nrVagas = $nrVagas;
        $this->nrVagasEspecial = $nrVagasEspecial;
        $this->nrValorInscricao = $nrValorInscricao;
        $this->cdCurso = $cdCurso;
        $this->turno = $turno;
        $this->snAtivo = $snAtivo;
    }

    public function getCdArea(): ?int
    {
        return $this->cdArea;
    }

    public function getCdGrupo(): int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getDsArea(): ?string
    {
        return $this->dsArea;
    }

    public function setDsArea(?string $dsArea): self
    {
        $this->dsArea = $dsArea;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getNrVagas(): ?int
    {
        return $this->nrVagas;
    }

    public function setNrVagas(?int $nrVagas): self
    {
        $this->nrVagas = $nrVagas;
        return $this;
    }

    public function getNrVagasEspecial(): ?int
    {
        return $this->nrVagasEspecial;
    }

    public function setNrVagasEspecial(?int $nrVagasEspecial): self
    {
        $this->nrVagasEspecial = $nrVagasEspecial;
        return $this;
    }

    public function getNrValorInscricao(): float
    {
        return $this->nrValorInscricao;
    }

    public function setNrValorInscricao(float $nrValorInscricao): self
    {
        $this->nrValorInscricao = $nrValorInscricao;
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

    public function getTurno(): ?string
    {
        return $this->turno;
    }

    public function setTurno(?string $turno): self
    {
        $this->turno = $turno;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}

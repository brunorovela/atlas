<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IntegracaoPergamumCursosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoPergamumCursosRepository::class)]
#[ORM\Table(
    name: 'integracao_pergamum_cursos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_COLIGADA_CURSO', columns: ['cd_coligada', 'cd_curso'])]
class IntegracaoPergamumCursos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_integracao_curso', type: 'bigint')]
    private ?string $cdIntegracaoCurso = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true)]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'id_curso', type: 'integer', nullable: true)]
    private ?int $idCurso = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 255, nullable: true)]
    private ?string $cdCurso = null;

    public function __construct(
        ?int $cdColigada = null,
        ?int $idCurso = null,
        ?string $cdCurso = null
    ) {
        $this->cdColigada = $cdColigada;
        $this->idCurso = $idCurso;
        $this->cdCurso = $cdCurso;
    }

    public function getCdIntegracaoCurso(): ?string
    {
        return $this->cdIntegracaoCurso;
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

    public function getIdCurso(): ?int
    {
        return $this->idCurso;
    }

    public function setIdCurso(?int $idCurso): self
    {
        $this->idCurso = $idCurso;
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
}

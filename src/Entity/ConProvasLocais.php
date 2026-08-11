<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConProvasLocaisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConProvasLocaisRepository::class)]
#[ORM\Table(
    name: 'con_provas_locais',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CONCURSO', columns: ['cd_concurso'])]
#[ORM\Index(name: 'IX_CD_INSCRICAO_TIPO', columns: ['cd_inscricao_tipo'])]
class ConProvasLocais
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_local', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdLocal = null;

    #[ORM\Column(name: 'cd_concurso', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdConcurso = null;

    #[ORM\Column(name: 'cd_inscricao_tipo', type: 'integer', nullable: true)]
    private ?int $cdInscricaoTipo = null;

    #[ORM\Column(name: 'ds_local', type: 'string', length: 255, nullable: true)]
    private ?string $dsLocal = null;

    public function __construct(
        ?int $cdConcurso = null,
        ?int $cdInscricaoTipo = null,
        ?string $dsLocal = null
    ) {
        $this->cdConcurso = $cdConcurso;
        $this->cdInscricaoTipo = $cdInscricaoTipo;
        $this->dsLocal = $dsLocal;
    }

    public function getCdLocal(): ?int
    {
        return $this->cdLocal;
    }

    public function getCdConcurso(): ?int
    {
        return $this->cdConcurso;
    }

    public function setCdConcurso(?int $cdConcurso): self
    {
        $this->cdConcurso = $cdConcurso;
        return $this;
    }

    public function getCdInscricaoTipo(): ?int
    {
        return $this->cdInscricaoTipo;
    }

    public function setCdInscricaoTipo(?int $cdInscricaoTipo): self
    {
        $this->cdInscricaoTipo = $cdInscricaoTipo;
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
}

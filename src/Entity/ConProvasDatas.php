<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConProvasDatasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConProvasDatasRepository::class)]
#[ORM\Table(
    name: 'con_provas_datas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_LOCAL', columns: ['cd_local'])]
#[ORM\Index(name: 'IX_CD_CONCURSO', columns: ['cd_concurso'])]
class ConProvasDatas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_data', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdData = null;

    #[ORM\Column(name: 'cd_local', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdLocal = null;

    #[ORM\Column(name: 'cd_concurso', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdConcurso = null;

    #[ORM\Column(name: 'dt_prova', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtProva = null;

    public function __construct(
        ?int $cdLocal = null,
        ?int $cdConcurso = null,
        ?\DateTimeInterface $dtProva = null
    ) {
        $this->cdLocal = $cdLocal;
        $this->cdConcurso = $cdConcurso;
        $this->dtProva = $dtProva;
    }

    public function getCdData(): ?int
    {
        return $this->cdData;
    }

    public function getCdLocal(): ?int
    {
        return $this->cdLocal;
    }

    public function setCdLocal(?int $cdLocal): self
    {
        $this->cdLocal = $cdLocal;
        return $this;
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

    public function getDtProva(): ?\DateTimeInterface
    {
        return $this->dtProva;
    }

    public function setDtProva(?\DateTimeInterface $dtProva): self
    {
        $this->dtProva = $dtProva;
        return $this;
    }
}

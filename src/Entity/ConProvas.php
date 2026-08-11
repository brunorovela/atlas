<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConProvasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConProvasRepository::class)]
#[ORM\Table(
    name: 'con_provas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_prova', columns: ['cd_prova'])]
#[ORM\Index(name: 'IX_CD_CONCURSO', columns: ['cd_concurso'])]
#[ORM\Index(name: 'IX_CD_LEITORA', columns: ['cd_leitora'])]
#[ORM\Index(name: 'IX_CD_PROVA_ONLINE', columns: ['cd_prova_online'])]
class ConProvas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'cd_concurso', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConcurso = null;

    #[ORM\Column(name: 'ds_prova', type: 'string', length: 255, nullable: true)]
    private ?string $dsProva = null;

    #[ORM\Column(name: 'cd_prova_online', type: 'integer', nullable: true)]
    private ?int $cdProvaOnline = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 20)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'cd_leitora', type: 'integer', nullable: true)]
    private ?int $cdLeitora = null;

    #[ORM\Column(name: 'cd_tipo', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdTipo = 0;

    #[ORM\Column(name: 'sn_ativo', type: 'integer', options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    public function __construct(
        ?int $cdConcurso = null,
        ?string $dsProva = null,
        ?int $cdProvaOnline = null,
        ?string $dsChave = null,
        ?int $cdLeitora = null,
        int $cdTipo = 0,
        ?int $snAtivo = null
    ) {
        $this->cdConcurso = $cdConcurso;
        $this->dsProva = $dsProva;
        $this->cdProvaOnline = $cdProvaOnline;
        $this->dsChave = $dsChave;
        $this->cdLeitora = $cdLeitora;
        $this->cdTipo = $cdTipo;
        $this->snAtivo = $snAtivo;
    }

    public function getCdProva(): ?int
    {
        return $this->cdProva;
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

    public function getDsProva(): ?string
    {
        return $this->dsProva;
    }

    public function setDsProva(?string $dsProva): self
    {
        $this->dsProva = $dsProva;
        return $this;
    }

    public function getCdProvaOnline(): ?int
    {
        return $this->cdProvaOnline;
    }

    public function setCdProvaOnline(?int $cdProvaOnline): self
    {
        $this->cdProvaOnline = $cdProvaOnline;
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

    public function getCdLeitora(): ?int
    {
        return $this->cdLeitora;
    }

    public function setCdLeitora(?int $cdLeitora): self
    {
        $this->cdLeitora = $cdLeitora;
        return $this;
    }

    public function getCdTipo(): int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}

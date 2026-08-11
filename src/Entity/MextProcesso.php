<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\MextProcessoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MextProcessoRepository::class)]
#[ORM\Table(
    name: 'mext_processo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class MextProcesso
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_processo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProcesso = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'sn_matricula', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snMatricula = null;

    #[ORM\Column(name: 'sn_rematricula', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snRematricula = null;

    #[ORM\Column(name: 'sn_responsavel_matricula', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snResponsavelMatricula = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'dt_inicio_matricula', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicioMatricula = null;

    #[ORM\Column(name: 'dt_fim_matricula', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFimMatricula = null;

    #[ORM\Column(name: 'dt_inicio_rematricula', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicioRematricula = null;

    #[ORM\Column(name: 'dt_fim_rematricula', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFimRematricula = null;

    #[ORM\Column(name: 'me_texto_matricula', type: 'text', length: 65535, nullable: true)]
    private ?string $meTextoMatricula = null;

    #[ORM\Column(name: 'me_texto_rematricula', type: 'text', length: 65535, nullable: true)]
    private ?string $meTextoRematricula = null;

    public function __construct(
        ?int $nrAnosemestre = null,
        ?string $dsNome = null,
        ?int $snMatricula = null,
        ?int $snRematricula = null,
        ?int $snResponsavelMatricula = null,
        ?int $snAtivo = null,
        ?\DateTimeInterface $dtInicioMatricula = null,
        ?\DateTimeInterface $dtFimMatricula = null,
        ?\DateTimeInterface $dtInicioRematricula = null,
        ?\DateTimeInterface $dtFimRematricula = null,
        ?string $meTextoMatricula = null,
        ?string $meTextoRematricula = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->dsNome = $dsNome;
        $this->snMatricula = $snMatricula;
        $this->snRematricula = $snRematricula;
        $this->snResponsavelMatricula = $snResponsavelMatricula;
        $this->snAtivo = $snAtivo;
        $this->dtInicioMatricula = $dtInicioMatricula;
        $this->dtFimMatricula = $dtFimMatricula;
        $this->dtInicioRematricula = $dtInicioRematricula;
        $this->dtFimRematricula = $dtFimRematricula;
        $this->meTextoMatricula = $meTextoMatricula;
        $this->meTextoRematricula = $meTextoRematricula;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
    }

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
        return $this;
    }

    public function getSnMatricula(): ?int
    {
        return $this->snMatricula;
    }

    public function setSnMatricula(?int $snMatricula): self
    {
        $this->snMatricula = $snMatricula;
        return $this;
    }

    public function getSnRematricula(): ?int
    {
        return $this->snRematricula;
    }

    public function setSnRematricula(?int $snRematricula): self
    {
        $this->snRematricula = $snRematricula;
        return $this;
    }

    public function getSnResponsavelMatricula(): ?int
    {
        return $this->snResponsavelMatricula;
    }

    public function setSnResponsavelMatricula(?int $snResponsavelMatricula): self
    {
        $this->snResponsavelMatricula = $snResponsavelMatricula;
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

    public function getDtInicioMatricula(): ?\DateTimeInterface
    {
        return $this->dtInicioMatricula;
    }

    public function setDtInicioMatricula(?\DateTimeInterface $dtInicioMatricula): self
    {
        $this->dtInicioMatricula = $dtInicioMatricula;
        return $this;
    }

    public function getDtFimMatricula(): ?\DateTimeInterface
    {
        return $this->dtFimMatricula;
    }

    public function setDtFimMatricula(?\DateTimeInterface $dtFimMatricula): self
    {
        $this->dtFimMatricula = $dtFimMatricula;
        return $this;
    }

    public function getDtInicioRematricula(): ?\DateTimeInterface
    {
        return $this->dtInicioRematricula;
    }

    public function setDtInicioRematricula(?\DateTimeInterface $dtInicioRematricula): self
    {
        $this->dtInicioRematricula = $dtInicioRematricula;
        return $this;
    }

    public function getDtFimRematricula(): ?\DateTimeInterface
    {
        return $this->dtFimRematricula;
    }

    public function setDtFimRematricula(?\DateTimeInterface $dtFimRematricula): self
    {
        $this->dtFimRematricula = $dtFimRematricula;
        return $this;
    }

    public function getMeTextoMatricula(): ?string
    {
        return $this->meTextoMatricula;
    }

    public function setMeTextoMatricula(?string $meTextoMatricula): self
    {
        $this->meTextoMatricula = $meTextoMatricula;
        return $this;
    }

    public function getMeTextoRematricula(): ?string
    {
        return $this->meTextoRematricula;
    }

    public function setMeTextoRematricula(?string $meTextoRematricula): self
    {
        $this->meTextoRematricula = $meTextoRematricula;
        return $this;
    }
}

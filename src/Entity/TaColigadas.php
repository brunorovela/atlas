<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TaColigadasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaColigadasRepository::class)]
#[ORM\Table(
    name: 'ta_coligadas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ta_coligadas_cd_coligada_matriz_IDX', columns: ['cd_coligada_matriz'])]
class TaColigadas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_coligada_matriz', type: 'integer', options: ['default' => '0'])]
    private int $cdColigadaMatriz = 0;

    #[ORM\Column(name: 'dt_ultimo_encerramento', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtUltimoEncerramento = null;

    #[ORM\Column(name: 'hr_limite_encerramento', type: 'time', nullable: true)]
    private ?\DateTimeInterface $hrLimiteEncerramento = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        int $cdColigadaMatriz = 0,
        ?\DateTimeInterface $dtUltimoEncerramento = null,
        ?\DateTimeInterface $hrLimiteEncerramento = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        $this->dtUltimoEncerramento = $dtUltimoEncerramento;
        $this->hrLimiteEncerramento = $hrLimiteEncerramento;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdColigadaMatriz(): int
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(int $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }

    public function getDtUltimoEncerramento(): ?\DateTimeInterface
    {
        return $this->dtUltimoEncerramento;
    }

    public function setDtUltimoEncerramento(?\DateTimeInterface $dtUltimoEncerramento): self
    {
        $this->dtUltimoEncerramento = $dtUltimoEncerramento;
        return $this;
    }

    public function getHrLimiteEncerramento(): ?\DateTimeInterface
    {
        return $this->hrLimiteEncerramento;
    }

    public function setHrLimiteEncerramento(?\DateTimeInterface $hrLimiteEncerramento): self
    {
        $this->hrLimiteEncerramento = $hrLimiteEncerramento;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}

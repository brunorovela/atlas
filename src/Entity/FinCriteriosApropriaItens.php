<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinCriteriosApropriaItensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCriteriosApropriaItensRepository::class)]
#[ORM\Table(
    name: 'fin_criterios_apropria_itens',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_APROPRIACAO', columns: ['cd_apropriacao'])]
#[ORM\Index(name: 'IX_CD_CENTRO', columns: ['cd_centro'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
class FinCriteriosApropriaItens
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_apropriacao', type: 'integer', options: ['default' => '0'])]
    private int $cdApropriacao = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_centro', type: 'integer', options: ['default' => '0'])]
    private int $cdCentro = 0;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdColigada = 1;

    #[ORM\Column(name: 'vl_apropriacao', type: 'float', nullable: true)]
    private ?float $vlApropriacao = null;

    public function __construct(
        int $cdApropriacao = 0,
        int $cdCentro = 0,
        int $cdColigada = 1,
        ?float $vlApropriacao = null
    ) {
        $this->cdApropriacao = $cdApropriacao;
        $this->cdCentro = $cdCentro;
        $this->cdColigada = $cdColigada;
        $this->vlApropriacao = $vlApropriacao;
    }

    public function getCdApropriacao(): int
    {
        return $this->cdApropriacao;
    }

    public function setCdApropriacao(int $cdApropriacao): self
    {
        $this->cdApropriacao = $cdApropriacao;
        return $this;
    }

    public function getCdCentro(): int
    {
        return $this->cdCentro;
    }

    public function setCdCentro(int $cdCentro): self
    {
        $this->cdCentro = $cdCentro;
        return $this;
    }

    public function getCdColigada(): int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getVlApropriacao(): ?float
    {
        return $this->vlApropriacao;
    }

    public function setVlApropriacao(?float $vlApropriacao): self
    {
        $this->vlApropriacao = $vlApropriacao;
        return $this;
    }
}

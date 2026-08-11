<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\GmetReceitaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GmetReceitaRepository::class)]
#[ORM\Table(
    name: 'gmet_receita',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class GmetReceita
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_receita', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdReceita = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'ds_modo_preparo', type: 'string', length: 255, nullable: true)]
    private ?string $dsModoPreparo = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsNome = null,
        ?string $dsModoPreparo = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsNome = $dsNome;
        $this->dsModoPreparo = $dsModoPreparo;
        $this->dtBase = $dtBase;
    }

    public function getCdReceita(): ?int
    {
        return $this->cdReceita;
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

    public function getDsModoPreparo(): ?string
    {
        return $this->dsModoPreparo;
    }

    public function setDsModoPreparo(?string $dsModoPreparo): self
    {
        $this->dsModoPreparo = $dsModoPreparo;
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

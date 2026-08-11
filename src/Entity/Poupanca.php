<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PoupancaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PoupancaRepository::class)]
#[ORM\Table(
    name: 'poupanca',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'PrimaryKey', columns: ['data'])]
#[ORM\Index(name: 'IX_DATA', columns: ['data'])]
class Poupanca
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_POUPANCA', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPoupanca = null;

    #[ORM\Column(name: 'data', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $data = null;

    #[ORM\Column(name: 'indicepoupanca', type: 'float', nullable: true)]
    private ?float $indicepoupanca = null;

    #[ORM\Column(name: 'indicecorrigido', type: 'float', nullable: true, options: ['default' => '1'])]
    private ?float $indicecorrigido = 1.0;

    #[ORM\Column(name: 'SN_CALCULADO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snCalculado = 0;

    public function __construct(
        ?\DateTimeInterface $data = null,
        ?float $indicepoupanca = null,
        ?float $indicecorrigido = 1.0,
        int $snCalculado = 0
    ) {
        $this->data = $data;
        $this->indicepoupanca = $indicepoupanca;
        $this->indicecorrigido = $indicecorrigido;
        $this->snCalculado = $snCalculado;
    }

    public function getCdPoupanca(): ?int
    {
        return $this->cdPoupanca;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(?\DateTimeInterface $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function getIndicepoupanca(): ?float
    {
        return $this->indicepoupanca;
    }

    public function setIndicepoupanca(?float $indicepoupanca): self
    {
        $this->indicepoupanca = $indicepoupanca;
        return $this;
    }

    public function getIndicecorrigido(): ?float
    {
        return $this->indicecorrigido;
    }

    public function setIndicecorrigido(?float $indicecorrigido): self
    {
        $this->indicecorrigido = $indicecorrigido;
        return $this;
    }

    public function getSnCalculado(): int
    {
        return $this->snCalculado;
    }

    public function setSnCalculado(int $snCalculado): self
    {
        $this->snCalculado = $snCalculado;
        return $this;
    }
}

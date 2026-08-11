<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AcrvReferenciaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcrvReferenciaRepository::class)]
#[ORM\Table(
    name: 'acrv_referencia',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class AcrvReferencia
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_referencia', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdReferencia = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255, nullable: true)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsNome = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsNome = $dsNome;
        $this->dtBase = $dtBase;
    }

    public function getCdReferencia(): ?int
    {
        return $this->cdReferencia;
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

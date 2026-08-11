<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EnqAlternativasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnqAlternativasRepository::class)]
#[ORM\Table(
    name: 'enq_alternativas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ENQUETE', columns: ['cd_enquete'])]
class EnqAlternativas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_alternativa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAlternativa = null;

    #[ORM\Column(name: 'cd_enquete', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEnquete = null;

    #[ORM\Column(name: 'ds_alternativa', type: 'string', length: 255, nullable: true)]
    private ?string $dsAlternativa = null;

    public function __construct(
        ?int $cdEnquete = null,
        ?string $dsAlternativa = null
    ) {
        $this->cdEnquete = $cdEnquete;
        $this->dsAlternativa = $dsAlternativa;
    }

    public function getCdAlternativa(): ?int
    {
        return $this->cdAlternativa;
    }

    public function getCdEnquete(): ?int
    {
        return $this->cdEnquete;
    }

    public function setCdEnquete(?int $cdEnquete): self
    {
        $this->cdEnquete = $cdEnquete;
        return $this;
    }

    public function getDsAlternativa(): ?string
    {
        return $this->dsAlternativa;
    }

    public function setDsAlternativa(?string $dsAlternativa): self
    {
        $this->dsAlternativa = $dsAlternativa;
        return $this;
    }
}

<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PolAlternativasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolAlternativasRepository::class)]
#[ORM\Table(
    name: 'pol_alternativas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_QUESTAO', columns: ['cd_questao'])]
class PolAlternativas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_alternativa', type: 'integer')]
    private ?int $cdAlternativa = null;

    #[ORM\Column(name: 'cd_questao', type: 'integer')]
    private ?int $cdQuestao = null;

    #[ORM\Column(name: 'nr_alternativa', type: 'integer', nullable: true)]
    private ?int $nrAlternativa = null;

    #[ORM\Column(name: 'ds_alternativa', type: 'blob', length: 65535, nullable: true)]
    private ?string $dsAlternativa = null;

    #[ORM\Column(name: 'ds_justificativa', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsJustificativa = null;

    public function __construct(
        ?int $cdQuestao = null,
        ?int $nrAlternativa = null,
        ?string $dsAlternativa = null,
        ?string $dsJustificativa = null
    ) {
        $this->cdQuestao = $cdQuestao;
        $this->nrAlternativa = $nrAlternativa;
        $this->dsAlternativa = $dsAlternativa;
        $this->dsJustificativa = $dsJustificativa;
    }

    public function getCdAlternativa(): ?int
    {
        return $this->cdAlternativa;
    }

    public function getCdQuestao(): ?int
    {
        return $this->cdQuestao;
    }

    public function setCdQuestao(?int $cdQuestao): self
    {
        $this->cdQuestao = $cdQuestao;
        return $this;
    }

    public function getNrAlternativa(): ?int
    {
        return $this->nrAlternativa;
    }

    public function setNrAlternativa(?int $nrAlternativa): self
    {
        $this->nrAlternativa = $nrAlternativa;
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

    public function getDsJustificativa(): ?string
    {
        return $this->dsJustificativa;
    }

    public function setDsJustificativa(?string $dsJustificativa): self
    {
        $this->dsJustificativa = $dsJustificativa;
        return $this;
    }
}

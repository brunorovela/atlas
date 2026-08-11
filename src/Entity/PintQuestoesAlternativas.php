<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PintQuestoesAlternativasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintQuestoesAlternativasRepository::class)]
#[ORM\Table(
    name: 'pint_questoes_alternativas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_QUESTAO', columns: ['cd_questao'])]
class PintQuestoesAlternativas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_alternativa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAlternativa = null;

    #[ORM\Column(name: 'cd_questao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdQuestao = null;

    #[ORM\Column(name: 'nr_alternativa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAlternativa = null;

    #[ORM\Column(name: 'ds_alternativa', type: 'text', length: 65535, nullable: true)]
    private ?string $dsAlternativa = null;

    #[ORM\Column(name: 'sn_voltar', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snVoltar = 0;

    #[ORM\Column(name: 'ds_alternativa_errada', type: 'text', length: 65535, nullable: true)]
    private ?string $dsAlternativaErrada = null;

    #[ORM\Column(name: 'ds_alternativa_nova', type: 'text', length: 65535, nullable: true)]
    private ?string $dsAlternativaNova = null;

    public function __construct(
        ?int $cdQuestao = null,
        ?int $nrAlternativa = null,
        ?string $dsAlternativa = null,
        ?int $snVoltar = 0,
        ?string $dsAlternativaErrada = null,
        ?string $dsAlternativaNova = null
    ) {
        $this->cdQuestao = $cdQuestao;
        $this->nrAlternativa = $nrAlternativa;
        $this->dsAlternativa = $dsAlternativa;
        $this->snVoltar = $snVoltar;
        $this->dsAlternativaErrada = $dsAlternativaErrada;
        $this->dsAlternativaNova = $dsAlternativaNova;
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

    public function getSnVoltar(): ?int
    {
        return $this->snVoltar;
    }

    public function setSnVoltar(?int $snVoltar): self
    {
        $this->snVoltar = $snVoltar;
        return $this;
    }

    public function getDsAlternativaErrada(): ?string
    {
        return $this->dsAlternativaErrada;
    }

    public function setDsAlternativaErrada(?string $dsAlternativaErrada): self
    {
        $this->dsAlternativaErrada = $dsAlternativaErrada;
        return $this;
    }

    public function getDsAlternativaNova(): ?string
    {
        return $this->dsAlternativaNova;
    }

    public function setDsAlternativaNova(?string $dsAlternativaNova): self
    {
        $this->dsAlternativaNova = $dsAlternativaNova;
        return $this;
    }
}

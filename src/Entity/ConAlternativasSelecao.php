<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ConAlternativasSelecaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConAlternativasSelecaoRepository::class)]
#[ORM\Table(
    name: 'con_alternativas_selecao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_QUESTAO', columns: ['cd_questao'])]
class ConAlternativasSelecao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_alternativa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAlternativa = null;

    #[ORM\Column(name: 'cd_questao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdQuestao = null;

    #[ORM\Column(name: 'nr_alternativa', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $nrAlternativa = null;

    #[ORM\Column(name: 'ds_alternativa', type: 'string', length: 255)]
    private ?string $dsAlternativa = null;

    #[ORM\Column(name: 'sn_correta', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snCorreta = null;

    public function __construct(
        ?int $cdQuestao = null,
        ?int $nrAlternativa = null,
        ?string $dsAlternativa = null,
        ?int $snCorreta = null
    ) {
        $this->cdQuestao = $cdQuestao;
        $this->nrAlternativa = $nrAlternativa;
        $this->dsAlternativa = $dsAlternativa;
        $this->snCorreta = $snCorreta;
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

    public function getSnCorreta(): ?int
    {
        return $this->snCorreta;
    }

    public function setSnCorreta(?int $snCorreta): self
    {
        $this->snCorreta = $snCorreta;
        return $this;
    }
}

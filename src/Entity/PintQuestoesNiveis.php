<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PintQuestoesNiveisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintQuestoesNiveisRepository::class)]
#[ORM\Table(
    name: 'pint_questoes_niveis',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class PintQuestoesNiveis
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_questao_nivel', type: TinyIntType::NAME)]
    private ?int $cdQuestaoNivel = null;

    #[ORM\Column(name: 'ds_questao_nivel', type: 'string', length: 255, nullable: true)]
    private ?string $dsQuestaoNivel = null;

    public function __construct(
        ?int $cdQuestaoNivel = null,
        ?string $dsQuestaoNivel = null
    ) {
        $this->cdQuestaoNivel = $cdQuestaoNivel;
        $this->dsQuestaoNivel = $dsQuestaoNivel;
    }

    public function getCdQuestaoNivel(): ?int
    {
        return $this->cdQuestaoNivel;
    }

    public function setCdQuestaoNivel(?int $cdQuestaoNivel): self
    {
        $this->cdQuestaoNivel = $cdQuestaoNivel;
        return $this;
    }

    public function getDsQuestaoNivel(): ?string
    {
        return $this->dsQuestaoNivel;
    }

    public function setDsQuestaoNivel(?string $dsQuestaoNivel): self
    {
        $this->dsQuestaoNivel = $dsQuestaoNivel;
        return $this;
    }
}

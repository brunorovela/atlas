<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PolProvasNiveisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolProvasNiveisRepository::class)]
#[ORM\Table(
    name: 'pol_provas_niveis',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
#[ORM\Index(name: 'IX_CD_NIVEL', columns: ['cd_nivel'])]
class PolProvasNiveis
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_nivel', type: 'integer')]
    private ?int $cdProvaNivel = null;

    #[ORM\Column(name: 'cd_prova', type: 'integer')]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'cd_nivel', type: 'integer')]
    private ?int $cdNivel = null;

    #[ORM\Column(name: 'qtd_questoes', type: 'integer', nullable: true)]
    private ?int $qtdQuestoes = null;

    #[ORM\Column(name: 'sn_discursiva', type: 'integer', options: ['default' => '0'])]
    private int $snDiscursiva = 0;

    public function __construct(
        ?int $cdProva = null,
        ?int $cdNivel = null,
        ?int $qtdQuestoes = null,
        int $snDiscursiva = 0
    ) {
        $this->cdProva = $cdProva;
        $this->cdNivel = $cdNivel;
        $this->qtdQuestoes = $qtdQuestoes;
        $this->snDiscursiva = $snDiscursiva;
    }

    public function getCdProvaNivel(): ?int
    {
        return $this->cdProvaNivel;
    }

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
        return $this;
    }

    public function getCdNivel(): ?int
    {
        return $this->cdNivel;
    }

    public function setCdNivel(?int $cdNivel): self
    {
        $this->cdNivel = $cdNivel;
        return $this;
    }

    public function getQtdQuestoes(): ?int
    {
        return $this->qtdQuestoes;
    }

    public function setQtdQuestoes(?int $qtdQuestoes): self
    {
        $this->qtdQuestoes = $qtdQuestoes;
        return $this;
    }

    public function getSnDiscursiva(): int
    {
        return $this->snDiscursiva;
    }

    public function setSnDiscursiva(int $snDiscursiva): self
    {
        $this->snDiscursiva = $snDiscursiva;
        return $this;
    }
}

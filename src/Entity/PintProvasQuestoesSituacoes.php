<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PintProvasQuestoesSituacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintProvasQuestoesSituacoesRepository::class)]
#[ORM\Table(
    name: 'pint_provas_questoes_situacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_QUESTAO', columns: ['cd_questao'])]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
class PintProvasQuestoesSituacoes
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_questao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdQuestao = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_prova', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'nr_situacao', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrSituacao = 0;

    public function __construct(
        ?int $cdQuestao = null,
        ?int $cdProva = null,
        ?int $nrSituacao = 0
    ) {
        $this->cdQuestao = $cdQuestao;
        $this->cdProva = $cdProva;
        $this->nrSituacao = $nrSituacao;
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

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
        return $this;
    }

    public function getNrSituacao(): ?int
    {
        return $this->nrSituacao;
    }

    public function setNrSituacao(?int $nrSituacao): self
    {
        $this->nrSituacao = $nrSituacao;
        return $this;
    }
}

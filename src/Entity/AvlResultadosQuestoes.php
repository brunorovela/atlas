<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\AvlResultadosQuestoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlResultadosQuestoesRepository::class)]
#[ORM\Table(
    name: 'avl_resultados_questoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Quest?es a serem apresentadas no resultado']
)]
#[ORM\UniqueConstraint(name: 'cd_resultado_questao', columns: ['cd_resultado_questao'])]
#[ORM\Index(name: 'IX_CD_RESULTADO', columns: ['cd_resultado'])]
#[ORM\Index(name: 'IX_CD_QUESTAO', columns: ['cd_questao'])]
class AvlResultadosQuestoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_resultado_questao', type: 'integer')]
    private ?int $cdResultadoQuestao = null;

    #[ORM\Column(name: 'cd_resultado', type: 'integer', options: ['default' => '0'])]
    private int $cdResultado = 0;

    #[ORM\Column(name: 'cd_questao', type: 'integer', options: ['default' => '-1'])]
    private int $cdQuestao = -1;

    #[ORM\Column(name: 'nr_ordem', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $nrOrdem = 1;

    public function __construct(
        int $cdResultado = 0,
        int $cdQuestao = -1,
        int $nrOrdem = 1
    ) {
        $this->cdResultado = $cdResultado;
        $this->cdQuestao = $cdQuestao;
        $this->nrOrdem = $nrOrdem;
    }

    public function getCdResultadoQuestao(): ?int
    {
        return $this->cdResultadoQuestao;
    }

    public function getCdResultado(): int
    {
        return $this->cdResultado;
    }

    public function setCdResultado(int $cdResultado): self
    {
        $this->cdResultado = $cdResultado;
        return $this;
    }

    public function getCdQuestao(): int
    {
        return $this->cdQuestao;
    }

    public function setCdQuestao(int $cdQuestao): self
    {
        $this->cdQuestao = $cdQuestao;
        return $this;
    }

    public function getNrOrdem(): int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }
}

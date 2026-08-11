<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvaliacoesComportamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvaliacoesComportamentoRepository::class)]
#[ORM\Table(
    name: 'avaliacoes_comportamento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_AVALIACAO', columns: ['cd_avaliacao'])]
class AvaliacoesComportamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_comportamento', type: 'integer')]
    private ?int $cdComportamento = null;

    #[ORM\Column(name: 'ds_comportamento', type: 'string', length: 255, options: ['default' => ''])]
    private string $dsComportamento = '';

    #[ORM\Column(name: 'nr_ordem', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'cd_avaliacao', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdAvaliacao = null;

    public function __construct(
        string $dsComportamento = '',
        ?int $nrOrdem = null,
        ?int $cdAvaliacao = null
    ) {
        $this->dsComportamento = $dsComportamento;
        $this->nrOrdem = $nrOrdem;
        $this->cdAvaliacao = $cdAvaliacao;
    }

    public function getCdComportamento(): ?int
    {
        return $this->cdComportamento;
    }

    public function getDsComportamento(): string
    {
        return $this->dsComportamento;
    }

    public function setDsComportamento(string $dsComportamento): self
    {
        $this->dsComportamento = $dsComportamento;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getCdAvaliacao(): ?int
    {
        return $this->cdAvaliacao;
    }

    public function setCdAvaliacao(?int $cdAvaliacao): self
    {
        $this->cdAvaliacao = $cdAvaliacao;
        return $this;
    }
}

<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvlAvaliadoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlAvaliadoresRepository::class)]
#[ORM\Table(
    name: 'avl_avaliadores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Avaliadores que possuem permiss?o para ver os resultados']
)]
#[ORM\UniqueConstraint(name: 'cd_avaliador', columns: ['cd_avaliador'])]
#[ORM\UniqueConstraint(name: 'UK_CD_AVALIACAO_CD_PESSOA', columns: ['cd_pessoa', 'cd_avaliacao'])]
#[ORM\Index(name: 'IX_CD_AVALIACAO', columns: ['cd_avaliacao'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class AvlAvaliadores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_avaliador', type: 'integer')]
    private ?int $cdAvaliador = null;

    #[ORM\Column(name: 'cd_avaliacao', type: 'integer', options: ['default' => '0'])]
    private int $cdAvaliacao = 0;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Column(name: 'sn_avaliador', type: 'boolean', options: ['default' => '0'])]
    private bool $snAvaliador = false;

    public function __construct(
        int $cdAvaliacao = 0,
        int $cdPessoa = 0,
        bool $snAvaliador = false
    ) {
        $this->cdAvaliacao = $cdAvaliacao;
        $this->cdPessoa = $cdPessoa;
        $this->snAvaliador = $snAvaliador;
    }

    public function getCdAvaliador(): ?int
    {
        return $this->cdAvaliador;
    }

    public function getCdAvaliacao(): int
    {
        return $this->cdAvaliacao;
    }

    public function setCdAvaliacao(int $cdAvaliacao): self
    {
        $this->cdAvaliacao = $cdAvaliacao;
        return $this;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function isSnAvaliador(): bool
    {
        return $this->snAvaliador;
    }

    public function setSnAvaliador(bool $snAvaliador): self
    {
        $this->snAvaliador = $snAvaliador;
        return $this;
    }
}

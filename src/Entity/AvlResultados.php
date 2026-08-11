<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvlResultadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlResultadosRepository::class)]
#[ORM\Table(
    name: 'avl_resultados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Configura??es dos resultados a serem apresentados']
)]
#[ORM\UniqueConstraint(name: 'cd_resultado', columns: ['cd_resultado'])]
#[ORM\Index(name: 'IX_CD_TIPO_PESSOA', columns: ['cd_tipo_pessoa'])]
#[ORM\Index(name: 'IX_CD_AVALIACAO', columns: ['cd_avaliacao'])]
class AvlResultados
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_resultado', type: 'integer')]
    private ?int $cdResultado = null;

    #[ORM\Column(name: 'cd_tipo_pessoa', type: 'boolean', options: ['default' => '0'])]
    private bool $cdTipoPessoa = false;

    #[ORM\Column(name: 'cd_avaliacao', type: 'integer', options: ['default' => '0'])]
    private int $cdAvaliacao = 0;

    public function __construct(
        bool $cdTipoPessoa = false,
        int $cdAvaliacao = 0
    ) {
        $this->cdTipoPessoa = $cdTipoPessoa;
        $this->cdAvaliacao = $cdAvaliacao;
    }

    public function getCdResultado(): ?int
    {
        return $this->cdResultado;
    }

    public function isCdTipoPessoa(): bool
    {
        return $this->cdTipoPessoa;
    }

    public function setCdTipoPessoa(bool $cdTipoPessoa): self
    {
        $this->cdTipoPessoa = $cdTipoPessoa;
        return $this;
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
}

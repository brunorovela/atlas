<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\AvlResultadosItensComparaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlResultadosItensComparaRepository::class)]
#[ORM\Table(
    name: 'avl_resultados_itens_compara',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Itens de compara??o a serem utilizados']
)]
#[ORM\UniqueConstraint(name: 'cd_item_comparacao', columns: ['cd_item_comparacao'])]
#[ORM\Index(name: 'IX_CD_RESULTADO', columns: ['cd_resultado'])]
class AvlResultadosItensCompara
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_item_comparacao', type: 'integer')]
    private ?int $cdItemComparacao = null;

    #[ORM\Column(name: 'cd_resultado', type: 'integer', options: ['default' => '0'])]
    private int $cdResultado = 0;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, options: ['default' => '0'])]
    private string $dsChave = '0';

    #[ORM\Column(name: 'nr_ordem', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $nrOrdem = 1;

    public function __construct(
        int $cdResultado = 0,
        string $dsChave = '0',
        int $nrOrdem = 1
    ) {
        $this->cdResultado = $cdResultado;
        $this->dsChave = $dsChave;
        $this->nrOrdem = $nrOrdem;
    }

    public function getCdItemComparacao(): ?int
    {
        return $this->cdItemComparacao;
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

    public function getDsChave(): string
    {
        return $this->dsChave;
    }

    public function setDsChave(string $dsChave): self
    {
        $this->dsChave = $dsChave;
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

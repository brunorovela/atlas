<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\AtuAtualizacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AtuAtualizacoesRepository::class)]
#[ORM\Table(
    name: 'atu_atualizacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class AtuAtualizacoes
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_ATUALIZACAO', type: 'string', length: 38, options: ['fixed' => true])]
    private ?string $cdAtualizacao = null;

    #[ORM\Column(name: 'SN_COMPLETO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snCompleto = 0;

    public function __construct(
        ?string $cdAtualizacao = null,
        int $snCompleto = 0
    ) {
        $this->cdAtualizacao = $cdAtualizacao;
        $this->snCompleto = $snCompleto;
    }

    public function getCdAtualizacao(): ?string
    {
        return $this->cdAtualizacao;
    }

    public function setCdAtualizacao(?string $cdAtualizacao): self
    {
        $this->cdAtualizacao = $cdAtualizacao;
        return $this;
    }

    public function getSnCompleto(): int
    {
        return $this->snCompleto;
    }

    public function setSnCompleto(int $snCompleto): self
    {
        $this->snCompleto = $snCompleto;
        return $this;
    }
}

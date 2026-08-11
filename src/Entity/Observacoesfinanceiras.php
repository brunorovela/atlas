<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ObservacoesfinanceirasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObservacoesfinanceirasRepository::class)]
#[ORM\Table(
    name: 'observacoesfinanceiras',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class Observacoesfinanceiras
{
    #[ORM\Id]
    #[ORM\Column(name: 'codigoaluno', type: 'integer', options: ['default' => '0'])]
    private int $codigoaluno = 0;

    #[ORM\Column(name: 'observacoes', type: 'blob', nullable: true)]
    private ?string $observacoes = null;

    #[ORM\Column(name: 'observacoes_especiais', type: 'blob', nullable: true)]
    private ?string $observacoesEspeciais = null;

    public function __construct(
        int $codigoaluno = 0,
        ?string $observacoes = null,
        ?string $observacoesEspeciais = null
    ) {
        $this->codigoaluno = $codigoaluno;
        $this->observacoes = $observacoes;
        $this->observacoesEspeciais = $observacoesEspeciais;
    }

    public function getCodigoaluno(): int
    {
        return $this->codigoaluno;
    }

    public function setCodigoaluno(int $codigoaluno): self
    {
        $this->codigoaluno = $codigoaluno;
        return $this;
    }

    public function getObservacoes(): ?string
    {
        return $this->observacoes;
    }

    public function setObservacoes(?string $observacoes): self
    {
        $this->observacoes = $observacoes;
        return $this;
    }

    public function getObservacoesEspeciais(): ?string
    {
        return $this->observacoesEspeciais;
    }

    public function setObservacoesEspeciais(?string $observacoesEspeciais): self
    {
        $this->observacoesEspeciais = $observacoesEspeciais;
        return $this;
    }
}

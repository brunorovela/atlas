<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\HistoricoObsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoricoObsRepository::class)]
#[ORM\Table(
    name: 'historico_obs',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CODIGOALUNO', columns: ['codigoaluno'])]
#[ORM\Index(name: 'IX_CURSO', columns: ['curso'])]
class HistoricoObs
{
    #[ORM\Id]
    #[ORM\Column(name: 'codigoaluno', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $codigoaluno = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'curso', type: 'string', length: 15, options: ['default' => '0'])]
    private string $curso = '0';

    #[ORM\Column(name: 'observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $observacao = null;

    public function __construct(
        int $codigoaluno = 0,
        string $curso = '0',
        ?string $observacao = null
    ) {
        $this->codigoaluno = $codigoaluno;
        $this->curso = $curso;
        $this->observacao = $observacao;
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

    public function getCurso(): string
    {
        return $this->curso;
    }

    public function setCurso(string $curso): self
    {
        $this->curso = $curso;
        return $this;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): self
    {
        $this->observacao = $observacao;
        return $this;
    }
}

<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnimMoodleDisciplinaTurmaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimMoodleDisciplinaTurmaRepository::class)]
#[ORM\Table(
    name: 'unim_moodle_disciplina_turma',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
#[ORM\UniqueConstraint(name: 'idx_chave', columns: ['ds_chave'])]
class UnimMoodleDisciplinaTurma
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_unim_moodle_disciplina_turma', type: 'integer')]
    private ?int $cdUnimMoodleDisciplinaTurma = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255, nullable: true)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'sn_restrito', type: 'boolean', options: ['default' => '0'])]
    private bool $snRestrito = false;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $dsNome = null,
        bool $snRestrito = false,
        ?string $dsChave = null
    ) {
        $this->dsNome = $dsNome;
        $this->snRestrito = $snRestrito;
        $this->dsChave = $dsChave;
    }

    public function getCdUnimMoodleDisciplinaTurma(): ?int
    {
        return $this->cdUnimMoodleDisciplinaTurma;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
        return $this;
    }

    public function isSnRestrito(): bool
    {
        return $this->snRestrito;
    }

    public function setSnRestrito(bool $snRestrito): self
    {
        $this->snRestrito = $snRestrito;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }
}

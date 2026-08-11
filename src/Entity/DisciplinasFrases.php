<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DisciplinasFrasesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisciplinasFrasesRepository::class)]
#[ORM\Table(
    name: 'disciplinas_frases',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_disciplina_frase', columns: ['cd_disciplina_frase'])]
class DisciplinasFrases
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_disciplina_frase', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDisciplinaFrase = null;

    #[ORM\Column(name: 'id_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $idDisciplina = null;

    #[ORM\Column(name: 'me_frase', type: 'text', length: 65535, nullable: true)]
    private ?string $meFrase = null;

    public function __construct(
        ?int $idDisciplina = null,
        ?string $meFrase = null
    ) {
        $this->idDisciplina = $idDisciplina;
        $this->meFrase = $meFrase;
    }

    public function getCdDisciplinaFrase(): ?int
    {
        return $this->cdDisciplinaFrase;
    }

    public function getIdDisciplina(): ?int
    {
        return $this->idDisciplina;
    }

    public function setIdDisciplina(?int $idDisciplina): self
    {
        $this->idDisciplina = $idDisciplina;
        return $this;
    }

    public function getMeFrase(): ?string
    {
        return $this->meFrase;
    }

    public function setMeFrase(?string $meFrase): self
    {
        $this->meFrase = $meFrase;
        return $this;
    }
}

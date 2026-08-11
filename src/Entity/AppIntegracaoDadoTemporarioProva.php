<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoTemporarioProvaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoTemporarioProvaRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_temporario_prova',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_app_integracao_prova', columns: ['cd_prova_origem'])]
class AppIntegracaoDadoTemporarioProva
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_integracao_dado_temporario', type: 'integer')]
    private ?int $cdIntegracaoDadoTemporario = null;

    #[ORM\Column(name: 'cd_prova_origem', type: 'integer')]
    private ?int $cdProvaOrigem = null;

    #[ORM\Column(name: 'cd_turma_origem', type: 'integer')]
    private ?int $cdTurmaOrigem = null;

    #[ORM\Column(name: 'cd_turma_etapa_origem', type: 'integer')]
    private ?int $cdTurmaEtapaOrigem = null;

    #[ORM\Column(name: 'cd_disciplina_origem', type: 'integer')]
    private ?int $cdDisciplinaOrigem = null;

    #[ORM\Column(name: 'nr_prova', type: 'smallint')]
    private ?int $nrProva = null;

    #[ORM\Column(name: 'dt_prova', type: 'datetime')]
    private ?\DateTimeInterface $dtProva = null;

    #[ORM\Column(name: 'ds_prova', type: 'string', length: 255)]
    private ?string $dsProva = null;

    #[ORM\Column(name: 'nr_etapa', type: 'smallint')]
    private ?int $nrEtapa = null;

    #[ORM\Column(name: 'cd_professor', type: 'integer', nullable: true)]
    private ?int $cdProfessor = null;

    #[ORM\Column(name: 'cd_professores_turma', type: 'text', length: 65535, nullable: true)]
    private ?string $cdProfessoresTurma = null;

    #[ORM\Column(name: 'dt_informacao', type: 'datetime')]
    private ?\DateTimeInterface $dtInformacao = null;

    public function __construct(
        ?int $cdProvaOrigem = null,
        ?int $cdTurmaOrigem = null,
        ?int $cdTurmaEtapaOrigem = null,
        ?int $cdDisciplinaOrigem = null,
        ?int $nrProva = null,
        ?\DateTimeInterface $dtProva = null,
        ?string $dsProva = null,
        ?int $nrEtapa = null,
        ?int $cdProfessor = null,
        ?string $cdProfessoresTurma = null,
        ?\DateTimeInterface $dtInformacao = null
    ) {
        $this->cdProvaOrigem = $cdProvaOrigem;
        $this->cdTurmaOrigem = $cdTurmaOrigem;
        $this->cdTurmaEtapaOrigem = $cdTurmaEtapaOrigem;
        $this->cdDisciplinaOrigem = $cdDisciplinaOrigem;
        $this->nrProva = $nrProva;
        $this->dtProva = $dtProva;
        $this->dsProva = $dsProva;
        $this->nrEtapa = $nrEtapa;
        $this->cdProfessor = $cdProfessor;
        $this->cdProfessoresTurma = $cdProfessoresTurma;
        $this->dtInformacao = $dtInformacao;
    }

    public function getCdIntegracaoDadoTemporario(): ?int
    {
        return $this->cdIntegracaoDadoTemporario;
    }

    public function getCdProvaOrigem(): ?int
    {
        return $this->cdProvaOrigem;
    }

    public function setCdProvaOrigem(?int $cdProvaOrigem): self
    {
        $this->cdProvaOrigem = $cdProvaOrigem;
        return $this;
    }

    public function getCdTurmaOrigem(): ?int
    {
        return $this->cdTurmaOrigem;
    }

    public function setCdTurmaOrigem(?int $cdTurmaOrigem): self
    {
        $this->cdTurmaOrigem = $cdTurmaOrigem;
        return $this;
    }

    public function getCdTurmaEtapaOrigem(): ?int
    {
        return $this->cdTurmaEtapaOrigem;
    }

    public function setCdTurmaEtapaOrigem(?int $cdTurmaEtapaOrigem): self
    {
        $this->cdTurmaEtapaOrigem = $cdTurmaEtapaOrigem;
        return $this;
    }

    public function getCdDisciplinaOrigem(): ?int
    {
        return $this->cdDisciplinaOrigem;
    }

    public function setCdDisciplinaOrigem(?int $cdDisciplinaOrigem): self
    {
        $this->cdDisciplinaOrigem = $cdDisciplinaOrigem;
        return $this;
    }

    public function getNrProva(): ?int
    {
        return $this->nrProva;
    }

    public function setNrProva(?int $nrProva): self
    {
        $this->nrProva = $nrProva;
        return $this;
    }

    public function getDtProva(): ?\DateTimeInterface
    {
        return $this->dtProva;
    }

    public function setDtProva(?\DateTimeInterface $dtProva): self
    {
        $this->dtProva = $dtProva;
        return $this;
    }

    public function getDsProva(): ?string
    {
        return $this->dsProva;
    }

    public function setDsProva(?string $dsProva): self
    {
        $this->dsProva = $dsProva;
        return $this;
    }

    public function getNrEtapa(): ?int
    {
        return $this->nrEtapa;
    }

    public function setNrEtapa(?int $nrEtapa): self
    {
        $this->nrEtapa = $nrEtapa;
        return $this;
    }

    public function getCdProfessor(): ?int
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(?int $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getCdProfessoresTurma(): ?string
    {
        return $this->cdProfessoresTurma;
    }

    public function setCdProfessoresTurma(?string $cdProfessoresTurma): self
    {
        $this->cdProfessoresTurma = $cdProfessoresTurma;
        return $this;
    }

    public function getDtInformacao(): ?\DateTimeInterface
    {
        return $this->dtInformacao;
    }

    public function setDtInformacao(?\DateTimeInterface $dtInformacao): self
    {
        $this->dtInformacao = $dtInformacao;
        return $this;
    }
}

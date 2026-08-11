<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoTemporarioAulaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoTemporarioAulaRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_temporario_aula',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_app_integracao_aula', columns: ['cd_aula_origem'])]
class AppIntegracaoDadoTemporarioAula
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_integracao_dado_temporario', type: 'integer')]
    private ?int $cdIntegracaoDadoTemporario = null;

    #[ORM\Column(name: 'cd_aula_origem', type: 'integer')]
    private ?int $cdAulaOrigem = null;

    #[ORM\Column(name: 'cd_turma_origem', type: 'integer')]
    private ?int $cdTurmaOrigem = null;

    #[ORM\Column(name: 'cd_turma_etapa_origem', type: 'integer')]
    private ?int $cdTurmaEtapaOrigem = null;

    #[ORM\Column(name: 'cd_disciplina_origem', type: 'integer')]
    private ?int $cdDisciplinaOrigem = null;

    #[ORM\Column(name: 'nr_etapa', type: 'smallint')]
    private ?int $nrEtapa = null;

    #[ORM\Column(name: 'nr_aula', type: 'smallint')]
    private ?int $nrAula = null;

    #[ORM\Column(name: 'dt_aula', type: 'date')]
    private ?\DateTimeInterface $dtAula = null;

    #[ORM\Column(name: 'nr_qtd_aula', type: 'smallint')]
    private ?int $nrQtdAula = null;

    #[ORM\Column(name: 'ds_conteudo', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsConteudo = null;

    #[ORM\Column(name: 'cd_professor', type: 'integer', nullable: true)]
    private ?int $cdProfessor = null;

    #[ORM\Column(name: 'cd_professores_turma', type: 'text', length: 65535, nullable: true)]
    private ?string $cdProfessoresTurma = null;

    #[ORM\Column(name: 'sn_aula_compartilhada', type: 'boolean')]
    private ?bool $snAulaCompartilhada = null;

    #[ORM\Column(name: 'dt_informacao', type: 'datetime')]
    private ?\DateTimeInterface $dtInformacao = null;

    public function __construct(
        ?int $cdAulaOrigem = null,
        ?int $cdTurmaOrigem = null,
        ?int $cdTurmaEtapaOrigem = null,
        ?int $cdDisciplinaOrigem = null,
        ?int $nrEtapa = null,
        ?int $nrAula = null,
        ?\DateTimeInterface $dtAula = null,
        ?int $nrQtdAula = null,
        ?string $dsConteudo = null,
        ?int $cdProfessor = null,
        ?string $cdProfessoresTurma = null,
        ?bool $snAulaCompartilhada = null,
        ?\DateTimeInterface $dtInformacao = null
    ) {
        $this->cdAulaOrigem = $cdAulaOrigem;
        $this->cdTurmaOrigem = $cdTurmaOrigem;
        $this->cdTurmaEtapaOrigem = $cdTurmaEtapaOrigem;
        $this->cdDisciplinaOrigem = $cdDisciplinaOrigem;
        $this->nrEtapa = $nrEtapa;
        $this->nrAula = $nrAula;
        $this->dtAula = $dtAula;
        $this->nrQtdAula = $nrQtdAula;
        $this->dsConteudo = $dsConteudo;
        $this->cdProfessor = $cdProfessor;
        $this->cdProfessoresTurma = $cdProfessoresTurma;
        $this->snAulaCompartilhada = $snAulaCompartilhada;
        $this->dtInformacao = $dtInformacao;
    }

    public function getCdIntegracaoDadoTemporario(): ?int
    {
        return $this->cdIntegracaoDadoTemporario;
    }

    public function getCdAulaOrigem(): ?int
    {
        return $this->cdAulaOrigem;
    }

    public function setCdAulaOrigem(?int $cdAulaOrigem): self
    {
        $this->cdAulaOrigem = $cdAulaOrigem;
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

    public function getNrEtapa(): ?int
    {
        return $this->nrEtapa;
    }

    public function setNrEtapa(?int $nrEtapa): self
    {
        $this->nrEtapa = $nrEtapa;
        return $this;
    }

    public function getNrAula(): ?int
    {
        return $this->nrAula;
    }

    public function setNrAula(?int $nrAula): self
    {
        $this->nrAula = $nrAula;
        return $this;
    }

    public function getDtAula(): ?\DateTimeInterface
    {
        return $this->dtAula;
    }

    public function setDtAula(?\DateTimeInterface $dtAula): self
    {
        $this->dtAula = $dtAula;
        return $this;
    }

    public function getNrQtdAula(): ?int
    {
        return $this->nrQtdAula;
    }

    public function setNrQtdAula(?int $nrQtdAula): self
    {
        $this->nrQtdAula = $nrQtdAula;
        return $this;
    }

    public function getDsConteudo(): ?string
    {
        return $this->dsConteudo;
    }

    public function setDsConteudo(?string $dsConteudo): self
    {
        $this->dsConteudo = $dsConteudo;
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

    public function isSnAulaCompartilhada(): ?bool
    {
        return $this->snAulaCompartilhada;
    }

    public function setSnAulaCompartilhada(?bool $snAulaCompartilhada): self
    {
        $this->snAulaCompartilhada = $snAulaCompartilhada;
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

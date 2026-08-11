<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoTemporarioProvaAlunoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoTemporarioProvaAlunoRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_temporario_prova_aluno',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_app_integracao_prova_aluno', columns: ['cd_fi_prova_origem'])]
class AppIntegracaoDadoTemporarioProvaAluno
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_integracao_dado_temporario', type: 'integer')]
    private ?int $cdIntegracaoDadoTemporario = null;

    #[ORM\Column(name: 'cd_fi_prova_origem', type: 'integer')]
    private ?int $cdFiProvaOrigem = null;

    #[ORM\Column(name: 'cd_prova_origem', type: 'integer')]
    private ?int $cdProvaOrigem = null;

    #[ORM\Column(name: 'cd_turma_origem', type: 'integer')]
    private ?int $cdTurmaOrigem = null;

    #[ORM\Column(name: 'cd_turma_etapa_origem', type: 'integer')]
    private ?int $cdTurmaEtapaOrigem = null;

    #[ORM\Column(name: 'cd_pessoa_origem', type: 'integer')]
    private ?int $cdPessoaOrigem = null;

    #[ORM\Column(name: 'cd_ficha_individual_origem', type: 'integer')]
    private ?int $cdFichaIndividualOrigem = null;

    #[ORM\Column(name: 'nr_prova', type: 'smallint')]
    private ?int $nrProva = null;

    #[ORM\Column(name: 'vl_nota', type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $vlNota = null;

    #[ORM\Column(name: 'nr_etapa', type: 'smallint')]
    private ?int $nrEtapa = null;

    #[ORM\Column(name: 'dt_informacao', type: 'datetime')]
    private ?\DateTimeInterface $dtInformacao = null;

    public function __construct(
        ?int $cdFiProvaOrigem = null,
        ?int $cdProvaOrigem = null,
        ?int $cdTurmaOrigem = null,
        ?int $cdTurmaEtapaOrigem = null,
        ?int $cdPessoaOrigem = null,
        ?int $cdFichaIndividualOrigem = null,
        ?int $nrProva = null,
        ?string $vlNota = null,
        ?int $nrEtapa = null,
        ?\DateTimeInterface $dtInformacao = null
    ) {
        $this->cdFiProvaOrigem = $cdFiProvaOrigem;
        $this->cdProvaOrigem = $cdProvaOrigem;
        $this->cdTurmaOrigem = $cdTurmaOrigem;
        $this->cdTurmaEtapaOrigem = $cdTurmaEtapaOrigem;
        $this->cdPessoaOrigem = $cdPessoaOrigem;
        $this->cdFichaIndividualOrigem = $cdFichaIndividualOrigem;
        $this->nrProva = $nrProva;
        $this->vlNota = $vlNota;
        $this->nrEtapa = $nrEtapa;
        $this->dtInformacao = $dtInformacao;
    }

    public function getCdIntegracaoDadoTemporario(): ?int
    {
        return $this->cdIntegracaoDadoTemporario;
    }

    public function getCdFiProvaOrigem(): ?int
    {
        return $this->cdFiProvaOrigem;
    }

    public function setCdFiProvaOrigem(?int $cdFiProvaOrigem): self
    {
        $this->cdFiProvaOrigem = $cdFiProvaOrigem;
        return $this;
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

    public function getCdPessoaOrigem(): ?int
    {
        return $this->cdPessoaOrigem;
    }

    public function setCdPessoaOrigem(?int $cdPessoaOrigem): self
    {
        $this->cdPessoaOrigem = $cdPessoaOrigem;
        return $this;
    }

    public function getCdFichaIndividualOrigem(): ?int
    {
        return $this->cdFichaIndividualOrigem;
    }

    public function setCdFichaIndividualOrigem(?int $cdFichaIndividualOrigem): self
    {
        $this->cdFichaIndividualOrigem = $cdFichaIndividualOrigem;
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

    public function getVlNota(): ?string
    {
        return $this->vlNota;
    }

    public function setVlNota(?string $vlNota): self
    {
        $this->vlNota = $vlNota;
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

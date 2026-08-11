<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoTemporarioAulaAlunoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoTemporarioAulaAlunoRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_temporario_aula_aluno',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_app_integracao_aula_aluno', columns: ['cd_aula_aluno_origem'])]
class AppIntegracaoDadoTemporarioAulaAluno
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_integracao_dado_temporario', type: 'integer')]
    private ?int $cdIntegracaoDadoTemporario = null;

    #[ORM\Column(name: 'cd_aula_aluno_origem', type: 'integer')]
    private ?int $cdAulaAlunoOrigem = null;

    #[ORM\Column(name: 'cd_aula_origem', type: 'integer')]
    private ?int $cdAulaOrigem = null;

    #[ORM\Column(name: 'cd_turma_origem', type: 'integer')]
    private ?int $cdTurmaOrigem = null;

    #[ORM\Column(name: 'cd_turma_etapa_origem', type: 'integer')]
    private ?int $cdTurmaEtapaOrigem = null;

    #[ORM\Column(name: 'cd_pessoa_origem', type: 'integer')]
    private ?int $cdPessoaOrigem = null;

    #[ORM\Column(name: 'nr_aula', type: 'smallint')]
    private ?int $nrAula = null;

    #[ORM\Column(name: 'ds_frequencia', type: 'string', length: 24, nullable: true)]
    private ?string $dsFrequencia = null;

    #[ORM\Column(name: 'ds_percentual_frequencia', type: 'string', length: 255, nullable: true)]
    private ?string $dsPercentualFrequencia = null;

    #[ORM\Column(name: 'nr_etapa', type: 'smallint')]
    private ?int $nrEtapa = null;

    #[ORM\Column(name: 'dt_informacao', type: 'datetime')]
    private ?\DateTimeInterface $dtInformacao = null;

    public function __construct(
        ?int $cdAulaAlunoOrigem = null,
        ?int $cdAulaOrigem = null,
        ?int $cdTurmaOrigem = null,
        ?int $cdTurmaEtapaOrigem = null,
        ?int $cdPessoaOrigem = null,
        ?int $nrAula = null,
        ?string $dsFrequencia = null,
        ?string $dsPercentualFrequencia = null,
        ?int $nrEtapa = null,
        ?\DateTimeInterface $dtInformacao = null
    ) {
        $this->cdAulaAlunoOrigem = $cdAulaAlunoOrigem;
        $this->cdAulaOrigem = $cdAulaOrigem;
        $this->cdTurmaOrigem = $cdTurmaOrigem;
        $this->cdTurmaEtapaOrigem = $cdTurmaEtapaOrigem;
        $this->cdPessoaOrigem = $cdPessoaOrigem;
        $this->nrAula = $nrAula;
        $this->dsFrequencia = $dsFrequencia;
        $this->dsPercentualFrequencia = $dsPercentualFrequencia;
        $this->nrEtapa = $nrEtapa;
        $this->dtInformacao = $dtInformacao;
    }

    public function getCdIntegracaoDadoTemporario(): ?int
    {
        return $this->cdIntegracaoDadoTemporario;
    }

    public function getCdAulaAlunoOrigem(): ?int
    {
        return $this->cdAulaAlunoOrigem;
    }

    public function setCdAulaAlunoOrigem(?int $cdAulaAlunoOrigem): self
    {
        $this->cdAulaAlunoOrigem = $cdAulaAlunoOrigem;
        return $this;
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

    public function getCdPessoaOrigem(): ?int
    {
        return $this->cdPessoaOrigem;
    }

    public function setCdPessoaOrigem(?int $cdPessoaOrigem): self
    {
        $this->cdPessoaOrigem = $cdPessoaOrigem;
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

    public function getDsFrequencia(): ?string
    {
        return $this->dsFrequencia;
    }

    public function setDsFrequencia(?string $dsFrequencia): self
    {
        $this->dsFrequencia = $dsFrequencia;
        return $this;
    }

    public function getDsPercentualFrequencia(): ?string
    {
        return $this->dsPercentualFrequencia;
    }

    public function setDsPercentualFrequencia(?string $dsPercentualFrequencia): self
    {
        $this->dsPercentualFrequencia = $dsPercentualFrequencia;
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

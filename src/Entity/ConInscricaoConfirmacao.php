<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConInscricaoConfirmacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConInscricaoConfirmacaoRepository::class)]
#[ORM\Table(
    name: 'con_inscricao_confirmacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Tabela usada na inscrição personalizada para salvar os dados na validação de e-mail']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_CONCURSO', columns: ['cd_concurso'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
class ConInscricaoConfirmacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_inscricao_confirmacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdInscricaoConfirmacao = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_concurso', type: 'integer', nullable: true)]
    private ?int $cdConcurso = null;

    #[ORM\Column(name: 'cd_inscricao_tipo', type: 'integer', nullable: true)]
    private ?int $cdInscricaoTipo = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50, nullable: true)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'sn_concurso', type: 'boolean', nullable: true)]
    private ?bool $snConcurso = null;

    #[ORM\Column(name: 'sn_confirmado', type: 'boolean', nullable: true)]
    private ?bool $snConfirmado = null;

    #[ORM\Column(name: 'ds_codigo_confirmacao', type: 'string', length: 100, nullable: true)]
    private ?string $dsCodigoConfirmacao = null;

    #[ORM\Column(name: 'cd_area', type: 'integer', nullable: true)]
    private ?int $cdArea = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdConcurso = null,
        ?int $cdInscricaoTipo = null,
        ?string $cdTurma = null,
        ?int $nrAnosemestre = null,
        ?bool $snConcurso = null,
        ?bool $snConfirmado = null,
        ?string $dsCodigoConfirmacao = null,
        ?int $cdArea = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdConcurso = $cdConcurso;
        $this->cdInscricaoTipo = $cdInscricaoTipo;
        $this->cdTurma = $cdTurma;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->snConcurso = $snConcurso;
        $this->snConfirmado = $snConfirmado;
        $this->dsCodigoConfirmacao = $dsCodigoConfirmacao;
        $this->cdArea = $cdArea;
    }

    public function getCdInscricaoConfirmacao(): ?int
    {
        return $this->cdInscricaoConfirmacao;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdConcurso(): ?int
    {
        return $this->cdConcurso;
    }

    public function setCdConcurso(?int $cdConcurso): self
    {
        $this->cdConcurso = $cdConcurso;
        return $this;
    }

    public function getCdInscricaoTipo(): ?int
    {
        return $this->cdInscricaoTipo;
    }

    public function setCdInscricaoTipo(?int $cdInscricaoTipo): self
    {
        $this->cdInscricaoTipo = $cdInscricaoTipo;
        return $this;
    }

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function isSnConcurso(): ?bool
    {
        return $this->snConcurso;
    }

    public function setSnConcurso(?bool $snConcurso): self
    {
        $this->snConcurso = $snConcurso;
        return $this;
    }

    public function isSnConfirmado(): ?bool
    {
        return $this->snConfirmado;
    }

    public function setSnConfirmado(?bool $snConfirmado): self
    {
        $this->snConfirmado = $snConfirmado;
        return $this;
    }

    public function getDsCodigoConfirmacao(): ?string
    {
        return $this->dsCodigoConfirmacao;
    }

    public function setDsCodigoConfirmacao(?string $dsCodigoConfirmacao): self
    {
        $this->dsCodigoConfirmacao = $dsCodigoConfirmacao;
        return $this;
    }

    public function getCdArea(): ?int
    {
        return $this->cdArea;
    }

    public function setCdArea(?int $cdArea): self
    {
        $this->cdArea = $cdArea;
        return $this;
    }
}

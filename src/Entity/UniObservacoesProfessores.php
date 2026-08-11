<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UniObservacoesProfessoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniObservacoesProfessoresRepository::class)]
#[ORM\Table(
    name: 'uni_observacoes_professores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_OBS_CD_USUARIO_PES_CD_PESSO', columns: ['CD_USUARIO'])]
#[ORM\Index(name: 'IX_CD_USUARIO', columns: ['CD_USUARIO'])]
class UniObservacoesProfessores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_OBSERVACAO', type: 'bigint', options: ['unsigned' => true])]
    private ?string $cdObservacao = null;

    #[ORM\Column(name: 'CD_PESSOA', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'CD_USUARIO', type: 'integer')]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'ANOSEMESTRE', type: 'smallint')]
    private ?int $anosemestre = null;

    #[ORM\Column(name: 'CD_TURMA', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'CD_DISCIPLINA', type: 'integer', nullable: true)]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'NR_ETAPA', type: 'integer', nullable: true)]
    private ?int $nrEtapa = null;

    #[ORM\Column(name: 'DT_OBSERVACAO', type: 'datetime')]
    private ?\DateTimeInterface $dtObservacao = null;

    #[ORM\Column(name: 'SG_TIPO', type: 'string', length: 1, options: ['fixed' => true])]
    private ?string $sgTipo = null;

    #[ORM\Column(name: 'ME_OBSERVACAO', type: 'text', nullable: true)]
    private ?string $meObservacao = null;

    #[ORM\Column(name: 'ME_OBSERVACAO_FORMATADO', type: 'text', nullable: true)]
    private ?string $meObservacaoFormatado = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdUsuario = null,
        ?int $anosemestre = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        ?int $nrEtapa = null,
        ?\DateTimeInterface $dtObservacao = null,
        ?string $sgTipo = null,
        ?string $meObservacao = null,
        ?string $meObservacaoFormatado = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdUsuario = $cdUsuario;
        $this->anosemestre = $anosemestre;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->nrEtapa = $nrEtapa;
        $this->dtObservacao = $dtObservacao;
        $this->sgTipo = $sgTipo;
        $this->meObservacao = $meObservacao;
        $this->meObservacaoFormatado = $meObservacaoFormatado;
    }

    public function getCdObservacao(): ?string
    {
        return $this->cdObservacao;
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

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    public function getAnosemestre(): ?int
    {
        return $this->anosemestre;
    }

    public function setAnosemestre(?int $anosemestre): self
    {
        $this->anosemestre = $anosemestre;
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

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
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

    public function getDtObservacao(): ?\DateTimeInterface
    {
        return $this->dtObservacao;
    }

    public function setDtObservacao(?\DateTimeInterface $dtObservacao): self
    {
        $this->dtObservacao = $dtObservacao;
        return $this;
    }

    public function getSgTipo(): ?string
    {
        return $this->sgTipo;
    }

    public function setSgTipo(?string $sgTipo): self
    {
        $this->sgTipo = $sgTipo;
        return $this;
    }

    public function getMeObservacao(): ?string
    {
        return $this->meObservacao;
    }

    public function setMeObservacao(?string $meObservacao): self
    {
        $this->meObservacao = $meObservacao;
        return $this;
    }

    public function getMeObservacaoFormatado(): ?string
    {
        return $this->meObservacaoFormatado;
    }

    public function setMeObservacaoFormatado(?string $meObservacaoFormatado): self
    {
        $this->meObservacaoFormatado = $meObservacaoFormatado;
        return $this;
    }
}

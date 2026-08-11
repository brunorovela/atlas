<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\MolProcessosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MolProcessosRepository::class)]
#[ORM\Table(
    name: 'mol_processos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_DT_INICIO', columns: ['dt_inicio'])]
#[ORM\Index(name: 'IX_DT_FIM', columns: ['dt_fim'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class MolProcessos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_processo', type: 'integer')]
    private ?int $cdProcesso = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', options: ['default' => '0'])]
    private int $cdGrupo = 0;

    #[ORM\Column(name: 'ds_processo', type: 'string', length: 255, nullable: true)]
    private ?string $dsProcesso = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'sn_filtra_turmas', type: 'boolean', options: ['default' => '1'])]
    private bool $snFiltraTurmas = true;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'sn_checa_matricula', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snChecaMatricula = true;

    #[ORM\Column(name: 'sn_finaliza_ultima', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snFinalizaUltima = true;

    #[ORM\Column(name: 'sn_ajuste', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAjuste = null;

    #[ORM\Column(name: 'sn_concurso', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snConcurso = 0;

    #[ORM\Column(name: 'sn_responsavel_rematricula', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $snResponsavelRematricula = 0;

    #[ORM\Column(name: 'sn_matricula_mesmo_anosem', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snMatriculaMesmoAnosem = 0;

    #[ORM\Column(name: 'sn_apresentar_creditos', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snApresentarCreditos = 1;

    #[ORM\Column(name: 'sn_mostrar_nome_curso_listagem_processo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snMostrarNomeCursoListagemProcesso = 1;

    public function __construct(
        int $cdGrupo = 0,
        ?string $dsProcesso = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFim = null,
        bool $snFiltraTurmas = true,
        ?int $nrAnosemestre = null,
        ?bool $snChecaMatricula = true,
        ?bool $snFinalizaUltima = true,
        ?int $snAjuste = null,
        ?int $snConcurso = 0,
        ?int $snResponsavelRematricula = 0,
        int $snMatriculaMesmoAnosem = 0,
        ?int $snApresentarCreditos = 1,
        ?int $snMostrarNomeCursoListagemProcesso = 1
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->dsProcesso = $dsProcesso;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->snFiltraTurmas = $snFiltraTurmas;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->snChecaMatricula = $snChecaMatricula;
        $this->snFinalizaUltima = $snFinalizaUltima;
        $this->snAjuste = $snAjuste;
        $this->snConcurso = $snConcurso;
        $this->snResponsavelRematricula = $snResponsavelRematricula;
        $this->snMatriculaMesmoAnosem = $snMatriculaMesmoAnosem;
        $this->snApresentarCreditos = $snApresentarCreditos;
        $this->snMostrarNomeCursoListagemProcesso = $snMostrarNomeCursoListagemProcesso;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
    }

    public function getCdGrupo(): int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getDsProcesso(): ?string
    {
        return $this->dsProcesso;
    }

    public function setDsProcesso(?string $dsProcesso): self
    {
        $this->dsProcesso = $dsProcesso;
        return $this;
    }

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dtInicio;
    }

    public function setDtInicio(?\DateTimeInterface $dtInicio): self
    {
        $this->dtInicio = $dtInicio;
        return $this;
    }

    public function getDtFim(): ?\DateTimeInterface
    {
        return $this->dtFim;
    }

    public function setDtFim(?\DateTimeInterface $dtFim): self
    {
        $this->dtFim = $dtFim;
        return $this;
    }

    public function isSnFiltraTurmas(): bool
    {
        return $this->snFiltraTurmas;
    }

    public function setSnFiltraTurmas(bool $snFiltraTurmas): self
    {
        $this->snFiltraTurmas = $snFiltraTurmas;
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

    public function isSnChecaMatricula(): ?bool
    {
        return $this->snChecaMatricula;
    }

    public function setSnChecaMatricula(?bool $snChecaMatricula): self
    {
        $this->snChecaMatricula = $snChecaMatricula;
        return $this;
    }

    public function isSnFinalizaUltima(): ?bool
    {
        return $this->snFinalizaUltima;
    }

    public function setSnFinalizaUltima(?bool $snFinalizaUltima): self
    {
        $this->snFinalizaUltima = $snFinalizaUltima;
        return $this;
    }

    public function getSnAjuste(): ?int
    {
        return $this->snAjuste;
    }

    public function setSnAjuste(?int $snAjuste): self
    {
        $this->snAjuste = $snAjuste;
        return $this;
    }

    public function getSnConcurso(): ?int
    {
        return $this->snConcurso;
    }

    public function setSnConcurso(?int $snConcurso): self
    {
        $this->snConcurso = $snConcurso;
        return $this;
    }

    public function getSnResponsavelRematricula(): ?int
    {
        return $this->snResponsavelRematricula;
    }

    public function setSnResponsavelRematricula(?int $snResponsavelRematricula): self
    {
        $this->snResponsavelRematricula = $snResponsavelRematricula;
        return $this;
    }

    public function getSnMatriculaMesmoAnosem(): int
    {
        return $this->snMatriculaMesmoAnosem;
    }

    public function setSnMatriculaMesmoAnosem(int $snMatriculaMesmoAnosem): self
    {
        $this->snMatriculaMesmoAnosem = $snMatriculaMesmoAnosem;
        return $this;
    }

    public function getSnApresentarCreditos(): ?int
    {
        return $this->snApresentarCreditos;
    }

    public function setSnApresentarCreditos(?int $snApresentarCreditos): self
    {
        $this->snApresentarCreditos = $snApresentarCreditos;
        return $this;
    }

    public function getSnMostrarNomeCursoListagemProcesso(): ?int
    {
        return $this->snMostrarNomeCursoListagemProcesso;
    }

    public function setSnMostrarNomeCursoListagemProcesso(?int $snMostrarNomeCursoListagemProcesso): self
    {
        $this->snMostrarNomeCursoListagemProcesso = $snMostrarNomeCursoListagemProcesso;
        return $this;
    }
}

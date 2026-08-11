<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ForTopicosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ForTopicosRepository::class)]
#[ORM\Table(
    name: 'for_topicos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_UNIDADE_REDE', columns: ['cd_unidade_rede'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA_PAI', columns: ['cd_disciplina_pai'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class ForTopicos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_topico', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTopico = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_unidade_rede', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdUnidadeRede = null;

    #[ORM\Column(name: 'cd_disciplina_pai', type: 'string', length: 255)]
    private ?string $cdDisciplinaPai = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_disciplinas_categoria', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDisciplinasCategoria = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'ds_tema', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsTema = null;

    #[ORM\Column(name: 'nr_destino', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $nrDestino = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snAtivo = 0;

    #[ORM\Column(name: 'sn_controle_data', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snControleData = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtCadastro = null;

    public function __construct(
        ?int $nrAnosemestre = null,
        ?int $cdUnidadeRede = null,
        ?string $cdDisciplinaPai = null,
        ?string $cdCurso = null,
        ?int $cdPessoa = null,
        ?int $cdDisciplinasCategoria = null,
        ?string $dsTitulo = null,
        ?string $dsTema = null,
        ?int $nrDestino = null,
        ?int $snAtivo = 0,
        ?int $snControleData = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFim = null,
        ?\DateTimeInterface $dtCadastro = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdUnidadeRede = $cdUnidadeRede;
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        $this->cdCurso = $cdCurso;
        $this->cdPessoa = $cdPessoa;
        $this->cdDisciplinasCategoria = $cdDisciplinasCategoria;
        $this->dsTitulo = $dsTitulo;
        $this->dsTema = $dsTema;
        $this->nrDestino = $nrDestino;
        $this->snAtivo = $snAtivo;
        $this->snControleData = $snControleData;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->dtCadastro = $dtCadastro;
    }

    public function getCdTopico(): ?int
    {
        return $this->cdTopico;
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

    public function getCdUnidadeRede(): ?int
    {
        return $this->cdUnidadeRede;
    }

    public function setCdUnidadeRede(?int $cdUnidadeRede): self
    {
        $this->cdUnidadeRede = $cdUnidadeRede;
        return $this;
    }

    public function getCdDisciplinaPai(): ?string
    {
        return $this->cdDisciplinaPai;
    }

    public function setCdDisciplinaPai(?string $cdDisciplinaPai): self
    {
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        return $this;
    }

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
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

    public function getCdDisciplinasCategoria(): ?int
    {
        return $this->cdDisciplinasCategoria;
    }

    public function setCdDisciplinasCategoria(?int $cdDisciplinasCategoria): self
    {
        $this->cdDisciplinasCategoria = $cdDisciplinasCategoria;
        return $this;
    }

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
    }

    public function getDsTema(): ?string
    {
        return $this->dsTema;
    }

    public function setDsTema(?string $dsTema): self
    {
        $this->dsTema = $dsTema;
        return $this;
    }

    public function getNrDestino(): ?int
    {
        return $this->nrDestino;
    }

    public function setNrDestino(?int $nrDestino): self
    {
        $this->nrDestino = $nrDestino;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getSnControleData(): ?int
    {
        return $this->snControleData;
    }

    public function setSnControleData(?int $snControleData): self
    {
        $this->snControleData = $snControleData;
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

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }
}

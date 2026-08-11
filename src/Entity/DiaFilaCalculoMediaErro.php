<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\DiaFilaCalculoMediaErroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiaFilaCalculoMediaErroRepository::class)]
#[ORM\Table(
    name: 'dia_fila_calculo_media_erro',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK', columns: ['cd_turma', 'nr_anosemestre', 'cd_disciplina', 'nr_etapa', 'cd_grupo', 'cd_pessoa', 'ds_formula'])]
#[ORM\Index(name: 'FK_dia_fila_calculo_media_erro_disciplinas', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'FK_dia_fila_calculo_media_erro_pessoas', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'FK_dia_fila_calculo_media_erro_pessoas_2', columns: ['cd_pessoa_logada'])]
#[ORM\Index(name: 'IDX_688000685447445E', columns: ['cd_turma'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_dia_fila_calculo_media_erro_disciplinas', 'colunas' => ['cd_disciplina'], 'tabelaAlvo' => 'disciplinas', 'colunasAlvo' => ['codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_dia_fila_calculo_media_erro_pessoas', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_dia_fila_calculo_media_erro_pessoas_2', 'colunas' => ['cd_pessoa_logada'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_dia_fila_calculo_media_erro_turmas', 'colunas' => ['cd_turma'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class DiaFilaCalculoMediaErro
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'bigint')]
    private ?string $id = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'nr_etapa', type: 'boolean')]
    private ?bool $nrEtapa = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', options: ['default' => '0'])]
    private int $cdGrupo = 0;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'ds_formula', type: 'string', length: 255, options: ['default' => ''])]
    private string $dsFormula = '';

    #[ORM\Column(name: 'cd_log_acesso', type: 'integer', nullable: true)]
    private ?int $cdLogAcesso = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_logada', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaLogada = null;

    #[ORM\Column(name: 'ds_erro', type: 'string', length: 255, options: ['default' => ''])]
    private string $dsErro = '';

    public function __construct(
        ?string $cdTurma = null,
        ?int $nrAnosemestre = null,
        ?int $cdDisciplina = null,
        ?bool $nrEtapa = null,
        int $cdGrupo = 0,
        ?Pessoas $cdPessoa = null,
        string $dsFormula = '',
        ?int $cdLogAcesso = null,
        ?Pessoas $cdPessoaLogada = null,
        string $dsErro = ''
    ) {
        $this->cdTurma = $cdTurma;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdDisciplina = $cdDisciplina;
        $this->nrEtapa = $nrEtapa;
        $this->cdGrupo = $cdGrupo;
        $this->cdPessoa = $cdPessoa;
        $this->dsFormula = $dsFormula;
        $this->cdLogAcesso = $cdLogAcesso;
        $this->cdPessoaLogada = $cdPessoaLogada;
        $this->dsErro = $dsErro;
    }

    public function getId(): ?string
    {
        return $this->id;
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

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function isNrEtapa(): ?bool
    {
        return $this->nrEtapa;
    }

    public function setNrEtapa(?bool $nrEtapa): self
    {
        $this->nrEtapa = $nrEtapa;
        return $this;
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

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getDsFormula(): string
    {
        return $this->dsFormula;
    }

    public function setDsFormula(string $dsFormula): self
    {
        $this->dsFormula = $dsFormula;
        return $this;
    }

    public function getCdLogAcesso(): ?int
    {
        return $this->cdLogAcesso;
    }

    public function setCdLogAcesso(?int $cdLogAcesso): self
    {
        $this->cdLogAcesso = $cdLogAcesso;
        return $this;
    }

    public function getCdPessoaLogada(): ?Pessoas
    {
        return $this->cdPessoaLogada;
    }

    public function setCdPessoaLogada(?Pessoas $cdPessoaLogada): self
    {
        $this->cdPessoaLogada = $cdPessoaLogada;
        return $this;
    }

    public function getDsErro(): string
    {
        return $this->dsErro;
    }

    public function setDsErro(string $dsErro): self
    {
        $this->dsErro = $dsErro;
        return $this;
    }
}

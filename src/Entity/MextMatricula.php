<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\MextMatriculaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MextMatriculaRepository::class)]
#[ORM\Table(
    name: 'mext_matricula',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_processo', columns: ['cd_processo', 'cd_atividade'])]
#[ORM\Index(name: 'cd_pessoa_responsavel', columns: ['cd_pessoa_responsavel'])]
#[ORM\Index(name: 'cd_pessoa', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'cd_atividade_turma_extra', columns: ['cd_atividade_turma_extra'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'mext_matricula_ibfk_1', 'colunas' => ['cd_processo', 'cd_atividade'], 'tabelaAlvo' => 'mext_processo_atividade', 'colunasAlvo' => ['cd_processo', 'cd_atividade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'mext_matricula_ibfk_2', 'colunas' => ['cd_pessoa_responsavel'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'mext_matricula_ibfk_3', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'mext_matricula_ibfk_4', 'colunas' => ['cd_atividade_turma_extra'], 'tabelaAlvo' => 'mext_atividade_turma_extra', 'colunasAlvo' => ['cd_atividade_turma_extra'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class MextMatricula
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_matricula', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMatricula = null;

    #[ORM\ManyToOne(targetEntity: MextProcessoAtividade::class)]
    #[ORM\JoinColumn(name: 'cd_processo', referencedColumnName: 'cd_processo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    #[ORM\JoinColumn(name: 'cd_atividade', referencedColumnName: 'cd_atividade', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?MextProcessoAtividade $cdProcesso = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_responsavel', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaResponsavel = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\ManyToOne(targetEntity: MextAtividadeTurmaExtra::class)]
    #[ORM\JoinColumn(name: 'cd_atividade_turma_extra', referencedColumnName: 'cd_atividade_turma_extra', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?MextAtividadeTurmaExtra $cdAtividadeTurmaExtra = null;

    #[ORM\Column(name: 'dt_matricula', type: 'datetime')]
    private ?\DateTimeInterface $dtMatricula = null;

    #[ORM\Column(name: 'me_termo', type: 'text', length: 16777215, nullable: true)]
    private ?string $meTermo = null;

    public function __construct(
        ?MextProcessoAtividade $cdProcesso = null,
        ?Pessoas $cdPessoaResponsavel = null,
        ?Pessoas $cdPessoa = null,
        ?MextAtividadeTurmaExtra $cdAtividadeTurmaExtra = null,
        ?\DateTimeInterface $dtMatricula = null,
        ?string $meTermo = null
    ) {
        $this->cdProcesso = $cdProcesso;
        $this->cdPessoaResponsavel = $cdPessoaResponsavel;
        $this->cdPessoa = $cdPessoa;
        $this->cdAtividadeTurmaExtra = $cdAtividadeTurmaExtra;
        $this->dtMatricula = $dtMatricula;
        $this->meTermo = $meTermo;
    }

    public function getCdMatricula(): ?int
    {
        return $this->cdMatricula;
    }

    public function getCdProcesso(): ?MextProcessoAtividade
    {
        return $this->cdProcesso;
    }

    public function setCdProcesso(?MextProcessoAtividade $cdProcesso): self
    {
        $this->cdProcesso = $cdProcesso;
        return $this;
    }

    public function getCdPessoaResponsavel(): ?Pessoas
    {
        return $this->cdPessoaResponsavel;
    }

    public function setCdPessoaResponsavel(?Pessoas $cdPessoaResponsavel): self
    {
        $this->cdPessoaResponsavel = $cdPessoaResponsavel;
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

    public function getCdAtividadeTurmaExtra(): ?MextAtividadeTurmaExtra
    {
        return $this->cdAtividadeTurmaExtra;
    }

    public function setCdAtividadeTurmaExtra(?MextAtividadeTurmaExtra $cdAtividadeTurmaExtra): self
    {
        $this->cdAtividadeTurmaExtra = $cdAtividadeTurmaExtra;
        return $this;
    }

    public function getDtMatricula(): ?\DateTimeInterface
    {
        return $this->dtMatricula;
    }

    public function setDtMatricula(?\DateTimeInterface $dtMatricula): self
    {
        $this->dtMatricula = $dtMatricula;
        return $this;
    }

    public function getMeTermo(): ?string
    {
        return $this->meTermo;
    }

    public function setMeTermo(?string $meTermo): self
    {
        $this->meTermo = $meTermo;
        return $this;
    }
}

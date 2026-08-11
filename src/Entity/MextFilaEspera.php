<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\MextFilaEsperaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MextFilaEsperaRepository::class)]
#[ORM\Table(
    name: 'mext_fila_espera',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_processo', columns: ['cd_processo', 'cd_atividade'])]
#[ORM\Index(name: 'cd_pessoa', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'cd_pessoa_responsavel', columns: ['cd_pessoa_responsavel'])]
#[ORM\Index(name: 'cd_pessoa_autorizou', columns: ['cd_pessoa_autorizou'])]
#[ORM\Index(name: 'cd_atividade_turma_extra', columns: ['cd_atividade_turma_extra'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'mext_fila_espera_ibfk_1', 'colunas' => ['cd_processo', 'cd_atividade'], 'tabelaAlvo' => 'mext_processo_atividade', 'colunasAlvo' => ['cd_processo', 'cd_atividade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'mext_fila_espera_ibfk_2', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'mext_fila_espera_ibfk_3', 'colunas' => ['cd_pessoa_responsavel'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'mext_fila_espera_ibfk_4', 'colunas' => ['cd_pessoa_autorizou'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'mext_fila_espera_ibfk_5', 'colunas' => ['cd_atividade_turma_extra'], 'tabelaAlvo' => 'mext_atividade_turma_extra', 'colunasAlvo' => ['cd_atividade_turma_extra'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class MextFilaEspera
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_fila_espera', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdFilaEspera = null;

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

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_autorizou', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaAutorizou = null;

    #[ORM\Column(name: 'sn_incluido_manual', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snIncluidoManual = null;

    #[ORM\Column(name: 'dt_entrada', type: 'datetime')]
    private ?\DateTimeInterface $dtEntrada = null;

    #[ORM\Column(name: 'dt_prazo_matricular', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPrazoMatricular = null;

    #[ORM\Column(name: 'me_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObservacao = null;

    #[ORM\Column(name: 'sn_excluido', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snExcluido = null;

    public function __construct(
        ?MextProcessoAtividade $cdProcesso = null,
        ?Pessoas $cdPessoaResponsavel = null,
        ?Pessoas $cdPessoa = null,
        ?MextAtividadeTurmaExtra $cdAtividadeTurmaExtra = null,
        ?Pessoas $cdPessoaAutorizou = null,
        ?int $snIncluidoManual = null,
        ?\DateTimeInterface $dtEntrada = null,
        ?\DateTimeInterface $dtPrazoMatricular = null,
        ?string $meObservacao = null,
        ?int $snExcluido = null
    ) {
        $this->cdProcesso = $cdProcesso;
        $this->cdPessoaResponsavel = $cdPessoaResponsavel;
        $this->cdPessoa = $cdPessoa;
        $this->cdAtividadeTurmaExtra = $cdAtividadeTurmaExtra;
        $this->cdPessoaAutorizou = $cdPessoaAutorizou;
        $this->snIncluidoManual = $snIncluidoManual;
        $this->dtEntrada = $dtEntrada;
        $this->dtPrazoMatricular = $dtPrazoMatricular;
        $this->meObservacao = $meObservacao;
        $this->snExcluido = $snExcluido;
    }

    public function getCdFilaEspera(): ?int
    {
        return $this->cdFilaEspera;
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

    public function getCdPessoaAutorizou(): ?Pessoas
    {
        return $this->cdPessoaAutorizou;
    }

    public function setCdPessoaAutorizou(?Pessoas $cdPessoaAutorizou): self
    {
        $this->cdPessoaAutorizou = $cdPessoaAutorizou;
        return $this;
    }

    public function getSnIncluidoManual(): ?int
    {
        return $this->snIncluidoManual;
    }

    public function setSnIncluidoManual(?int $snIncluidoManual): self
    {
        $this->snIncluidoManual = $snIncluidoManual;
        return $this;
    }

    public function getDtEntrada(): ?\DateTimeInterface
    {
        return $this->dtEntrada;
    }

    public function setDtEntrada(?\DateTimeInterface $dtEntrada): self
    {
        $this->dtEntrada = $dtEntrada;
        return $this;
    }

    public function getDtPrazoMatricular(): ?\DateTimeInterface
    {
        return $this->dtPrazoMatricular;
    }

    public function setDtPrazoMatricular(?\DateTimeInterface $dtPrazoMatricular): self
    {
        $this->dtPrazoMatricular = $dtPrazoMatricular;
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

    public function getSnExcluido(): ?int
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(?int $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
        return $this;
    }
}

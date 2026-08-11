<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\MextRematriculaCanceladaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MextRematriculaCanceladaRepository::class)]
#[ORM\Table(
    name: 'mext_rematricula_cancelada',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_atividade_turma_extra', columns: ['cd_atividade_turma_extra'])]
#[ORM\Index(name: 'cd_atividade', columns: ['cd_atividade'])]
#[ORM\Index(name: 'cd_pessoa', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'cd_pessoa_responsavel', columns: ['cd_pessoa_responsavel'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'mext_rematricula_cancelada_ibfk_1', 'colunas' => ['cd_atividade_turma_extra'], 'tabelaAlvo' => 'mext_atividade_turma_extra', 'colunasAlvo' => ['cd_atividade_turma_extra'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'mext_rematricula_cancelada_ibfk_2', 'colunas' => ['cd_atividade'], 'tabelaAlvo' => 'mext_atividade', 'colunasAlvo' => ['cd_atividade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'mext_rematricula_cancelada_ibfk_3', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'mext_rematricula_cancelada_ibfk_4', 'colunas' => ['cd_pessoa_responsavel'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class MextRematriculaCancelada
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_rematricula_cancelada', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRematriculaCancelada = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\ManyToOne(targetEntity: MextAtividade::class)]
    #[ORM\JoinColumn(name: 'cd_atividade', referencedColumnName: 'cd_atividade', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?MextAtividade $cdAtividade = null;

    #[ORM\ManyToOne(targetEntity: MextAtividadeTurmaExtra::class)]
    #[ORM\JoinColumn(name: 'cd_atividade_turma_extra', referencedColumnName: 'cd_atividade_turma_extra', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?MextAtividadeTurmaExtra $cdAtividadeTurmaExtra = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_responsavel', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaResponsavel = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?MextAtividade $cdAtividade = null,
        ?MextAtividadeTurmaExtra $cdAtividadeTurmaExtra = null,
        ?Pessoas $cdPessoaResponsavel = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdAtividade = $cdAtividade;
        $this->cdAtividadeTurmaExtra = $cdAtividadeTurmaExtra;
        $this->cdPessoaResponsavel = $cdPessoaResponsavel;
    }

    public function getCdRematriculaCancelada(): ?int
    {
        return $this->cdRematriculaCancelada;
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

    public function getCdAtividade(): ?MextAtividade
    {
        return $this->cdAtividade;
    }

    public function setCdAtividade(?MextAtividade $cdAtividade): self
    {
        $this->cdAtividade = $cdAtividade;
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

    public function getCdPessoaResponsavel(): ?Pessoas
    {
        return $this->cdPessoaResponsavel;
    }

    public function setCdPessoaResponsavel(?Pessoas $cdPessoaResponsavel): self
    {
        $this->cdPessoaResponsavel = $cdPessoaResponsavel;
        return $this;
    }
}

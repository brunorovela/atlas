<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CompAgendamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompAgendamentoRepository::class)]
#[ORM\Table(
    name: 'comp_agendamento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'fk_comp_agendamento_cd_pessoa_pessoas_cd_pessoa', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'fk_comp_agendamento_nr_anosemestre_cd_turma_turma_anosem_codigo', columns: ['nr_anosemestre', 'cd_turma'])]
#[ORM\Index(name: 'fk_comp_agendamento_cd_produto_comp_produtos_cd_produto', columns: ['cd_produto'])]
#[ORM\Index(name: 'fk_comp_agendamento_cd_usuario_agendamento_pessoas_cd_pessoa', columns: ['cd_usuario_agendamento'])]
#[ORM\Index(name: 'fk_comp_agendamento_cd_usuario_cancelamento_pessoas_cd_pessoa', columns: ['cd_usuario_cancelamento'])]
#[ORM\Index(name: 'fk_comp_agendamento_cd_compra_comp_estoque_cd_compra', columns: ['cd_compra'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_comp_agendamento_cd_compra_comp_estoque_cd_compra', 'colunas' => ['cd_compra'], 'tabelaAlvo' => 'comp_estoque', 'colunasAlvo' => ['CD_COMPRA'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_comp_agendamento_cd_pessoa_pessoas_cd_pessoa', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_comp_agendamento_cd_produto_comp_produtos_cd_produto', 'colunas' => ['cd_produto'], 'tabelaAlvo' => 'comp_produtos', 'colunasAlvo' => ['CD_PRODUTO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_comp_agendamento_cd_usuario_agendamento_pessoas_cd_pessoa', 'colunas' => ['cd_usuario_agendamento'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_comp_agendamento_cd_usuario_cancelamento_pessoas_cd_pessoa', 'colunas' => ['cd_usuario_cancelamento'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_comp_agendamento_nr_anosemestre_cd_turma_turma_anosem_codigo', 'colunas' => ['nr_anosemestre', 'cd_turma'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['anosemestre', 'codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CompAgendamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_agendamento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAgendamento = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\ManyToOne(targetEntity: CompProdutos::class)]
    #[ORM\JoinColumn(name: 'cd_produto', referencedColumnName: 'CD_PRODUTO', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CompProdutos $cdProduto = null;

    #[ORM\ManyToOne(targetEntity: CompEstoque::class)]
    #[ORM\JoinColumn(name: 'cd_compra', referencedColumnName: 'CD_COMPRA', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CompEstoque $cdCompra = null;

    #[ORM\Column(name: 'nr_quantidade', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrQuantidade = null;

    #[ORM\Column(name: 'dt_inicio_vigencia', type: 'date')]
    private ?\DateTimeInterface $dtInicioVigencia = null;

    #[ORM\Column(name: 'dt_fim_vigencia', type: 'date')]
    private ?\DateTimeInterface $dtFimVigencia = null;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 64, options: ['default' => 'Pendente'])]
    private string $dsSituacao = 'Pendente';

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_usuario_agendamento', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdUsuarioAgendamento = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_usuario_cancelamento', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdUsuarioCancelamento = null;

    #[ORM\Column(name: 'dt_agendamento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAgendamento = null;

    #[ORM\Column(name: 'dt_cancelamento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCancelamento = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?string $cdTurma = null,
        ?int $nrAnosemestre = null,
        ?CompProdutos $cdProduto = null,
        ?CompEstoque $cdCompra = null,
        ?int $nrQuantidade = null,
        ?\DateTimeInterface $dtInicioVigencia = null,
        ?\DateTimeInterface $dtFimVigencia = null,
        string $dsSituacao = 'Pendente',
        ?Pessoas $cdUsuarioAgendamento = null,
        ?Pessoas $cdUsuarioCancelamento = null,
        ?\DateTimeInterface $dtAgendamento = null,
        ?\DateTimeInterface $dtCancelamento = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdTurma = $cdTurma;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdProduto = $cdProduto;
        $this->cdCompra = $cdCompra;
        $this->nrQuantidade = $nrQuantidade;
        $this->dtInicioVigencia = $dtInicioVigencia;
        $this->dtFimVigencia = $dtFimVigencia;
        $this->dsSituacao = $dsSituacao;
        $this->cdUsuarioAgendamento = $cdUsuarioAgendamento;
        $this->cdUsuarioCancelamento = $cdUsuarioCancelamento;
        $this->dtAgendamento = $dtAgendamento;
        $this->dtCancelamento = $dtCancelamento;
    }

    public function getCdAgendamento(): ?int
    {
        return $this->cdAgendamento;
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

    public function getCdProduto(): ?CompProdutos
    {
        return $this->cdProduto;
    }

    public function setCdProduto(?CompProdutos $cdProduto): self
    {
        $this->cdProduto = $cdProduto;
        return $this;
    }

    public function getCdCompra(): ?CompEstoque
    {
        return $this->cdCompra;
    }

    public function setCdCompra(?CompEstoque $cdCompra): self
    {
        $this->cdCompra = $cdCompra;
        return $this;
    }

    public function getNrQuantidade(): ?int
    {
        return $this->nrQuantidade;
    }

    public function setNrQuantidade(?int $nrQuantidade): self
    {
        $this->nrQuantidade = $nrQuantidade;
        return $this;
    }

    public function getDtInicioVigencia(): ?\DateTimeInterface
    {
        return $this->dtInicioVigencia;
    }

    public function setDtInicioVigencia(?\DateTimeInterface $dtInicioVigencia): self
    {
        $this->dtInicioVigencia = $dtInicioVigencia;
        return $this;
    }

    public function getDtFimVigencia(): ?\DateTimeInterface
    {
        return $this->dtFimVigencia;
    }

    public function setDtFimVigencia(?\DateTimeInterface $dtFimVigencia): self
    {
        $this->dtFimVigencia = $dtFimVigencia;
        return $this;
    }

    public function getDsSituacao(): string
    {
        return $this->dsSituacao;
    }

    public function setDsSituacao(string $dsSituacao): self
    {
        $this->dsSituacao = $dsSituacao;
        return $this;
    }

    public function getCdUsuarioAgendamento(): ?Pessoas
    {
        return $this->cdUsuarioAgendamento;
    }

    public function setCdUsuarioAgendamento(?Pessoas $cdUsuarioAgendamento): self
    {
        $this->cdUsuarioAgendamento = $cdUsuarioAgendamento;
        return $this;
    }

    public function getCdUsuarioCancelamento(): ?Pessoas
    {
        return $this->cdUsuarioCancelamento;
    }

    public function setCdUsuarioCancelamento(?Pessoas $cdUsuarioCancelamento): self
    {
        $this->cdUsuarioCancelamento = $cdUsuarioCancelamento;
        return $this;
    }

    public function getDtAgendamento(): ?\DateTimeInterface
    {
        return $this->dtAgendamento;
    }

    public function setDtAgendamento(?\DateTimeInterface $dtAgendamento): self
    {
        $this->dtAgendamento = $dtAgendamento;
        return $this;
    }

    public function getDtCancelamento(): ?\DateTimeInterface
    {
        return $this->dtCancelamento;
    }

    public function setDtCancelamento(?\DateTimeInterface $dtCancelamento): self
    {
        $this->dtCancelamento = $dtCancelamento;
        return $this;
    }
}

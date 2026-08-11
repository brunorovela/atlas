<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\AlimLancamentoPessoaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlimLancamentoPessoaRepository::class)]
#[ORM\Table(
    name: 'alim_lancamento_pessoa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_PESSOA_REFEICAO_DATA', columns: ['cd_pessoa', 'cd_refeicao', 'dt_lancamento'])]
#[ORM\Index(name: 'IX_PESSOA_REFEICAO_DATA', columns: ['cd_pessoa', 'cd_refeicao', 'dt_lancamento'])]
#[ORM\Index(name: 'FK_alim_lancamento_pessoa_alim_refeicao', columns: ['cd_refeicao'])]
#[ORM\Index(name: 'IDX_39A89922AFC694F1', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_alim_lancamento_pessoa_alim_refeicao', 'colunas' => ['cd_refeicao'], 'tabelaAlvo' => 'alim_refeicao', 'colunasAlvo' => ['cd_refeicao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_alim_lancamento_pessoa_pessoas', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AlimLancamentoPessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_lancamento_pessoa', type: 'integer')]
    private ?int $cdLancamentoPessoa = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\ManyToOne(targetEntity: AlimRefeicao::class)]
    #[ORM\JoinColumn(name: 'cd_refeicao', referencedColumnName: 'cd_refeicao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?AlimRefeicao $cdRefeicao = null;

    #[ORM\Column(name: 'dt_lancamento', type: 'date')]
    private ?\DateTimeInterface $dtLancamento = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?AlimRefeicao $cdRefeicao = null,
        ?\DateTimeInterface $dtLancamento = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdRefeicao = $cdRefeicao;
        $this->dtLancamento = $dtLancamento;
        $this->dtBase = $dtBase;
    }

    public function getCdLancamentoPessoa(): ?int
    {
        return $this->cdLancamentoPessoa;
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

    public function getCdRefeicao(): ?AlimRefeicao
    {
        return $this->cdRefeicao;
    }

    public function setCdRefeicao(?AlimRefeicao $cdRefeicao): self
    {
        $this->cdRefeicao = $cdRefeicao;
        return $this;
    }

    public function getDtLancamento(): ?\DateTimeInterface
    {
        return $this->dtLancamento;
    }

    public function setDtLancamento(?\DateTimeInterface $dtLancamento): self
    {
        $this->dtLancamento = $dtLancamento;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}

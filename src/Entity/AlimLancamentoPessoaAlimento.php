<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\AlimLancamentoPessoaAlimentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlimLancamentoPessoaAlimentoRepository::class)]
#[ORM\Table(
    name: 'alim_lancamento_pessoa_alimento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_LANCAMENTO_PESSOA_ALIMENTO', columns: ['cd_lancamento_pessoa', 'cd_alimento'])]
#[ORM\Index(name: 'IX_LANCAMENTO_PESSOA_ALIMENTO', columns: ['cd_lancamento_pessoa', 'cd_alimento'])]
#[ORM\Index(name: 'FK_alim_lancamento_pessoa_alimento_alim_alimento', columns: ['cd_alimento'])]
#[ORM\Index(name: 'IDX_46FA1E6016D93E8C', columns: ['cd_lancamento_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_alim_lancamento_pessoa_alimento_alim_alimento', 'colunas' => ['cd_alimento'], 'tabelaAlvo' => 'alim_alimento', 'colunasAlvo' => ['cd_alimento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_lancamento_pessoa', 'colunas' => ['cd_lancamento_pessoa'], 'tabelaAlvo' => 'alim_lancamento_pessoa', 'colunasAlvo' => ['cd_lancamento_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AlimLancamentoPessoaAlimento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_lancamento_pessoa_alimento', type: 'integer')]
    private ?int $cdLancamentoPessoaAlimento = null;

    #[ORM\ManyToOne(targetEntity: AlimLancamentoPessoa::class)]
    #[ORM\JoinColumn(name: 'cd_lancamento_pessoa', referencedColumnName: 'cd_lancamento_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?AlimLancamentoPessoa $cdLancamentoPessoa = null;

    #[ORM\ManyToOne(targetEntity: AlimAlimento::class)]
    #[ORM\JoinColumn(name: 'cd_alimento', referencedColumnName: 'cd_alimento', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?AlimAlimento $cdAlimento = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?AlimLancamentoPessoa $cdLancamentoPessoa = null,
        ?AlimAlimento $cdAlimento = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdLancamentoPessoa = $cdLancamentoPessoa;
        $this->cdAlimento = $cdAlimento;
        $this->dtBase = $dtBase;
    }

    public function getCdLancamentoPessoaAlimento(): ?int
    {
        return $this->cdLancamentoPessoaAlimento;
    }

    public function getCdLancamentoPessoa(): ?AlimLancamentoPessoa
    {
        return $this->cdLancamentoPessoa;
    }

    public function setCdLancamentoPessoa(?AlimLancamentoPessoa $cdLancamentoPessoa): self
    {
        $this->cdLancamentoPessoa = $cdLancamentoPessoa;
        return $this;
    }

    public function getCdAlimento(): ?AlimAlimento
    {
        return $this->cdAlimento;
    }

    public function setCdAlimento(?AlimAlimento $cdAlimento): self
    {
        $this->cdAlimento = $cdAlimento;
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

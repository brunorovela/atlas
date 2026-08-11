<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PlauAcPessoaNotaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlauAcPessoaNotaRepository::class)]
#[ORM\Table(
    name: 'plau_ac_pessoa_nota',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'IX_ATIVIDADE_CONTEUDO_PESSOA', columns: ['cd_atividade', 'cd_conteudo', 'cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_ATIVIDADE', columns: ['cd_atividade'])]
#[ORM\Index(name: 'IX_CD_CONTEUDO', columns: ['cd_conteudo'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'plau_ac_pessoa_nota_ibfk_1', 'colunas' => ['cd_atividade'], 'tabelaAlvo' => 'plau_atividade', 'colunasAlvo' => ['cd_atividade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_ac_pessoa_nota_ibfk_2', 'colunas' => ['cd_conteudo'], 'tabelaAlvo' => 'plau_conteudo', 'colunasAlvo' => ['cd_conteudo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_ac_pessoa_nota_ibfk_3', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PlauAcPessoaNota
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_nota', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdNota = null;

    #[ORM\ManyToOne(targetEntity: PlauAtividade::class)]
    #[ORM\JoinColumn(name: 'cd_atividade', referencedColumnName: 'cd_atividade', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlauAtividade $cdAtividade = null;

    #[ORM\ManyToOne(targetEntity: PlauConteudo::class)]
    #[ORM\JoinColumn(name: 'cd_conteudo', referencedColumnName: 'cd_conteudo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlauConteudo $cdConteudo = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'vl_nota', type: 'float', nullable: true)]
    private ?float $vlNota = null;

    public function __construct(
        ?PlauAtividade $cdAtividade = null,
        ?PlauConteudo $cdConteudo = null,
        ?Pessoas $cdPessoa = null,
        ?float $vlNota = null
    ) {
        $this->cdAtividade = $cdAtividade;
        $this->cdConteudo = $cdConteudo;
        $this->cdPessoa = $cdPessoa;
        $this->vlNota = $vlNota;
    }

    public function getCdNota(): ?int
    {
        return $this->cdNota;
    }

    public function getCdAtividade(): ?PlauAtividade
    {
        return $this->cdAtividade;
    }

    public function setCdAtividade(?PlauAtividade $cdAtividade): self
    {
        $this->cdAtividade = $cdAtividade;
        return $this;
    }

    public function getCdConteudo(): ?PlauConteudo
    {
        return $this->cdConteudo;
    }

    public function setCdConteudo(?PlauConteudo $cdConteudo): self
    {
        $this->cdConteudo = $cdConteudo;
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

    public function getVlNota(): ?float
    {
        return $this->vlNota;
    }

    public function setVlNota(?float $vlNota): self
    {
        $this->vlNota = $vlNota;
        return $this;
    }
}
